<h2 class="text-center">Сведения об объмах выполненых транспортировак</h2>

<form method="get" action="director/transp">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите 1 дату</label>
    <input type="date" name="date_start" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите 2 дату</label>
    <input type="date" name="date_end" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Выбрать Ф.И.О. водителя</label>
    <input type="text" name="fio" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" name="filter" class="btn btn-primary">Найти</button>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">№ путевого листа</th>
      <th scope="col">Гос. номер</th>
      <th scope="col">Марка авто</th>
      <th scope="col">Модель авто</th>
      <th scope="col">№ заявки</th>
      <th scope="col">Наименование груза</th>
      <th scope="col">Перевезено</th>
      <th scope="col">Вес</th>
      <th scope="col">Пункт отправления</th>
      <th scope="col">Пункт назначения</th>
      <th scope="col">Расстояние</th>
      <th scope="col">Дата доставки</th>
      <th scope="col">Фактически доставлено</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($transp as $row) {?>
    <tr>
      <th scope="row"><?=$row['number_list']?></th>
      <th scope="row"><?=$row['state_number']?></th>
      <th scope="row"><?=$row['brand']?></th>
      <th scope="row"><?=$row['model']?></th>
      <th scope="row"><?=$row['number_application']?></th>
      <th scope="row"><?=$row['title_cargo']?></th>
      <th scope="row"><?=$row['total_weight']?></th>
      <th scope="row"><?=$row['total_weight']?></th>
      <th scope="row"><?=$row['from']?></th>
      <th scope="row"><?=$row['to']?></th>
      <th scope="row"><?=$row['to']?></th>
      <th scope="row"><?=$row['dispatch_date']?></th>
      <th scope="row"><?=$row['the_factual_delivery_date']?></th>
    </tr>
    <?php }?>
  </tbody>
</table>