<?php
class Home
{
  public function index()
  {
    $controll = new Controller();
    if (!isset($_SESSION['login_key'])) {
      header("Location:" . URLPUBLIC."/Authentikasi");
  }
    $controll->views("home/index", "", "Home Page");
  }
}
