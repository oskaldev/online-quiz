<?php
session_start();
if (!isset($_SESSION["username"])) {
?>
  <script>
    window.location = "login.php";
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
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Тесты по английскому языку</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">


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
                        <!-- <li class="nav-item dropdown res-dis-nn">
                          <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">Project <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                          <div role="menu" class="dropdown-menu animated zoomIn">
                            <a href="#" class="dropdown-item">Documentation</a>
                            <a href="#" class="dropdown-item">Expert Backend</a>
                            <a href="#" class="dropdown-item">Expert FrontEnd</a>
                            <a href="#" class="dropdown-item">Contact Support</a>
                          </div>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Support</a>
                        </li> -->
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
                            <!-- <li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"></span>My Account</a>
                            </li>
                            <li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                            </li>
                            <li><a href="#"><span class="edu-icon edu-money author-log-ic"></span>User Billing</a>
                            </li>
                            <li><a href="#"><span class="edu-icon edu-settings author-log-ic"></span>Settings</a>
                            </li> -->
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