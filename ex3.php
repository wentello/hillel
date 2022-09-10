<?php

class ValueObject
{
    private $red;
    private $green;
    private $blue;

    public function __construct($red, $green, $blue)
    {
        $this->setBlue($blue);
        $this->setGreen($green);
        $this->setRed($red);
    }

    static public function random()
    {
        return new ValueObject(rand(0, 255), rand(0, 255), rand(0, 255));
    }

    public function mix(ValueObject $objects)
    {
        return new ValueObject(
            (int)(($this->getRed() + $objects->getRed()) / 2),
            (int)(($this->getGreen() + $objects->getGreen()) / 2),
            (int)(($this->getBlue() + $objects->getBlue()) / 2)
        );
    }

    public function equals(ValueObject $obj)
    {
        if (
            $this->getBlue() === $obj->getBlue() &&
            $this->getRed() === $obj->getRed() &&
            $this->getGreen() === $obj->getGreen()
        ) {
            return true;
        } else {
            return false;
        }
    }

    //check color range
    private function checkRange($color)
    {
        if ($color >= 0 && $color <= 255 && is_int($color)) {
            return $color;
        } else {
            throw new InvalidArgumentException('Wrong color value');
        }
    }

    /**
     * @return mixed
     */
    public function getRed()
    {
        return $this->red;
    }

    /**
     * @return mixed
     */
    public function getGreen()
    {
        return $this->green;
    }

    /**
     * @return mixed
     */
    public function getBlue()
    {
        return $this->blue;
    }

    /**
     * @param mixed $red
     */
    private function setRed($red)
    {
        $this->red = $this->checkRange($red);
    }

    /**
     * @param mixed $green
     */
    private function setGreen($green)
    {
        $this->green = $this->checkRange($green);
    }

    /**
     * @param mixed $blue
     */
    private function setBlue($blue)
    {
        $this->blue = $this->checkRange($blue);
    }
}