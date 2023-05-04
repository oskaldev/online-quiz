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
  if (isset($_POST['groups'])) {
    $group = $_POST['groups'];
    $examTime = $_POST['exam_time'] ? date('Y-m-d', strtotime($_POST['exam_time'])) : "";
    if ($group != "" && $examTime != "" && strtotime($_POST['exam_time']) !== false) {
      $res = mysqli_query($link, "SELECT * FROM exam_results WHERE `groups` = '$group' AND DATE_FORMAT(`exam_time`, '%Y-%m-%d') = '$examTime'");
    } elseif ($group != "" && $examTime == "") {
      $res = mysqli_query($link, "SELECT * FROM exam_results WHERE `groups` = '$group' ");
    } elseif ($group === "" && $examTime != "" && $examTime != "1970-01-01") {
      $res = mysqli_query($link, "SELECT * FROM exam_results WHERE DATE_FORMAT(`exam_time`, '%Y-%m-%d') = '$examTime'");
    } else {
      $res = mysqli_query($link, "SELECT * FROM exam_results");
    }
  } else {
    $res = mysqli_query($link, "SELECT * FROM exam_results");
  }

  // проверка
  if (!$res) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
  }
  $count = mysqli_num_rows($res);

  if ($count > 0) {

    $output .= '
    <table class="table border="1">
      <tr>
        <th>никнейм</th>
        <th>группа</th>
        <th>тема экзамена</th>
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
        <td>' . $row["username"] . '</td>
        <td>' . $row["groups"] . '</td>
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
    header("Content-Disposition:attachment; filename=result-test.xls");
    echo $output;
  } else {
    echo "Нет результатов для экспорта";
  }
}

if (isset($_POST["export_csv"])) {
  if (isset($_POST['groups'])) {
    $group = $_POST['groups'];
    $examTime = $_POST['exam_time'] ? date('Y-m-d', strtotime($_POST['exam_time'])) : "";
    if ($group != "" && $examTime != "" && strtotime($_POST['exam_time']) !== false) {
      $res = mysqli_query($link, "SELECT * FROM exam_results WHERE `groups` = '$group' AND DATE_FORMAT(`exam_time`, '%Y-%m-%d') = '$examTime'");
    } elseif ($group != "" && $examTime == "") {
      $res = mysqli_query($link, "SELECT * FROM exam_results WHERE `groups` = '$group' ");
    } elseif ($group === "" && $examTime != "" && $examTime != "1970-01-01") {
      $res = mysqli_query($link, "SELECT * FROM exam_results WHERE DATE_FORMAT(`exam_time`, '%Y-%m-%d') = '$examTime'");
    } else {
      $res = mysqli_query($link, "SELECT * FROM exam_results");
    }
  } else {
    $res = mysqli_query($link, "SELECT * FROM exam_results");
  }
  // проверка
  if (!$res) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
  }
  $count = mysqli_num_rows($res);

  if ($count > 0) {

    $output .= "никнейм;группа; тема экзамена; всего вопросов; правильных ответов; не правильных ответов; время экзамена; баллы\n";
    while ($row = mysqli_fetch_array($res)) {
      $output .= '"' . $row["username"] . '";"' . $row["groups"] . '";"' . $row["exam_type"] . '";"' . $row["total_question"] . '";"' . $row["correct_answer"] . '";"' . $row["wrong_answer"] . '";"' . $row["exam_time"] . '";"' . $row["estimation"] . "\"\n";
    }
    $output = iconv("UTF-8", "Windows-1251//IGNORE", $output);
    header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header('Content-Encoding: UTF-8');
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=result-test.csv');

    echo $output;
  } else {
    echo "Нет результатов для экспорта";
  }
}
