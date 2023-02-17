<?php
session_start();
include "../connection.php";
$total_que = 0;
$resl = mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]' ");
$total_que = mysqli_num_rows($resl);
echo $total_que;
