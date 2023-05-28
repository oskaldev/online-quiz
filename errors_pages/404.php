<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 - NotFound</title>
  <link rel="stylesheet" href="../errors_pages/404.css">
</head>

<body>
  <section class="notFound">
    <div class="img">
      <img src="https://assets.codepen.io/5647096/backToTheHomepage.png" alt="Back to the Homepage" />
      <img src="https://media1.tenor.com/images/6a66c0e8a2451cce5a5f14a37565aa05/tenor.gif?itemid=17446540" alt="never gonna give you up" />
    </div>
    <div class="text">
      <h1>404</h1>
      <h2>PAGE NOT FOUND</h2>
      <h3>BACK TO HOME?</h3>
      <a href="#" onclick="goBack()" class="box__button">YES</a>
      <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">NO</a>
    </div>
  </section>
  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</body>

</html>