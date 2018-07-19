<?php

//$var2 = 1;

//$var = function () use ($var2) {
//    echo 'This is a closure<br>';
//    echo 'Value: ' . $var2;
//};

//$var();


//$numbers = [1, 2, 3, 4, 5];

//$x = 3;
//$result = array_map(function ($n) use ($x) {
//    return $n * $x;
//}, $numbers);

//var_dump($result);



$x = 3;
$numbers = [1, 2, 3 ,4 ,5];
$closure = function ($n) use ($x) {
    return $n * $x;
};

$result = $closure(4);
$result2= array_map($closure, $numbers);

var_dump($result);
echo '<br>';
var_dump($result2);