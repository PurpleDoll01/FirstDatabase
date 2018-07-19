<?php

namespace Vehicles;

require_once 'VehicleBase.php';

class Truck extends VehicleBase {
    private static $count = 0;
    private $type;

    public function __construct($ownerNick, $type)
    {
        $this->type = $type;
        parent::__construct($ownerNick);
        self::$count++;
    }

    public static function getTotal() {
        return self::$count;
    }

    public function startEngine() {
        return 'Truck: start engine <br>';
    }
}