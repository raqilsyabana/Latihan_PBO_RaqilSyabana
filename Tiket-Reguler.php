<?php
// TiketRegular.php
require_once 'Tiket.php';

class TiketRegular extends Tiket {
    // Properti tambahan spesifik
    private $tipeAudio;
    private $lokasiBaris;

    // Constructor subclass
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $tipeAudio, $lokasiBaris) {
        // Memanggil constructor dari class induk (Tiket)
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Mengimplementasikan metode abstrak hitungTotalHarga
    public function hitungTotalHarga() {
        // Untuk reguler, total harga = harga dasar x jumlah kursi (tanpa biaya tambahan)
        return $this->hargaDasarTiket * $this->jumlah_kursi;
    }

    // Mengimplementasikan metode abstrak tampilkanInfoFasilitas
    public function tampilkanInfoFasilitas() {
        return "Studio: Regular | Tipe Audio: " . $this->tipeAudio . " | Lokasi Baris: " . $this->lokasiBaris;
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