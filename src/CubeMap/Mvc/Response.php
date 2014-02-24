<?php

namespace CubeMap\Mvc;

class Response {

    protected $headers = array();

    public function __construct() {
    }

    public function addHeader($key, $value) {
        $this->headers[$key] = $value;
        return $this;
    }

    public function addHeaders(array $headers) {
        foreach($headers as $key => $value) {
            $this->addHeader($key, $value);
        }
        return $this;
    }

    public function getHeaders() {
        return $this->headers;
    }

    public function send() {
        if (!headers_sent()) {
            foreach ($this->headers as $key => $value) {
                header($key .':'. $value, true);
            }
        }
    }

}
