<?php
require_once "header.php";
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
              <form style='padding-bottom:50px;' method="POST" action="excel.php" target="_blank">
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
                <input type="submit" name="export_btn_admin" class="btn btn-success" value="Export XLS">
                <input type="submit" name="export_csv_admin" class="btn btn-success" value="Export CSV">

              </form>
            </div>

            <?php
            $count = 0;
            $res = mysqli_query($link, "select * from exam_results  order by id desc ");
            $count = mysqli_num_rows($res);

            if ($count == 0) {
              echo "<center><h1>Результаты не найдены</h1></center>";
            } else {
              echo "<table class='table table-bordered'>";
              echo "<tr style='background-color: #006df0;border: 1px solid; color:white;'>  
          <th>никнейм</th>
          <th>тема экзамена</th>
          <th>всего вопросов</th>
          <th>правильные ответы</th>
          <th>не правильные ответы</th>
          <th>дата</th>
          <th>баллы</th>
          </tr>";

              while ($row = mysqli_fetch_array($res)) {
                echo "<tr>
            <td>" . $row["username"] . "</td>
            <td>" . $row["exam_type"] . "</td>
            <td>" . $row["total_question"] . "</td>
            <td>" . $row["correct_answer"] . "</td>
            <td>" . $row["wrong_answer"] . "</td>
            <td>" . $row["exam_time"] . "</td>
            <td>" . $row["estimation"] . "</td>
          </tr>";
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