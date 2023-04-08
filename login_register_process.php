<?php
session_start();
require_once "connection.php";

$error_message = "";
$success_message = "";

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
?>


<?php
if (isset($_POST["submit1"])) {
  // Проверяем формат email
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $error_message = '
    <div class="alert alert-danger" id="failure" style="margin-top: 10px;">
    <strong>Некорректный формат почты!</strong> 
    </div>
    ';
    return;
  }

  // Используем SMTP-проверку, чтобы убедиться, что почта существует
  if (!checkdnsrr(explode("@", $_POST['email'])[1], "MX")) {
    $error_message = '
    <div class="alert alert-danger" id="failure" style="margin-top: 10px;">
    <strong>Почта не существует!</strong>
    </div>
    ';
    return;
  }

  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $count = 0;
  $res = mysqli_query($link, "select * from registration where email='$_POST[email]' || username='$_POST[username]' ") or die(mysqli_error($link));
  $count = mysqli_num_rows($res);

  if ($count > 0) {
    $error_message = '
    <div class="alert alert-danger" id="failure" style="margin-top: 10px;">
    <strong>Пользователь с такой почтой или именем пользователя уже существует</strong>
    </div>
    ';
  } else {
    mysqli_query($link, "insert into registration values(NULL, '$_POST[firstname]','$_POST[lastname]','$_POST[username]','$password','$_POST[email]', '$_POST[groups]')") or die(mysqli_error($link));
    $success_message = '
      <div class="alert alert-success" id="success" style="margin-top:10px">
              <strong>Успех!</strong> Аккаунт успешно зарегистрирован !
      </div>
    ';
  }
}
?>