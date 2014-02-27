<?php

namespace Sorry\Mvc\Stdlib;

interface RequestInterface {

    public function isDispatched();

    public function reDispatch();

    public function stopDispatching();
   
}
