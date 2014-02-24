<?php

namespace CubeMap\Mvc;

class Request {

    protected $uri;
    protected $params;

    public function __construct($uri = null, $params = array()) {
        if (!$uri) {
            $uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
        }
        if (!$params) {
            // Note: Override by POST
            $params = array_merge($_GET, $_POST);
        }
        $this->uri = preg_replace('/[^a-zA-Z0-9]\//', "", $uri);
        $this->params = $params;
    }

    public function getUri() {
        return $this->uri;
    }

    /**
     *
     * @param mixed $key
     * @param mixed $value
     * @return \CubeMap\Controller\Request
     */
    public function setParam($key, $value) {
        $this->params[$key] = $value;
        return $this;
    }

    /**
     *
     * @param string $key
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function getParam($key) {
        if (!isset($this->params[$key])) {
            throw new \InvalidArgumentException(
            'Request parameter ' . $key . ' does not exist');
        }
        return $this->params[$key];
    }

    public function getParams() {
        return $this->params;
    }

}
