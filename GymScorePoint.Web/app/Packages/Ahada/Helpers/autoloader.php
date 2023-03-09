<?php


spl_autoload_register(function ($name) {
    $namespaces = namespace_collection();

    foreach ($namespaces as $namespace => $address) {
        if (strpos($name, $namespace) !== false && strpos($name, $namespace) == 0) {

            $file = matching_path(sprintf('%s.php', str_replace($namespace, $address, $name)));

            if(is_file($file))
            {
                require_once $file;
                break;
            }
        }
    }
});

if (!function_exists('add_namespace')) :
    /**
     * Summary of add_namespace
     * @param string $namespace
     * @param string $directory
     * @return void
     */
    function add_namespace($namespace, $directory)
    {
        namespace_collection()->add($namespace, $directory);
    }
endif;

if (!function_exists('namespace_collection')) {
    /**
     * @return \Ahada\Collections\Namespaces
     */
    function namespace_collection()
    {
        return (new class implements \Iterator
        {

            /**
             * @var \Ahada\Collections\Namespaces
             */
            private static $instance;

            /**
             * @return \Ahada\Collections\Namespaces
             */
            public static function getInstance()
            {
                return self::$instance;
            }

            /**
             * Private clone method to prevent cloning of the instance of the
             * Singleton instance.
             *
             * @return void
             */
            private function __clone()
            {
                // Don't do anything, we don't want to be cloned
            }

            /**
             * Private unserialize method to prevent unserializing of the Singleton
             * instance.
             *
             * @return void
             */
            private function __wakeup()
            {
                // Don't do anything, we don't want to be unserialized
            }

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
                //echo dirname(__FILE__, 2);
                if (!isset(self::$instance)) {
                    self::$instance = $this;

                    $this->data = array(
                        "Ahada\\"   => directory_path(dirname(__FILE__, 2))
                    );

                }
            }

            /**
             * @param string $namespace
             * @param string $directory
             * @return void
             */
            public function add($namespace, $directory)
            {
                $this->data[$namespace] = $directory;
            }

            /**
             * @return string
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
                $this->position = 0;
                $this->keys = array_keys($this->data);
            }
        })::getInstance();
    }
}
