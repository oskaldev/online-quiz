<?php
require_once "header.php";
?>
<section class="search">
  <div class="search-wrapper" role="search">
    <input type="text" id="search-input" placeholder="Поиск..." class="form-control">
  </div>
</section>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 150px;">
  <div class="col-lg-12 col-lg-push-3" style="min-height: 500px; background-color: white;">

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
  async function set_exam_type_session(exam_category) {
    try {
      const response = await fetch("../forajax/set_exam_type_session.php?exam_category=" + exam_category);
      if (response.ok) {
        window.location = "dashboard.php";
      }
    } catch (error) {
      console.error('Error:', error);
    }
  }
</script>


<?php
include "footer.php";
?>