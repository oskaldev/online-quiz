<?php
require_once "header.php";
?>
<?php
if (isset($_POST["submit1"])) {
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $count = 0;
  $res = mysqli_query($link, "select * from teachers where username='$_POST[username]' ") or die(mysqli_error($link));
  $count = mysqli_num_rows($res);

  if ($count > 0) {
    $error_message = '
    <div class="alert alert-danger" id="failure" style="margin-top: 10px;">
    <strong>Учитель с таким никнеймом уже существует</strong>
    </div>
    ';
  } else {
    mysqli_query($link, "insert into teachers values(NULL, '$_POST[username]','$password', '$_POST[groups]')") or die(mysqli_error($link));
    $success_message = '
      <div class="alert alert-success" id="success" style="margin-top:10px">
              <strong>Успех!</strong> Учитель успешно добавлен !
      </div>
    ';
  }
}
?>
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Добавить учителя</h1>
      </div>
    </div>
  </div>
</div>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div>
            <div class="card-body">
              <div class="col-lg-5">
                <div class="card">
                  <div class="card-header"><strong>Добавить учителя </strong></div>
                  <div class="card-body card-block">
                    <div class="form-group">
                      <form name="form1" method="post" class="form1">
                        <div class="form-group">
                          <input type="text" name="username" class="form-control" title="Придумайте никнейм" placeholder="Никнейм" maxlength="50" required>
                        </div>
                        <div class="form-group">
                          <input type="password" name="password" class="form-control" title="Придумайте пароль" placeholder="Пароль" maxlength="100" required>
                        </div>
                        <!-- <div class="form-group select">
                          <select name="groups" id="pet-select" required>
                            <option value="">Пожалуйста выберете группу</option>
                            <option value="ПО-42">ПО-42</option>
                            <option value="ПО-32">ПО-32</option>
                            <option value="ПО-22">ПО-22</option>
                            <option value="ПО-12">ПО-12</option>
                          </select>
                        </div> -->
                        <div class="form-group">
                          <button type="submit" name="submit1" class="btn btn-success">Добавить учителя</button>
                        </div>
                        <?php echo $error_message; ?>
                        <?php echo $success_message; ?>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-7">
                <div class="card">
                  <div class="card-header">
                    <strong class="card-title">Список учителей</strong>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Никнейм</th>
                          <th scope="col">Удалить</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $count = 0;
                        $res = mysqli_query($link, "select * from teachers");
                        while ($row = mysqli_fetch_array($res)) {
                          $count = $count + 1;
                        ?>
                          <tr>
                            <th scope="row"><?php echo $count ?></th>
                            <td><?php echo $row["username"]; ?></td>
                            <td><a href="delete_teachers.php?id=<?php echo $row["id"]; ?>">Удалить</a></td>
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
      </div>
    </div>
  </div>
</div>



<?php
include 'footer.php';
?>