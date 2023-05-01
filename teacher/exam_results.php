<?php
require_once "header.php";
?>
<script>
  window.addEventListener('DOMContentLoaded', function() {
    let searchInput = document.getElementById('search-input');
    searchInput.addEventListener('td', function() {
      let search = searchInput.value.toLowerCase();
      let searchItems = document.querySelectorAll('.search-item');
      searchItems.forEach(function(item) {
        if (item.value.toLowerCase().indexOf(search) >= 0) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
</script>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

  <div class="col-lg-8 col-lg-push-2" style="min-height: 500px; background-color: white;border: 1px solid;">

    <h1 style='text-align:center; padding-bottom:50px;'>Результаты тестов</h1>

    <div class="col-md-6">
      <h2 class="center">Export</h2>

      <div class="form-group select">
        <form method="post" action="excel.php">
          <select name="groups" id="pet-select">
            <option value="">Все</option>
            <option value="ПО-42">ПО-42</option>
            <option value="ПО-32">ПО-32</option>
            <option value="ПО-22">ПО-22</option>
            <option value="ПО-12">ПО-12</option>
          </select>
          <button type="button" id="search-btn" class="btn btn-primary">Найти</button>
          <input type="submit" name="export_btn" class="btn btn-success" value="Export XLS">
          <input type="submit" name="export_csv" class="btn btn-success" value="Export CSV">
        </form>
      </div>
    </div>
    <div id="user-list">
      <?php require_once "load-users.php";; ?>
    </div>
  </div>

</div>

</div>

<script>
  // Обработчик клика на кнопку поиска
  document.getElementById("search-btn").addEventListener("click", function() {
    // Получаем выбранное значение в селекте
    let group = document.getElementById("pet-select").value;

    // Создаем объект XMLHttpRequest
    let xhr = new XMLHttpRequest();

    // Настраиваем его для отправки запроса
    xhr.open("POST", "load-users.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Отправляем запрос и передаем выбранное значение селекта
    xhr.send("groups=" + group);

    // Обработчик ответа сервера
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Выводим ответ сервера в блок с ID "user-list"
        document.getElementById("user-list").innerHTML = xhr.responseText;
      }
    };
  });
</script>
<?php
include "footer.php";
?>