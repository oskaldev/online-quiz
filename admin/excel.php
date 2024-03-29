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
        <th colspan="7">РЕЗУЛЬТАТЫ ТЕСТИРОВАНИЯ ПО АНГЛИЙСКОМУ ЯЗЫКУ ЗА ВСЁ ВРЕМЯ ВСЕХ СТУДЕНТОВ</th>
      </tr>
      <tr>
        <th>id</th>
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
        <td>' . $row["id"] . '</td>
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

if (isset($_POST["export_csv_admin"])) {
  $res = mysqli_query($link, "select * from exam_results order by id desc ");
  $count = mysqli_num_rows($res);

  if ($count > 0) {

    $output .= "РЕЗУЛЬТАТЫ ТЕСТИРОВАНИЯ ПО АНГЛИЙСКОМУ ЯЗЫКУ ЗА ВСЁ ВРЕМЯ ВСЕХ СТУДЕНТОВ\n\n";
    $output .= "id; никнейм; тема экзамена; всего вопросов; правильных ответов; не правильных ответов; время экзамена; баллы; оценка\n";
    while ($row = mysqli_fetch_array($res)) {
      $output .= '"' . $row["id"] . '";"' . $row["username"] . '";"' . $row["exam_type"] . '";"' . $row["total_question"] . '";"' . $row["correct_answer"] . '";"' . $row["wrong_answer"] . '";"' . $row["exam_time"] . '";"' . $row["estimation"] . '";"' . $row["grade"] . "\"\n";
    }
    $output = iconv("UTF-8", "Windows-1251//IGNORE", $output);
    header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header('Content-Encoding: UTF-8');
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=результаты-тестирования-английский.csv');

    echo $output;
  }
}


if (isset($_POST["export_users_btn_admin"])) {
  $res = mysqli_query($link, "select * from registration order by id desc ");
  $count = mysqli_num_rows($res);
  if ($count > 0) {
    $output .= '
    <table class="table border="1">
      <tr>
        <th colspan="7">СПИСОК ЗАРЕГИСТРИРОВАННЫХ СТУДЕНТОВ РКРИПТ ПО АНГЛИЙСКОМУ ЯЗЫКУ(online-quiz.ru)</th>
      </tr>
      <tr>
        <th>id</th>
        <th>имя</th>
        <th>фамилия</th>
        <th>никнейм</th>
        <th>почта</th>
        <th>группа</th>
      </tr>
    ';
    while ($row = mysqli_fetch_array($res)) {
      $output .= '
      <tr>
        <td>' . $row["id"] . '</td>
        <td>' . $row["firstname"] . '</td>
        <td>' . $row["lastname"] . '</td>
        <td>' . $row["username"] . '</td>
        <td>' . $row["email"] . '</td>
        <td>' . $row["groups"] . '</td>
      </tr>
      ';
    }
    $output .= '</table>';
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("Content-type: application/vnd.ms-excel;");
    header("Content-Disposition:attachment; filename=зарегистрированные-пользователи.xls");
    echo $output;
  } else {
    echo "Нет результатов для экспорта";
  }
}



if (isset($_POST["export_users_csv_admin"])) {
  $res = mysqli_query($link, "select * from registration order by id desc ");
  $count = mysqli_num_rows($res);

  if ($count > 0) {

    $output .= "СПИСОК ЗАРЕГИСТРИРОВАННЫХ СТУДЕНТОВ РКРИПТ ПО АНГЛИЙСКОМУ ЯЗЫКУ(online-quiz.ru)\n\n";
    $output .= "id; имя; фамилия; никнейм; почта; группа\n";
    while ($row = mysqli_fetch_array($res)) {
      $output .= '"' . $row["id"] . '";"' . $row["firstname"] . '";"' . $row["lastname"] . '";"' . $row["username"] . '";"' . $row["email"] . '";"' . $row["groups"] . "\"\n";
    }
    $output = iconv("UTF-8", "Windows-1251//IGNORE", $output);
    header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header('Content-Encoding: UTF-8');
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=зарегистрированные-пользователи.csv');
    echo $output;
  } else {
    echo "Нет результатов для экспорта";
  }
}
