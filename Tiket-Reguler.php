<?php
// TiketRegular.php
require_once 'Tiket.php';

class TiketRegular extends Tiket {
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $tipeAudio, $lokasiBaris) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // METHOD OVERRIDING LOGIKA REGULAR
    public function hitungTotalHarga() {
        return $this->jumlah_kursi * $this->hargaDasarTiket;
    }

    public function tampilkanInfoFasilitas() {
        return "Studio: Regular | Tipe Audio: " . $this->tipeAudio . " | Lokasi Baris: " . $this->lokasiBaris;
    }

    public static function getWhereRegular(PDO $pdo, $kolom, $nilai) {
        $sql = "SELECT * FROM tabel_tiket WHERE jenis_studio = 'Regular' AND $kolom LIKE :nilai";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nilai' => '%' . $nilai . '%']);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $daftar = [];
        foreach ($rows as $row) {
            $daftar[] = new self(
                $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                $row['jumlah_kursi'], $row['harga_dasar_tiket'],
                $row['tipe_audio'], $row['lokasi_baris']
            );
        }
        return $daftar;
    }
}
?>