<?php
$host = 'localhost'; // адрес сервера 
$database = 'plan'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль
$connection = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($connection));
$date_today = date("d.m.y");
$query_date = "SELECT date.id, date.fio, date.target_id, date.id_descr, date.rucovoditel_id, target.target, description.description, date.time_input, date.time_close, status.status FROM date, description, target, status WHERE date.id_descr = description.id  AND DATE(date.date) ='$date_today' AND date.target_id = target.id  AND date.target_status = status.id";
$result_date = mysqli_query($connection, $query_date);
while($row_date = mysqli_fetch_array($result_date)) { 
$id = $row_date['id'];
$users_fios = $row_date['fio']; 
$target = $row_date['target']; 
$description = $row_date['description'];
$time_input = $row_date['time_input'];
$time_close = $row_date['time_close'];
$status_target = $row_date['status'];
// $target_id = $row_date['target_id'];
$descr_id = $row_date['descr_id'];
$rucovoditel_id = $row_date['rucovoditel_id'];
echo $target;
}
$query_ruc = "SELECT * FROM target";
$result_ruc = mysqli_query($connection, $query_ruc);
while ($row_ruc = mysqli_fetch_array($result_ruc)) { 
     /*Добавление данных в переменные*/
$ruc_id = $row_ruc['id'];
$ruc = $row_ruc['target'];
}
?>