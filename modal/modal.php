<?php include('assests/sql/sql.php'); ?>
<div class="container center-block">
    <div class="row">
    <button type="button" class="btn btn-success col-xs-12 col-sm-6 col-md-6" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Завести план на день</button>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="modal_back">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Заведите план на день</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form> 
          <div class="form-group">
          <label for="exampleFormControlInput1">Исполнитель:</label>
          <input class="form-control" type="text" placeholder="Default input" id="exampleFormControlInput1" value="<?php echo $var_name; ?>" name="fio" required="true" disabled>
          </div>
          <div class="form-group">
          <label for="exampleFormControlInput2">Почта исполнителя:</label>
          <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com" value="<?php echo $email;?>" name="mail" required="true">
          </div>
          
          <label for="exampleFormControlInputHeader">Создайте заголовок задачи:</label>
          <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">+</span>
            </div>
            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="exampleFormControlInputHeader" name="target" required="true"> 
            </div>
            <div class="emptyTarget target">
              <span class="target">
                Заполните поле задачи!
              </span>
              </div>
            <label for="exampleFormControlInputTarget">В чем состоит ваша задача:</label>
          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Опишите вашу задачу:</span>
            </div>
            <textarea class="form-control" aria-label="With textarea" id="exampleFormControlInputTarget" name="description" required="true"></textarea>
            </div>
            <div class="emptyDescription description">
              <span class="description">
                Заполните поле описания!
              </span>
              </div>
          <div class="form-group">
          <label for="exampleFormControlInputTime">Время начала:</label>
          <input class="form-control" type="time" value="" id="exampleFormControlInputTime" name="timeInput" required="true">
          </div>
          <div class="emptyTimeInput timeInput">
              <span class="timeInput">
                Заполните поле времени начала!
              </span>
              </div>
          <div class="form-group">
          <label for="exampleFormControlInputTimeClose">Время окончания:</label>
          <input class="form-control" type="time" value="" id="exampleFormControlInputTimeClose"  name="timeClose" required="true">
          </div>
          <div class="emptyTimeClose timeClose">
              <span class="timeClose">
                Заполните поле времени окончания!
              </span>
              </div>
               <div class="form-group">
          <label for="dateNach">Дата заявки:</label>
          <input class="form-control" type="text" value="<?php  echo $today_days = date("d-m-h"); ?>" id="dateNach"  name="dateNach" required="true" disabled>
          </div>

          <div class="form-group">
          <label for="dateClose">Дата окончания:</label>
          <input class="form-control" type="date" value="" id="dateClose"  name="dateClose" required="true">
          </div>
              <div class="form-group">
              <label for="exampleFormControlSelect1">Выберите состояние задачи:</label>
              <select class="form-control" id="exampleFormControlSelect1" name="select">
              <?php
	 $query_status = "SELECT * FROM status";
   $result_status = mysqli_query($connection, $query_status);
   while ($row_status = mysqli_fetch_array($result_status))
        {
          $status_id = $row_status['id'];
          $status = $row_status['status'];
			?>
			<option  value="<?php echo $status_id; ?>">
			<?php echo "$status"; ?>
			</option>
			<?php
		}
	?>         </select> 
            </div>
          <div class="form-group">
          <label for="exampleFormControlInputRuc">Согласовывает:</label>
          <input class="form-control" type="text" placeholder="Default input" id="exampleFormControlInputRuc" value="<?php echo $manager; ?>" name="ruc" disabled>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
        <button type="button" class="btn btn-success" id="form">Добавить задачу</button>
      </div>
      </form>
    </div>
  </div>
</div>
