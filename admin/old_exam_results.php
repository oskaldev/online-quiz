<?php
session_start();
if (!isset($_SESSION["admin"])) {
?>
  <script>
    window.location = "index.php";
  </script>
<?php
}
include('header.php');
include "../connection.php";
?>
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Резульэ тестов</h1>
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
      </div>
    </div>
  </div>
</div>

<?php
include 'footer.php';
?>