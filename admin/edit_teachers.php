<?php
require_once "header.php";

$id = $_GET["id"];
$res = mysqli_query($link, "select * from teachers where id=$id");
while ($row = mysqli_fetch_array($res)) {
  $groups = $row["groups"];
}
?>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <form name="form1" method="post">
            <div class="card-body">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header"><strong>Изменить группу</strong></div>
                  <div class="card-body card-block">
                    <div class="form-group">
                      <div class="form-group">
                        <div class="form-group select">
                          <select class="form-control" name="groups" id="pet-select" required>
                            <option value="">Пожалуйста выберете группу</option>
                            <option value="ПО-42">ПО-42</option>
                            <option value="ПО-32">ПО-32</option>
                            <option value="ПО-22">ПО-22</option>
                            <option value="ПО-12">ПО-12</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="submit1" value="Обновить" class="btn btn-success">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
if (isset($_POST["submit1"])) {
  $groups = mysqli_real_escape_string($link, $_POST["groups"]);
  mysqli_query($link, "update teachers set `groups`='$groups' where id=$id ") or die(mysqli_error($link));
?>
  <script>
    window.location = "teachers.php";
  </script>
<?php
}
?>

<?php
require_once 'footer.php';
?>