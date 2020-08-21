<?php
require_once("../config/config.php");
require_once("../model/User.php");

try{
  $user = new User($host,$dbname,$user,$pass);
  $user->connectDb();
  $result = $user->findAll();
    if($_POST) {
      echo "登録されました";
      $user->add($_POST);
      }
    }
  catch (PDOException $e){
  print "エラー!:" .$e->getMessage(). "<br/gt;";
  die();
  }
?>
<form action="new.php" method="post">
        <label　id="user_name">ユーザ名:<input type="text" name="user_name" size="20"></label>
        <label　id="email">メールアドレス:<input type="text" name="email" size="40" ></label>
        <label　id="password">パスワード:<input type="password" name="password" size="20"></label>
        <input type="submit">
      </form>
    <a href="login.php">ログインフォームに戻る</a>
