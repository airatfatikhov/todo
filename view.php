<? session_start();
include('assests/sql/sql.php'); 
$var_name = $_SESSION['varname'];
$date_today = date("d.m.y"); //присвоено 03.12.01
			 $today[1] = date("H:i:s"); //присвоит 1 элементу массива 17:16:17
       echo("Вы видите сегодняшний план на день" ." ".$date_today);
 ?>
 

<?php
$query_ruc = "SELECT * FROM date, nach WHERE date.rucovoditel_id = nach.id";
$result_ruc = mysqli_query($connection, $query_ruc);
while ($row_ruc = mysqli_fetch_array($result_ruc)) { 
     /*Добавление данных в переменные*/
$ruc_id = $row_ruc['id'];
$ruc = $row_ruc['rucovoditel'];
}

$query_target = "SELECT * FROM date, target WHERE date.target_id = target.id";
$result_target= mysqli_query($connection, $query_target);
while ($row = mysqli_fetch_array($result_target)) { 
$ids = $row['target'];
}
?>
<?php include('view/date_view.php'); 
//  include('function/sum.php');
?>

<?php include('modal/modal_edit.php'); ?>

<?php include('now/now.php'); ?>
<?php include('result/result.php'); ?>

<?php 
include('update.php');
include('delete.php');


mysqli_close($connection); ?>
