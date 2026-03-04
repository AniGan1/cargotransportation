<h2 class="text-center">Сведения об объмах выполненых заявок</h2>

<form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите 1 дату</label>
    <input type="date" name="date_start" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите 2 дату</label>
    <input type="date" name="date_end" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" name="filter" class="btn btn-primary">Найти</button>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">№ доовора</th>
      <th scope="col">Клиент</th>
      <th scope="col">№ заявки</th>
      <th scope="col">Наименование груза</th>
      <th scope="col">Пункт отправления</th>
      <th scope="col">Пункт назначения</th>
      <th scope="col">Расстояние</th>
      <th scope="col">Дата доставки</th>
      <th scope="col">Вес груза</th>
      <th scope="col">Перевезено</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($otct as $row) {?>
    <tr>
      <th scope="row"><?=$row['number_contract']?></th>
      <th scope="row"><?=$row['fio']?></th>
      <th scope="row"><?=$row['number_application']?></th>
      <th scope="row"><?=$row['title_cargo']?></th>
      <th scope="row"><?=$row['departure_point']?></th>
      <th scope="row"><?=$row['destination_point']?></th>
      <th scope="row"><?=$row['distance']?></th>
      <th scope="row"><?=$row['due_date']?></th>
      <th scope="row"><?=$row['total_weight']?></th>
      <th scope="row"></th>
    </tr>
    <?php }?>
  </tbody>
</table>