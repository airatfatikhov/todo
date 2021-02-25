<?php session_start();
include('assests/sql/sql.php');  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mounth</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assests/css/mane.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div id="loader" class="loader">
           <img src="assests/img/spinner.gif" alt="">Данные загружаются, подождите пожалуйста
		   </div>
<?php
$var_name = $_SESSION['varname'];
$date_mounth = date("y.m.d"); //присвоено 03.12.01
			 $mounth[1] = date("H:i:s"); //присвоит 1 элементу массива 17:16:17
       echo("Вы видите свой план за месяц" . '</br>'); 
       echo "Здесь задачи, которые выполнены"; ?>

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
     /*Добавление данных в переменные*/
$ids = $row['target'];
}
?>
<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th scope="col">Список задач:</th>
      <th scope="col">ФИО:</th>
      <th scope="col">Задача:</th>
      <th scope="col">Описание задачи:</th>
      <th scope="col">Время начала:</th>
      <th scope="col">Время окончания:</th>
      <th scope="col">Статус задачи:</th>
      <th scope="col">Руководитель:</th>
    </tr>
  </thead>
  <?php
  $i=0;
  $query_date = "SELECT date.id, date.fio, date.target_id, date.id_descr, date.rucovoditel_id, target.target, description.description, date.time_input, date.time_close, status.status FROM date, description, target, status WHERE date.id_descr = description.id 
  AND date.fio='$var_name' AND date.target_id = target.id AND date.date >= ( NOW() - INTERVAL 30 DAY) AND date.target_status = status.id AND status.id='3'";
$result_date = mysqli_query($connection, $query_date);
while($row_date = mysqli_fetch_array($result_date)) { 
     /*Добавление данных в переменные*/
$id = $row_date['id'];
$users_fio = $row_date['fio']; 
$target = $row_date['target']; 
$description = $row_date['description'];
$time_input = $row_date['time_input'];
$time_close = $row_date['time_close'];
$status_target = $row_date['status'];
$target_id = $row_date['target_id'];
$descr_id = $row_date['descr_id'];
$rucovoditel_id = $row_date['rucovoditel_id'];
$_SESSION['fio'] = $users_fio;
       ?>
       <tbody>
    <tr>
      <th scope="row"><?php echo  $i++; ?></th>
      <td><?php echo  $users_fio; ?></td>
      <td><?php  echo $target; ?></td>
      <td><?php  echo $description; ?></td>
      <td><?php  echo $time_input; ?></td>
      <td><?php  echo $time_close; ?></td>
      <td class='btn-success'><?php  echo $status_target; ?></td>
      <td><?php  echo $ruc; ?></td>
      
    </tr>
    <?php
    $result = strtotime($time_close) - strtotime($time_input);
    $hours = intval($result/3600);
    $minuts = $result - ($hours*3600);
    $minuts = intval($minuts/60);
    $sum =$sum + $hours;
    $min = $min + $minuts;
}
?>
</tbody>
</table>
<form action="excel.php" method="POST">
<div class="container center-block">
    <div class="row">
    <button  class="btn btn-success col-xs-12 col-sm-6 col-md-6 exports" name="exports">Скачать план за месяц</button>
    </div>
</div>
</form>

<!-- Блок со временем и минутами -->
<div>
  <p>
    <!-- Пустой блок -->
  </p>
</div>
<div class="container">
  <div class="row">
    <table class="table table-bordered">
    <thead class="thead-light">
       <th>
          Проработанные часы за месяц
       </th>
       <th>
          Проработанные минуты за месяц
       </th>
    </thead>
     <tbody>
       <tr>
          <th>
            <?php  echo  $sum."ч."; ?>
          </th>
          <th>
            <?php  echo $min."мин"; ?>
          </th>
       </tr>
     </tbody>
    </table>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="assests/src/mounth.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<!-- <script src="assests/src/excel.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>