<?php

namespace CubeMap\Controller;

use Sorry\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController {

    public function indexAction() {
        $this->view->message = $this->getRequest()->fromQuery('message');
    }

    public function testAction() {
        $this->view->test = 'This is an test!';
    }

}
