<?php

interface PizzaInterface
{
    /**
     * @return float
     */
    public function getCost(): float;

    /**
     * @return array
     */
    public function getIngredients(): array;

    /**
     * @return string
     */
    public function getTitle(): string;
}

class PizzaChickenGrill implements PizzaInterface
{
    /**
     * @return float
     */
    public function getCost(): float
    {
        return 194;
    }

    /**
     * @return array
     */
    public function getIngredients(): array
    {
        return [
            'сирний соус', 'куряче стегно', 'смажені печериці', 'чері', 'цибуля фрі', 'сир моцарелла', 'пармезан'
        ];
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return 'Піца Chicken Grill';
    }
}

class PizzaMexican implements PizzaInterface
{
    /**
     * @return float
     */
    public function getCost(): float
    {
        return 175;
    }

    /**
     * @return array
     */
    public function getIngredients(): array
    {
        return [
            'вершково-сирний соус', 'куряче стегно', 'сир моцарелла', 'сальса з ананасу та кукурудзи', 'гуакамолє', 'чіпси начос', 'зелений перець чілі', 'кінза'
        ];
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return 'Піца Мексиканська';
    }
}

class PizzaMunchen implements PizzaInterface
{
    /**
     * @return float
     */
    public function getCost(): float
    {
        return 285;
    }

    /**
     * @return array
     */
    public function getIngredients(): array
    {
        return [
            'мюнхенськие ковбаски', 'баварськие ковбаски', 'пепероні', 'томатами черрі', 'солоними огірками', 'цибулею', 'гострим перцем чилі', 'сир моцарелла','сир емменталь', 'соус пілатті'
        ];
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return 'Піца Мюнхенська';
    }
}

class PizzaCalculator
{
    private $arrPizza;

    public function add(PizzaInterface $pizza)
    {
        $this->arrPizza[] = $pizza;
    }

    public function ingredients()
    {
        $arrIngredients = [];
        foreach ($this->arrPizza as $pizza){
            $arrIngredients = array_merge($arrIngredients, $pizza->getIngredients());
        }
        return array_unique($arrIngredients);
    }

    public function price()
    {
        $price = 0;
        foreach ($this->arrPizza as $pizza){
            $price += $pizza->getCost();
        }
        return $price;
    }
}

$order = new PizzaCalculator();
$order->add(new PizzaMunchen());
$order->add(new PizzaMexican());
echo "<pre>";
echo $order->price();
print_r($order->ingredients());