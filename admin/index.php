<?php
session_start();
require_once "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="#">
  <meta name="description" content="Admin Login">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="../user/css/login_register_process.css">
</head>

<body>
  <section class="authoriz">
    <div class="container">
      <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup2"></div>
        <div class="login login-admin">
          <form name="form1" method="post" class="form1">
            <label class="log-admin" for="chk" aria-hidden="true">Вход в админ панель</label>
            <input type="email" placeholder="email" name="email" required>
            <input type="password" title="Введите пароль" placeholder="Пароль" name="password" required>
            <button type="submit" name="submit1" class="">Войти</button>
            <div class="alert alert-danger" id="errormsg" style="margin-top:10px; display: none;">
              <strong>Не совпадает!</strong> Проверьте правильность ввода почты или пароля !
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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