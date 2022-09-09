<?php

class ValueObject
{
    private $red;
    private $green;
    private $blue;

    public function __construct($red,$green,$blue)
    {
        $this->setBlue($blue);
        $this->setGreen($green);
        $this->setRed($red);
    }

    static public function random(){
        self::setRed(rand(0, 255));
        self::setBlue(rand(0, 255));
        self::setGreen(rand(0, 255));
        return self;
    }

    public function mix(ValueObject ...$arrObjects){
        foreach ($arrObjects as $obj){
            echo $obj->getBlue();
        }
    }

    public function equals(ValueObject $obj){
        if(
            $this->getBlue() === $obj->getBlue() &&
            $this->getRed() === $obj->getRed() &&
            $this->getGreen() === $obj->getGreen()
        ){
            return true;
        }else{
            return false;
        }
    }

    //check color range
    private function checkRange($color){
        if($color >=0 && $color <= 255){
            return $color;
        }else{
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

$c = new ValueObject(123, 122, 145);
echo $c->getBlue();
var_dump(ValueObject::random());