<?php 
$date_nach = $_POST['date_nach'];
$date_close = $_POST['date_close'];
$sql_date = "INSERT INTO `datetime` (`date_nach`, `date_close`) VALUES ('$date_nach','$date_close')";
if (mysqli_query($connection, $sql_date)) {
// echo json_encode(["status" => true]);
} else {
// return json_encode(["status" => false, "message" => "Ошибка при добавлении описания:"]);
}


?>