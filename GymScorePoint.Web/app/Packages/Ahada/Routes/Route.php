<?php

namespace Ahada\Routes;

class Route
{
    /**
     * @var \Ahada\Collections\Variables
     */
    protected $variables;

    /**
     * @var string
     */
    protected $pattern;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $handler;

    /**
     * Summary of __construct
     * @param string $pattern
     * @param string $handler 
     */
    public function __construct($pattern, $handler, $name = '')
    {
        $this->variables = new \Ahada\Collections\Variables();
        $this->handler = $handler;
        $this->pattern = $pattern;
        $this->name = $name;
        //
        $this->extractVariables();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * @param string $url
     * @return bool
     */
    public function match($url)
    {
        return (preg_match(sprintf('~^%s$~', $this->pattern), $url, $matches) === 1);
    }

    /**
     * @param string $url
     * @return array
     */
    public function getRouteValues($url)
    {
        $result = array();

        if ($this->match($url)) {
            preg_match(sprintf('~^%s$~', $this->pattern), $url, $matches);
            foreach ($this->variables as $variable) {
                if (isset($matches[$variable->getName()])) {
                    $result[$variable->getName()] = $matches[$variable->getName()];
                }

            }
        }

        return $result;
    }

    /**
     *
     * @return void
     */
    protected function extractVariables(): array
    {
        $result = array();
        $parentheses = $this->matchParentheses($this->pattern);
        if (count($parentheses)) {
            foreach ($parentheses as $start => $length) {
                $temporary = substr($this->pattern, $start, $length );
                $required = substr($this->pattern, $start + $length, 1) != '?';
                preg_match('~(?P<name>\?P<\w+>)~', $temporary, $matches);
                $this->variables->add(new Variable(
                    str_replace(
                        '?P<',
                        '',
                        str_replace(
                            '>',
                            '',
                            $matches['name']
                        )
                    ),
                    $required,
                    substr(
                        $temporary,
                        strpos($temporary, $matches['name']) + strlen($matches['name']),
                        strpos($temporary, ')') - ( strpos($temporary, $matches['name']) + strlen($matches['name']) )
                    ),
                    $temporary
                ));

            }
        }
        return $result;
    }

    /**
     * @param string $entry
     * @return array
     */
    private function matchParentheses($entry)
    {
        $stack = $result = [];
        $len_open = strlen('(');
        $len_close = strlen(')');
        $pos = -1;
        $end = strlen($entry) + 1;

        while (true) {
            $first = strpos($entry, '(', $pos + 1);
            $second = strpos($entry, ')', $pos + 1);
            $pos = min(($first === false) ? $end : $first, ($second === false) ? $end : $second);
            if ($pos == $end) {
                break;
            }
            if (substr($entry, $pos, $len_open) == '(') {
                $stack[] = $pos;
            } elseif (substr($entry, $pos, $len_close) == ')') {
                if (count($stack)) {
                    $start = array_pop($stack);
                    if (!count($stack)) {
                        $result[$start] = $pos + $len_close - $start;
                    }
                }
            }
        };

        ksort($result);

        return $result;
    }
}