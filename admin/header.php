<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Админ Панель</title>
  <meta name="description" content="Admin Panel">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="apple-icon.png">
  <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/1336/1336795.png">
  <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
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
        <div class="navbar-brand hidden"><img src="images/logo2.png" alt="Logo"></div>
      </div>
      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li>
            <a href="exam_category.php"> <i class="menu-icon fa fa-dashboard"></i>Добавить категорию</a>
          </li>
          <li>
            <a href="add_edit_exam_questions.php"> <i class="menu-icon fa fa-dashboard"></i>Добавить тест</a>
          </li>
          <li>
            <a href="old_exam_results.php"> <i class="menu-icon fa fa-dashboard"></i>Результаты тестов</a>
          </li>
          <li>
            <a href="logout.php"> <i class="menu-icon fa fa-close"></i>Выйти из аккаунта</a>
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
              <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
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