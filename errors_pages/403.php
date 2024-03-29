<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>403 - Forbidden</title>
  <link rel="stylesheet" href="../errors_pages/style.css">

</head>

<body>
  <div class="box">
    <div class="box">
      <div class="container">
        <div class="ghost-copy">
          <div class="one"></div>
          <div class="two"></div>
          <div class="three"></div>
          <div class="four"></div>
        </div>
        <div class="ghost">
          <div class="face">
            <div class="eye"></div>
            <div class="eye-right"></div>
            <div class="mouth"></div>
          </div>
        </div>
        <div class="shadow"></div>
      </div>

      <div class="box__description">
        <div class="box__description-container">
          <div class="box__description-title">Доступ запрещен !</div>
          <div class="box__description-text">Вы не можете получить доступ к запрашиваемому ресурсу, лучше не надо :) </div>
        </div>
        <a href="#" onclick="goBack()" class="box__button">YES</a>
      </div>
    </div>
    <script>
      function goBack() {
        window.history.back();
      }
    </script>

</body>

</html>