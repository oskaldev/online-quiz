<?php
session_start();
require_once "auth.php";
require_once "../connection.php";
if (!isset($_SESSION["username"])) {
?>
  <script>
    window.location = "login.php";
  </script>
<?php
}
if (isset($_SESSION["last_activity"])) {
  $_SESSION["last_activity"] = time();
}


?>
<?php
if (isset($_POST['groups'])) {
  $group = $_POST['groups'];
  if ($group != "") {
    $res = mysqli_query($link, "SELECT * FROM exam_results WHERE `groups` = '$group'");
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

if ($count == 0) {
  echo "<center><h3>Результаты не найдены</h3></center>";
} else {
  echo "<table class='table table-bordered'>";
  echo "<tr style='background-color: #006df0;border: 1px solid; color:white;'>  
          <th>никнейм</th>
          <th>группа</th>
          <th>тема экзамена</th>
          <th>всего вопросов</th>
          <th>правильные ответы</th>
          <th>не правильные ответы</th>
          <th>дата</th>
          <th>баллы</th>
          <th>оценка</th>
          </tr>";

  while ($row = mysqli_fetch_array($res)) {
    echo "<tr>
            <td class='search-item'>" . $row["username"] . "</td>
            <td>" . $row["groups"] . "</td>
            <td>" . $row["exam_type"] . "</td>
            <td>" . $row["total_question"] . "</td>
            <td>" . $row["correct_answer"] . "</td>
            <td>" . $row["wrong_answer"] . "</td>
            <td>" . $row["exam_time"] . "</td>
            <td>" . $row["estimation"] . "</td>
            <td>" . $row["grade"] . "</td>
            </tr>";
  }
  echo "</table>";
}
?>