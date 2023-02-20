<?php
session_start();
if (!isset($_SESSION["username"])) {
?>
  <script>
    window.location = "login.php";
  </script>
<?php
}
include "header.php";
?>


<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

  <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
    <?php
    $correct = 0;
    $wrong = 0;
    ?>
  </div>

</div>

<?php
include "footer.php";
?>