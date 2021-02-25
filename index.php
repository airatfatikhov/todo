<?php include('assests/ldap/ldap.php');
include('assests/ldap/ldap_select.php');
$userName = $_POST['userName'];
$password = $_POST['password'];
?>
<?php
if(!isset($_POST['userName'])): 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assests/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Autorization</title>
</head>
<body>
<?php include('body_auth.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="assests/src/ajax.js"></script>
</body>
</html>
<?php
endif;
?>