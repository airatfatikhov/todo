<?php include('assests/sql/sql.php');
if(isset($_POST['hiddenid']))
$id = $_GET['id'];
$query_delete = "DELETE FROM date WHERE id = '$_POST[hiddenid]'";
$result_delete = mysqli_query($connection, $query_delete);

// if(isset($_GET['target_id']))
// $target_id = $_GET['target_id'];
// $query_target = "DELETE FROM target WHERE id = '$_GET[targetid]'";
// $result_delete = mysqli_query($connection, $query_target);
// mysqli_close($connection);
?>