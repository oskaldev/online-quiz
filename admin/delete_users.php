<!-- <?php
      // session_start();
      // if (!isset($_SESSION["admin"])) {
      // 
      ?>
  <script>
    window.location = "index.php";
  </script>
 <?php
  // }
  // require_once "auth.php";
  // require_once "../connection.php";
  // $id = $_GET["id"];
  // mysqli_query($link, "delete from registration where id=$id");
  // 
  ?>
<script>
  window.location.href = "users.php";
</script>/ -->


<?php
session_start();
if (!isset($_SESSION["admin"])) {
?>
  <script>
    window.location = "index.php";
  </script>
<?php
}
require_once "auth.php";
require_once "../connection.php";
$id = $_GET["id"];

mysqli_query($link, "select * from registration where username='$_POST[username]'");

if (isset($_SESSION["username"]) and $_SESSION["username"] === $_POST["username"]) {
  // если пользователь авторизован, то удаляем сессию
  session_unset();
  session_destroy();
  header("Location: index.php");
  exit();
}
mysqli_query($link, "DELETE FROM registration WHERE id='$id' ");


?>
<script>
  window.location.href = "users.php";
</script>