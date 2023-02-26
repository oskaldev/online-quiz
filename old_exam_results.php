<?php
session_start();
include "connection.php";
if (!isset($_SESSION["username"])) {
?>
  <script>
    window.location = "login.php";
  </script>
<?php
}


include "header.php";
?>


<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

  <div class="col-lg-8 col-lg-push-2" style="min-height: 500px; background-color: white;border: 1px solid;">
    <center>
      <h1>Результаты тестов</h1>
    </center>

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

        echo "</tr>";
      }
      echo "</table>";
    }

    ?>
  </div>

</div>

<?php
include "footer.php";
?>