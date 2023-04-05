<?php
session_start();

// установить время жизни сессии в 50 минут
$session_lifetime = 2000;
ini_set('session.gc_maxlifetime', $session_lifetime);
session_set_cookie_params($session_lifetime);

// проверяем, авторизован ли пользователь
if (!isset($_SESSION["admin"])) {
  // если не авторизован, то перенаправляем на страницу логина
  header("Location: index.php");
  exit();
}

// проверяем, прошло ли достаточно времени для смены идентификатора сессии
if (isset($_SESSION["last_activity"]) && (time() - $_SESSION["last_activity"] > $session_lifetime)) {
  // если время неактивности пользователя превысило время жизни сессии, то перенаправляем на страницу логина
  header("Location: index.php");
  exit();
}

// обновляем время последней активности пользователя
$_SESSION["last_activity"] = time();

// продлеваем время жизни сессии при каждом действии пользователя
if (isset($_COOKIE[session_name()])) {
  setcookie(session_name(), $_COOKIE[session_name()], time() + $session_lifetime, "/");
}

// обновляем идентификатор сессии каждые 25 минут
if (isset($_SESSION["last_regenerate"]) && (time() - $_SESSION["last_regenerate"] > 1000)) {
  session_regenerate_id(true);
  $_SESSION["last_regenerate"] = time();
} else if (!isset($_SESSION["last_regenerate"])) {
  $_SESSION["last_regenerate"] = time();
}
