<?php

namespace Ahada\Files;

abstract class Info{
    /**
     * Summary of $address
     * @var string
     */
    protected $address;

    /**
     * Summary of __construct
     * @param string $address
     */
    public function __construct($address)
    {
        $this->address = $address;
    }

    /**
     * Summary of isDirectory
     * @return bool
     */
    public function isDirectory()
    {
        return is_dir($this->address);
    }

    /**
     * Summary of isDirectory
     * @return bool
     */
    public function isFile()
    {
        return !is_dir($this->address) && is_file($this->address);
    }
} 