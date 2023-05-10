<?php
require_once "header.php";
?>


<div class="container" style="margin-bottom: 150px;">
  <div class="col-lg-12 col-lg-push-2">
    <div class="col-md-12">
      <h1 class="result__title">Результаты тестов</h1>
      <div class="form-group select">
        <form method="post" action="excel.php" target="_blank">
          <input type="submit" name="export_btn" class="btn btn-success" value="Export XLS">
          <input type="submit" name="export_csv" class="btn btn-success" value="Export CSV">
        </form>
      </div>
    </div>


    <?php
    $count = 0;
    $res = mysqli_query($link, "select * from exam_results where username='$_SESSION[username]' order by id desc ");
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

<?php
include "footer.php";
?>