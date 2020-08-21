<?php
session_start();

require_once("../config/config.php");
require_once("../model/User.php");

try{
  $user = new User($host,$dbname,$user,$pass);
  $user->connectDb();
    if($_POST) {
      $result = $user->login($_POST);
      if(!empty($result)){
         $_SESSION['User'] = $result;
         header('Location:/Myphp/php/change.php');
         exit;
      }
      else {
        $message = "ログインできませんでした";
      }
    }
  }
  catch (PDOException $e){
  print "エラー!:" .$e->getMessage(). "<br/gt;";
  die();
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Myphp toppage</title>
<link rel="stylesheet" type="text/css" href="../css/login.css">
<link rel="stylesheet" type="text/css" href="../css/base.css">
</head>
<header>
    <h1><a href="index.php">トップページにもどる</a></h1>
  </header>
    <section class="user">
      <h2>ログインフォーム</h2>

      <p>ログインするには以下のユーザ名とパスワードを入力してください</p>
      <?php if (isset($message)) echo $message;?>
      <form action="" method="post">
        <table>
          <tr>
            <th>ユーザ名</th>
            <td><input type="text" name="user_name" size="20"></td>
          </tr>

          <tr>
            <th>パスワード</th>
            <td><input type="password" name="password" size="20"></td>
          </tr>
        </table>
        <p><input type="submit" value="送信"></p>
      </form>
      <a href="new.php">新規登録はこちらから</a>
    </section>
