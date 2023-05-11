<?php
session_start();
if (!isset($_SESSION["admin"])) {
?>
  <script>
    window.location = "index.php";
  </script>
<?php
}
?>


<?php
if (isset($_POST["submit1"])) {
  $loop = 0;
  $count = 0;
  $res = mysqli_query($link, "select * from questions where category='$exam_category' order by id asc ") or die(mysqli_error($link));
  $count = mysqli_num_rows($res);

  if ($count == 0) {
  } else {
    while ($row = mysqli_fetch_array($res)) {
      $loop = $loop + 1;
      mysqli_query($link, "update questions set question_no='$loop' where id = $row[id] ");
    }
  }
  $loop = $loop + 1;
  mysqli_query($link, "insert into questions values(NULL,'$loop', '$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]', '$exam_category')") or die(mysqli_error($link));


?>
  <script>
    window.location.href = window.location.href;
  </script>
<?php


}
?>

<?php
if (isset($_POST["submit2"])) {
  $loop = 0;
  $count = 0;
  $res = mysqli_query($link, "select * from questions where category='$exam_category' order by id asc ") or die(mysqli_error($link));
  $count = mysqli_num_rows($res);

  if ($count == 0) {
  } else {
    while ($row = mysqli_fetch_array($res)) {
      $loop = $loop + 1;
      mysqli_query($link, "update questions set question_no='$loop' where id = $row[id] ");
    }
  }
  $loop = $loop + 1;

  $tm = md5(time());


  $fnm1 = $_FILES["fopt1"]["name"];
  $dst1 = "./assets/opt_images/" . $fnm1;
  $dst_db1 = "assets/opt_images/" . $fnm1;
  move_uploaded_file($_FILES["fopt1"]["tmp_name"], $dst1);

  $fnm2 = $_FILES["fopt2"]["name"];
  $dst2 = "./assets/opt_images/" . $fnm2;
  $dst_db2 = "assets/opt_images/" . $fnm2;
  move_uploaded_file($_FILES["fopt2"]["tmp_name"], $dst2);

  $fnm3 = $_FILES["fopt3"]["name"];
  $dst3 = "./assets/opt_images/" . $fnm3;
  $dst_db3 = "assets/opt_images/" . $fnm3;
  move_uploaded_file($_FILES["fopt3"]["tmp_name"], $dst3);

  $fnm4 = $_FILES["fopt4"]["name"];
  $dst4 = "./assets/opt_images/" . $fnm4;
  $dst_db4 = "assets/opt_images/" . $fnm4;
  move_uploaded_file($_FILES["fopt4"]["tmp_name"], $dst4);

  $fnm5 = $_FILES["fanswer"]["name"];
  $dst5 = "./assets/opt_images/" . $fnm5;
  $dst_db5 = "assets/opt_images/" . $fnm5;
  move_uploaded_file($_FILES["fanswer"]["tmp_name"], $dst5);

  mysqli_query($link, "insert into questions values(NULL,'$loop', '$_POST[fquestion]','$dst_db1','$dst_db2','$dst_db3','$dst_db4','$dst_db5', '$exam_category')") or die(mysqli_error($link));


?>
  <script>
    window.location.href = window.location.href;
  </script>
<?php


}
?>

<?php
if (isset($_POST["submit3"])) {
  $loop = 0;
  $count = 0;
  $res = mysqli_query($link, "select * from questions where category='$exam_category' order by id asc ") or die(mysqli_error($link));
  $count = mysqli_num_rows($res);

  if ($count == 0) {
  } else {
    while ($row = mysqli_fetch_array($res)) {
      $loop = $loop + 1;
      mysqli_query($link, "update questions set question_no='$loop' where id = $row[id] ");
    }
  }
  $loop = $loop + 1;

  $iquestion = $_FILES["iquestion"]["name"];
  $dst = "./assets/opt_images/" . $iquestion;
  $dst_db = "assets/opt_images/" . $iquestion;
  move_uploaded_file($_FILES["iquestion"]["tmp_name"], $dst);


  mysqli_query($link, "insert into questions values(NULL,'$loop', '$dst_db','$_POST[iopt1]','$_POST[iopt2]','$_POST[iopt3]','$_POST[iopt4]','$_POST[ianswer]', '$exam_category')") or die(mysqli_error($link));


?>
  <script>
    window.location.href = window.location.href;
  </script>
<?php


}
?>


<?php
if (isset($_POST["submit4"])) {
  $loop = 0;
  $count = 0;
  $answer = strtolower($_POST['answer']);
  $res = mysqli_query($link, "select * from questions where category='$exam_category' order by id asc ") or die(mysqli_error($link));
  $count = mysqli_num_rows($res);

  if ($count == 0) {
  } else {
    while ($row = mysqli_fetch_array($res)) {
      $loop = $loop + 1;
      mysqli_query($link, "update questions set question_no='$loop' where id = $row[id] ");
    }
  }
  $loop = $loop + 1;

  $iquestion = $_FILES["question"]["name"];
  $dst = "./assets/opt_images/" . $iquestion;
  $dst_db = "assets/opt_images/" . $iquestion;
  move_uploaded_file($_FILES["question"]["tmp_name"], $dst);


  mysqli_query($link, "insert into questions values(NULL,'$loop', '$dst_db','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$answer', '$exam_category')") or die(mysqli_error($link));


?>
  <script>
    window.location.href = window.location.href;
  </script>
<?php


}
?>