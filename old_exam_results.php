<?php
require_once "header.php";
?>


<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

  <div class="col-lg-8 col-lg-push-2" style="min-height: 500px; background-color: white;border: 1px solid;">

    <h1 style='text-align:center; padding-bottom:50px;'>Результаты тестов</h1>

    <div class="col-md-6">
      <h2 class="center">Export</h2>
      <form style='padding-bottom:50px;' method="POST" action="excel.php">
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
        <input type="submit" name="export_btn" class="btn btn-success" value="Export XLS">
        <input type="submit" name="export_csv" class="btn btn-success" value="Export CSV">
      </form>
    </div>

    <?php
    $count = 0;
    $res = mysqli_query($link, "select * from exam_results where username='$_SESSION[username]' order by id desc ");
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

<?php
include "footer.php";
?>