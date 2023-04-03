<?php
require_once "header.php";


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
              <form name="form1" action="" method="post" enctype="multipart/form-data">
                <div class="card">
                  <div class="card-header"><strong>Обновить вопросы</strong></div>
                  <div class="card-body card-block">
                    <div class="form-group">
                      <img src="<?php echo $question ?>" height="150" width="150"> <br>
                      <label class=" form-control-label">Изменить вопрос</label>
                      <input type="file" name="iquestion" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Изменить вариант ответа-1</label>
                      <input type="text" name="iopt1" class="form-control" value="<?php echo $opt1 ?>">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Изменить вариант ответа-2</label>
                      <input type="text" name="iopt2" class="form-control" value="<?php echo $opt2 ?>">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Изменить вариант ответа-3</label>
                      <input type="text" name="iopt3" class="form-control" value="<?php echo $opt3 ?>">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Изменить вариант ответа-4</label>
                      <input type="text" name="iopt4" class="form-control" value="<?php echo $opt4 ?>">
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Изменить правильный ответ</label>
                      <input type="text" name="ianswer" class="form-control" value="<?php echo $answer ?>">
                    </div>
                    <div class="form-group">
                      <input type="submit" name="submit3" value="Обновить" class="btn btn-success">
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
if (isset($_POST["submit3"])) {
  $question = $_FILES["iquestion"]["name"];

  if ($question != "") {
    $dst1 = "./opt_images/" . $question;
    $dst_db1 = "opt_images/" . $question;
    move_uploaded_file($_FILES["iquestion"]["tmp_name"], $dst1);
    mysqli_query($link, "update questions set question='$dst_db1', opt1='$_POST[iopt1]',opt2='$_POST[iopt2]',opt3='$_POST[iopt3]',opt4='$_POST[iopt4]',answer='$_POST[ianswer]' where id = $id ") or die(mysqli_error($link));
  }

  mysqli_query($link, "update questions set opt1='$_POST[iopt1]',opt2='$_POST[iopt2]',opt3='$_POST[iopt3]',opt4='$_POST[iopt4]',answer='$_POST[ianswer]' where id = $id ") or die(mysqli_error($link));

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