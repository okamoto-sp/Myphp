<?php
session_start();
require_once("../config/config.php");
require_once("../model/User.php");


try{
  $user = new User($host,$dbname,$user,$pass);
  $user->connectDb();
  
  }
  catch (PDOException $e){
  print "エラー!:" .$e->getMessage(). "<br/gt;";
  die();
  }
?>
