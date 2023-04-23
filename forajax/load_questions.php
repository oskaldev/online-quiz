<?php
session_start();
include "../connection.php";

$question_no = "";
$question = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$answer = "";
$count = 0;
$ans = "";

$queno = $_GET["questionno"];

if (isset($_SESSION["answer"][$queno])) {
  $ans = $_SESSION["answer"][$queno];
}

$res = mysqli_query($link, "SELECT * FROM questions WHERE category='{$_SESSION['exam_category']}' AND question_no={$_GET['questionno']}");
$count = mysqli_num_rows($res);

if ($count == 0) {
  echo "over";
} else {
  while ($row = mysqli_fetch_array($res)) {
    $question_no = $row["question_no"];
    $question = $row["question"];
    $opt1 = $row["opt1"];
    $opt2 = $row["opt2"];
    $opt3 = $row["opt3"];
    $opt4 = $row["opt4"];
  }
?>
  <br>
  <table>
    <tr>
      <td style="font-weight:bold; font-size:18px; padding-left:5px" colspan="2">
        <?php if (strpos($question, 'assets/opt_images/') !== false) { ?>
          <img src="../admin/<?php echo $question; ?>" height="50" width="50">
        <?php } else { ?>
          <?php echo "(" . $question_no . ") " . $question; ?>
        <?php } ?>
      </td>
    </tr>
  </table>

  <table>
    <?php if (empty($opt1)) { ?>
      <input type="text" name="answer" value="<?php echo $ans; ?>" oninput="radioclick(this.value.toLowerCase(), <?php echo $question_no; ?>)">
    <?php } else { ?>
      <table>
        <?php for ($i = 1; $i <= 4; $i++) { ?>
          <tr>
            <td>
              <input type="radio" name="r1" id="r1_<?php echo $i; ?>" value="<?php echo ${"opt{$i}"}; ?>" onclick="radioclick(this.value, <?php echo $question_no; ?>)" <?php echo (strtolower($ans) == strtolower(${"opt{$i}"})) ? "checked" : ""; ?>>
            </td>
            <td style="padding-left: 10px">
              <?php if (strpos(${"opt{$i}"}, 'assets/opt_images/') !== false) { ?>
                <img src="../admin/<?php echo ${"opt{$i}"}; ?>" height="50" width="50">
              <?php } else { ?>
                <?php echo ${"opt{$i}"}; ?>
              <?php } ?>
            </td>
          </tr>
        <?php } ?>
      </table>
    <?php } ?>
  </table>

<?php } ?>