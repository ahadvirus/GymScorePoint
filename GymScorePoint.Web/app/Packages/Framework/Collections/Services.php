<?php

namespace App\Framework\Collections;

use App\Framework\Infrastructures\Service;

class Services implements \Iterator
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @var array
     */
    protected $keys;

    /**
     * @var int
     */
    protected $position;

    public function __construct()
    {
        $this->data = [];
        $this->rewind();
    }

    /**
     * @param string $service
     * @return void
     */
    public function add($service)
    {
        if (!is_subclass_of($service, Service::class)) {
            return;
        }

        $this->data[] = $service;
    }

    /**
     * @param string ...$services
     * @return void
     */
    public function addRange(...$services)
    {
        foreach ($services as $service) {
            $this->add($service);
        }
    }

    /**
     * @return void
     */
    public function compile()
    {
        $method = (new \ReflectionClass(Service::class))->getMethods()[0];

        foreach ($this as $service) {
            $service = new $service();
            call_user_func_array([$service, $method->getName()], []);
        }
    }

    /**
     * @return Service
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
     * @return int
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return isset($this->data[$this->position]);
    }

    /**
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }
}