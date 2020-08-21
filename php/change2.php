<?php
print_r($_POST);
$user_name=$_POST['user_name'];
$email=$_POST['email'];
$password=$_POST['password'];
$change=$_POST['id'];
?>
<form action="change3.php" method="post" name="formx"onSubmit="return check()">
  <table class="sheet">
    <tr>
      <th>変更後の名前<span class="red">*</span></th>
      <td>
        <input type="text" name="user_name"value="<?php echo $user_name;?>">
      </td>
    </tr>
      <tr>
        <th>変更後のメールアドレス<span class="red">*</span></th>
        <td>
          <input type="text" name="email"value="<?php echo $email;?>">
        </td>
      </tr>
      <tr>
        <th>変更後のパスワード</th>
        <td>
          <input type="text" name="password"value="<?php echo $password;?>">
          <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
        </td>
      </tr>
      <tr>
        <th>
          <input type="submit" value="送信">
        </th>
      </tr>
