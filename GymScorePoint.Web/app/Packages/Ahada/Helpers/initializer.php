<?php

foreach (array('path', 'autoloader', 'Composer\composer') as $file) {

    require_once sprintf(
        '%s.php',
        implode(
            DIRECTORY_SEPARATOR,
            array_filter(
                explode(
                    DIRECTORY_SEPARATOR,
                    str_replace(
                        '\\',
                        DIRECTORY_SEPARATOR,
                        str_replace(
                            '/',
                            DIRECTORY_SEPARATOR,
                            sprintf(
                                '%s%s%s',
                                dirname(__FILE__),
                                DIRECTORY_SEPARATOR,
                                $file
                            )
                        )
                    )
                ),
                function ($entry) {
                    return !empty($entry);
                }
            )
        )
    );

    //require_once $file;
}

unset($file);
