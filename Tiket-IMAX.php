<?php
// TiketIMAX.php
require_once 'Tiket.php';

class TiketIMAX extends Tiket {
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // METHOD OVERRIDING LOGIKA IMAX
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) + 35000;
    }

    public function tampilkanInfoFasilitas() {
        return "Studio: IMAX | ID Kacamata 3D: " . $this->kacamata3dId . " | Fitur Efek Gerak: " . $this->efekGerakFitur;
    }

    public static function getWhereIMAX(PDO $pdo, $kolom, $nilai) {
        $sql = "SELECT * FROM tabel_tiket WHERE jenis_studio = 'IMAX' AND $kolom LIKE :nilai";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nilai' => '%' . $nilai . '%']);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $daftar = [];
        foreach ($rows as $row) {
            $daftar[] = new self(
                $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                $row['jumlah_kursi'], $row['harga_dasar_tiket'],
                $row['kacamata_3d_id'], $row['efek_gerak_fitur']
            );
        }
        return $daftar;
    }
}
?>