<?php
session_start();
if (!isset($_SESSION["username"])) {
?>
  <script>
    window.location = "../errors_pages/401.php";
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
  <link rel="icon" type="image/x-icon" href="img/logo.png">
  <meta name="description" content="Тесты по английскому языку">
  <title>Тесты по английскому языку</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="all-content-wrapper">
    <div class="header-advance-area">
      <div class="header-top-area">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="header-top-wraper">
                <div class="row">
                  <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                    <div class="menu-switcher-pro">
                      <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                        <i class="educate-icon educate-nav"></i>
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                    <div class="header-top-menu tabl-d-n">
                      <ul class="nav navbar-nav mai-top-nav">
                        <li class="nav-item"><a href="select_exam.php" class="nav-link">Выбрать тест</a>
                        </li>
                        <li class="nav-item"><a href="old_exam_results.php" class="nav-link">Последние результаты</a>
                        </li>
                        <li class="nav-item"><a href="logout.php" class="nav-link">Выйти</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="header-right-info">
                      <ul class="nav navbar-nav mai-top-nav header-right-menu">
                        <li class="nav-item">
                          <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                            <img src="img/avatar-mini2.jpg" alt="" />
                          </a>
                          <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                            <li><a href="logout.php"><span class="edu-icon edu-locked author-log-ic"></span>Выйти из аккаунта</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Mobile Menu start -->
      <!-- Mobile Menu end -->
      <div class="breadcome-area">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="breadcome-list">
                <div class="row">
                  <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 text-right">
                    <ul class="breadcome-menu">
                      <li>
                        <div id="timer" style="display: block;"></div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>