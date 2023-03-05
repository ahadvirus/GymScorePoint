<?php

namespace Ahada\Collections;

interface Namespaces extends \Iterator
{
    /**
     * @param string $namespace
     * @param string $directory
     * @return void
     */
    public function add($namespace, $directory);

    /**
     * @return string
     */
    public function current();

    /**
     * @return void
     */
    public function next();

    /**
     * @return string
     */
    public function key();

    /**
     * @return bool
     */
    public function valid();

    /**
     * @return void
     */
    public function rewind();
}
