<h2 class="text-center">Список заявок</h2>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Ф.И.О. клиента</th>
      <th scope="col">Номер заявки</th>
      <th scope="col">Название груза</th>
      <th scope="col">Тип груз</th>
      <th scope="col">Вес</th>
      <th scope="col">От куда</th>
      <th scope="col">До куда</th>
      <th scope="col">Цена</th>
      <th scope="col">Дистанция</th>
      <th scope="col">Дата создания</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($sav as $row){?>
    <tr>
      <th scope="row"><?=$row['fio']?></th>
      <th scope="row"><?=$row['number_application']?></th>
      <th scope="row"><?=$row['title_cargo']?></th>
      <th scope="row"><?=$row['title_type_cargo']?></th>
      <th scope="row"><?=$row['total_weight']?></th>
      <th scope="row"><?=$row['departure_point']?></th>
      <th scope="row"><?=$row['destination_point']?></th>
      <th scope="row"><?=$row['total_cost']?></th>
      <th scope="row"><?=$row['distance']?></th>
      <th scope="row"><?=$row['date_created']?></th>
    </tr>
    <?php }?>
</table>
<h2 class="text-center">Создание договора</h2>

<form method="post" >
    <select name='id_application' class="form-select" aria-label="Default select example">
        <option selected>Выбрать заявку</option>
        <?php foreach($appli as $row){?>
        <option value="<?=$row['id_application']?>"><?=$row['number_application']?></option>
        <?php }?>
    </select>      
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Номер договора</label>
    <input type="text" name="number_contract" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Дата создания</label>
    <input type="date" name='conclusion_date' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Дата завершения</label>
    <input type="date" name='due_date' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" name="dogovor" class="btn btn-primary">Создать</button>
</form>