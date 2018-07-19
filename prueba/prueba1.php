<?php

class Fruit
{
    private $color;
    private $flavor;
    private static $count = 0;
    private $size;
    private $shape;

    public function __construct() {
        echo 'You have created a new fruit<br>';
        self::$count++;
    }

    public function eat($name, $fruit) {
        echo $name . ' is eating ' . $fruit;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function getColor() {
        //return $this->color;
        echo '<br>The color of this fruit is ' . $this->color;
    }

    public function setFlavor($flavor) {
        $this->flavor = $flavor;
    }

    public function getFlavor() {
        echo '<br>The flavor of this fruit is ' . $this->flavor;
    }

    public static function getCount(){
        return self::$count;
    }

}

$apple = new Fruit;
$apple->eat('Mariana', 'Apple');
$apple->setColor('Red');
$apple->getColor();
$apple->setFlavor('Sweet');
$apple->getFlavor();
echo '<br>' . '<br>';
$orange = new Fruit;
$orange->eat('MarianaC', 'orange');
$orange->setColor('Orange');
$orange->getColor();
$orange->setFlavor('Acid');
$orange->getFlavor();
echo '<br><br>Frutas creadas: ' . Fruit::getCount() . '<br>';

$var = function ($numero1, $numero2) {
    return $numero1 * $numero2;
};

echo '<br>' . $var(3,6);



