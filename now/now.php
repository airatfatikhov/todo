<?php 

echo "Здесь задачи, которые на выполнении";
?>
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
      <!-- <th scope="col">Удалить:</th> -->
    </tr>
  </thead>
  <?php
  $i=0;
  $query_datecopy = "SELECT date.id, date.fio, date.target_id, date.id_descr, date.rucovoditel_id, target.target, description.description, date.time_input, date.time_close, status.status FROM date, description, target, status WHERE date.id_descr = description.id AND date.fio='$var_name' AND date.target_id = target.id AND date.date = '$date_today' AND date.target_status = status.id AND status.id = '2'";
$result_dateсopy = mysqli_query($connection, $query_datecopy);
while($row_datecopy = mysqli_fetch_array($result_dateсopy)) { 
     /*Добавление данных в переменные*/
$id = $row_datecopy['id'];
$users_fio = $row_datecopy['fio']; 
$target = $row_datecopy['target']; 
$description = $row_datecopy['description'];
$time_input = $row_datecopy['time_input'];
$time_close = $row_datecopy['time_close'];
$status_target = $row_datecopy['status'];
$target_id = $row_datecopy['target_id'];

$descr_id = $row_datecopy['id_descr'];
$rucovoditel_id = $row_datecopy['rucovoditel_id'];

       ?>
       <tbody>
    <tr>
      <th scope="row"><?php echo  $i++; ?></th>
      <td><?php echo  $users_fio; ?></td>
      <td><?php  echo $target; ?></td>
      <td><?php  echo $description; ?></td>
      <td><?php  echo $time_input; ?></td>
      <td><?php  echo $time_close; ?></td>
      <td class='btn-warning'><?php  echo $status_target; ?></td>
      <td><?php  echo $ruc; ?></td>
      <td><?php echo "<button type='button' class='btn btn-primary edit' data-toggle='modal' data-target='#exampleModals' id='exampleModal' data-whatever='@fat' data-id='$users_fio' data-name='$target' data-date='$time_input' data-duration='$description' data-content='$time_close' data-ruc='$ruc' data-update='$id' data-targetid='$target_id' data-descrid='$descr_id'>Отредактировать</button>" ?></td>
      <!-- <td><?php echo "<button type='button' class='btn btn-danger remove' data-target='#delete' data-content='#target' data-name = '$target_id' data-id='$id'>Удалить</button>" ?></td> -->
    </tr>
    <?php
}
?>
</tbody>
</table>