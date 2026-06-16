<?php
// TiketIMAX.php
require_once 'Tiket.php';

class TiketIMAX extends Tiket {
    // Properti tambahan spesifik
    private $kacamata3dId;
    private $efekGerakFitur;

    // Constructor subclass
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    public function hitungTotalHarga() {
        // Misal: IMAX ada tambahan biaya teknologi sebesar Rp 15.000 per kursi
        $biayaTambahan = 15000 * $this->jumlah_kursi;
        return ($this->hargaDasarTiket * $this->jumlah_kursi) + $biayaTambahan;
    }

    public function tampilkanInfoFasilitas() {
        return "Studio: IMAX | ID Kacamata 3D: " . $this->kacamata3dId . " | Fitur Efek Gerak: " . $this->efekGerakFitur;
    }

    // Method untuk menampilkan informasi lengkap tiket (opsional, bisa dipanggil di luar class)
    public function tampilkanInfoTiket() {
        $sql = "SELECT * FROM tiket WHERE id_tiket = :id_tiket";
        // Eksekusi query dan kembalikan hasil
        global $pdo; // Pastikan $pdo tersedia di sini (dari database.php)
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id_tiket' => $this->id_tiket]);
        $tiketData = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($tiketData) {
            return "ID Tiket: " . $tiketData['id_tiket'] . "\n" .
                   "Nama Film: " . $tiketData['nama_film'] . "\n" .
                   "Jadwal Tayang: " . $tiketData['jadwal_tayang'] . "\n" .
                   "Jumlah Kursi: " . $tiketData['jumlah_kursi'] . "\n" .
                   "Harga Dasar Tiket: Rp " . number_format($tiketData['hargaDasarTiket'], 0, ',', '.') . "\n" .
                   $this->tampilkanInfoFasilitas() . "\n" .
                   "Total Harga: Rp " . number_format($this->hitungTotalHarga(), 0, ',', '.');
        } else {
            return "Tiket dengan ID " . $this->id_tiket . " tidak ditemukan.";
        }
    }
}
?>