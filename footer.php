<?php
session_start();
if (!isset($_SESSION["username"])) {
?>
  <script>
    window.location = "login.php";
  </script>
<?php
}

?>


<div class="footer-copyright-area">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="footer-copy-right">
          <p>Copyright oskaldev © 2023.</p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>





<script src="js/vendor/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>

</html>