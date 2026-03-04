<main>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h2>Заявки</h2>
            <form action="" method="post" style="width: 400px;" class="ms-auto me-auto">
                <h3>Сведения об объемах выполненных заявок за период : </h3>
                <div class="mb-2">
                    <label for="">С:</label>
                    <input type="date" name="date1" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="">По:</label>
                    <input type="date" name="date2" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Поиск</button>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th>№ договора</th>
                        <th>Клиент</th>
                        <th>№ заявки</th>
                        <th>Наименование груза</th>
                        <th>Пункт отправления</th>
                        <th>Пункт назначения</th>
                        <th>Расстояние</th>
                        <th>Дата доставки</th>
                        <th>Вес груза</th>
                        <th>Перевезено</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $x=0; foreach ($apps as $row): $x++ ?>
                        <tr>
                            <td><?= $row['id_contract'] ?></td>
                            <td><?= $row['fio'] ?></td>
                            <td><?= $row['id_application'] ?></td>
                            <td><?= $row['title_cargo'] ?></td>
                            <td><?= $row['departure_point'] ?></td>
                            <td><?= $row['destination_point'] ?></td>
                            <td><?= $row['distance'] ?></td>
                            <td><?= $row['due_date'] ?></td>
                            <td><?= $row['total_weight'] ?></td>
                            <td><?= $row['transported'] ?></td>
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