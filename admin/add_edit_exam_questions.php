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
?>
<div class="breadcrumbs">
  <div class="col-sm-12">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Выберете категорию экзамена и добавьте вопросы</h1>
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
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Exam Name</th>
                  <th scope="col">Exam Time</th>
                  <th scope="col">Выбрать</th>

                </tr>
              </thead>
              <tbody>

                <?php
                $count = 0;
                $res = mysqli_query($link, "select * from exam_category");
                while ($row = mysqli_fetch_array($res)) {
                  $count = $count + 1;
                ?>
                  <tr>
                    <th scope="row"><?php echo $count ?></th>
                    <td><?php echo $row["category"]; ?></td>
                    <td><?php echo $row["exam_time"]; ?></td>
                    <td><a href="add_edit_questions.php?id=<?php echo $row["id"]; ?>">Выбрать</a></td>

                  </tr>
                <?php
                }

                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include 'footer.php';
?>