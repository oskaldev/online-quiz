<?php
include "../connection.php";
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
                <a href="index.php" class="btn btn-success loginbtn">Войти</a>
              </div>
              <div class="alert alert-success" id="success" style="margin-top:10px; display: none;">
                <strong>Успех!</strong> Аккаунт успешно зарегистрирован !
              </div>

              <div class="alert alert-danger" id="failure" style="margin-top:10px; display: none;">
                <strong>Уже существует!</strong> Эта почта уже используется !
              </div>

            </form>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?php

  if (isset($_POST["submit1"])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $count = 0;
    $res = mysqli_query($link, "select * from admin_login where email='$_POST[email]'") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);

    if ($count > 0) {
  ?>
      <script>
        document.getElementById("success").style.display = "none";
        document.getElementById("failure").style.display = "block";
      </script>
    <?php
    } else {
      mysqli_query($link, "insert into admin_login values(NULL, '$_POST[email]','$password')") or die(mysqli_error($link));
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