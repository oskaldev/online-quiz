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
        <h1>Результаты тестов</h1>
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

            <h1 style='text-align:center; padding-bottom:50px;'>Результаты тестов</h1>

            <div class="col-md-6">
              <h2 style='padding-bottom:10px;' class="center">Export</h2>
              <form style='padding-bottom:50px;' method="POST" action="../excel.php">
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
                <input type="submit" name="export_btn_admin" class="btn btn-success" value="Export">
              </form>
            </div>

            <?php
            $count = 0;
            $res = mysqli_query($link, "select * from exam_results  order by id desc ");
            $count = mysqli_num_rows($res);

            if ($count == 0) {
            ?>
              <center>
                <h1>Результаты не найдены</h1>
              </center>
            <?php
            } else {
              echo "<table class='table table-bordered'>";
              echo "<tr style='background-color: #006df0;border: 1px solid; color:white;'>  ";

              echo "<th>";
              echo "никнейм";
              echo "</th>";

              echo "<th>";
              echo "категория экзамена";
              echo "</th>";

              echo "<th>";
              echo "всего вопросов";
              echo "</th>";

              echo "<th>";
              echo "правильные ответы";
              echo "</th>";

              echo "<th>";
              echo "не правильные ответы";
              echo "</th>";

              echo "<th>";
              echo "дата";
              echo "</th>";

              echo "<th>";
              echo "баллы";
              echo "</th>";

              echo "</tr>";

              while ($row = mysqli_fetch_array($res)) {

                echo "<tr>";

                echo "<td>";
                echo $row["username"];
                echo "</td>";

                echo "<td>";
                echo $row["exam_type"];
                echo "</td>";

                echo "<td>";
                echo $row["total_question"];
                echo "</td>";

                echo "<td>";
                echo $row["correct_answer"];
                echo "</td>";

                echo "<td>";
                echo $row["wrong_answer"];
                echo "</td>";

                echo "<td>";
                echo $row["exam_time"];
                echo "</td>";

                echo "<td>";
                echo $row["estimation"];
                echo "</td>";

                echo "</tr>";
              }
              echo "</table>";
            }

            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include 'footer.php';
?>