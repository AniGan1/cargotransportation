<table class="table">
  <thead>
    <tr>
      <th scope="col">Ф.И.О. клиента</th>
      <th scope="col">№ заявки</th>
      <th scope="col">Наименование груза</th>
      <th scope="col">Вес</th>
      <th scope="col">Расстояние</th>
      <th scope="col">Срок выполнения</th>
      <th scope="col"></th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($appli as $index => $row): ?>
    <tr>
      <th scope="row"><?= ($row['fio']) ?></th>
      <th scope="row"><?= ($row['id_application']) ?></th>
      <th scope="row"><?= ($row['title_cargo']) ?></th>
      <th scope="row"><?= ($row['total_weight']) ?></th>
      <th scope="row"><?= ($row['distance']) ?></th>

      <th><form>    
      <button type="button" name="list" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="contract(<?= $row['id_application'] ?>)">Назначить контракт</button>
      </form></th>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>