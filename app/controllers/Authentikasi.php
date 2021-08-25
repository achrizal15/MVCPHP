<?php 
class Authentikasi extends Controller{
    public function index(){
        if (isset($_SESSION['login_key'])) {
            header("Location:" . URLPUBLIC."/home");
        }
        require "../app/views/Auth/login.php";
    }
    public function login() {
        $controll = new Controller();
        $models = $controll->models("Login_models");
        $result = $models->getUsers($_POST['username']);
    
        if(password_verify($_POST['password'],$result['password']))
        {
          $_SESSION['login_key']=$result['password'];
          header("Location:" . URLPUBLIC."/home");
        }else{
            header("Location:" . URLPUBLIC);
        } 
      }
      public function logout(){
        unset($_SESSION['login_key']);
        header("Location:".URLPUBLIC);
    }
}
