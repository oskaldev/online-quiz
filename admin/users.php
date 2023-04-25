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
              <form style='padding-bottom:50px;' method="POST" action="excel.php">
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
                <button type="submit" class="btn btn-primary">Найти</button>
              </form>
            </div>

            <?php

            if (isset($_POST['groups'])) {
              $group = $_POST['groups'];
              if ($group != "") {
                $res = mysqli_query($link, "SELECT * FROM registration WHERE `groups` = '$group'");
              } else {
                $res = mysqli_query($link, "SELECT * FROM registration");
              }
            } else {
              $res = mysqli_query($link, "SELECT * FROM registration");
            }



            if (!$res) {
              printf("Error: %s\n", mysqli_error($link));
              exit();
            }

            if (isset($_POST['delete'])) {
              foreach ($_POST['user_ids'] as $id) {
                mysqli_query($link, "delete from registration where id='$id'");
              }
            }
            $count = mysqli_num_rows($res);

            if ($count == 0) {
            ?>
              <h2 style='text-align:center; padding-bottom:50px;'> Список пользователей на данный момент пуст</h2>
            <?php
            } else {

              echo "<form method='post'>";
              echo "<td colspan='6'><button type='submit' class='btn btn-success' name='delete'>Удалить выбранных пользователей</button></td>";
              echo "<table class='table table-bordered'>";
              echo "<tr style='background-color: #006df0;border: 1px solid; color:white;'> ";
              echo "<th></th>";
              echo "<th>никнейм</th>";
              echo "<th>имя</th>";
              echo "<th>фамилия</th>";
              echo "<th>группа</th>";
              echo "<th>почта</th>";
              echo "</tr>";

              while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td><input type='checkbox' name='user_ids[]' value='" . $row["id"] . "'></td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["firstname"] . "</td>";
                echo "<td>" . $row["lastname"] . "</td>";
                echo "<td>" . $row["groups"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
              }

              echo "<tr>";
              echo "<td colspan='6'><button type='submit' class='btn btn-success' name='delete'>Удалить выбранных пользователей</button></td>";
              echo "</tr>";

              echo "</table>";
              echo "</form>";
            }


            ?>
            <td></td>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include 'footer.php';
?>