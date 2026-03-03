<h2>Спиосок свободных водителей</h2>

<table class="table">
  <thead>
    <tr>
      <th scope="col">№ таб</th>
      <th scope="col">ФИО водителя</th>
      <th scope="col">Категория</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($driv as $row){?>
    <tr>
      <th scope="row"><?=$row['id_driver']?></th>
      <th scope="row"><?=$row['fio']?></th>
      <th scope="row"><?=$row['category']?></th>
    </tr>
    <?php }?>
  </tbody>
</table>

<h2>Спиосок свободных автомобилей</h2>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Гос. номер</th>
      <th scope="col">Марко авто</th>
      <th scope="col">Модель авто</th>
      <th scope="col">Грузоподъемность</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($car as $row){?>
    <tr>
      <th scope="row"><?=$row['state_number']?></th>
      <th scope="row"><?=$row['brand']?></th>
      <th scope="row"><?=$row['model']?></th>
      <th scope="row"><?=$row['load_capacity']?></th>
    </tr>
    <?php }?>
  </tbody>
</table>