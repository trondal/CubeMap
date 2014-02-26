<?php

namespace CubeMapTest;

error_reporting(E_ALL | E_STRICT);
chdir(__DIR__);

class Bootstrap {

    public static function init() {
        require_once __DIR__ . '/../vendor/autoload.php';
    }
}

Bootstrap::init();
