<?php

namespace CubeMap\Controller;

use CubeMap\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController {

    public function indexAction() {
        $this->view->message = $this->getRequest()->getParam('GET', 'id');
     }

    public function testAction() {
        $this->view->test = 'This is an test!';
    }

}
