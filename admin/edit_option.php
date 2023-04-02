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
$id1 = $_GET["id1"];

$question = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$answer = "";


$res = mysqli_query($link, "select * from questions where id = $id");
while ($row = mysqli_fetch_array($res)) {

  $question = $row["question"];
  $opt1 = $row["opt1"];
  $opt2 = $row["opt2"];
  $opt3 = $row["opt3"];
  $opt4 = $row["opt4"];
  $answer = $row["answer"];
}
?>
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Обновить вопросы</h1>
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
            <div class="col-lg-12">
              <form name="form1" action="" method="post">
                <div class="card">
                  <div class="card-header"><strong>Измените вопросы</strong></div>
                  <div class="card-body card-block">
                    <div class="form-group">
                      <label class=" form-control-label">Изменить вопрос</label>
                      <input type="text" name="question" class="form-control" value="<?php echo $question ?>">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Изменить вариант ответа-1</label>
                      <input type="text" name="opt1" class="form-control" value="<?php echo $opt1 ?>">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Изменить вариант ответа-2</label>
                      <input type="text" name="opt2" class="form-control" value="<?php echo $opt2 ?>">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Изменить вариант ответа-3</label>
                      <input type="text" name="opt3" class="form-control" value="<?php echo $opt3 ?>">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Изменить вариант ответа-4</label>
                      <input type="text" name="opt4" class="form-control" value="<?php echo $opt4 ?>">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Изменить правильный ответ</label>
                      <input type="text" name="answer" class="form-control" value="<?php echo $answer ?>">
                    </div>
                    <div class="form-group">
                      <input type="submit" name="submit1" value="Обновить" class="btn btn-success">
                    </div>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST["submit1"])) {
  mysqli_query($link, "update questions set question='$_POST[question]',opt1='$_POST[opt1]',opt2='$_POST[opt2]',opt3='$_POST[opt3]',opt4='$_POST[opt4]',answer='$_POST[answer]' where id = $id ");

?>
  <script>
    window.location = "add_edit_questions.php?id=<?php echo $id1; ?>";
  </script>
<?php

}
?>

<?php
include 'footer.php';
?>