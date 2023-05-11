<?php
session_start();
if (!isset($_SESSION["admin"])) {
?>
  <script>
    window.location = "index.php";
  </script>
<?php
}
if (isset($_SESSION["last_activity"])) {
  $_SESSION["last_activity"] = time();
}

require_once "auth.php";
require_once "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="#">
  <meta name="description" content="Админ Панель">
  <title>Админ Панель</title>
  <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/1336/1336795.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/table.css">
  <link rel="stylesheet" href="global.css">
</head>

<body></body>


<aside id="left-panel" class="left-panel">
  <nav class="navbar navbar-expand-sm navbar-default">
    <div class="navbar-header">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
      </button>
      <div class="navbar-brand">
        Админ Панель
      </div>
      <div class="navbar-brand hidden"><img src="assets/images/logo2.png" alt="Logo"></div>
    </div>
    <div id="main-menu" class="main-menu collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li>
          <a href="exam_category.php"> <i class="menu-icon fa fa-plus"></i>Добавить тему</a>
        </li>
        <li>
          <a href="add_edit_exam_questions.php"> <i class="menu-icon fa fa-plus"></i>Добавить тест</a>
        </li>
        <li>
          <a href="teachers.php"> <i class="menu-icon fa fa-plus"></i>Добавить учителя</a>
        </li>
        <li>
          <a href="old_exam_results.php"><i class="menu-icon fas fa-poll-h"></i>Результаты тестов</a>
        </li>
        <li>
          <a href="users.php"> <i class="menu-icon fas fa-poll-h"></i>Список пользователей</a>
        </li>
        <li>
          <a href="index.php"> <i class="menu-icon fa fa-close"></i>Выйти из аккаунта</a>
        </li>
      </ul>
    </div>
  </nav>
</aside>

<div id="right-panel" class="right-panel">
  <header class="p-3 border-bottom header">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="http://rgkript.ru/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
          <img src="assets/icons/logo.png" alt="" class="bi me-2" width="50px" height="50px">
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"></ul>
        <div>
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true" style="color: white;">
            <i class="fa-solid fa-right-from-bracket fa-2xl" style="color: black;"></i>
          </a>
          <ul class="dropdown-menu text-small" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 34.4px, 0px);">
            <li><a class="dropdown-item" href="logout.php">Выйти из аккаунта</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>