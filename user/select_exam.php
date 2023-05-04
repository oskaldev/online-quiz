<?php
require_once "header.php";
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 150px;">
  <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">

    <?php
    $query = "SELECT * FROM exam_category";
    $res = mysqli_query($link, $query);
    while ($row = mysqli_fetch_array($res)) {
    ?>
      <input type="button" class="btn btn-success form-control search-item" value="<?php echo $row["category"]; ?>" style="margin-top: 10px; background: blue; color: white;" onclick="set_exam_type_session(this.value);">
    <?php
    }
    ?>
  </div>
</div>
<script>
  window.addEventListener('DOMContentLoaded', function() {
    let searchInput = document.getElementById('search-input');
    searchInput.addEventListener('input', function() {
      let search = searchInput.value.toLowerCase();
      let searchItems = document.querySelectorAll('.search-item');
      searchItems.forEach(function(item) {
        if (item.value.toLowerCase().indexOf(search) >= 0) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
</script>
<script>
  function set_exam_type_session(exam_category) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        window.location = "dashboard.php";
      }
    };
    xmlhttp.open("GET", "../forajax/set_exam_type_session.php?exam_category=" + exam_category, true);
    xmlhttp.send(null);
  };
</script>

<?php
include "footer.php";
?>