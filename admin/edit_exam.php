<?php
session_start();
if (!isset($_SESSION["admin"])) {
?>
  <script>
    window.location = "index.php";
  </script>
<?php
}
include('header.php');
include "../connection.php";


$id = $_GET["id"];
$res = mysqli_query($link, "select * from exam_category where id=$id");
while ($row = mysqli_fetch_array($res)) {
  $exam_time = $row["exam_time"];
}
?>
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Edit Exam</h1>
      </div>
    </div>
  </div>
</div>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <form action="" name="form1" method="post">
            <div class="card-body">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header"><strong>Edit Exam</strong></div>
                  <div class="card-body card-block">
                    <div class="form-group">
                      <label class=" form-control-label">Exam Time</label>
                      <input type="text" name="examtime" placeholder="Exam Time" class="form-control" value="<?php echo $exam_time; ?>">
                    </div>

                    <div class="form-group">
                      <input type="submit" name="submit1" value="Update Exam" class="btn btn-success">
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </form>


        </div>
      </div>
    </div>
  </div>
</div>
<?php
if (isset($_POST["submit1"])) {

  mysqli_query($link, "update exam_category set exam_time='$_POST[examtime]' where id=$id ") or die(mysqli_error($link));
?>
  <script>
    window.location = "exam_category.php";
  </script>
<?php
}
?>

<?php
include 'footer.php';
?>