<?php
require_once "header.php";
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
require_once "add_edit_questions_submit.php";
require_once 'footer.php';
?>