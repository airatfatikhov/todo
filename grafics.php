<?php session_start();
include('assests/sql/sql.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assests/css/mane.css">
    <title>Statistika</title>
</head>
<body>
<?php 

$query_ruc = "SELECT * FROM date";
$result_ruc = mysqli_query($connection, $query_ruc);
while ($row_ruc = mysqli_fetch_array($result_ruc)) { 
     /*Добавление данных в переменные*/
$id = $row_ruc['id'];
}

$query_target = "SELECT * FROM target";
$result_target = mysqli_query($connection, $query_target);
while ($row_target = mysqli_fetch_array($result_target)) { 
     /*Добавление данных в переменные*/
$id_target = $row_target['id'];
}

$query_visit = "SELECT * FROM visit";
$result_visit = mysqli_query($connection, $query_visit);
while ($row_visit = mysqli_fetch_array($result_visit)) { 
     /*Добавление данных в переменные*/
$views = $row_visit['views'];
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<div style="position:absolute; top:100px; left:600px; width:500px; height:500px;">
 <canvas id="myChart"></canvas>
 </div>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    labels : "Диаграмма, которая показывает активность в портале",
    data: {
        labels: ['Зарегистрировано заявок', 'Зарегистрировано задач', 'Счетчик кто был на портале'],
        datasets: [{
            label: 'При нажатий на кнопку график поменяет шкалу',
            options: {
                    maintainAspectRatio: false,
                },
            data: [<?php echo $id;?>, <?php echo $id_target; ?>, <?php echo $views; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
</body>
</html>