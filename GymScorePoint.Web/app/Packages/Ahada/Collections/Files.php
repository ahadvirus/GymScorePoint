<?php

namespace Ahada\Collections;

abstract class Files implements \Iterator
{
    /**
     * Summary of $data
     * @var array
     */
    protected $data;

    /**
     * Summary of $keys
     * @var array
     */
    protected $keys;

    /**
     * Summary of $position
     * @var int
     */
    protected $position;

    /**
     * Summary of customization
     * @return array
     */
    protected abstract function customization();


    /**
     * @return \Ahada\Routes\Route
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
        $this->data = $this->customization();
        $this->keys = array_keys($this->data);
        $this->position = 0;
    }
}