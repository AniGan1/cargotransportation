<h2 class="text-center">Составление путевого листа</h2>

<form method="post">
  <div>
    <select name="id_application" class="form-select" aria-label="Default select example">
    <option selected>Выбрать заявку</option>
    <?php foreach($appli as $row){ ?>
    <option value="<?= $row['id_application'] ?>"><?= $row['number_application'] ?></option>
    <?php } ?>
  </select>
  </div>
  <div>
    <select name="id_driver" class="form-select" aria-label="Default select example">
    <option selected>Выбрать водителя</option>
    <?php foreach($driv as $row){ ?>
    <option value="<?= $row['id_driver'] ?>"><?= $row['fio'] ?></option>
    <?php } ?>
  </select>
  </div>
  <div>
    <select name="id_car" class="form-select" aria-label="Default select example">
    <option selected>Выбрать машину</option>
    <?php foreach($car as $row){ ?>
    <option value="<?= $row['id_car'] ?>"><?= $row['state_number'] ?></option>
    <?php } ?>
  </select>
  </div>
  <div>
    <label>Номер путевого листа</label>
    <input type="text" name="number_list" id="" class="form-control">
  </div>
   <div>
    <label>Transported</label>
    <input type="text" name="transported" id="" class="form-control">
  </div>
  <div>
    <label>Дата отправки</label>
    <input type="date" name="dispatch_date" id="" class="form-control">
  </div>
  <div>
    <label>Фактичесая дата доставки</label>
    <input type="date" name="the_factual_delivery_date" id="" class="form-control">
  </div>
  
  <button type="submit" class="btn btn-primary">Составить</button>
</form>