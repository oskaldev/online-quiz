<?php
session_start();
if (!isset($_SESSION["admin"])) {
?>
  <script>
    window.location = "index.php";
  </script>
<?php
}
$_SESSION["last_activity"] = time();

include "auth.php";
include "../connection.php";
$id = $_GET["id"];
mysqli_query($link, "delete from registration where id=$id");
?>
<script>
  window.location.href = "users.php";
</script>