<?php
session_start();
require_once "connection.php";

$error_message = "";

if (isset($_POST["login"])) {
  $password = $_POST['password'];
  $count = 0;
  $res = mysqli_query($link, "select * from registration where username='$_POST[username]'");
  $user = mysqli_fetch_assoc($res);

  if (password_verify($password, $user['password'])) {
    $_SESSION["username"] = $_POST["username"];
    header("Location: select_exam.php");
    exit;
  } else {
    $error_message = '
    <div class="alert alert-danger" id="failure" style="margin-top: 10px;">
    <strong>Не совпадает!</strong> Проверьте правильность ввода никнейма или пароля !
    </div>
    ';
  }
}
