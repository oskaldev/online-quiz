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
mysqli_query($link, "delete from exam_category where id=$id");
?>
<script>
  window.location.href = "exam_category.php";
</script>