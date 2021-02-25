<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container center-block">
    <div class="row">
    <a href="mounth.php" class="btn btn-danger  col-xs-12 col-sm-6 col-md-6" role="button" aria-pressed="true">Ежемесячный отчет</a>
    </div>
</div>
<div class="container center-block">
    <div class="row">
    <a href="grafics.php" class="btn btn-warning  col-xs-12 col-sm-6 col-md-6" role="button" aria-pressed="true">Статистика</a>
    </div>
</div>

<div class="container center-block">
    <div class="row">
    <a href="#" class="btn btn-info  col-xs-12 col-sm-6 col-md-6" role="button" aria-pressed="true">Документация по работе с планом на день</a>
    </div>
</div>
</body>
</html>
<?php
// $var_name = $_SESSION['varname'];
// $var_ruc = $_SESSION['varruc'];
// $userName = $_SESSION['userName'];
// $otdel = $_SESSION['otdel'];
// $password = $_SESSION['password'];
// $email = $_SESSION['mail'];
// $fio = $_POST['fio'];
// $tabel = $_SESSION['managerid'];
// $doljnoct = $_SESSION['title'];
// include('../assests/ldap/ldap_select_ruc.php');
// include('../assests/ldap/ldap_select.php');
// ?>
// <label><span> <span class="required"></span></span>
// 			 <select id="fio" name="fio" class="select-field" onchange="__change_fio()" required="true" required>
// 			 <option disabled selected value="Выберите сотрудника">Выберите сотрудника</option>
//   <?php include 'assests/ldap/ldap_select_ruc.php';
//  for ($i = 0; $i < $info['count']; $i++) {
// 	$managerdn_s=$info[$i]['manager'][0];
// 	$filter_s = "(distinguishedName=$managerdn_s)";
// 	$search_s=@ldap_search($connect, $base_dn, $filter_s);
// 	$info_s = ldap_get_entries($connect, $search_s);
// echo '<option value="' . $info[$i]['cn'][0] . '" employeeid_s="'. $info[$i]['employeeid'][0] .'" department_s="'. $info[$i]['department'][0] .'" manager_s="' . $info_s[0]['cn'][0] . '" managerid_s="' . $info_s[0]['employeeid'][0] .'" managermail_s="' . $info_s[0]['mail'][0] .'" managername_s="' . $info_s[0]['cn'][0] . '">' . $info[$i]['cn'][0] . '</option>';
// }
// ?>
// </select>
// </label>
<!-- <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="button" class="btn btn-success" id="form">Добавить задачу</button> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="assests/src/insert.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>