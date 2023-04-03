<?php
session_start();

if (!isset($_SESSION["admin"])) {
?>
  <script>
    window.location = "index.php";
  </script>
<?php
}
include "auth.php";
include "../connection.php";

$output = '';

if (isset($_POST["export_btn_admin"])) {
  $res = mysqli_query($link, "select * from exam_results order by id desc ");

  $count = mysqli_num_rows($res);

  if ($count > 0) {

    $output .= '
    <table class="table border="1">
      <tr>
        <th>id</th>
        <th>никнейм</th>
        <th>тип экзамена</th>
        <th>всего вопросов</th>
        <th>правильных ответов</th>
        <th>не правильных ответов</th>
        <th>время экзамена</th>
        <th>баллы</th>
      </tr>
    ';
    while ($row = mysqli_fetch_array($res)) {
      $output .= '
      <tr>
        <td>' . $row["id"] . '</td>
        <td>' . $row["username"] . '</td>
        <td>' . $row["exam_type"] . '</td>
        <td>' . $row["total_question"] . '</td>
        <td>' . $row["correct_answer"] . '</td>
        <td>' . $row["wrong_answer"] . '</td>
        <td>' . $row["exam_time"] . '</td>
        <td>' . $row["estimation"] . '</td>
      </tr>
      ';
    }
    $output .= '</table>';
    header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("Content-type: application/vnd.ms-excel;");
    header("Content-Disposition:attachment; filename=download.xls");
    echo $output;
  }
}
