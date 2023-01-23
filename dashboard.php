<?php
include "header.php";
?>


<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

  <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
    oskaldev
  </div>

</div>

<script>
  setInterval(function() {
    timer();
  }, 1000);

  function timer() {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        if (xmlhttp.responseText == "00:00:01") {
          window.location = "result.php";
        }
        document.getElementById("timer").innerHTML = xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET", "forajax/load_timer.php", true);
    xmlhttp.send(null);
  };
</script>

<?php
include "footer.php";
?>