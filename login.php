<?php
session_start();
include "connection.php";
?>


<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
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
            <div class="text-center m-b-md custom-login">
                <h3>Вход</h3>
            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="" name="form1" method="post">
                            <div class="form-group">
                                <label class="control-label" for="username">Никнейм</label>
                                <input type="text" placeholder="ваш никнейм" title="Please enter you username" required value="" name="username" id="username" class="form-control">

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Пароль</label>
                                <input type="password" title="Введите пароль" placeholder="******" required value="" name="password" id="password" class="form-control">

                            </div>

                            <button type="submit" name="login" class="btn btn-success btn-block loginbtn">Войти</button>
                            <a class="btn btn-default btn-block" href="register.php">Зарегистрироваться</a>
                            <div class="alert alert-danger" id="failure" style="margin-top:10px; display: none;">
                                <strong>Не совпадает!</strong> Проверьте правильность ввода никнейма или пароля !
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>




    <?php
    if (isset($_POST["login"])) {
        $password = $_POST['password'];
        $count = 0;
        $res = mysqli_query($link, "select * from registration where username='$_POST[username]'");
        $user = mysqli_fetch_assoc($res);

        if (password_verify($password, $user['password'])) {
            $_SESSION["username"] = $_POST["username"];
    ?>
            <script>
                window.location = "select_exam.php";
            </script>
        <?php
        } else {
        ?>
            <script>
                document.getElementById("failure").style.display = "block";
            </script>
    <?php
        }
    }
    ?>


</body>

</html>