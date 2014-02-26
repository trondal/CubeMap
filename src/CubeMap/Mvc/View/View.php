<?php

namespace CubeMap\Mvc\View;

use Closure;
use CubeMap\Mvc\View\ContainerInterface;
use CubeMap\Mvc\View\TemplateInterface;
use InvalidArgumentException;

class View implements TemplateInterface, ContainerInterface, ViewInterface {

    protected $template;
    protected $fields;

    public function __construct($template = null, array $fields = array()) {
        if ($template !== null) {
            $this->setTemplate($template);
        }
        if (!empty($fields)) {
            foreach ($fields as $name => $value) {
                $this->$name = $value;
            }
        }
    }

    public function setTemplate($template) {
        $template = realpath('view/'. $template . '.phtml');

        if (!is_file($template) || !is_readable($template)) {
            throw new InvalidArgumentException(
                "The template '$template' is invalid.");
        }
        $this->template = $template;
        return $this;
    }

    public function getTemplate() {
        return $this->template;
    }

    public function __set($name, $value) {
        $this->fields[$name] = $value;
        return $this;
    }

    public function __get($name) {
        if (! isset($this->fields[$name])) {
            throw new InvalidArgumentException(
                    'Unable to get field '. $name);
        }
        $field = $this->fields[$name];
        return $field instanceof Closure ? $field($this): $field;
    }

    public function __isset($name) {
        return isset($this->fields[$name]);
    }

    public function __unset($name) {
        if (! isset($this->fields[$name])) {
            throw new InvalidArgumentException(
                    'Unable to unset field '. $name);
        }
        unset($this->fields[$name]);
        return $this;
    }


    public function render() {
        extract($this->fields);
        ob_start();
        include $this->template;
        return ob_get_clean();
    }

}
