<?php include('assests/sql/sql.php');
if(!empty($_POST['updatefio'])  && !empty($_POST['updatetimeInput']) && !empty($_POST['updatetimeClose']))
{
    echo $_POST['targetid'];
    echo $_POST['descrid'];
//    $hidden = $_POST['hidden'];
   $hiddentargetcopy = $_POST['descrid'];
//    $updatefio = $_POST['updatefio'];
//    $descrid = $_POST['descrid'];
//    $updatetarget = $_POST['updatetarget'];
//    $updatedescription = $_POST['updatedescription'];
//    $updatetime_input = $_POST['updatetimeInput'];
//    $updatetime_close = $_POST['updatetimeClose'];
//    $updaterucovoditel = $_POST['updateruc'];
//    $updateselect = $_POST['updateselect'];
   echo $updateid;
   
   $query_target = "UPDATE target SET `target` = '$_POST[updatetarget]' WHERE `id` = '$_POST[targetid]'";
   $result_target = mysqli_query($connection, $query_target);
   $query_descr = "UPDATE description SET `description` = '$_POST[updatedescription]' WHERE `id` = '$_POST[descrid]'";
   $result_descr = mysqli_query($connection, $query_descr);
   $query_update ="UPDATE date SET `target_status`='$_POST[updateselect]', `time_input` = '$_POST[updatetimeInput]', `time_close`='$_POST[updatetimeClose]'  WHERE `id`= '$_POST[hidden]'";
   $result_update = mysqli_query($connection, $query_update);

   

   echo "Должны были данные обновиться!";
}
else {
}
// $date_nach = $_POST['date_nach'];
// $date_close = $_POST['date_close'];
// $sql_date = "INSERT INTO `datetime` (`date_nach`, `date_close`) VALUES ('$date_nach','$date_close')";
// if (mysqli_query($connection, $sql_date)) {
// // echo json_encode(["status" => true]);
// } else {
// // return json_encode(["status" => false, "message" => "Ошибка при добавлении описания:"]);
// }
?>