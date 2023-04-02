<?php
session_start();
if (!isset($_SESSION["admin"])) {
?>
  <script>
    window.location = "index.php";
  </script>
<?php
}
$_SESSION["last_activity"] = time();

include "auth.php";
include('header.php');
include "../connection.php";
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

            <?php
            $count = 0;
            $res = mysqli_query($link, "select * from registration  order by id desc ");
            $count = mysqli_num_rows($res);

            if ($count == 0) {
            ?>
              <center>
                <h1> Список пользователей на данный момент пуст</h1>
              </center>
            <?php
            } else {
              echo "<table class='table table-bordered'>";
              echo "<tr style='background-color: #006df0;border: 1px solid; color:white;'>  ";

              echo "<th>";
              echo "никнейм";
              echo "</th>";

              echo "<th>";
              echo "имя";
              echo "</th>";

              echo "<th>";
              echo "фамилия";
              echo "</th>";

              echo "<th>";
              echo "группа";
              echo "</th>";

              echo "<th>";
              echo "почта";
              echo "</th>";

              echo "<th>";
              echo "";
              echo "</th>";
              echo "</tr>";

              while ($row = mysqli_fetch_array($res)) {

                echo "<tr>";

                echo "<td>";
                echo $row["username"];
                echo "</td>";

                echo "<td>";
                echo $row["firstname"];
                echo "</td>";

                echo "<td>";
                echo $row["lastname"];
                echo "</td>";

                echo "<td>";
                echo $row["groups"];
                echo "</td>";

                echo "<td>";
                echo $row["email"];
                echo "</td>";

                echo "<td>";
                echo "<a href=delete_users.php?id=" . $row["id"] . "&amp;action=delete>";
                echo "удалить";
                echo "</a>";
                echo "</td>";

                echo "</tr>";
              }
              echo "</table>";
            }

            ?>
            <td></td>
            <div class="col-md-6">
              <h2 class="center">Export</h2>
              <form method="POST" action="excel.php">
                <div class="row">
                  <div class="col-md-6">
                    <!-- <select name="export_file_type" class="form-control" required>
              <option value="">Пожалуйста выберете формат</option>
              <option value="xlsx">xlsx</option>
              <option value="xls">xls</option>
              <option value="csv">csv</option>
                    </select> -->
                  </div>
                </div>
                <input type="submit" name="export_btn" class="btn btn-success" value="Export">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include 'footer.php';
?>