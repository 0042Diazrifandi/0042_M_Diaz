<?php
// Kelas Induk
class Mobil {
    public $nama0042;
    public $merk0042;
    
    public function __construct($nama0042, $merk0042) {
        $this->nama = $nama0042;
        $this->merk = $merk0042;
    }

    public function tampilkanInfo() {
        echo "Nama Mobil: $this->nama0042\n";
        echo "Merk: $this->merk0042\n";
    }
}

// Kelas Turunan Mobil Sport
class MobilSport extends Mobil {
    public $speed;
    public $turbo;
    
    public function __construct($nama0042, $merk0042, $speed, $turbo) {
        parent::__construct($nama0042, $merk0042);
        $this->speed = $speed;
        $this->turbo = $turbo;
    }
    
    public function tampilkanInfo() {
        parent::tampilkanInfo();
        echo "Kecepatan: $this->speed km/h\n";
        echo "Turbo: $this->turbo\n";
    }
}

// Kelas Turunan City Car
class CityCar extends Mobil {
    public $model;
    public $irit;
    public $sensor; 

    public function __construct($nama0042, $merk0042, $model, $irit, $sensor) {
        parent::__construct($nama0042, $merk0042);
        $this->model = $model;
        $this->irit = $irit;
        $this->sensor = $sensor;
    }
    
    public function tampilkanInfo() {
        parent::tampilkanInfo();
        echo "Model: $this->model\n";
        echo "Irit: $this->irit\n";
        echo "Sensor: $this->sensor\n";
    }
}

// Contoh Penggunaan
$mobilSport = new MobilSport("Porsce", "127", 245, "Yes");
$mobilSport->tampilkanInfo();

echo "</br>\n";

$cityCar = new CityCar("Civic", "Honda", "R", "Sangat Irit", "Teratur");
$cityCar->tampilkanInfo();
?>