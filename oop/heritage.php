<?php

include 'vehicles/Car.php';
include 'vehicles/Truck.php';
include 'vehicles/ToyCar.php';

use Vehicles\{Car, Truck, ToyCar};

try {
    echo 'Class ToyCar<br>';
    $toyCar = new ToyCar('Roberto');
    $toyCar->move();
} catch (Exception $e) {
    echo $e->getMessage();
    echo 'This is a toy, so it doesnt have engine<br><br>';
} finally {
    echo 'finally<br><br>';
}

echo 'Class Car<br>';
$car = new Vehicles\Car('Alex');
$car->move();
echo 'GPS pos: ' . $car->getPos();

echo 'Class Truck 1<br>';
$truck1 = new Vehicles\Truck('Max', 'Pickup');
$truck1->move();

echo 'Class Truck 2<br>';
$truck2 = new Vehicles\Truck('Max', 'Pickup');
$truck2->move();

echo '<br> Total trucks: ' . Truck::getTotal() . '<br>';

$ser = serialize($car);
$newCar = unserialize($ser);

echo 'NewCar Owner: ' . $newCar->getOwner() . '<br>';

