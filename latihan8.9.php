<?php
// buat class komputer
class komputer {
    // property dengan hak akses protected
    protected $jenis_processor = "Intel Core i7-4790 3.6Ghz";
    protected $jenis_RAM = "DDR4";
    protected $jenis_VGA = "PCI Express";

    public function tampilkan_processor() {
        return $this->jenis_processor;
    }

    // ubah method ini menjadi protected agar bisa diakses oleh kelas turunan
    protected function tampilkan_jenisprocessor() {
        return $this->jenis_processor;
    }

    protected function tampilkan_ram() {
        return $this->jenis_RAM;
    }

    protected function tampilkan_vga() {
        return $this->jenis_VGA;
    }

    public function tampilkan_vga2() {
        return $this->jenis_VGA;
    }
}

// buat class laptop extends komputer
class laptop extends komputer {
    public function display_processor() {
        return $this->jenis_processor; // Bisa diakses karena protected
    }

    public function display_processor2() {
        return $this->tampilkan_processor(); // Akses method public dari parent
    }

    public function display_ram() {
        return $this->jenis_RAM; // Bisa diakses karena protected
    }

    public function display_ram2() {
        return $this->tampilkan_ram(); // Akses method protected dari parent
    }

    public function display_vga() {
        return $this->tampilkan_vga(); // Akses method protected dari parent
    }

    public function display_vga2() {
        return $this->jenis_VGA; // Bisa diakses karena protected
    }

    // private method, tidak bisa dipanggil dari luar kelas
    private function display_processorkomputer() {
        return $this->jenis_processor;
    }
}

// buat objek dari class laptop (instansiasi)
$komputer = new komputer();
$laptop = new laptop();

// jalankan method dari class komputer
echo "Line 61: " . $komputer->tampilkan_processor() . "<br />";  // OK
echo "Line 62: " . $laptop->display_processor() . "<br />";       // OK
echo "Line 63: " . $laptop->display_processor2() . "<br />";      // OK
// echo "Line 64: " . $laptop->tampilkan_jenisprocessor() . "<br />"; // ERROR: tampilkan_jenisprocessor adalah protected
echo "Line 65: " . $laptop->display_ram() . "<br />";             // OK
echo "Line 66: " . $laptop->display_vga() . "<br />";             // OK
// echo "Line 67: " . $laptop->display_processorkomputer() . "<br />"; // ERROR: display_processorkomputer adalah private
?>
