<div class="container">
    <h1>Здравствуйте, Олегов Олег Олегович</h1>
    <hr>
    
    <?php if(isset($message)): ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php endif; ?>
    
    <h5>Новая заявка</h5>
    <form action="" method="post">
        <div class="row">
            <div class="col-3">
                <label class="form-label">Название груза</label>
                <input type="text" class="form-control" name="title_cargo" required>
            </div>
            <div class="col-3">
                <label class="form-label">Тип груза</label>
                <select name="type_cargo" class="form-select" required>
                    <option value="">Выберите</option>
                    <option value="1">Строительные материалы</option>
                    <option value="2">Продукты питания</option>
                    <option value="3">Промышленное оборудование</option>
                    <option value="4">Бытовая техника</option>
                    <option value="5">Химическая продукция</option>
                </select>
            </div>
            <div class="col-3">
                <label class="form-label">Вес (тонн)</label>
                <input type="number" step="0.1" class="form-control" name="total_weight" required>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-3">
                <label class="form-label">Откуда</label>
                <input type="text" class="form-control" name="departure_point" placeholder="Москва, ул. Ленина, д. 10" required>
            </div>
            <div class="col-3">
                <label class="form-label">Куда</label>
                <input type="text" class="form-control" name="destination_point" placeholder="Воронеж, ул. Кирова, д. 25" required>
            </div>
            <div class="col-3">
                <label class="form-label">Расстояние (км)</label>
                <input type="number" class="form-control" name="distance" required>
            </div>
            <div class="col-3">
                <label class="form-label">Стоимость</label>
                <input type="text" class="form-control" id="total_cost_display" readonly value="Рассчитается автоматически">
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Отправить заявку</button>
            </div>
        </div>
    </form>
    
    <hr>
    
    <h5>Мои заявки</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Номер</th>
                <th>Груз</th>
                <th>Тип</th>
                <th>Вес</th>
                <th>Откуда</th>
                <th>Куда</th>
                <th>Стоимость</th>
                <th>Статус</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($applications)): ?>
                <tr>
                    <td colspan="8" class="text-center">Нет заявок</td>
                </tr>
            <?php else: ?>
                <?php foreach($applications as $row): ?>
                    <tr>
                        <td><?php echo $row['number_application']; ?></td>
                        <td><?php echo $row['title_cargo']; ?></td>
                        <td><?php echo $row['title_type_cargo']; ?></td>
                        <td><?php echo $row['total_weight']; ?> т</td>
                        <td><?php echo $row['departure_point']; ?></td>
                        <td><?php echo $row['destination_point']; ?></td>
                        <td><?php echo $row['total_cost']; ?> ₽</td>
                        <td><?php echo $row['status']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
document.querySelectorAll('input[name="total_weight"], input[name="distance"], select[name="type_cargo"]').forEach(el => {
    el.addEventListener('input', function() {
        let weight = document.querySelector('input[name="total_weight"]').value;
        let distance = document.querySelector('input[name="distance"]').value;
        let type = document.querySelector('select[name="type_cargo"]').value;
        
        if(weight && distance && type) {
            let base = 50;
            let coef = 1;
            if(type == 1) coef = 1.2;
            else if(type == 2) coef = 1;
            else if(type == 3) coef = 1.5;
            else if(type == 4) coef = 1.1;
            else if(type == 5) coef = 1.3;
            
            let cost = weight * distance * base * coef;
            document.getElementById('total_cost_display').value = Math.round(cost) + ' ₽';
        }
    });
});
</script>