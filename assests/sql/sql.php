<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "plan");
 $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  //Test if connection succeeded
  if(mysqli_connect_errno()) {
      die("Подключение разорвано: " .
         mysqli_connect_error() . ")"
          );
  }
?> 