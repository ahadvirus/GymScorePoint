<?php

namespace Ahada\Collections;

class Variables implements \Iterator
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @var int
     */
    protected $position;

    /**
     * @var array
     */
    protected $keys;

    public function __construct()
    {
        $this->data = [];
        $this->rewind();
    }

    /**
     * @param \Ahada\Routes\Variable $variable
     * @return void
     */
    public function add($variable)
    {
        $this->data[$variable->getName()] = $variable;
    }

    /**
     * @return \Ahada\Routes\Variable
     */
    public function current()
    {
        return $this->data[$this->key()];
    }

    /**
     * @return void
     */
    public function next()
    {
        $this->position++;
    }

    /**
     * @return string
     */
    public function key()
    {
        return $this->keys[$this->position];
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return isset($this->keys[$this->position]);
    }

    /**
     * @return void
     */
    public function rewind()
    {
        $this->keys = array_keys($this->data);
        $this->position = 0;
    }
}