<?php

namespace Sorry\Mvc\Stdlib;

abstract class Request implements RequestInterface {

    const SERVER = 'SERVER';
    const ENV = 'ENV';

    protected $dispatched = false;
    protected $params;

    public function isDispatched() {
        return $this->dispatched;
    }

    public function reDispatch() {
        $this->dispatched = false;
        return $this;
    }

    public function stopDispatching() {
        $this->dispatched = true;
        return $this;
    }

    public function __construct($params = array()) {
        $this->params = $params;
    }

    public function fromServer($key = null, $default = null) {
        return $this->getParams(self::SERVER, $key, $default);
    }

    public function fromEnv($key = null, $default = null) {
        return $this->getParams(self::ENV, $key, $default);
    }

    protected function getParams($namespace, $key = null, $default = null) {
        if (!$key) {
            if (!isset($this->params[$namespace])) {
                return array();
            }
            return $this->params[$namespace];
        }


        if (!isset($this->params[$namespace][$key])) {
            return $default;
        }
        return $this->params[$namespace][$key];
    }

}
