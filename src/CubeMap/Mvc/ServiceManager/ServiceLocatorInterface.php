<?php

namespace CubeMap\Mvc\ServiceManager;

interface ServiceLocatorInterface {

    public function get($name);

    public function has($name);

}
