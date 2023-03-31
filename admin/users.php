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
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Список пользователей</h1>
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

            <?php
            $count = 0;
            $res = mysqli_query($link, "select * from registration  order by id desc ");
            $count = mysqli_num_rows($res);

            if ($count == 0) {
            ?>
              <center>
                <h1> Список пользователей на данный момент пуст</h1>
              </center>
            <?php
            } else {
              echo "<table class='table table-bordered'>";
              echo "<tr style='background-color: #006df0;border: 1px solid; color:white;'>  ";

              echo "<th>";
              echo "никнейм";
              echo "</th>";

              echo "<th>";
              echo "имя";
              echo "</th>";

              echo "<th>";
              echo "фамилия";
              echo "</th>";

              echo "<th>";
              echo "почта";
              echo "</th>";

              echo "<th>";
              echo "";
              echo "</th>";
              echo "</tr>";

              while ($row = mysqli_fetch_array($res)) {

                echo "<tr>";

                echo "<td>";
                echo $row["username"];
                echo "</td>";

                echo "<td>";
                echo $row["firstname"];
                echo "</td>";

                echo "<td>";
                echo $row["lastname"];
                echo "</td>";

                echo "<td>";
                echo $row["email"];
                echo "</td>";

                echo "<td>";
                echo "<a href=delete_users.php?id=".$row["id"]."&amp;action=delete>";
                echo "удалить";
                echo "</a>";
                echo "</td>";

                echo "</tr>";
              }
              echo "</table>";
            }

            ?>
            <td></td>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include 'footer.php';
?>