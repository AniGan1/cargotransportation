<main>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            
            <h2 class="mt-3">Редактирование ставки водителя</h2>
            
            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?php echo site_url('buchgalter/update_salary'); ?>">
                        
                        <input type="hidden" name="driver_id" value="<?php echo $driver->id_driver; ?>">
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ФИО водителя:</label>
                            <div class="col-sm-9">
                                <p class="form-control-plaintext"><?php echo $driver->fio; ?></p>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Телефон:</label>
                            <div class="col-sm-9">
                                <p class="form-control-plaintext"><?php echo $driver->phone; ?></p>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Текущая ставка:</label>
                            <div class="col-sm-9">
                                <p class="form-control-plaintext"><?php echo $driver->salary; ?> руб/кг</p>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Новая ставка:</label>
                            <div class="col-sm-9">
                                <input type="number" name="salary" class="form-control" 
                                       value="<?php echo $driver->salary; ?>" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-success">Сохранить</button>
                                <a href="<?php echo site_url('buchgalter/salary'); ?>" 
                                   class="btn btn-secondary">Отмена</a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            
        </div>
        <div class="col-1"></div>
    </div>
</main>