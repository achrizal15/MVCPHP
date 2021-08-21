<?php
class Kasir_models
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllKasir()
    {
        $this->db->query("SELECT * FROM kasir");
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
        // $this->db->query("INSERT INTO kasir VALUES ('',:nama,:email)");
        // $this->db->bind("nama",$data['nama']);
        // $this->db->bind("email",$data['email']);
        // $this->db->execute();
        return 0;
    }
}
