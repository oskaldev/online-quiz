<?php
session_start();

// проверяем, авторизован ли пользователь
if (isset($_SESSION["admin"])) {
  // если пользователь авторизован, то удаляем сессию
  session_unset();
  session_destroy();
}

// перенаправляем на страницу логина
header("Location: index.php");
exit();
