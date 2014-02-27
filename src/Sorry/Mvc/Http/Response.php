<?php

namespace Sorry\Mvc\Http;

use Sorry\Mvc\Stdlib\ResponseInterface;
use Sorry\Mvc\View\ViewInterface;

class Response implements ResponseInterface {

    const VERSION_11 = '1.1';
    const VERSION_10 = '1.0';

    protected $version;

    protected $headers = array();

    protected $error = false;
    
    public function __construct($version = self::VERSION_11) {
        $this->version = $version;
    }

    public function addHeader($header) {
        $this->headers[] = $header;
        return $this;
    }

    public function addHeaders(array $headers) {
        foreach($headers as $header) {
            $this->addHeader($header);
        }
        return $this;
    }

    public function getHeaders() {
        return $this->headers;
    }

    public function send(ViewInterface $view) {
        if (!headers_sent()) {
            foreach ($this->headers as $header) {
                header($header, true);
            }
        }
        echo $view->render();
    }

    public function raiseRoutingError() {
        $this->headers[] = sprintf('HTTP/%s 404 Not Found', $this->version);
        $this->error = true;
        return $this;
    }

    public function raiseProcessingError() {
        $this->headers[] = sprintf('HTTP/%s 503 Service Unavailable', $this->version);
        $this->error = true;
        return $this;
    }

    public function isError() {
        return $this->error;
    }

}
