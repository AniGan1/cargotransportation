<h2 class="text-center">Составление путевого листа</h2>

<form method="post" action="dispatcher/put_list">
  <div>
    <select name="id_application" class="form-select" aria-label="Default select example">
    <option selected>Выбрать заявку</option>
    <?php foreach($appli as $row){ ?>
    <option value="<?= $row['id_application'] ?>"><?= $row['number_application'] ?></option>
    <?php } ?>
  </select>
  </div>
  <div>
    <label>Выбрать водителя</label>
    <select name="id_driver" class="form-select" aria-label="Default select example">
    <?php foreach($driv as $row){ ?>
    <option value="<?= $row['id_driver'] ?>"><?= $row['fio'] ?></option>
    <?php } ?>
  </select>
  </div>
  <div>
    <label>Выбрать машину</label>
    <select name="id_car" class="form-select" aria-label="Default select example">
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
    <label>Грузоподемность</label>
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
  
  <button type="submit" name="put" class="btn btn-primary">Составить</button>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Номер листа</th>
      <th scope="col">Номер заявки</th>
      <th scope="col">Грузоподемность</th>
      <th scope="col">Дата отправки</th>
      <th scope="col">Дата прибытия</th>
      <th scope="col">Ф.И.О. водителя</th>
      <th scope="col">Номер машины</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($list as $row){?>
    <tr>
      <th scope="row"><?=$row['number_list']?></th>
      <th scope="row"><?=$row['number_application']?></th>
      <th scope="row"><?=$row['transported']?></th>
      <th scope="row"><?=$row['number_list']?></th>
      <th scope="row"><?=$row['dispatch_date']?></th>
      <th scope="row"><?=$row['the_factual_delivery_date']?></th>
      <th scope="row"><?=$row['fio']?></th>
      <th scope="row"><?=$row['state_number']?></th>
    </tr>
    <?php }?>
  </tbody>
</table>