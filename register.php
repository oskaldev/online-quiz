<?php
include "connection.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Register Now</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/owl.theme.css">
  <link rel="stylesheet" href="css/owl.transitions.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/responsive.css">
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

  <div class="error-pagewrap">
    <div class="error-page-int">
      <div class="text-center custom-login">
        <h3>Register Now</h3>

      </div>
      <div class="content-error">
        <div class="hpanel">
          <div class="panel-body">
            <form action="#" name="form1" method="post">
              <div class="row">
                <div class="form-group col-lg-12">
                  <label>Имя</label>
                  <input type="text" name="firstname" class="form-control">
                </div>
                <div class="form-group col-lg-12">
                  <label>Фамилия</label>
                  <input type="text" name="lastname" class="form-control">
                </div>
                <div class="form-group col-lg-12">
                  <label for="pet-select">Ваша группа:</label>
                  <select name="groups" id="pet-select" required>
                    <option value="">--Пожалуйста выберете группу--</option>
                    <option value="ПО-42">ПО-42</option>
                    <option value="ПО-32">ПО-32</option>
                    <option value="ПО-22">ПО-22</option>
                    <option value="ПО-12">ПО-12</option>
                  </select>
                </div>


                <div class="form-group col-lg-12">
                  <label>Никнейм</label>
                  <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group col-lg-12">
                  <label>Пароль</label>
                  <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group col-lg-12">
                  <label>Почта</label>
                  <input type="email" name="email" class="form-control" required>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" name="submit1" class="btn btn-success loginbtn">Зарегистрироваться</button>
              </div>
              <div class="text-center">
                <a href="login.php" class="btn btn-success loginbtn">Войти</a>
              </div>
              <div class="alert alert-success" id="success" style="margin-top:10px; display: none;">
                <strong>Успех!</strong> Аккаунт успешно зарегистрирован !
              </div>

              <div class="alert alert-danger" id="failure" style="margin-top:10px; display: none;">
                <strong>Уже существует!</strong> Эта почта или никнейм уже используется !
              </div>

            </form>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?php

  if (isset($_POST["submit1"])) {
    // Проверяем формат email
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  ?>
      <script>
        document.getElementById("success").style.display = "none";
        document.getElementById("failure").innerHTML = "Некорректный формат почты";
        document.getElementById("failure").style.display = "block";
      </script>
    <?php
      exit();
    }

    // Используем SMTP-проверку, чтобы убедиться, что почта существует
    if (!checkdnsrr(explode("@", $_POST['email'])[1], "MX")) {
    ?>
      <script>
        document.getElementById("success").style.display = "none";
        document.getElementById("failure").innerHTML = "Почта не существует";
        document.getElementById("failure").style.display = "block";
      </script>
    <?php
      exit();
    }

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $count = 0;
    $res = mysqli_query($link, "select * from registration where email='$_POST[email]' || username='$_POST[username]' ") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);

    if ($count > 0) {
    ?>
      <script>
        document.getElementById("success").style.display = "none";
        document.getElementById("failure").innerHTML = "Пользователь с такой почтой или именем пользователя уже существует";
        document.getElementById("failure").style.display = "block";
      </script>
    <?php
    } else {
      mysqli_query($link, "insert into registration values(NULL, '$_POST[firstname]','$_POST[lastname]','$_POST[username]','$password','$_POST[email]', '$_POST[groups]')") or die(mysqli_error($link));
    ?>
      <script>
        document.getElementById("success").style.display = "block";
        document.getElementById("failure").style.display = "none";
      </script>
  <?php
    }
  }
  ?>






  <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/jquery-price-slider.js"></script>
  <script src="js/jquery.meanmenu.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

</body>

</html>