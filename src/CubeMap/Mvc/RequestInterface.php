<?php

namespace CubeMap\Mvc;

interface RequestInterface {

    public function isDispatched();

    public function dispatchAgain();

    public function stopDispatching();

    public function getParam($namespace, $key, $default = null);

    public function getParams($namespace = null);
}
