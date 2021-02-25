<?php session_start();
include('assests/ldap/ldap.php');
$var_name = $_SESSION['varname'];
$var_ruc = $_SESSION['varruc'];
$userName = $_SESSION['userName'];
$otdel = $_SESSION['otdel'];
$password = $_SESSION['password'];
$email = $_SESSION['mail'];
$fio = $_POST['fio'];
$tabel = $_SESSION['managerid'];
$doljnoct = $_SESSION['title'];


//date
$morning = "Доброе утро!";
$day = "Добрый день!";
$evening = "Добрый вечер!";
$night = "Доброй ночи!";

$minyt = date("i");
$chasov = date("H");
if($chasov >= 04) {$hello = $morning;}
if($chasov >= 10) {$hello = $day;}
if($chasov >= 16) {$hello = $evening;}
if($chasov >= 22 or $chasov < 04) {$hello = $night;}

$manager = str_replace('CN=','',strstr($var_ruc,',',true));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assests/css/mane.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>ToDo</title>

</head>
<body>
	<?php include('visit.php'); ?>
	<div style="float: left;"><a href="index.php"><img align="left" src="assests/img/logo_f.png" width="50" height="50" ></a></div>
	<div style="float: left; text-align: center; height: 50px; line-height: 50px;"><font size="3" face="Tahoma, Geneva, sans-serif"><FONT color="black" face="Tahoma, Geneva, sans-serif" size="4">Портал составления плана на день</FONT></font></div>
	<div style="float: right;">
	<b>
	<?php echo "$hello", " ", $var_name; ?>
	</b>
	 <?php 
		  echo "<img class='demo-basic-icon' src='assests/img/user.png' style='vertical-align:middle' width='50' height='50' title='".$var_name."'>";
		  ?></div>
	<div style="clear: both;"></div>
	<div class="hr"></div>
	<div>      
		<!-- Модальное окно -->
 <?php 
	 include('modal/modal.php');
	 ?>
	 <div class="container center-block">
    <div class="row">
    <a href="mounth.php" class="btn btn-danger  col-xs-12 col-sm-6 col-md-6" role="button" aria-pressed="true">Ежемесячный отчет</a>
    </div>
</div>
<div class="container center-block">
    <div class="row">
    <a href="communicate/internet.php" class="btn btn-warning  col-xs-12 col-sm-6 col-md-6" role="button" aria-pressed="true">Замечания</a>
    </div>
</div>

<div class="container center-block">
    <div class="row">
    <a href="#" class="btn btn-info  col-xs-12 col-sm-6 col-md-6" role="button" aria-pressed="true">Список всех задач</a>
    </div>
</div>
	 <div id="loader" class="loader">
           <img src="assests/img/spinner.gif" alt="">Данные загружаются, подождите пожалуйста
		   </div>
		<div id="table">
			 <?php include('view.php'); 
			 ?> 
		</div>



    <!-- Source Scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="assests/src/insert.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
	<script src="assests/src/modal.js"></script>
	<script src="assests/src/update.js"></script>
	<script src="assests/src/excel.js"></script>
	<script src="assests/src/delete.js"></script>
</body>
</html>
