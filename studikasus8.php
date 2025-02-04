<?php
 
// Kelas Karyawan untuk mengelola data karyawan
class Karyawan {
    // Gaji pokok berdasarkan golongan
    private static $gajiPokok = [
        "Ib" => 1250000,
        "Ic" => 1300000,
        "Id" => 1350000,
        "IIa" => 2000000,
        "IIb" => 2100000,
        "IIc" => 2200000,
        "IIIa" => 2400000,
        "IIIb" => 2500000,
        "IIIc" => 2600000,
        "IVa" => 2800000,
        "IVb" => 2900000,
        "IVc" => 3000000,
        "IVd" => 3100000,
    ];
 
    // Properti untuk menyimpan data karyawan
    private $nama;         // Nama karyawan
    private $golongan;     // Golongan karyawan
    private $jamLembur;    // Total jam lembur yang dilakukan
    private $totalGaji;    // Total gaji yang dihitung
 
    // Constructor untuk inisialisasi data karyawan
    public function __construct($nama, $golongan, $jamLembur) {
        $this->nama = $nama;               // Menyimpan nama karyawan
        $this->golongan = $golongan;       // Menyimpan golongan karyawan
        $this->jamLembur = $jamLembur;     // Menyimpan total jam lembur
        $this->totalGaji = $this->hitungGaji(); // Menghitung total gaji
    }
 
    // Method untuk menghitung total gaji berdasarkan golongan dan jam lembur
    private function hitungGaji() {
        $gajiPokok = self::$gajiPokok[$this->golongan]; // Mendapatkan gaji pokok dari golongan
        $gajiLembur = $this->jamLembur * 15000; // Menghitung gaji lembur (15.000 per jam)
        return $gajiPokok + $gajiLembur; // Mengembalikan total gaji
    }
 
    // Method untuk mendapatkan nama karyawan
    public function getNama() {
        return $this->nama;
    }
 
    // Method untuk mendapatkan golongan karyawan
    public function getGolongan() {
        return $this->golongan;
    }
 
    // Method untuk mendapatkan total jam lembur
    public function getJamLembur() {
        return $this->jamLembur;
    }
 
    // Method untuk mendapatkan total gaji
    public function getTotalGaji() {
        return $this->totalGaji;
    }
}
 
// Menginisialisasi array untuk menyimpan daftar karyawan
$karyawanList = [];
 
// Meminta input dari pengguna untuk menambahkan karyawan
while (true) {
    echo "Masukkan Nama Karyawan (atau ketik 'selesai' untuk berhenti): ";
    $nama = trim(fgets(STDIN)); // Mengambil input nama karyawan dari pengguna
 
    if (strtolower($nama) === 'selesai') {
        break; // Menghentikan input jika pengguna mengetik 'selesai'
    }
 
    echo "Masukkan Golongan (Ib, Ic, Id, IIa, IIb, IIc, IIIa, IIIb, IIIc, IVa, IVb, IVc, IVd): ";
    $golongan = trim(fgets(STDIN)); // Mengambil input golongan karyawan dari pengguna
 
    echo "Masukkan Total Jam Lembur: ";
    $jamLembur = (int)trim(fgets(STDIN)); // Mengambil input jam lembur dan mengkonversinya menjadi integer
 
    // Membuat objek karyawan dan menambahkannya ke dalam array
    $karyawanList[] = new Karyawan($nama, $golongan, $jamLembur);
}
 
// Menampilkan detail karyawan dalam tabel
echo "\nDaftar Karyawan:\n";
echo str_pad("Nama Karyawan", 20) . // Judul kolom Nama Karyawan
     str_pad("Golongan", 10) .        // Judul kolom Golongan
     str_pad("Total Jam Lembur", 20) . // Judul kolom Total Jam Lembur
     str_pad("Total Gaji", 15) . "\n";  // Judul kolom Total Gaji
echo str_repeat("-", 75) . "\n"; // Garis pemisah antara judul dan data
 
// Loop untuk mencetak data setiap karyawan dalam tabel
foreach ($karyawanList as $karyawan) {
    echo str_pad($karyawan->getNama(), 20) . // Mencetak nama karyawan
         str_pad($karyawan->getGolongan(), 10) . // Mencetak golongan karyawan
         str_pad($karyawan->getJamLembur(), 20) . // Mencetak total jam lembur
         str_pad(number_format($karyawan->getTotalGaji(), 0, ',', '.'), 15) . "\n"; // Mencetak total gaji dengan format
}
 
?>
 
 
 