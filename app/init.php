<?php 
spl_autoload_register(function($class){
require_once "core/$class.php";
});
require_once "config/config.php";
?>