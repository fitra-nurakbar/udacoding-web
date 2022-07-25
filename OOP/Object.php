<?php 


class buku {
    public $judul = "judul",
            $pengarang = "pengarang",
            $penerbit = "penerbit",
            $tahunTerbit = 2000,
            $harga = 0;

    public function __construct($judul, $pengarang, $penerbit, $tahunTerbit, $harga){
        $this->judul = $judul;
        $this->pengarang = $pengarang;
        $this->penerbit = $penerbit;
        $this->tahunTerbit = $tahunTerbit;
        $this->harga = $harga;
    }

    public function labelBuku() {
        return "$this->pengarang, $this->penerbit, Diterbitkan tahun $this->tahunTerbit";
    }
}

class CetakInfoBuku {
    public function cetak($buku) {
        $str = "{$buku->judul} | {$buku->labelBuku()}, ($buku->harga)";
        return $str;
    }
}

$novel = new buku("Ini Novel", "VVV", "XXX", 2018, 30000);
$komik = new buku("Ini Komik", "KKK", "OOO", 2012, 40000);
$info = new CetakInfoBuku();

// var_dump($novel);
echo "Buku Novel : ".$novel->labelBuku();
echo "<br>";
echo "Simple : $novel->judul, $novel->pengarang, $novel->tahunTerbit";
echo "<br>";
echo "Buku Komik : ".$komik->labelBuku();
echo "<br>";
echo "Simple : $komik->judul, $komik->pengarang, $komik->tahunTerbit";
echo "<br>";
echo "Cetak novel : ".$info->cetak($novel);
