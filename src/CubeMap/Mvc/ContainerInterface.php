<?php

namespace CubeMap\Mvc;

interface ContainerInterface {

    public function __get($name);
    public function __set($name, $value);
    public function __isset($name);
    public function __unset($name);
}
