<?php
// TiketVelvet.php
require_once 'Tiket.php';

class TiketVelvet extends Tiket {
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // METHOD OVERRIDING LOGIKA VELVET
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) * 1.50;
    }

    public function tampilkanInfoFasilitas() {
        return "Studio: Velvet | Paket Bantal & Selimut: " . $this->bantalSelimutPack . " | Layanan Butler: " . $this->layananButler;
    }

    public static function getWhereVelvet(PDO $pdo, $kolom, $nilai) {
        $sql = "SELECT * FROM tabel_tiket WHERE jenis_studio = 'Velvet' AND $kolom LIKE :nilai";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nilai' => '%' . $nilai . '%']);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $daftar = [];
        foreach ($rows as $row) {
            $daftar[] = new self(
                $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                $row['jumlah_kursi'], $row['harga_dasar_tiket'],
                $row['bantal_selimut_pack'], $row['layanan_butler']
            );
        }
        return $daftar;
    }
}
?>