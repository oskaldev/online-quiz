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
mysqli_query($link, "delete from teachers where id=$id");
?>
<script>
  window.location.href = "teachers.php";
</script>