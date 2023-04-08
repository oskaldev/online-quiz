<?php
session_start();
require_once "connection.php";
require_once "login_register_process.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Register Now</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
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
  <script src="js/vendor/modernizr-2.8.3.min.js"></script> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="login_register_process.css">
</head>

<body>
  <section class="authoriz">
    <div class="container">
      <div class="main main-reg">
        <input type="checkbox" id="chk" aria-hidden="true">
        <label class="reg" for="chk" aria-hidden="true"><a href="login.php">Вход</a></label>
        <div class="signup2"></div>
        <div class="register login">
          <form name="form1" method="post" class="form1">
            <label class="log" for="chk" aria-hidden="true">Регистрация</label>
            <input type="text" name="firstname" class="reg-input" title="Ваше имя" placeholder="Имя" maxlength="50" required>
            <input type="text" name="lastname" class="reg-input" title="Ваше фамилия" placeholder="Фамилия" maxlength="50" required>
            <div class="form-group col-lg-12 select">
              <select name="groups" id="pet-select" required>
                <option value="">Пожалуйста выберете группу</option>
                <option value="ПО-42">ПО-42</option>
                <option value="ПО-32">ПО-32</option>
                <option value="ПО-22">ПО-22</option>
                <option value="ПО-12">ПО-12</option>
              </select>
            </div>

            <input type="text" name="username" class="reg-input" title="Придумайте никнейм" placeholder="Никнейм" maxlength="50" required>
            <input type="password" name="password" class="reg-input" title="Придумайте пароль" placeholder="Пароль" maxlength="100" required>
            <input type="email" name="email" class="reg-input" title="Введите почту" placeholder="Почта" maxlength="256" required>
            <button type="submit" name="submit1" class="">Зарегистрироваться</button>
            <?php echo $error_message; ?>
            <?php echo $success_message; ?>
          </form>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


  <!-- <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/jquery-price-slider.js"></script>
  <script src="js/jquery.meanmenu.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script> -->

</body>

</html>