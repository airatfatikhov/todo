<div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Редактируемое поле</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        <input type="hidden" name="hidden" id='hidden'>
        <input type="hidden" name="targetid" id='targetid'>
          <input type="hidden" name="descrid" id='descrid'>
      
    
        <div class="form-group">
          <label for="fio">Исполнитель:</label>
          <input class="form-control" type="text" placeholder="Default input" id="fio" name="updatefio" required="true" disabled >
          </div>
          <label for="target">Создайте заголовок задачи:</label>
          <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">+</span>
            </div>
            <input type="hidden" name="targetid" id='targetid'>
            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="target" name="updatetarget" required="true"> 
            </div>

            <label for="description">В чем состоит ваша задача:</label>
          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Опишите вашу задачу:</span>
            </div>
            <textarea class="form-control" aria-label="With textarea" id="description" name="updatedescription" required="true"></textarea>
            </div>

          <div class="form-group">
          <label for="timeInput">Время начала:</label>
          <input class="form-control" type="time" value="" id="timeInput" name="updatetimeInput" required="true">
          </div>
  
          <div class="form-group">
          <label for="timeClose">Время окончания:</label>
          <input class="form-control" type="time" value="" id="timeClose"  name="updatetimeClose" required="true">
          </div>

          <!-- <div class="form-group">
          <label for="dateNach">Дата заявки:</label>
          <input class="form-control" type="text" value="<?php  echo $today_days = date("y.m.d"); ?>" id="dateNach"  name="dateNach" required="true" disabled>
          </div>

          <div class="form-group">
          <label for="dateClose">Дата окончания:</label>
          <input class="form-control" type="date" value="" id="dateClose"  name="dateClose" required="true">
          </div> -->
        
              <div class="form-group">
              <label for="status">Выберите состояние задачи:</label>
              <select class="form-control" id="status" name="updateselect">
              <?php
                  $query_status = "SELECT * FROM status";
                  $result_status = mysqli_query($connection, $query_status);
                  while ($row_status = mysqli_fetch_array($result_status))
                        {
                          $status_id = $row_status['id'];
                          $status = $row_status['status'];
                      ?>
                      <option  value="<?php echo $status_id; ?>">
                      <?php echo $status; ?>
                      </option>
                      <?php
                    }
                  ?>         </select>
            </div>
          <div class="form-group">
          <label for="ruc">Согласовывает:</label>
          <input class="form-control" type="text" placeholder="Default input" id="ruc"  name="updateruc" disabled>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
        <button type="button" class="btn btn-success update" id="forms">Изменить</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
// include('insert_date.php');
?>