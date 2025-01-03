<?php

namespace app\Models;

use app\Traits\Logger;

abstract class Vehicle {
    protected $brand;
    protected $model;
    protected $year;

    use Logger;

    public function __construct($brand, $model, $year) {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    // Abstract method yang harus diimplementasikan di class turunannya
    abstract public function getDescription();

    // Magic Method __toString
    public function __toString() {
        return "Kendaraan: {$this->brand} {$this->model} ({$this->year})";
    }
}
