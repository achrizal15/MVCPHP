<?php
class Barang_models
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllBarang()
    {
        $this->db->query("SELECT * FROM barang");
        return $this->db->getAll();
    }
    public function addBarang($data, $img)
    {
        $this->db->query("INSERT INTO barang VALUES (NULL,:nama,:harga,:gambar)");
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("harga", $data['harga']);
        $this->db->bind("gambar", $img);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function updateBarang($data, $gambar)
    {
        $dbs = $this->db;
        $dbs->query("UPDATE barang SET br_nama=:nama,harga=:harga,gambar=:gambar WHERE br_id=:id");
        $dbs->bind("nama", $data['nama']);
        $dbs->bind("harga", $data['harga']);
        $dbs->bind("gambar", $gambar);
        $dbs->bind("id", $data['br_id']);
        $dbs->execute();
        return   $dbs->rowCount();
    }
    public function getBarangById($id)
    {
        $this->db->query("SELECT * FROM barang WHERE br_id=:id");
        $this->db->bind("id", $id);
        return $this->db->getSingle();
    }
    public function delBarang($id)
    {
        $this->db->query("DELETE FROM barang WHERE br_id=:id");
        $this->db->bind("id", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
