<?php
session_start();
require_once("../config/config.php");
require_once("../model/User.php");

if (isset($_GET['logout'])) {
  //セッション情報を破棄する
  $_SESSION = array();
}

if (!isset($_SESSION['User'])) {
  header('Location:/myphp/php/login.php');
  exit;
}

try{
  $user = new User($host,$dbname,$user,$pass);
  $user->connectDb();
  }
  catch (PDOException $e){
  print "エラー!:" .$e->getMessage(). "<br/gt;";
  // die();
  }

  print_r($_SESSION);
  ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Myphp toppage</title>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/base.css">
</head>
<body>
    <div class="wap">
    <div id="logo">
      <a href="index.php">トップ</a>
      <a href="change.php">マイページ</a>
      <?php if ($_SESSION):?>
        <a><?php echo $_SESSION['User']['user_name'];?>様</a>
      <?php endif;?>
      <a href="?logout=1"> ログアウト </a>
    </div>
  <main>
    <div id="main_img">
    <img src="../img/main_img.png" alt="メイン画像"></img>
  </div>
  </main>
  <div id="wapper">
  <div id="bottan1">
    <a href="buy.php"><img src="../img/bottan01.png" alt="ボタン画像1"></img></a>
    <p>CBR250RRのパーツを売り買いできる、パーツ一覧はこちら！<p>
  </div>
  <div id="bottan2">
    <a href="bike.php"><img src="../img/bottan02.png" alt="ボタン画像2"></img></a>
    <p>CBR250RRの情報はこちらのページ！<p>
  </div>
</div>
<div id="instagram">
  <p>instagram</p>
  <!-- SnapWidget -->
  <div id="site">
    <!-- SnapWidget -->
    <!-- SnapWidget -->
<iframe src="https://snapwidget.com/embed/856591" class="snapwidget-widget" allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden;  width:1200px; height:1200px"></iframe>
    </div>
  </div>
</div>
