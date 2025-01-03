<?php

require_once "app/Traits/Logger.php";
require_once "app/Models/Vehicle.php";
require_once "app/Models/PublicVehicle.php";
require_once "app/Models/PrivateVehicle.php";

use app\Models\PublicVehicle;
use app\Models\PrivateVehicle;

// Membuat instance kendaraan umum
$bus = new PublicVehicle("Mercedes-Benz", "Sprinter", 2020, 20);
echo $bus . PHP_EOL; // Magic method __toString
echo $bus->getDescription() . PHP_EOL; // Abstract method
$bus->log("Bus telah didaftarkan.");

// Membuat instance kendaraan pribadi
$car = new PrivateVehicle("Toyota", "Corolla", 2018, "John Doe");
echo $car . PHP_EOL; // Magic method __toString
echo $car->getDescription() . PHP_EOL; // Abstract method
$car->log("Mobil telah didaftarkan.");
