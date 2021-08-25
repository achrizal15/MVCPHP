<?php
class Kasir extends Controller
{
    public function index()
    {
        $kasir = $this->models("Kasir_models");
        $tampilData = 5;
        $halamanAktif = 1;
        $jumlahData = count($kasir->getAllKasir(""));
        $jumlahHalaman = ceil($jumlahData / $tampilData);
        $tampilAwal = $tampilData * $halamanAktif - $tampilData;
        $data['kasir'] = $kasir->getPagination($tampilAwal, $tampilData);
        $data['jumlahHalaman'] = $jumlahHalaman;
        $data['halamanAktif'] = $halamanAktif;
        $this->views("kasir/index", $data, "Kasir Page");
    }
    public function searchKasir()
    {
        $kasir = $this->models("Kasir_models");
        if (isset($_POST['cari']) && $_POST['cari'] != "") {
            $data['kasir'] = $kasir->cariKasir($_POST['cari'],0,5);
            $data['jumlahHalaman'] = ceil(count($kasir->getAllKasir($_POST['cari'])) / 5);
            $data['keyword'] = $_POST['cari'];
            $data['halamanAktif'] = 1;
            $this->views("kasir/index", $data, "Kasir Page");
        } else {
            header("Location:" . URLPUBLIC . "/kasir");
        }
    }
    public function pagination($halamanActive = 1, $keyword = "")
    {
        $kasir = $this->models("Kasir_models");
        $tampilData = 5;
        $halamanAktif = $halamanActive;
        if ($keyword == "") {
            $jumlahData = count($kasir->getAllKasir(""));
            $jumlahHalaman = ceil($jumlahData / $tampilData);
            $tampilAwal = $tampilData * $halamanAktif - $tampilData;
            $data['kasir'] = $kasir->getPagination($tampilAwal, $tampilData);
            $data['jumlahHalaman'] = $jumlahHalaman;
            $data['halamanAktif'] = $halamanAktif;
            $this->views("kasir/index", $data, "Kasir Page");
        } else {
            $data['jumlahHalaman'] = ceil(count($kasir->getAllKasir($keyword)) / 5);
            $data['keyword'] = $keyword;
            $data['halamanAktif'] = $halamanActive;
            $tampilAwal = $tampilData * $halamanAktif - $tampilData;
            $data['kasir'] = $kasir->cariKasir($keyword, $tampilAwal, $tampilData);
            $this->views("kasir/index", $data, "Kasir Page");
        }
    }
    public function detail($id)
    {
        $data['kasir'] = $this->models("Kasir_models")->getKasirById($id);
        $this->views("kasir/detail", $data, "Kasir {$data['kasir']['nama']}");
    }
    public function tambah()
    {
        if ($this->models("Kasir_models")->tambahKasir($_POST) > 0) {
            FlashMessage::setMessage("Input data berhasil.", "success");
            header("Location:" . URLPUBLIC . "/kasir");
        } else {
            FlashMessage::setMessage("Error tidak diketahui input gagal", "warning");
            header("Location:" . URLPUBLIC . "/kasir");
        }
    }

    public function hapus($id)
    {
        if ($this->models("Kasir_models")->deleteKasir($id) > 0) {
            FlashMessage::setMessage("Data berhasil dihapus.", "success");
            header("Location:" . URLPUBLIC . "/kasir");
        } else {
            FlashMessage::setMessage("Error tidak diketahui delete gagal", "warning");
            header("Location:" . URLPUBLIC . "/kasir");
        }
    }

    public function getEdit($id)
    {
        echo json_encode($this->models("Kasir_models")->getKasirById($id));
    }
    public function editKasir()
    {
        if ($this->models("Kasir_models")->updateKasir($_POST) > 0) {
            FlashMessage::setMessage("Update data berhasil.", "success");
            header("Location:" . URLPUBLIC . "/kasir");
        } else {
            FlashMessage::setMessage("Error tidak diketahui update gagal", "warning");
            header("Location:" . URLPUBLIC . "/kasir");
        }
    }
}
