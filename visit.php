<?php include('assests/sql/sql.php');

 $visitor_ip = $_SERVER['REMOTE_ADDR'];
 $date_visit = date("Y-m-d");
// Узнаем, были ли посещения за сегодня
$res = mysqli_query($connection, "SELECT `id` FROM `visit` WHERE `date`='$date_visit'") or die ("Проблема при подключении к БД");

// Если сегодня еще не было посещений
if (mysqli_num_rows($res) == 0)
{
    // Очищаем таблицу ips
    mysqli_query($connection, "DELETE FROM `ip`");

    // Заносим в базу IP-адрес текущего посетителя
    mysqli_query($connection, "INSERT INTO `ip` SET `host`='$visitor_ip'");

    // Заносим в базу дату посещения и устанавливаем кол-во просмотров и уник. посещений в значение 1
    $res_count = mysqli_query($connection, "INSERT INTO `visit` SET `date`='$date_visit', `hosts`=1,`views`=1");
}

// Если посещения сегодня уже были
else
{
    // Проверяем, есть ли уже в базе IP-адрес, с которого происходит обращение
    $current_ip = mysqli_query($connection, "SELECT `id` FROM `ip` WHERE `host`='$visitor_ip'");

    // Если такой IP-адрес уже сегодня был (т.е. это не уникальный посетитель)
    if (mysqli_num_rows($current_ip) == 1)
    {
        // Добавляем для текущей даты +1 просмотр (хит)
        mysqli_query($connection, "UPDATE `visit` SET `views`=`views`+1 WHERE `date`='$date_visit'");
    }

    // Если сегодня такого IP-адреса еще не было (т.е. это уникальный посетитель)
    else
    {
        // Заносим в базу IP-адрес этого посетителя
        mysqli_query($connection, "INSERT INTO `id` SET `host`='$visitor_ip'");

        // Добавляем в базу +1 уникального посетителя (хост) и +1 просмотр (хит)
        mysqli_query($connection, "UPDATE `visit` SET `hosts`=`hosts`+1,`views`=`views`+1 WHERE `date`='$date_visit'");
    }
}
?>