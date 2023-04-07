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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
    <link rel="stylesheet" href="css/responsive.css"> -->
    <link rel="stylesheet" href="test.css">
</head>

<body>

    <!-- <div class="error-pagewrap">
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
    </div> -->


    <section class="authoriz">
        <div class="container">
            <div class="main">
                <input type="checkbox" id="chk" aria-hidden="true">
                <label class="reg" for="chk" aria-hidden="true"><a href="register.php">Зарегистрироваться</a></label>
                <div class="signup2"></div>
                    <!-- <div class="signup">
                    <form>
                        <label class="reg" for="chk" aria-hidden="true">Зарегистрироваться</label>
                        <input type="text" name="firstname" placeholder="Имя" required>
                        <input type="text" name="lastname" placeholder="Фамилия" required>
                        <div class="form-group col-lg-12">
                            <select name="groups" id="pet-select" required>
                                <option value="">--Пожалуйста выберете группу--</option>
                                <option value="ПО-42">ПО-42</option>
                                <option value="ПО-32">ПО-32</option>
                                <option value="ПО-22">ПО-22</option>
                                <option value="ПО-12">ПО-12</option>
                            </select>
                        </div>
                        <input type="text" name="username" placeholder="Никнейм" required>
                        <input type="password" name="password" placeholder="Пароль" required>
                        <input type="email" name="email" placeholder="Почта" required>
                        <button type="submit" name="register">Зарегистрироваться</button>
                    </form>
                </div> -->

                    <div class="login">
                        <form name="form1" method="post" class="form1">
                            <label class="log" for="chk" aria-hidden="true">Вход</label>
                            <input type="text" placeholder="Ваш никнейм" title="Пожалуйста напишите ваш никнейм" name="username" required>
                            <input type="password" title="Введите пароль" placeholder="Пароль" name="password" required>
                            <button type="submit" name="login" class="">Войти</button>
                            <div class="alert alert-danger" id="failure" style="margin-top:10px; display: none;">
                                <strong>Не совпадает!</strong> Проверьте правильность ввода никнейма или пароля !
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script> -->



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