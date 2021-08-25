<?php 
class Login_models{
    private $db;
public function __construct()
{
   $this->db=new Database();
}
    public function getUsers($user){
        $this->db->query("SELECT * FROM users WHERE username=:usr");
        $this->db->bind("usr",$user);
      return $this->db->getSingle(); 
    }
}

?>