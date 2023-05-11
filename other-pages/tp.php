<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="assets/logo/logo.png">
  <meta name="description" content="Тех поддержка">
  <title>ТП РКРИПТ</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="global.css">
  <link rel="stylesheet" href="css/tp.css">
</head>

<body>
  <section class="forma">
    <div class="container">
      <!-- <form action=""></form> -->
      <div class="form-at">
        <div class="validate-input-at" data-validate="Обязательное поле">
          <input class="input-at" type="text" name="name-at" placeholder="Ваше имя" />
          <span class="focus-input-at"></span>
        </div>
        <div class="validate-input-at" data-validate="Обязательное поле">
          <input class="input-at" type="text" name="email-at" placeholder="Ваш телефон или email" />
          <span class="focus-input-at"></span>
        </div>
        <div class="validate-input-at" data-validate="Обязательное поле">
          <textarea class="input-at" name="message-at" placeholder="Ваш вопрос"></textarea>
          <span class="focus-input-at"></span>
        </div>
        <input checked="checked" class="input-at" id="checkbox-at" type="checkbox" name="checkbox-at" onchange="document.getElementById('submit-at').disabled = !this.checked;" />
        <label for="checkbox-at">
          Настоящим подтверждаю, что я ознакомлен и согласен с <a href="#rules">пользовательским соглашением</a>
        </label>
        <input type="hidden" name="subject-at" value="Тема формы">
        <button id="submit-at" class="form-at-btn">Отправить</button>
      </div>
      <div class="result-at"></div>
    </div>
  </section>


</body>

</html>