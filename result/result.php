<?php
echo "Здесь задачи, которые выполнены за текущий месяц"; ?>

<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th scope="col">Список задач:</th>
      <th scope="col">ФИО:</th>
      <th scope="col">Задача:</th>
      <th scope="col">Описание задачи:</th>
      <th scope="col">Время начала:</th>
      <th scope="col">Время окончания:</th>
      <th scope="col">Статус задачи:</th>
      <th scope="col">Руководитель:</th>
      <th scope="col">Примечание:</th>
    </tr>
  </thead>
  <?php
  $i=0;
  $query_datecopyresult = "SELECT date.id, date.fio, date.target_id, date.id_descr, date.rucovoditel_id, target.target, description.description, date.time_input, date.time_close, status.status FROM date, description, target, status WHERE date.id_descr = description.id AND date.fio='$var_name' AND date.target_id = target.id AND date.date >= ( NOW() - INTERVAL 20 DAY) AND date.target_status = status.id AND status.id = '3'";
$result_datecopyresult = mysqli_query($connection, $query_datecopyresult);
while($row_datecopyresult = mysqli_fetch_array($result_datecopyresult)) { 
     /*Добавление данных в переменные*/
$id = $row_datecopyresult['id'];
$users_fio = $row_datecopyresult['fio']; 
$target = $row_datecopyresult['target']; 
$description = $row_datecopyresult['description'];
$time_input = $row_datecopyresult['time_input'];
$time_close = $row_datecopyresult['time_close'];
$status_target = $row_datecopyresult['status'];
$target_id = $row_datecopyresult['target_id'];

$descr_id = $row_datecopy['id_descr'];
$rucovoditel_id = $row_datecopy['rucovoditel_id'];
       ?>
        <?php
         $result = strtotime($time_close) - strtotime($time_input);
         $hours = intval($result/3600);
         $minuts = $result - ($hours*3600);
         $minuts = intval($minuts/60);
         $sum =$sum + $hours;
         $min = $min + $minuts;
      ?>
       <tbody>
    <tr>
      <th scope="row"><?php echo  $i++; ?></th>
      <td><?php echo  $users_fio; ?></td>
      <td><?php  echo $target; ?></td>
      <td><?php  echo $description; ?></td>
      <td><?php  echo $time_input; ?></td>
      <td><?php  echo $time_close; ?></td>
      <td class='btn-success'><?php  echo $status_target; ?></td>
      <td><?php  echo $ruc; ?></td>
      <td><?php echo "<button type='button' class='btn btn-primary edit' data-toggle='modal' data-target='#exampleModals' id='exampleModal' data-whatever='@fat' data-id='$users_fio' data-name='$target' data-date='$time_input' data-duration='$description' data-content='$time_close' data-ruc='$ruc' data-update='$id' data-targetid='$target_id' data-descrid='$descr_id'>Отредактировать</button>" ?></td>
      <!-- <td><?php echo "<button type='button' class='btn btn-danger remove' data-target='#delete' data-content='#target' data-name = '$target_id' data-id='$id'>Удалить</button>" ?></td> -->
    </tr>
    <?php
}
?>
</tbody>
</table>
<div class="container">
  <div class="row">
    <table class="table table-bordered">
    <thead class="thead-light">
       <th>
          Проработанные часы за день
       </th>
       <th>
          Проработанные минуты за день
       </th>
    </thead>
     <tbody>
       <tr>
          <th>
            <?php  echo  $sum."ч."; ?>
          </th>
          <th>
            <?php  echo $min."мин"; ?>
          </th>
       </tr>
     </tbody>
    </table>
  </div>
</div>
