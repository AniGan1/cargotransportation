<main>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h2>Транспортировки</h2>
            <form action="" method="post" style="width: 400px;" class="ms-auto me-auto">
                <h3>Сведения об объемах выполненных транспортировках за период ФИО водителя : </h3>
                <div class="mb-2">
                    <label for="">С:</label>
                    <input type="date" name="date1" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="">По:</label>
                    <input type="date" name="date2" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="">ФИО водителя:</label>
                    <select name="id_driver" class="form-select">
                        <?php foreach ($drivers as $row): ?>
                            <option value="<?= $row['id_driver'] ?>"><?= $row['fio'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Поиск</button>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th>Номер путеовго листа</th>
                        <th>ФИО водителя</th>
                        <th>Гос номер</th>
                        <th>Модель авто</th>
                        <th>№ заявки</th>
                        <th>Наименование груза</th>
                        <th>Перевезено</th>
                        <th>Вес</th>
                        <th>Пункт отправления</th>
                        <th>Пункт назначения</th>
                        <th>Расстояние</th>
                        <th>Статус транспортировки</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $x = 0;
                    foreach ($apps as $row): $x++ ?>
                        <tr>
                            <td><?= $row['number_list'] ?></td>
                            <td><?= $row['fio'] ?></td>
                            <td><?= $row['state_number'] ?></td>
                            <td><?= $row['model'] ?></td>
                            <td><?= $row['id_application'] ?></td>
                            <td><?= $row['title_cargo'] ?></td>
                            <td><?= $row['transported'] ?></td>
                            <td><?= $row['total_weight'] ?></td>
                            <td><?= $row['departure_point'] ?></td>
                            <td><?= $row['destination_point'] ?></td>
                            <td><?= $row['distance'] ?></td>
                            <td><?= $row['status_list'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <th>Обьем: <?= $x ?></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-1"></div>
    </div>
</main>