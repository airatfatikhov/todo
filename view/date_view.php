<?php $today_days = date("2020-m-d"); ?>
<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th scope="col">Список задач:</th>
      <th scope="col">ФИО:</th>
      <th scope="col">Задача:</th>
      <th scope="col">Описание задачи:</th>
      <th scope="col">Время начала:</th>
      <th scope="col">Время окончания:</th>
      <th scope="col">Время выполненной работы:</th>
      <th scope="col">Статус задачи:</th>
      <th scope="col">Дата окончания задачи:</th>
      <th scope="col">Примечание:</th>
      <th scope="col">Удалить:</th>
    </tr>
  </thead>
  <?php
  $i=0;
  $sum_view = 0;
  $min_view = 0;
  $query_date = "SELECT date.id, date.fio, date.target_id, date.id_descr, date.rucovoditel_id, target.target, datetime.date_close, description.description, date.time_input, date.time_close, status.status FROM date, description, target, datetime, status WHERE 
  date.id_descr = description.id AND date.fio='$var_name' AND date.target_id = target.id  AND date.id_datetime = datetime.id AND date.target_status = status.id AND status.id='1'";
$result_date = mysqli_query($connection, $query_date);
while($row_date = mysqli_fetch_array($result_date)) { 
     /*Добавление данных в переменные*/
    
$id = $row_date['id'];
$users_fio = $row_date['fio']; 
$target = $row_date['target']; 
$description = $row_date['description'];
$time_input = $row_date['time_input'];
$time_close = $row_date['time_close'];
$status_target = $row_date['status'];
$target_id = $row_date['target_id'];
$datetime_close = $row_date['date_close'];
$descr_id = $row_date['id_descr'];
$rucovoditel_id = $row_date['rucovoditel_id'];
       ?>
        <input type="hidden" value='<?php  echo $id ?>' name="hiddenid">
       <tbody>
    <tr>
      <th scope="row"><?php echo  $i++; ?></th>
      <td><?php echo  $users_fio; ?></td>
      <td><?php  echo $target; ?></td>
      <td><?php  echo $description; ?></td>
      <td><?php  echo $time_input; ?></td>
      <?php
         $result_view = strtotime($time_close) - strtotime($time_input);
         $hours_view = intval($result_view/3600);
         $minuts_view = $result_view - ($hours_view*3600);
         $minuts_view = intval($minuts_view/60);
         $sum_view =$sum_view + $hours_view;
         $min_view = $min_view + $minuts_view;
      ?>
      <td><?php  echo $time_close; ?></td>
      <td class='btn-success'><?php echo $hours_view."ч.".$minuts_view."мин"; ?></td>
      <td class='btn-danger'><?php  echo $status_target; ?></td>
         <?php 
        if($today_days > $datetime_close) {
          ?> 
          <td bgcolor="red" align="center">
          <?php
          echo $datetime_close;
          ?>
          </td>
          <?php
        }
        else {
          ?>
          <td bgcolor="white" align="center"> 
          <?php
          echo $datetime_close;
          ?>
          </td>
          <?php
        }
      ?>
      <td><?php echo "<button type='button' class='btn btn-primary edit' data-toggle='modal' data-target='#exampleModals' id='exampleModal' data-whatever='@fat' data-id='$users_fio' data-name='$target' data-date='$time_input' data-duration='$description' data-content='$time_close' data-ruc='$ruc' data-update='$id' data-targetid='$target_id' data-descrid='$descr_id'>Отредактировать</button>" ?></td>
      <td><?php echo "<button type='button' class='btn btn-danger remove' data-target='#delete' data-content='#target'  data-id='$id' data-name='$target_id'>Удалить</button>" ?></td>
    </tr>
    <?php
}
?>
<?php
// echo $sum;
// echo $min;
?>
<script>
</script>
</tbody>
</table>

