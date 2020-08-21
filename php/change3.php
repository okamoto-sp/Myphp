<?php
require_once("../config/config.php");
require_once("../model/User.php");
try{
    $user = new User($host,$dbname,$user,$pass);
    $user->connectDb();
    $result=$user->findAll();
    //編集処理
    //編集処理
      if ($_POST){
        $user->edit($_POST);
      }
      //参照処理
      //$result['User']=$user->findById($_GET['edit']);
    }
  catch (PDOException $e){
    print "エラー!:" .$e->getMessage(). "<br/gt;";
    die();
  }
print_r($_POST);
if($_POST){
  $user_name = htmlspecialchars($_POST['user_name'],ENT_QUOTES,'UTF-8');
  $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
  $password = htmlspecialchars($_POST['password'],ENT_QUOTES,'UTF-8');
}
  $aaa = $_POST["id"];
  print_r($aaa);
  //$mysqli = new mysqli("localhost","root","root","sample_contact");
  //$dbh = new PDO("mysql:host=localhost; dbname=sample_contact; charset=utf8", 'root', 'root');

?>
<p>変更しました<p>
  <form action="login.php" method="post">
<input type="submit" value="戻る">
