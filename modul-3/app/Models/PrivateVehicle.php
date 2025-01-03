<?php

namespace app\Models;

class PrivateVehicle extends Vehicle {
    private $owner; // Nama pemilik

    public function __construct($brand, $model, $year, $owner) {
        parent::__construct($brand, $model, $year);
        $this->owner = $owner;
    }

    public function getDescription() {
        return "Ini adalah kendaraan pribadi milik {$this->owner}.";
    }
}
