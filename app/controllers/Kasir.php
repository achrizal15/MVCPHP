<?php
class Kasir extends Controller
{
    public function index()
    {
        $data['kasir'] = $this->models("Kasir_models")->getAllKasir();
        $this->views("kasir/index", $data, "Kasir Page");
    }
    public function detail($id)
    {
        $data['kasir'] = $this->models("Kasir_models")->getKasirById($id);
        $this->views("kasir/detail", $data, "KASIR {$data['kasir']['nama']}");
    }
    public function tambah()
    {
        if ($this->models("Kasir_models")->tambahKasir($_POST) > 0) {
            header("Location:index.php");
        } else {
            $data['error'] = true;
            $this->views("kasir/index", $data['error'], "KASIR");
        }
    }
}
