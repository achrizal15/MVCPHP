<?php
class Home
{
  public function index()
  {
    $controll=new Controller();
    $controll->views("home/index","","Home Page");
  }
}
