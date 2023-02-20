<?php
session_start();
if (!isset($_SESSION["username"])) {
?>
  <script>
    window.location = "login.php";
  </script>
<?php
}
include "header.php";
?>


<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

  <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">

    <br>
    <div class="row">
      <br>
      <div class="col-lg-2 col-lg-push-10">
        <div id="current_que" style="float:left">0</div>
        <div style="float:left">/</div>
        <div id="total_que" style="float:left">0</div>
      </div>

      <div class="row" style="margin-top:30px;">
        <div class="row">
          <div class="col-lg-10 col-lg-push-1" style="min-height: 300px; background: white;" id="load_questions">
          </div>
        </div>
      </div>

      <div class="row" style="margin-top:10px;">
        <div class="col-lg-6 col-lg-push-3" style="min-height: 50px;">
          <div class="col-lg-12 text-center">
            <input type="button" value="Previous" class="btn btn-warning" onclick="load_previous();">&nbsp;
            <input type="button" value="Next" class="btn btn-success" onclick="load_next();">
          </div>
        </div>
      </div>

    </div>

  </div>

</div>

<script>
  function load_total_que() {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("total_que").innerHTML = xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET", "forajax/load_total_que.php", true);
    xmlhttp.send(null);
  }



  let questionno = "1";
  load_questions(questionno);

  function load_questions(questionno) {
    document.getElementById("current_que").innerHTML = questionno;
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        if (xmlhttp.responseText == "over") {
          window.location = "result.php";
        } else {
          document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
          load_total_que();
        }
      }
    };
    xmlhttp.open("GET", "forajax/load_questions.php?questionno=" + questionno, true);
    xmlhttp.send(null);
  }

  function radioclick(radiovalue, questionno) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

      }
    };
    xmlhttp.open("GET", "forajax/save_answer_in_session.php?questionno=" + questionno + "&value1=" + radiovalue, true);
    xmlhttp.send(null);
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

  function timer() {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        if (xmlhttp.responseText == "00:00:01") {
          window.location = "result.php";
        }
        document.getElementById("timer").innerHTML = xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET", "forajax/load_timer.php", true);
    xmlhttp.send(null);
  };
</script>

<?php
include "footer.php";
?>