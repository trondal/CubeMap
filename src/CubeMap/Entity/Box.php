<?php

namespace CubeMap\Entity;

class Box {

    private $color;

    private $topLeft;

    private $rightBottom;

    public function __construct($color) {
        $this->color = $color;
    }

    public function getColor() {
        return $this->color;
    }

    public function getTopLeft() {
        return $this->topLeft;
    }

    public function getRightBottom() {
        return $this->rightBottom;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function setTopLeft($topLeft) {
        $this->topLeft = $topLeft;
    }

    public function setRightBottom($rightBottom) {
        $this->rightBottom = $rightBottom;
    }

}
