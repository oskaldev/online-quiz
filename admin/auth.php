<?php
session_start();

// установить время жизни сессии в 30 секунд
$session_lifetime = 5;
ini_set('session.gc_maxlifetime', $session_lifetime);
session_set_cookie_params($session_lifetime);

// проверяем, авторизован ли пользователь
if (!isset($_SESSION["admin"])) {
  // если не авторизован, то перенаправляем на страницу логина
  header("Location: index.php");
  exit();
}

// если пользователь авторизован, то продлеваем время жизни сессии
if (isset($_SESSION["last_activity"]) && (time() - $_SESSION["last_activity"] > $session_lifetime)) {
  // если время неактивности пользователя превысило время жизни сессии, то перенаправляем на страницу логина
  header("Location: index.php");
  exit();
} else {
  // иначе обновляем время последней активности пользователя
  $_SESSION["last_activity"] = time();
  // обновляем идентификатор сессии
  session_regenerate_id(true);
}
