<?php

namespace Ahada\Routes;

class Variable
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $required;

    /**
     * @var string
     */
    protected $pattern;

    /**
     * @var string
     */
    protected $template;

    /**
     * Variable constructor.
     * @param string $name
     * @param bool $required
     * @param string $pattern
     * @param string $template
     */
    public function __construct(
        $name,
        $required,
        $pattern,
        $template
    )
    {
        $this->name = $name;
        $this->required = $required;
        $this->pattern = $pattern;
        $this->template = $template;
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
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @return bool
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return sprintf('%s%s', $this->template, ($this->required ? '' : '?'));
    }

}