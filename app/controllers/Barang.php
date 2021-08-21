<?php
class Barang extends Controller
{
    public function index()
    {
        $pa=new Controller();
        $data['barang'] = $this->models("Barang_models")->getAllBarang();
        $this->views("barang/index", $data, "Daftar Barang");
    }
}
