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
$id1 = $_GET["id1"];
mysqli_query($link, "delete from questions where id=$id");
?>
<script>
  window.location = "add_edit_questions.php?id=<?php echo $id1; ?>";
</script>