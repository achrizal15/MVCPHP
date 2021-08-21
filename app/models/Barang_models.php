<?php 
class Barang_models{
    private $db;
    public function __construct()
    {
        $this->db=new Database;
    }
    public function getAllBarang(){
        $this->db->query("SELECT * FROM barang");
        return $this->db->getAll();
    }
}
?>