<?php
require_once "header.php";
?>
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Добавить тему теста</h1>
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
              <div class="col-lg-5">
                  <div class="card-body card-block">
                    <div class="form-group">
                      <input type="text" name="examname" placeholder="Добавить тему" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="text" name="examtime" placeholder="Добавить время (минуты)" class="form-control">
                    </div>

                    <div class="form-group">
                      <input type="submit" name="submit1" value="Добавить Тест" class="btn btn-success">
                    </div>

                  </div>
              </div>
              <div class="col-lg-7">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Название</th>
                          <th scope="col">Время</th>
                          <th scope="col">Изменить время</th>
                          <th scope="col">Удалить</th>
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
                            <td><a href="edit_exam.php?id=<?php echo $row["id"]; ?>">Изменить</a></td>
                            <td><a href="delete_category.php?id=<?php echo $row["id"]; ?>">Удалить</a></td>
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
          </form>


        </div>
      </div>
    </div>
  </div>
</div>
<?php
if (isset($_POST["submit1"])) {

  mysqli_query($link, "insert into exam_category values(NULL,'$_POST[examname]','$_POST[examtime]')") or die(mysqli_error($link));
?>
  <script>
    window.location.href = window.location.href;
  </script>
<?php
}
?>

<?php
include 'footer.php';
?>