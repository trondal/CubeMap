<?php

namespace CubeMap\Mvc\Di;

class Container {

    protected $parameters;

    public function get($className, $options = null) {
        if (isset($this->parameters[$className])) {

            // determine using 'set' or 'user' parameters
            $parameters = array();
            if ($options) {
                $parameters = $options;
            } else {
                $parameters = isset($this->parameters[$className]) ? $this->parameters[$className] : array();
            }

            $reflect = new ReflectionClass($className);
            return $reflect->newInstanceArgs($parameters);
        } else {
            throw new Exception('Class \'' . $className . '\' not configured by \Di\Container');
        }
    }

    public function set($name, array $options = array()) {
        $this->parameters[$name] = $options;
    }
}
