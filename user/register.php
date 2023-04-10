<?php
require_once "../connection.php";
require_once "login_register_process.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="#">
  <meta name="description" content="Register">
  <title>Register Now</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="css/login_register_process.css">
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
</body>

</html>