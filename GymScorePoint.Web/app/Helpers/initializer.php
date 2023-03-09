<?php

foreach ([
             directory_path('app/Helpers/routes.php')
         ] as $file) {
    require_once $file;
}
