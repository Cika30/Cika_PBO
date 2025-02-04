<?php
class Employee {
    protected $lamaKerja;

    public function __construct($lamaKerja) {
        $this->lamaKerja = $lamaKerja;
    }

    public function hitungGaji() {
        // Implementasi dasar perhitungan gaji (akan dioverride oleh kelas turunan)
        return 0;
    }
}

class Programmer extends Employee {
    public function hitungGaji() {
        $gajiPokok = parent::hitungGaji();
        if ($this->lamaKerja < 1) {
            return $gajiPokok;
        } elseif ($this->lamaKerja <= 10) {
            return $gajiPokok + ($gajiPokok * 0.01 * $this->lamaKerja);
        } else {
            return $gajiPokok + ($gajiPokok * 0.02 * $this->lamaKerja);
        }
    }
}

class Direktur extends Employee {
    public function hitungGaji() {
        $gajiPokok = parent::hitungGaji();
        return $gajiPokok + ($gajiPokok * 0.5 * $this->lamaKerja) + ($gajiPokok * 0.1 * $this->lamaKerja);
    }
}

class PegawaiMingguan extends Employee {
    private $hargaBarang;
    private $stockHarusTerjual;
    private $totalPenjualan;

    public function __construct($lamaKerja, $hargaBarang, $stockHarusTerjual, $totalPenjualan) {
        parent::__construct($lamaKerja);
        $this->hargaBarang = $hargaBarang;
        $this->stockHarusTerjual = $stockHarusTerjual;
        $this->totalPenjualan = $totalPenjualan;
    }

    public function hitungGaji() {
        $gajiPokok = parent::hitungGaji();
        if ($this->totalPenjualan > $this->stockHarusTerjual * 0.7) {
            return $gajiPokok + ($this->hargaBarang * 0.1 * $this->totalPenjualan);
        } else {
            return $gajiPokok + ($this->hargaBarang * 0.03 * $this->totalPenjualan);
        }
    }
}

// Contoh penggunaan:
$programmer = new Programmer(5);
echo "Gaji Programmer: " . $programmer->hitungGaji() . "<br>";

$direktur = new Direktur(10);
echo "Gaji Direktur: " . $direktur->hitungGaji() . "<br>";

$pegawaiMingguan = new PegawaiMingguan(3, 100000, 100, 80);
echo "Gaji Pegawai Mingguan: " . $pegawaiMingguan->hitungGaji();
?>