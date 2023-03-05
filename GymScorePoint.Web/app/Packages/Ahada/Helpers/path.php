<?php

if (!function_exists('base_path')) :

    /**
     * @return string
     */
    function base_path(): string
    {
        return sprintf(
            '%s%s',
            matching_path(dirname($_SERVER['DOCUMENT_ROOT'])),
            DIRECTORY_SEPARATOR
        );
    }

endif;

if (!function_exists('directory_path')) :
    /**
     * @param string $name
     *
     * @return string
     */
    function directory_path($name): string
    {
        return sprintf(
            '%s%s',
            matching_path(
                sprintf(
                    '%s%s%s',
                    (strpos($name, base_path()) === false ? base_path() : ''),
                    DIRECTORY_SEPARATOR,
                    $name
                )
            ),
            DIRECTORY_SEPARATOR
        );
    }
endif;


if (!function_exists('matching_path')) :
    /**
     * @param string $name
     *
     * @return string
     */
    function matching_path($name): string
    {
        return implode(
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
                            $name
                        )
                    )
                ),
                function ($entry) {
                    return !empty($entry);
                }
            )
        );
    }
endif;
