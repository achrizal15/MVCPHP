<?php
class Kasir_models
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllKasir($name)
    {
        $this->db->query("SELECT * FROM kasir WHERE nama LIKE :nama");
        $this->db->bind("nama", "%$name%");
        return $this->db->getAll();
    }
    public function cariKasir($nama,$tampilAwal, $tampilData)
    {
        $this->db->query("SELECT * FROM kasir WHERE nama LIKE :nama ORDER BY id DESC LIMIT :tampilAwal,:tampilData");
        $this->db->bind("nama", "%$nama%");
        $this->db->bind("tampilAwal", $tampilAwal);
        $this->db->bind("tampilData", $tampilData);
        return $this->db->getAll();
    }
    public function getPagination($tampilAwal, $tampilData)
    {
        $this->db->query("SELECT * FROM kasir  ORDER BY id DESC LIMIT :tampilAwal,:tampilData");
        $this->db->bind("tampilAwal", $tampilAwal);
        $this->db->bind("tampilData", $tampilData);
        return $this->db->getAll();
    }
    public function getKasirById($id)
    {
        $this->db->query("SELECT * FROM kasir WHERE id=:id");
        $this->db->bind("id", $id);
        return $this->db->getSingle();
    }
    public function tambahKasir($data)
    {
        if ($data['nama'] != "" && $data['email'] != "") {
            $this->db->query("INSERT INTO kasir VALUES (NULL,:nama,:email)");
            $this->db->bind("nama", $data['nama']);
            $this->db->bind("email", $data['email']);
            $this->db->execute();
            return 1;
        } else {
            return 0;
        }
    }
    public function deleteKasir($id)
    {
        $this->db->query("DELETE FROM kasir WHERE id=:id");
        $this->db->bind("id", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function updateKasir($data)
    {
        if ($data['nama'] != "" && $data['email'] != "") {
            $this->db->query("UPDATE kasir SET nama=:nama,email=:email WHERE id=:id");
            $this->db->bind("id", $data['id']);
            $this->db->bind("nama", $data['nama']);
            $this->db->bind("email", $data['email']);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }
}
