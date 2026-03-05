<main>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h2>Перевозки</h2>

            <form action="" method="post" style="width: 400px;" class="ms-auto me-auto">
                <h4>Сведения об объемах выполненных перевозок по договорам за период с___ по____</h4>
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
                        <th>Расстояние, км.</th>
                        <th>Выполнена доставка на сумму, руб</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($traffic as $row): ?>
                        <tr>
                            <td><?= $row['id_contract'] ?></td>
                            <td><?= $row['fio'] ?></td>
                            <td><?= $row['distance'] ?></td>
                            <td><?= $row['total_sum'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-1"></div>
    </div>
</main>