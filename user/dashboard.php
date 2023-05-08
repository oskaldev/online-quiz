<?php
require_once "header.php";
?>
<!-- Mobile Menu start -->
<!-- Mobile Menu end -->

<section class="test">
  <div class="container">
    <div class="col-lg-12 col-lg-push-3" style="min-height: 500px; background-color: white;">
      <div>
        <div class="test-wrapper__time">
          <div>
            <div id="current_que" style="float:left">0</div>
            <div style="float:left">/</div>
            <div id="total_que" style="float:left">0</div>
          </div>
          <div id="timer" class="timer"></div>
        </div>
        <div class="row" style="margin-top:30px;">
          <div class="row">
            <div class="col-lg-10 col-lg-push-1" style="min-height: 300px; " id="load_questions">
            </div>
          </div>
        </div>
        <div class="row" style="margin-top:10px;">
          <div class="col-lg-12 col-lg-push-3" style="min-height: 50px;">
            <div class="col-lg-12 text-center">
              <input type="button" value="Previous" class="btn btn-warning" onclick="load_previous();">&nbsp;
              <input type="button" value="Next" class="btn btn-success" onclick="load_next();">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  async function load_total_que() {
    try {
      const response = await fetch("../forajax/load_total_que.php");

      if (response.ok) {
        const totalQue = await response.text();
        document.getElementById("total_que").innerHTML = totalQue;
      }
    } catch (error) {
      console.error('Error:', error);
    }
  }

  let questionno = "1";
  load_questions(questionno);

  async function load_questions(questionno) {
    document.getElementById("current_que").innerHTML = questionno;
    try {
      const response = await fetch("../forajax/load_questions.php?questionno=" + questionno);

      if (response.ok) {
        const responseData = await response.text();

        if (responseData === "over") {
          window.location = "result.php";
        } else {
          document.getElementById("load_questions").innerHTML = responseData;
          await load_total_que();
        }
      }
    } catch (error) {
      console.error('Error:', error);
    }
  }

  async function radioclick(radiovalue, questionno) {
    try {
      await fetch("../forajax/save_answer_in_session.php?questionno=" + questionno + "&value1=" + radiovalue);
    } catch (error) {
      console.error('Error:', error);
    }
  }

  function load_previous() {
    if (questionno == "1") {
      load_questions(questionno);
    } else {
      questionno = eval(questionno) - 1;
      load_questions(questionno);
    }
  }

  function load_next() {
    questionno = eval(questionno) + 1;
    load_questions(questionno);
  }
</script>


<script>
  setInterval(function() {
    timer();
  }, 1000);
  async function timer() {
    try {
      const response = await fetch("../forajax/load_timer.php");
      if (response.ok) {
        const timerValue = await response.text();
        if (timerValue === "00:00:01") {
          window.location = "result.php";
        }
        document.getElementById("timer").innerHTML = timerValue;
      }
    } catch (error) {
      console.error('Error:', error);
    }
  };
</script>


<?php
include "footer.php";
?>