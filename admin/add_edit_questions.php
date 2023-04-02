<?php
session_start();
if (!isset($_SESSION["admin"])) {
?>
  <script>
    window.location = "index.php";
  </script>
<?php
}
$_SESSION["last_activity"] = time();

include "auth.php";
include('header.php');
include "../connection.php";
$id = $_GET["id"];
$exam_category = '';
$res = mysqli_query($link, "select * from exam_category where id =$id");
while ($row = mysqli_fetch_array($res)) {
  $exam_category = $row["category"];
}
?>
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Добавьте новые вопросы для теста </h1>
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
            <form name="form1" action="" method="post" enctype="multipart/form-data">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header"><strong>Добавьте новые вопросы</strong></div>
                  <div class="card-body card-block">
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте вопрос</label>
                      <input type="text" name="question" placeholder="Добавьте вопрос" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте вариант ответа-1</label>
                      <input type="text" name="opt1" placeholder="Добавьте вариант ответа-1" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте вариант ответа-2</label>
                      <input type="text" name="opt2" placeholder="Добавьте вариант ответа-2" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте вариант ответа-3</label>
                      <input type="text" name="opt3" placeholder="Добавьте вариант ответа-3" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте вариант ответа-4</label>
                      <input type="text" name="opt4" placeholder="Добавьте вариант ответа-4" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте правильный ответ</label>
                      <input type="text" name="answer" placeholder="Добавьте правильный ответ" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="submit" name="submit1" value="Добавить" class="btn btn-success">
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header"><strong>Добавьте новые вопросы c картинками</strong></div>
                  <div class="card-body card-block">
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте вопрос</label>
                      <input type="text" name="fquestion" placeholder="Добавьте вопрос" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте вариант ответа-1</label>
                      <input type="file" name="fopt1" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте вариант ответа-2</label>
                      <input type="file" name="fopt2" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте вариант ответа-3</label>
                      <input type="file" name="fopt3" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте вариант ответа-4</label>
                      <input type="file" name="fopt4" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте правильный ответ</label>
                      <input type="file" name="fanswer" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="submit" name="submit2" value="Добавить" class="btn btn-success">
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header"><strong>Добавьте новые вопросы</strong></div>
                  <div class="card-body card-block">
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте вопрос</label>
                      <input type="file" name="iquestion" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте вариант ответа-1</label>
                      <input type="text" name="iopt1" placeholder="Добавьте вариант ответа-1" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте вариант ответа-2</label>
                      <input type="text" name="iopt2" placeholder="Добавьте вариант ответа-2" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте вариант ответа-3</label>
                      <input type="text" name="iopt3" placeholder="Добавьте вариант ответа-3" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте вариант ответа-4</label>
                      <input type="text" name="iopt4" placeholder="Добавьте вариант ответа-4" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Добавьте правильный ответ</label>
                      <input type="text" name="ianswer" placeholder="Добавьте правильный ответ" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="submit" name="submit3" value="Добавить" class="btn btn-success">
                    </div>
                  </div>
                </div>
              </div>


            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered">
              <tr>
                <th>ID </th>
                <th>Вопросы </th>
                <th>Ответ-1 </th>
                <th>Ответ-2 </th>
                <th>Ответ-3 </th>
                <th>Ответ-4 </th>
                <th>Правильный ответ </th>
                <th>Изменить </th>
                <th>Удалить </th>

              </tr>
              <?php
              $res = mysqli_query($link, "select * from questions where category='$exam_category' order by question_no asc");
              while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";

                echo "<td>";
                echo $row["question_no"];
                echo "</td>";
                echo "<td>";
                if (strpos($row["question"], 'opt_images/') !== false) {
              ?>
                  <img src="<?php echo $row["question"] ?>" height="50" width="50">
                <?php
                } else {
                  echo $row["question"];
                }
                echo "</td>";
                echo "<td>";
                if (strpos($row["opt1"], 'opt_images/') !== false) {
                ?>
                  <img src="<?php echo $row["opt1"] ?>" height="50" width="50">
                <?php
                } else {
                  echo $row["opt1"];
                }
                echo "</td>";
                echo "<td>";
                if (strpos($row["opt2"], 'opt_images/') !== false) {
                ?>
                  <img src="<?php echo $row["opt2"] ?>" height="50" width="50">
                <?php
                } else {
                  echo $row["opt2"];
                }
                echo "</td>";
                echo "<td>";
                if (strpos($row["opt3"], 'opt_images/') !== false) {
                ?>
                  <img src="<?php echo $row["opt3"] ?>" height="50" width="50">
                <?php
                } else {
                  echo $row["opt3"];
                }
                echo "</td>";
                echo "<td>";
                if (strpos($row["opt4"], 'opt_images/') !== false) {
                ?>
                  <img src="<?php echo $row["opt4"] ?>" height="50" width="50">
                <?php
                } else {
                  echo $row["opt4"];
                }
                echo "</td>";
                echo "<td>";
                if (strpos($row["answer"], 'opt_images/') !== false) {
                ?>
                  <img src="<?php echo $row["answer"] ?>" height="50" width="50">
                <?php
                } else {
                  echo $row["answer"];
                }
                echo "</td>";

                echo "<td>";
                if (strpos($row["opt1"], 'opt_images/') !== false) {
                ?>
                  <a href="edit_option_images.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Изменить</a>
                <?php
                } else if (strpos($row["question"], 'opt_images/') !== false) {
                ?>
                  <a href="edit_option_images-question.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Изменить</a>
                <?php
                } else {
                ?>
                  <a href="edit_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Изменить</a>
                <?php
                }
                echo "</td>";
                echo "<td>";
                ?>
                <a href="delete_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Удалить</a>
              <?php
                echo "</td>";

                echo "</tr>";
              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

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
    alert("Вопросы добавлены !");
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
  $dst1 = "./opt_images/" . $fnm1;
  $dst_db1 = "opt_images/" . $fnm1;
  move_uploaded_file($_FILES["fopt1"]["tmp_name"], $dst1);

  $fnm2 = $_FILES["fopt2"]["name"];
  $dst2 = "./opt_images/" . $fnm2;
  $dst_db2 = "opt_images/" . $fnm2;
  move_uploaded_file($_FILES["fopt2"]["tmp_name"], $dst2);

  $fnm3 = $_FILES["fopt3"]["name"];
  $dst3 = "./opt_images/" . $fnm3;
  $dst_db3 = "opt_images/" . $fnm3;
  move_uploaded_file($_FILES["fopt3"]["tmp_name"], $dst3);

  $fnm4 = $_FILES["fopt4"]["name"];
  $dst4 = "./opt_images/" . $fnm4;
  $dst_db4 = "opt_images/" . $fnm4;
  move_uploaded_file($_FILES["fopt4"]["tmp_name"], $dst4);

  $fnm5 = $_FILES["fanswer"]["name"];
  $dst5 = "./opt_images/" . $fnm5;
  $dst_db5 = "opt_images/" . $fnm5;
  move_uploaded_file($_FILES["fanswer"]["tmp_name"], $dst5);

  mysqli_query($link, "insert into questions values(NULL,'$loop', '$_POST[fquestion]','$dst_db1','$dst_db2','$dst_db3','$dst_db4','$dst_db5', '$exam_category')") or die(mysqli_error($link));


?>
  <script>
    alert("Вопросы добавлены !");
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
  $dst = "./opt_images/" . $iquestion;
  $dst_db = "opt_images/" . $iquestion;
  move_uploaded_file($_FILES["iquestion"]["tmp_name"], $dst);


  mysqli_query($link, "insert into questions values(NULL,'$loop', '$dst_db','$_POST[iopt1]','$_POST[iopt2]','$_POST[iopt3]','$_POST[iopt4]','$_POST[ianswer]', '$exam_category')") or die(mysqli_error($link));


?>
  <script>
    alert("Вопросы добавлены !");
    window.location.href = window.location.href;
  </script>
<?php


}
?>

<?php
include 'footer.php';
?>