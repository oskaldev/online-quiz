<?php
require_once "header.php";
?>
<div class="container" style="margin-bottom: 150px;">
  <div class="col-lg-12 col-lg-push-2">
    <div class="col-md-12">
      <h1 class="result__title">Результаты тестов</h1>
      <div class="form-group select">
        <form method="post" action="excel.php" target="_blank">
          <select name="groups" id="pet-select">
            <option value="">Все</option>
            <option value="ПО-42">ПО-42</option>
            <option value="ПО-32">ПО-32</option>
            <option value="ПО-22">ПО-22</option>
            <option value="ПО-12">ПО-12</option>
          </select>
          <button type="button" id="search-btn" class="btn btn-primary">Найти</button>
          <input type="submit" name="export_btn" class="btn btn-success" value="Export XLS">
          <input type="submit" name="export_csv" class="btn btn-success" value="Export CSV">
          <input type="date" id="exam-time" name="exam_time">
        </form>
      </div>
    </div>
    <div id="user-list">
      <?php require_once "load-users.php";; ?>
    </div>
  </div>
</div>
</div>
<script>
  document.getElementById("search-btn").addEventListener("click", async function() {
    let group = document.getElementById("pet-select").value;
    console.log("Выбранная группа:", group);
    let examTime = document.getElementById("exam-time").value;
    console.log("Выбранная дата:", examTime);
    try {
      const response = await fetch("load-users.php", {
        method: "POST",
        headers: {
          "Content-type": "application/x-www-form-urlencoded"
        },
        body: "groups=" + group + "&exam_time=" + examTime
      });
      if (response.ok) {
        const data = await response.text();
        document.getElementById("user-list").innerHTML = data;
      }
    } catch (error) {
      console.error('Error:', error);
    }
  });
</script>




<?php
include "footer.php";
?>