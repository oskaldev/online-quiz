<?php
session_start();
if (!isset($_SESSION["admin"])) {
?>
  <script>
    window.location = "index.php";
  </script>
<?php
}
if (isset($_SESSION["last_activity"])) {
  $_SESSION["last_activity"] = time();
}

require_once "auth.php";
require_once "../connection.php";
?>
<?php
if (isset($_POST['groups'])) {
  $group = $_POST['groups'];
  if ($group != "") {
    $res = mysqli_query($link, "SELECT * FROM registration WHERE `groups` = '$group'");
  } else {
    $res = mysqli_query($link, "SELECT * FROM registration");
  }
} else {
  $res = mysqli_query($link, "SELECT * FROM registration");
}
// проверка
if (!$res) {
  printf("Error: %s\n", mysqli_error($link));
  exit();
}

if (isset($_POST['delete']) && isset($_POST['user_ids']) && !empty($_POST['user_ids'])) {
  foreach ($_POST['user_ids'] as $id) {
    mysqli_query($link, "delete from registration where id='$id'");
  }
?>
  <script>
    window.location = "users.php";
  </script>
<?php
}
$count = mysqli_num_rows($res);

if ($count == 0) {
?>
  <h2 style='text-align:center; padding-bottom:50px;'> Список пользователей на данный момент пуст</h2>
<?php
} else {

  echo "<form method='post'>";
  echo "<table class='table table-bordered'>";
  echo "<tr style='background-color: #006df0;border: 1px solid; color:white;'> ";
  echo "<th></th>";
  echo "<th>никнейм</th>";
  echo "<th>имя</th>";
  echo "<th>фамилия</th>";
  echo "<th>группа</th>";
  echo "<th>почта</th>";
  echo "</tr>";

  while ($row = mysqli_fetch_array($res)) {
    echo "<tr>";
    echo "<td><input type='checkbox' name='user_ids[]' value='" . $row["id"] . "'></td>";
    echo "<td>" . $row["username"] . "</td>";
    echo "<td>" . $row["firstname"] . "</td>";
    echo "<td>" . $row["lastname"] . "</td>";
    echo "<td>" . $row["groups"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "</tr>";
  }

  echo "<tr>";
  echo "<td colspan='6'><button type='submit' class='btn btn-success' name='delete'>Удалить выбранных пользователей</button></td>";
  echo "</tr>";

  echo "</table>";
  echo "</form>";
}


?>