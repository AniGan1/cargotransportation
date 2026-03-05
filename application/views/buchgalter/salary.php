<main>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            
            <h2 class="mt-3">Водители</h2>
            
            <div class="card">
                <div class="card-header">
                    <h5>Полная статистика по перевозкам водителями</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Ф.И.О. водителя</th>
                                <th>Выполнено доставок на сумму, руб.</th>
                                <th>Расстояние, км.</th>
                                <th>Перевезено</th>
                                <th>Количество рейсов</th>
                                <th>Ставка</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($drivers as $d): ?>
                            <tr>
                                <td><?php echo $d->fio; ?></td>
                                <td><?php echo number_format($d->total_salary, 0, '', ' '); ?></td>
                                <td><?php echo $d->total_distance; ?></td>
                                <td><?php echo $d->total_weight; ?></td>
                                <td><?php echo $d->trips_count; ?></td>
                                <td><?php echo $d->salary; ?></td>
                                <td>
                                    <a href="<?php echo site_url('buchgalter/edit_salary/'.$d->id_driver); ?>" 
                                       class="btn btn-sm btn-primary">
                                        Изменить
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
        <div class="col-1"></div>
    </div>
</main>