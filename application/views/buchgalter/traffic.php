<main>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h2>Перевозки</h2>
            <!-- <form action="" method="post" style="width: 400px;" class="ms-auto me-auto">
                <h3>Сведения об объемах перевозках за водителя : </h3>
                <div class="mb-2">
                    <label for="">ФИО водителя:</label>
                    <select name="id_driver" class="form-select">
                        <option value="0">Все</option>
                        <?php foreach ($drivers as $row): ?>
                            <option value="<?= $row['id_driver'] ?>"><?= $row['fio'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Поиск</button>
            </form> -->
            <h3>Полная статистика по перевозкам водителями</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Ф.И.О. водителя</th>
                        <th>Выполнено доставок на сумму, руб.</th>
                        <th>Расстояние, км.</th>
                        <th>Перевезено</th>
                        <th>Количество рейсов</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($apps as $row): ?>
                        <tr>
                            <td><?= $row['fio'] ?></td>
                            <td><?= $row['total_sum'] ?></td>
                            <td><?= $row['total_distance'] ?></td>
                            <td><?= $row['total_transported'] ?></td>
                            <td><?= $row['total_trips'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-1"></div>
    </div>
</main>