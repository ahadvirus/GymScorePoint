<?php

namespace Ahada\Collections;

class Routes implements \Iterator
{
    protected $data;

    protected $keys;

    protected $position;

    public function __construct()
    {
        $this->data = [];
        $this->rewind();
    }

    /**
     * @param string $address
     * @param string $handler
     * @return void
     */
    public function add($address, $handler, $name = '')
    {
        $route = new \Ahada\Routes\Route($address, $handler, $name);

        if (empty($name)) {
            $name = count($this->data);
        }

        $this->data[$name] = $route;
    }

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
        $this->keys = array_keys($this->data);
        $this->position = 0;
    }
}
