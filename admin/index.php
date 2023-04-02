<?php
session_start();
include "../connection.php";
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Login</title>
  <meta name="description" content="Admin Login">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="apple-icon.png">
  <link rel="shortcut icon" href="favicon.ico">


  <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

  <link rel="stylesheet" href="assets/css/style.css">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


  <div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
      <div class="login-content">
        <div class="login-logo" style="color: #fff">
          Admin Login
        </div>
        <div class="login-form">
          <form action="" name="form1" method="post">
            <div class="form-group">
              <label>email</label>
              <input type="email" name="email" class="form-control" placeholder="email" required>
            </div>
            <div class="form-group">
              <label>Пароль</label>
              <input type="password" name="password" class="form-control" placeholder="Пароль" required>
            </div>
            <!-- <div class="checkbox">
              <label>
                <input type="checkbox"> Remember Me
              </label>
              <label class="pull-right">
                <a href="#">Forgotten Password?</a>
              </label>
            </div> -->
            <button type="submit" name="submit1" class="btn btn-success btn-flat m-b-30 m-t-30">Войти</button>
            <div class="alert alert-danger" id="errormsg" style="margin-top:10px; display: none;">
              <strong>Не совпадает!</strong> Проверьте правильность ввода почты или пароля !
            </div>
            <!-- <div class="social-login-content">
              <div class="social-button">
                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
              </div>
            </div> -->
          </form>
        </div>
      </div>
    </div>
  </div>


  <script src="vendors/jquery/dist/jquery.min.js"></script>
  <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
  <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>


</body>

</html>



<?php
if (isset($_POST["submit1"])) {
  $password = $_POST['password'];
  $count = 0;
  $res = mysqli_query($link, "select * from admin_login where email='$_POST[email]' ");
  $admin = mysqli_fetch_assoc($res);

  if (password_verify($password, $admin['password'])) {
    $_SESSION["admin"] = $_POST["email"];
?>
    <script>
      window.location = "exam_category.php";
    </script>
  <?php
  } else {
  ?>
    <script>
      document.getElementById("errormsg").style.display = "block";
    </script>
<?php
  }
}
?>