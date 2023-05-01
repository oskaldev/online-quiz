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
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet'>
  <link rel="stylesheet" href="css/test.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- Left Panel -->

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
            <a href="exam_category.php"> <i class="menu-icon fa fa-dashboard"></i>Добавить тему</a>
          </li>
          <li>
            <a href="add_edit_exam_questions.php"> <i class="menu-icon fa fa-dashboard"></i>Добавить тест</a>
          </li>
          <li>
            <a href="old_exam_results.php"> <i class="menu-icon fa fa-dashboard"></i>Результаты тестов</a>
          </li>
          <li>
            <a href="teachers.php"> <i class="menu-icon fa fa-dashboard"></i>Добавить учителя</a>
          </li>
          <li>
            <a href="users.php"> <i class="menu-icon fa fa-dashboard"></i>Список пользователей</a>
          </li>
          <li>
            <a href="index.php"> <i class="menu-icon fa fa-close"></i>Выйти из аккаунта</a>
          </li>
        </ul>
      </div>
    </nav>
  </aside>

  <div id="right-panel" class="right-panel">
    <header id="header" class="header">
      <div class="header-menu">
        <div class="col-sm-7">
        </div>
        <div class="col-sm-5">
          <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="user-avatar rounded-circle" src="assets/img/admin.jpg" alt="User Avatar">
            </a>
            <div class="user-menu dropdown-menu">
              <!-- <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

              <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

              <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a> -->

              <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Выйти</a>
            </div>
          </div>
        </div>
      </div>
    </header>