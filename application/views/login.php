<div class="row mt-5 mb-5">
    <div class="col-1"></div>
    <div class="col-10">
        <form action="main/check_login" method="post" style="width:400px" class="ms-auto me-auto">
            <h2>Авторизация</h2>
            <div class="mb-2">
                <label for="">Логин:</label>
                <input type="text" name="login" class="form-control">
            </div>
            <div class="mb-2">
                <label for="">Пароль:</label>
                <input type="password" name="password" class="form-control">
            </div>
            <p>Нет аккаунта?<a href="main/reg">Зарегистрируйтесь!</a></p>

            <button class="btn btn-primary mb-3" name="chec_login" style="width: 100%;">Войти</button>
        </form>
    </div>
    <div class="col-1"></div>
</div>