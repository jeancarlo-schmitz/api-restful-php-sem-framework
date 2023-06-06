<?php
define("DS", DIRECTORY_SEPARATOR);
define("DIR", __DIR__);
define("DIR_APP", __DIR__ . DS . "App");
define("DIR_GAMA", __DIR__ . DS . "lib\gama");
define("DIR_MODULES", __DIR__ . DS . "App\modules");
if ($_SERVER['HTTP_HOST'] === 'localhost' ||
    $_SERVER['HTTP_HOST'] === 'localhost:8000' ||
    $_SERVER['HTTP_HOST'] === 'localhost:8082'/*personal localhost*/
) {
    define("IS_DEV", true);
}else{
    define("IS_DEV", false);
}

