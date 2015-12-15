<?php

class Car{
    public $avto;
    public $maxSpeed;
    public $kyzov;
    public $kolesa;
    public $time;
    public $distance;
    public $speedDistance;

        public function __construct($avto=0, $maxSpeed=0, $kyzov=0, $kolesa=0){
            $this->avto = $avto;
            $this->maxSpeed = $maxSpeed;
            $this->kyzov = $kyzov;
            $this->kolesa = $kolesa;
        }

        public function setAvto($newAvto){
            $this->avto = $newAvto;
        }
        public function getAvto(){
            return $this->avto;
        }

        public function setMaxSpeed($newMaxSpeed){
            $this->maxSpeed = $newMaxSpeed;
        }
        public function getMaxSpeed(){
            return $this->maxSpeed;
        }

        public function setKyzov($newKyzov){
            $this->kyzov = $newKyzov;
        }
        public function getKyzov(){
            return $this->kyzov;
        }

        public function setKolesa($newKolesa){
            $this->kolesa = $newKolesa;
        }
        public function getKolesa(){
            return $this->kolesa;
        }

        public function setTime($time){
            $this->time = $time;
        }

        public function setDistance($distance){
            $this->distance = $distance;
        }

        public function getSpeedKmH($time, $distance){
            $this->speedDistance=$distance/$time;
                return "{$this->speedDistance}";
        }

        public function getSpeedMS($time, $distance){
            $this->speedDistance=$distance/$time*1000/3600;
                return "{$this->speedDistance}";
        }
}

$car = new Car('reno', 180, 'sedan', 4);
echo $car->getSpeedKmH(4, 8);
echo "<br>";
echo $car->getSpeedMS(4, 8);
?>