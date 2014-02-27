<?php

namespace Sorry\Mvc\Stdlib;

use Sorry\Mvc\View\ViewInterface;

interface ResponseInterface {

    public function raiseRoutingError();

    public function raiseProcessingError();

    public function isError();

    public function send(ViewInterface $view);
    
}