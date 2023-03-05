<?php

foreach (array('path', 'autoloader') as $file) {

    require_once sprintf(
        '%s%s%s.php',
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
                            dirname(__FILE__)
                        )
                    )
                ),
                function ($entry) {
                    return !empty($entry);
                }
            )
        ),
        DIRECTORY_SEPARATOR,
        $file
    );

    //require_once $file;
}
