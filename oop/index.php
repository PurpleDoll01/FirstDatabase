<?php

//class Car
//{
//    public $owner;

//    public function move(){
//        echo 'moving<br>';
//    }
//}

//echo 'Class Car<br>';
//$car = new Car;
//$car->move();
//$car->owner = 'Alex';
//echo 'Owner: ' . $car->owner;


class Car
{
    private $owner;

    public function __construct($ownerNick){
        $this->owner = $ownerNick;
        echo 'construct<br>';
    }

    public function __destruct() {
        echo 'destruct<br>';
    }

    public function move(){
        echo 'moving<br>';
    }

    public function getOwner() {
        return $this->owner;
    }

    public function setOwner($owner){
        $this->owner = $owner;
    }
}

echo 'Class Car<br>';
$car = new Car('Alex');
$car2 = new Car('Max');

$car->move();

echo 'Owner car: ' . $car->getOwner() . '<br>';
echo 'Owner car 2: ' . $car2->getOwner() . '<br>';