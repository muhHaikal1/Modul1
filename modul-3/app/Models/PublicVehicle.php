<?php

namespace app\Models;

class PublicVehicle extends Vehicle {
    private $capacity; // Kapasitas penumpang

    public function __construct($brand, $model, $year, $capacity) {
        parent::__construct($brand, $model, $year);
        $this->capacity = $capacity;
    }

    public function getDescription() {
        return "Ini adalah kendaraan umum dengan kapasitas {$this->capacity} penumpang.";
    }
}
