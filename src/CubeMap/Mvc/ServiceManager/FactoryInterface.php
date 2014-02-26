<?php

namespace CubeMap\Mvc\ServiceManager;

use CubeMap\Mvc\ServiceManager\ServiceLocatorInterface;

interface FactoryInterface {

    public function createService(ServiceLocatorInterface $locator);

}
