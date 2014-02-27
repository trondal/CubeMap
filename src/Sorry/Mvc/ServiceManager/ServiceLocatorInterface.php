<?php

namespace Sorry\Mvc\ServiceManager;

interface ServiceLocatorInterface {

    public function get($name);

    public function has($name);

}
