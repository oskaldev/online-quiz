<?php
session_start();

if (!isset($_SESSION["username"])) {
?>
  <script>
    window.location = "../errors_pages/401.php";
  </script>
<?php
}
include "auth.php";
include "../connection.php";

$output = '';

if (isset($_POST["export_btn"])) {
  $res = mysqli_query($link, "select * from exam_results where username='$_SESSION[username]' order by id desc ");
  $count = mysqli_num_rows($res);

  if ($count > 0) {

    $output .= '
    <table class="table border="1">
      <tr>
        <th colspan="7">РЕЗУЛЬТАТЫ ТЕСТИРОВАНИЯ ПО АНГЛИЙСКОМУ ЯЗЫКУ ЗА ВСЁ ВРЕМЯ</th>
      </tr>
      <tr>
        <th>никнейм</th>
        <th>тема экзамена</th>
        <th>всего вопросов</th>
        <th>правильных ответов</th>
        <th>не правильных ответов</th>
        <th>время экзамена</th>
        <th>баллы</th>
        <th>оценка</th>
      </tr>
    ';
    while ($row = mysqli_fetch_array($res)) {
      $output .= '
      <tr>
        <td>' . $row["username"] . '</td>
        <td>' . $row["exam_type"] . '</td>
        <td>' . $row["total_question"] . '</td>
        <td>' . $row["correct_answer"] . '</td>
        <td>' . $row["wrong_answer"] . '</td>
        <td>' . $row["exam_time"] . '</td>
        <td>' . $row["estimation"] . '</td>
        <td>' . $row["grade"] . '</td>
      </tr>
      ';
    }
    $output .= '</table>';
    header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("Content-type: application/vnd.ms-excel;");
    header("Content-Disposition:attachment; filename=результаты-тестирования-английский.xls");
    echo $output;
  } else {
    echo "Нет результатов для экспорта";
  }
}

if (isset($_POST["export_csv"])) {
  $res = mysqli_query($link, "select * from exam_results where username='$_SESSION[username]' order by id desc ");
  $count = mysqli_num_rows($res);

  if ($count > 0) {

    $output .= "РЕЗУЛЬТАТЫ ТЕСТИРОВАНИЯ ПО АНГЛИЙСКОМУ ЯЗЫКУ ЗА ВСЁ ВРЕМЯ\n\n";
    $output .= "никнейм; тема экзамена; всего вопросов; правильных ответов; не правильных ответов; время экзамена; баллы; оценка\n";
    while ($row = mysqli_fetch_array($res)) {
      $output .= '"' . $row["username"] . '";"' . $row["exam_type"] . '";"' . $row["total_question"] . '";"' . $row["correct_answer"] . '";"' . $row["wrong_answer"] . '";"' . $row["exam_time"] . '";"' . $row["estimation"] . '";"' . $row["grade"] . "\"\n";
    }
    $output = iconv("UTF-8", "Windows-1251//IGNORE", $output);
    header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header('Content-Encoding: UTF-8');
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=результаты-тестирования-английский.csv');

    echo $output;
  } else {
    echo "Нет результатов для экспорта";
  }
}
