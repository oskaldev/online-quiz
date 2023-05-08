<?php
require_once "header.php";
?>
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Список пользователей</h1>
      </div>
    </div>
  </div>
</div>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div>
              <h2 style='padding-bottom:10px;' class="center">Export</h2>
              <form style='padding-bottom:50px;' method="POST" action="excel.php" target="_blank">
                <div class="row">
                  <div class="col-md-6">
                  </div>
                </div>
                <input type="submit" name="export_users_btn_admin" class="btn btn-success" value="Export XLS">
                <input type="submit" name="export_users_csv_admin" class="btn btn-success" value="Export CSV">
              </form>
            </div>
            <div class="form-group col-lg-12 select">
              <form method="post">
                <select name="groups" id="pet-select">
                  <option value="">Все</option>
                  <option value="ПО-42">ПО-42</option>
                  <option value="ПО-32">ПО-32</option>
                  <option value="ПО-22">ПО-22</option>
                  <option value="ПО-12">ПО-12</option>
                </select>
                <button type="button" id="search-btn" class="btn btn-primary">Найти</button>
              </form>
            </div>
            <div id="user-list">
              <?php require_once "load-users.php"; ?>
            </div>
            <td></td>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  document.getElementById("search-btn").addEventListener("click", async function() {
    let group = document.getElementById("pet-select").value;
    try {
      const response = await fetch("load-users.php", {
        method: "POST",
        headers: {
          "Content-type": "application/x-www-form-urlencoded"
        },
        body: "groups=" + group
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
include 'footer.php';
?>