<div class="row mt-5 mb-5">
    <div class="col-1"></div>
    <div class="col-10">
        <form action="main/reg" method="post" style="width:400px" class="ms-auto me-auto">
            <h2>Регистрация</h2>
            <div class="mb-2">
                <label for="">ФИО:</label>
                <input type="text" name="fio" class="form-control" required>
            </div>
            <div class="mb-2">
                <label for="">ИНН:</label>
                <input type="text" name="bank_details" class="form-control"
                    placeholder="ИНН должен состоять из 10 или 12 цифр" pattern="[0-9]{10,12}" required>
            </div>
            <div class="d-flex">
                <div class="mb-2">
                    <label for="">Логин:</label>
                    <input type="text" name="login" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label for="">Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
            </div>
            <div class="d-flex">
                <div class="mb-2">
                    <label for="">Номер телефона:</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label for="">Укажите ваш адрес:</label>
                    <input type="text" name="address" class="form-control" required>
                </div>
            </div>
            <div class="mb-2">
                <label for="">Пароль:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-primary" style="width: 100%;">Зарегистрироваться</button>
        </form>
    </div>
    <div class="col-1"></div>
</div>