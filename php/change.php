<?php
session_start();
require_once("../config/config.php");
require_once("../model/User.php");

//ログイン画面を経由しているかどうか確認する
// if (!isset($_SESSION['User'])) {
//   header('Location:/myphp/php/change.php');
//   exit;
// }
//一般ユーザの場合、ログインしたユーザ情報を
if ($_SESSION['User']['role']==0) {
  $result['User']=$_SESSION['User'];
}
try{
    $user = new User($host,$dbname,$user,$pass);
    $user->connectDb();
    // $result = $user->findAll();

    //編集処理
    if (isset($_GET['edit'])) {
      //編集処理
      if ($_POST) {
        $message=$user->validate($_POST);
        if (empty($message['user_name'])&&empty($message['email'])&&empty($message['password'])) {
        $user->edit($_POST);
        }
      }
      //参照処理
      $result['User']=$user->findById($_GET['edit']);
    }
    //削除処理
    else if(isset($_GET['del'])){
      if ($_SESSION['User']['role']==0){
        if ($_SESSION['User']['id']==$_GET['del']){
            $user->delete($_GET['del']);
          }
          //参照処理　
            echo "消去しました。ログイン画面までお戻りください";
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
    <h2><a href="login.php">ログイン画面に戻る</a></h2>
  </header>
  <table class="sheet">
          <tr>
            <th>ID</th>
            <th>ユーザ名</th>
            <th>メールアドレス</th>
            <th>権限</th>
            <th></th>
          </tr>
          <?php foreach ($result as $row):?>
          <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['user_name']?></td>
            <td><?=$row['email']?></td>
            <td>
              <?php if ($row['role']==1):?>
                管理者
              <?php else:?>
                一般ユーザー
              <?php endif;?>
            </td>
            <td>

            <?php if ($_SESSION['User']['role']<=0): ?>
              <form action="change2.php" method="post">
              <input type="hidden" name="user_name" value="<?php echo $row['user_name']?>">
              <input type="hidden" name="email" value="<?php echo $row['email']?>">
              <input type="hidden" name="password" value="<?php echo $row['password']?>">
              <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
              <input type="submit"value="編集">

              <?php if ($_SESSION['User']['id']== $row['id']): ?>
              <a href="?del=<?=$row['id']?>" onclick="if(!confirm('ID:<?=$row['id']?>本当に削除しますが、よろしいでしょうか？')) return false;">削除</a>

            <?php endif;?>
            </td>
          <?php endif; ?>
          </tr>
          <?php endforeach;?>
        </table>
    </html>
