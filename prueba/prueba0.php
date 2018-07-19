<?php
class MyClass {
    private static $count = 0;
    const CONST_VALUE = 'Un valor constante';

    public function __construct()
    {
        self::$count++;
    }

    public static function getTotal() {
        return self::$count;
    }
}

$classname = 'MyClass';
echo $classname::CONST_VALUE; // A partir de PHP 5.3.0

echo MyClass::CONST_VALUE. '<br>';
var_dump($classname);

echo MyClass::getTotal();
?>