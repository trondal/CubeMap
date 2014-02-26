<?php

namespace CubeMap\Mvc;

abstract class AbstractRequest implements RequestInterface {

    protected $params;
    protected $dispatched = false;

    public function __construct($params = array()) {
        $this->params = $params;
    }

    public function getParam($namespace, $key, $default = null) {
        if (!isset($this->params[$namespace][$key])) {
            return $default;
        }
        return $this->params[$namespace][$key];
    }

    public function getParams($namespace = null) {
        if ($namespace) {
            return $this->params[$namespace];
        }
        return $this->params;
    }

    public function isDispatched() {
        return $this->dispatched;
    }

    public function dispatchAgain() {
        $this->dispatched = false;
        return $this;
    }

    public function stopDispatching() {
        $this->dispatched = true;
        return $this;
    }

}
