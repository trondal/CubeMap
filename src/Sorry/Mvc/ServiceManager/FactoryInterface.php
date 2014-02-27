<?php

namespace Sorry\Mvc\ServiceManager;

use Sorry\Mvc\ServiceManager\ServiceLocatorInterface;

interface FactoryInterface {

    public function createService(ServiceLocatorInterface $locator);

}
