<?php
include "../connection.php";
$id = $_GET["id"];
mysqli_query($link, "delete from exam_category where id=$id");
?>
<script>
  window.location.href = "exam_category.php";
</script>