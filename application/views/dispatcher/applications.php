<h2>Выполнены заявки</h2>

<form method="get" >
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Выбрать дату</label>
    <input type="date" value="<?= (isset($_GET['date']) ? $_GET['date']: '') ?>" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" name="date_font" class="btn btn-primary">Найти</button>
  <a href='/dispatcher/applications' class="btn btn-danger">Сбросить</a>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">№п/п</th>
      <th scope="col">Ф.И.О. Водителя</th>
      <th scope="col">Гос. номер</th>
      <th scope="col">Марка, модель</th>
      <th scope="col">Срок доставки</th>
      <th scope="col">Фактически доставлено</th>
      <th scope="col">Вес груза, т.</th>
    </tr>
  </thead>

  <tbody>
    <?php
     foreach($applis as $row){ ?>
    <tr>
      <th scope="row"><?=$row['id_travel_list']?></th>
      <th scope="row"><?=$row['fio']?></th>
      <th scope="row"><?=$row['state_number']?></th>
      <th scope="row"><?=$row['brand']?>, <?=$row['model']?></th>
      <th scope="row"><?=$row['dispatch_date']?></th>
      <th scope="row"><?=$row['the_factual_delivery_date']?></th>
      <th scope="row"><?=$row['total_weight']?></th>
    </tr>
    <?php }?>
  </tbody>
</table>
