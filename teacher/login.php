<?php
session_start();
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
    <meta name="description" content="Login">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login_register_process.css">
</head>

<body>
    <section class="authoriz">
        <div class="container">
            <div class="main">
                <label class="reg"></label>
                <div class="signup2"></div>
                <div class="login">
                    <form name="form1" method="post" class="form1">
                        <label class="log" for="chk" aria-hidden="true">Вход</label>
                        <input type="text" placeholder="Ваш никнейм" title="Пожалуйста напишите ваш никнейм" name="username" required>
                        <input type="password" title="Введите пароль" placeholder="Пароль" name="password" required>
                        <button type="submit" name="login" class="">Войти</button>
                        <?php echo $error_message; ?>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>