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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="assets/logo/logo.png">
  <meta name="description" content="Тесты по английскому языку">
  <title>Тесты по английскому языку</title>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="css/table.css">
  <link rel="stylesheet" href="css/quiz.css">
  <link rel="stylesheet" href="css/card.css">
  <link rel="stylesheet" href="global.css">
</head>

<body>
  <header class="p-3 border-bottom header">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="http://rgkript.ru/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
          <img src="assets/logo/logo.png" alt="" class="bi me-2" width="50px" height="50px">
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="select_exam.php" class="nav-link px-2 link-body-emphasis">Выбрать тест</a></li>
          <li><a href="old_exam_results.php" class="nav-link px-2 link-body-emphasis">Последние результаты</a></li>
          <li><a href="http://rgkript.ru/kontaktyi/" class="nav-link px-2 link-body-emphasis">Контакты</a></li>
        </ul>
        <div>
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true" style="color: white;">
            <i class="fa-solid fa-right-from-bracket fa-2xl" style="color: #ffffff;"></i>
          </a>
          <ul class="dropdown-menu text-small" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 34.4px, 0px);">
            <li><a class="dropdown-item" href="logout.php">Выйти из аккаунта</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>