<?php

namespace Sorry\Mvc\Http;

class Request extends \Sorry\Mvc\Stdlib\Request {

    const ROUTE = 'ROUTE';
    const GET = 'GET';
    const POST = 'POST';
    const COOKIE = 'COOKIE';

    protected $uri;
    protected $scheme;
    protected $host;
    protected $path;
    protected $user;
    protected $pass;
    protected $query;

    public function __construct($params, $uri) {
        parent::__construct($params);
        $this->uri = $uri;
        $this->scheme = parse_url($uri, PHP_URL_SCHEME);
        $this->host = parse_url($uri, PHP_URL_HOST);
        $this->path = parse_url($uri, PHP_URL_PATH);
        $this->user = parse_url($uri, PHP_URL_USER);
        $this->pass = parse_url($uri, PHP_URL_PASS);
        $this->query = parse_url($uri, PHP_URL_QUERY);
    }

    public function getUri() {
        return $this->uri;
    }

    public function getScheme() {
        return $this->scheme;
    }

    public function getHost() {
        return $this->host;
    }

    public function getPath() {
        return $this->path;
    }

    public function getUser() {
        return $this->user;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getQuery() {
        return $this->query;
    }

    public function isSecure() {
        return $this->getScheme() === 'https';
    }

    public function fromQuery($key = null, $default = null) {
        return $this->getParams(self::GET, $key, $default);
    }

    public function fromPost($key = null, $default = null) {
        return $this->getParams(self::POST, $key, $default);
    }

    public function fromCookie($key = null, $default = null) {
        return $this->getParams(self::COOKIE, $key, $default);
    }

}
