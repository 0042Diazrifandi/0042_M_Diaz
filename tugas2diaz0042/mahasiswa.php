<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #a3cde3; 
            color: #333; 
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #004080;
            margin-bottom: 30px;
            font-size: 36px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }

        h3 {
            color: #0056b3; 
            font-size: 24px;
            text-transform: uppercase;
            margin-bottom: 15px;
            border-bottom: 2px solid #0056b3;
            padding-bottom: 5px;
        }

        .container {
            background-color: #ffffff;
            color: #333; 
            border: 1px solid #ddd; 
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px; 
            margin: 20px auto; 
            transition: transform 0.2s; 
        }

        .container:hover {
            transform: scale(1.02); 
        }

        .status-cumlaude {
            color: #28a745; 
            font-weight: bold;
            font-size: 18px;
        }

        .status-tidak-cumlaude {
            color: #dc3545; 
            font-weight: bold;
            font-size: 18px;
        }

        .container p {
            margin: 5px 0; 
            line-height: 1.6; 
        }

        .footer {
            text-align: center; 
            margin-top: 30px; 
            font-size: 14px; 
            color: #666; 
        }
    </style>
</head>
<body>

<h1>Data Mahasiswa</h1>

<?php
// Kelas Mahasiswa
class Mahasiswa {
    public $nama;
    public $nim;
    public $ipk;
    public $tahun_masuk;

    public function __construct($nama, $nim, $ipk, $tahun_masuk) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->ipk = $ipk;
        $this->tahun_masuk = $tahun_masuk;
    }

    public function tampilkanData() {
        echo "<p>Nama: " . $this->nama . "</p>";
        echo "<p>NIM: " . $this->nim . "</p>";
        echo "<p>IPK: " . $this->ipk . "</p>";
        echo "<p>Tahun Masuk: " . $this->tahun_masuk . "</p>";
    }

    public function lulusTepatWaktu() {
        return ($this->tahun_lulus - $this->tahun_masuk) <= 4;
    }

    public function cekCumlaude() {
        return $this->ipk >= 3.5 && $this->lulusTepatWaktu();
    }
}

// Kelas Mahasiswa Cumlaude
class MahasiswaCumlaude extends Mahasiswa {
    public $tahun_lulus;
    public $lama_kuliah;

    public function __construct($nama, $nim, $ipk, $tahun_masuk, $tahun_lulus) {
        parent::__construct($nama, $nim, $ipk, $tahun_masuk);
        $this->tahun_lulus = $tahun_lulus;
        $this->lama_kuliah = $tahun_lulus - $tahun_masuk;
    }

    public function tampilkanData() {
        parent::tampilkanData(); // Memanggil fungsi tampilkanData dari kelas induk
        echo "<p class='status-cumlaude'>Status: Cumlaude</p>";
        echo "<p>Tahun Lulus: " . $this->tahun_lulus . "</p>";
        echo "<p>Lama Kuliah: " . $this->lama_kuliah . " tahun</p>";
    }
}

// Kelas Mahasiswa Tidak Cumlaude
class MahasiswaTidakCumlaude extends Mahasiswa {
    public $tahun_lulus;
    public $lama_kuliah;

    public function __construct($nama, $nim, $ipk, $tahun_masuk, $tahun_lulus) {
        parent::__construct($nama, $nim, $ipk, $tahun_masuk);
        $this->tahun_lulus = $tahun_lulus;
        $this->lama_kuliah = $tahun_lulus - $tahun_masuk;
    }

    public function tampilkanData() {
        parent::tampilkanData(); // Memanggil fungsi tampilkanData dari kelas induk
        echo "<p class='status-tidak-cumlaude'>Status: Tidak Cumlaude</p>";
        echo "<p>Tahun Lulus: " . $this->tahun_lulus . "</p>";
        echo "<p>Lama Kuliah: " . $this->lama_kuliah . " tahun</p>";
    }
}

// Penggunaan Kelas
echo "<div class='container'>";
echo "<h3>Data Mahasiswa 1:</h3>";
$mahasiswa1 = new MahasiswaCumlaude("M Diaz Rifandi", "23.230.0042", 3.9, 2023, 2026);
$mahasiswa1->tampilkanData();
echo "</div>";

echo "<div class='container'>";
echo "<h3>Data Mahasiswa 2:</h3>";
$mahasiswa2 = new MahasiswaTidakCumlaude("Khairi Tojivin", "23.230.0066", 2.0, 2023, 2026);
$mahasiswa2->tampilkanData();
echo "</div>";

echo "<div class='container'>";
echo "<h3>Data Mahasiswa 3:</h3>";
$mahasiswa3 = new MahasiswaTidakCumlaude("Jonathan Akbar", "23.230.0099", 3.7, 2023, 2027);
$mahasiswa3->tampilkanData();
echo "</div>";

?>

<div class="footer">
    &copy; M Diaz Rifandi | 23.230.0042
</div>

</body>
</html>
