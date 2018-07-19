<?php

namespace Vehicles;

abstract class VehicleBase
{
    public $owner;

    public function __construct($ownerNick){
        $this->owner = $ownerNick;
        echo 'construct<br>';
    }

    public function move(){
        echo $this->startEngine();
        echo 'moving<br>';
    }

    public function getOwner() {
        return $this->owner;
    }

    public function setOwner($owner){
        $this->owner = $owner;
    }

    public abstract function startEngine();
}