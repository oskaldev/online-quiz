<?php
require_once "header.php";
$date = date('Y-m-d H:i:s');
$_SESSION["end_time"] = date('Y-m-d H:i:s', strtotime($date . " + $_SESSION[exam_time] minutes"));
?>


<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
  <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
    <?php
    $correct = 0;
    $wrong = 0;
    if (isset($_SESSION["answer"])) {
      for ($i = 0; $i <= sizeof($_SESSION["answer"]); $i++) {
        $answer = "";
        $res = mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]' && question_no=$i ");

        while ($row = mysqli_fetch_array($res)) {
          $answer = $row['answer'];
        }
        if (isset($_SESSION["answer"][$i])) {
          if ($answer == $_SESSION["answer"][$i]) {
            $correct = $correct + 1;
          } else {
            $wrong = $wrong + 1;
          }
        } else {
          $wrong = $wrong + 1;
        }
      }
    }

    $count = 0;
    $res = mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]'");
    $count = mysqli_num_rows($res);
    $wrong = $count - $correct;
    $estimation = $correct / $count * 100;
    echo "<br>";
    echo "<br>";
    echo "<center>";
    echo "Всего вопросов =" . $count;
    echo "<br>";
    echo "Правильных ответов =" . $correct;
    echo "<br>";
    echo "Не правильных ответов =" . $wrong;
    echo "<br>";
    echo "Баллы =" . $estimation;
    echo "</center>";
    echo "Баллы считаются по 100 бальной шкале ,где ниже 69баллов оценка - 2, 70-79баллов оценка - 3,80-89баллов оценка - 4, 90-100баллов оценка - 5";
    ?>

  </div>

</div>


<?php
if (isset($_SESSION["exam_start"])) {
  $date = date("Y-m-d");
  mysqli_query($link, "insert into exam_results (id, username, exam_type, total_question, correct_answer, wrong_answer, exam_time, estimation) values(NULL, '$_SESSION[username]','$_SESSION[exam_category]','$count','$correct','$wrong','$date', '$estimation') ") or die(mysqli_error($link));
}

if (isset($_SESSION["exam_start"])) {
  unset($_SESSION["exam_start"]);

?>
  <script>
    window.location.href = window.location.href;
  </script>
<?php



}
?>

<?php
include "footer.php";
?>