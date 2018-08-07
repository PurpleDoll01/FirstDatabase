<?php

include "shape.php";

function getPrice(Shape $shape) {
    return $shape->getArea() * 0.25;
}

$rect = new Rect(5,7);
$circ = new Circle(5);

$dummy = new Dummy;

echo "<p>", getPrice($rect), "</p>";
echo "<p>", getPrice($circ), "</p>";
echo "<p>", getPrice($dummy), "</p>";