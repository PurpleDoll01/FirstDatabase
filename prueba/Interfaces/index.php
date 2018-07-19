<?php

interface Auto {
    public function encender();
    public function apagar();
}

interface gasolina extends Auto{
    public function vaciarTanque();
    public function llenarTanque($cant);
}

class Deportivo implements gasolina{

    private $estado = false;
    private $tanque = 0;



    public function estado() {
        if ($this->estado) {
            echo 'El auto esta encendido y tiene ' . $this->tanque . ' de litros en el tanque <br>';
        }
        else {
            echo 'El auto esta apagado<br>';
        }

    }

    public function vaciarTanque(){
        $this->tanque = 0;
    }

    public function llenarTanque($cant){
        $this->tanque = $this->tanque + $cant;
        echo 'Usted acaba de tanquear con ' . $cant . ' litros el carro y ahora tiene ' . $this->tanque . ' litros de gasolina <br>';
    }

    public function encender(){
        if ($this->estado) {
            echo 'No puedes encender dos veces el auto<br>';
        }
        else {
            if ($this->tanque <= 0) {
                echo 'Usted no puede encender el auto porque no tiene gasolina<br>';
            }
            else{
                echo 'Auto encendido<br>';
                $this->estado = true;
            }
        }
    }

    public function apagar(){
        if ($this->estado) {
            echo 'Auto apagado<br>';
            $this->estado = false;
        }
        else {
            echo 'El auto ya estaba apagado<br>';
            //$this->estado = true;
        }
    }

    public function usar ($km){
        if ($this->estado) {
            $reducir = $km / 3;
            $this->tanque = $this->tanque - $reducir;
            echo 'Usted ha recorrido ' . $km . ' km y su tanque tiene ' . $this->tanque . ' litros de gasolina<br>';
            if ($this->tanque <= 0) {
               $this->estado = false;
            }
        }
        else{
           echo 'El auto esta apagado y no se puede usar<br>';
        }
    }
}

$obj = new Deportivo();
$obj->encender();
$obj->llenarTanque(100);
$obj->encender();
$obj->usar(20);
$obj->usar(800);
$obj->estado();