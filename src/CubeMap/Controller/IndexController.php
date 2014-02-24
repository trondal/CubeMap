<?php

namespace CubeMap\Controller;

use CubeMap\Mvc\AbstractActionController;
use CubeMap\Mvc\View;

class IndexController extends AbstractActionController {

    public function indexAction() {
        $header = new View('index/header');
        $header->value = 'My Fancy Header';
        $this->view->attachView($header);

        $this->view->message = 'My index message';
        return $this->view;
     }

    public function testAction() {
        $this->view->test = 'This is an test!';
        return $this->view;
    }

}
