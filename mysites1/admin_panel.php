<?php
/*session_start();
include "includes/configu.php";
$db_log = mysqli_query($connection, "SELECT * FROM `administration` ORDER BY `id`");
$logi = mysqli_fetch_assoc($db_log);
$login = strip_tags($_POST['login']);
$password = strip_tags($_POST['password']);
if (!empty($_SESSION['user'])) {
  header('Location: admin.php');
  exit;
}
  if (!empty($login) && !empty($password)) {
    if ($login == $logi['login'] && password_verify($password, $logi['password'])) {
      $_SESSION['user'] = [$login => $_POST['login'], $logi['password'] => $password];
      header('Location: admin.php');
      exit;
    }
    else {
      $errors = "Неверный логин или пароль";
    }
  }
 ?>
<p><?php echo $errors;?></p>
<form class="" method="post">
  <p>Login</p>
  <input type="text" name="login" />
  <p>password</p>
  <input type="password" name="password">
  <button type="submit" name="button">Вход</button>
</form>
<style>
  *{padding: 0;margin: 0;}
  body{background: #878787; padding-left: 1%;}
  form{display: flex; flex-direction: column; width: 20%;}
  input{height: 25px; margin: 2%;}
</style>*/
