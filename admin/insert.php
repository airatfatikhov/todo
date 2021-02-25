<? include('assests/sql/sql.php');  ?>
<?php
if(!empty($_POST['fio']) && !empty($_POST['mail']) && !empty($_POST['target']) && !empty($_POST['description']) && !empty($_POST['timeInput']) && !empty($_POST['timeClose']))
{
   $status = 1;
   $fio = $_POST['fio'];
   $email = $_POST['mail'];
   $target = $_POST['target'];
   $description = $_POST['description'];
   $time_input = $_POST['timeInput'];
   $time_close = $_POST['timeClose'];
   $rucovoditel = $_POST['ruc'];
   $select = $_POST['select'];
   $dateNach = $_POST['dateNach'];
   $dateClose = $_POST['dateClose'];
  // // экранирования символов для mysql
  // $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
  // $company = htmlentities(mysqli_real_escape_string($link, $_POST['company']));

  $sql_target = "INSERT INTO `target` (`target`) VALUES ('$target')";
  if (!mysqli_query($connection, $sql_target)) {
    return json_encode(["status" => false]);
} 

$sql_datetime = "INSERT INTO `datetime` (`date_nach`, `date_close`) VALUES ('$dateNach','$dateClose')";
  if (!mysqli_query($connection, $sql_datetime)) {
    return json_encode(["status" => false]);
} 

$query_datetime = "SELECT * FROM `datetime`";
  $result_datetime = mysqli_query($connection, $query_datetime)
    or die('Error querying database.');

  while ($row_datetime = mysqli_fetch_array($result_datetime)){
    $id_datetime = $row_datetime['id'];
  } 


  $query_target = "SELECT * FROM `target`";
  $result = mysqli_query($connection, $query_target)
    or die('Error querying database.');

  while ($row = mysqli_fetch_array($result)){
    $id_target = $row['id'];
    $target = $row['target'];
  } 

  $sql_description= "INSERT INTO `description` (`description`) VALUES ('$description')";
  $query_description = "SELECT * FROM `description`";
  if (!mysqli_query($connection, $sql_description)) {
    return json_encode(["status" => false]);
  }
  $result_description = mysqli_query($connection, $query_description)
    or die('Error querying database.');

  while ($row_descr = mysqli_fetch_array($result_description)){
    $id_descr = $row_descr['id'];
    $description = $row_descr['description'];
  } 

  $sql_ruc = "INSERT INTO `nach` (`rucovoditel`) VALUES ('$rucovoditel')";
  $query_ruc = "SELECT * FROM `nach`";
  if (!mysqli_query($connection, $sql_ruc)) {
    return json_encode(["status" => false]);
  } 
  $result_ruc = mysqli_query($connection, $query_ruc)
    or die('В базу Руководителя не дошли данные');

  while ($row_ruc = mysqli_fetch_array($result_ruc)){
    $id_ruc = $row_ruc['id'];
    $ruc = $row_ruc['rucovoditel'];
  } 
  $sql = "INSERT INTO `date` (`fio`, `email`, `target_id`, `id_descr`, `time_input`, `time_close`, `rucovoditel_id`, `date`, `status`, `target_status`, `id_datetime`) VALUES ('$fio','$email', '$id_target', '$id_descr', '$time_input', '$time_close', '$id_ruc', NOW(), '$status', '$select','$id_datetime')";
  if (mysqli_query($connection, $sql)) {
  echo json_encode(["status" => true]);
} else {
  return json_encode(["status" => false, "message" => "Ошибка при добавлении описания:"]);
}
  mysqli_close($connection);
}

else {
  return json_encode(["status" => false, "message" => "Вы не заполнили некоторые поля, проверьте!"]);
}
?> 

