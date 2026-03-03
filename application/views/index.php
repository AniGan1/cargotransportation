<main>
  <div class="container">
    <div class="card text-bg-dark">
      <img src="/img/gruz1.jpg" class="card-img" alt="...">
      <div class="card-img-overlay">
        <h5 class="card-title text-light">Грузоперевозки по<br>
          России, СНГ и Азии</h5>
        <p class="card-text text-light">
          Авто перевозки. Сборные грузы. Ведущая транспортная компания "КаргоГруз" - это уверенность в
          оперативной и<br>
          качественной доставке вашего груза</p>
      </div>
    </div>
    <br>
    <a href="#" type="button" class="btn btn-primary btn-lg">Оставить заявку на доставку груза</a>
  </div>
  <br>
  <div class="row">
    <div class="col-1"></div>
    <div class="col-10">
      <h2>Калькулятор расчета</h2>
      <div class="mb-2 d-flex gap-3">
        <div class="b-2">
          <label for="">Точка отправления: </label>
          <input type="text" id="departure_point" class="form-control">
        </div>
        <div class="b-2">
          <label for="">Точка назначения: </label>
          <input type="text" id="destination_point" class="form-control">
        </div>
        <div class="b-2">
          <label for="">Расстояние (км): </label>
          <input type="text" id="distance" class="form-control">
        </div>
        <div class="b-2">
          <label for="">Вес груза (в тоннах): </label>
          <input type="number" id="total_weight" class="form-control">
        </div>
        <button type="button" id="solve" class="btn btn-primary">Рассчитать</button>
      </div>
      <div class="mb-2">
        <p id="cities"></p>
        <p id="price">Цена за грузоперевозку:</p>
      </div>

      <script>
        $(document).ready(function() {
          $('#solve').click(function() {
            var departure_point = $('#departure_point').val();
            var destination_point = $('#destination_point').val();
            var distance = $('#distance').val();
            var total_weight = $('#total_weight').val();


            var price = (distance * total_weight) * 200;
            $('#cities').text( departure_point + '-' + destination_point);
               $('#price').text('Цена за грузоперевозку: ' + price + ' руб.');
          });
        });
      </script>
      <div class="container">
        <h1 class="text-center">Наши услуги</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <div class="card h-100">
              <img src="/img/uslug1.jpg" class="card-img-top h-100" alt="...">
              <div class="card-body">
                <h5 class="card-title">ПЕРЕВОЗКА ГАЗЕЛЯМИ</h5>
                <button type="button" class="btn btn-primary">Узнать больше</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="/img/uslug2.jpg" class="card-img-top h-100" alt="...">
              <div class="card-body">
                <h5 class="card-title">ПЕРЕВОЗКА ФУРАМИ</h5>
                <button type="button" class="btn btn-primary">Узнать больше</button>
              </div>

            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="/img/uslug3.jpg" class="card-img-top h-100" alt="...">
              <div class="card-body">
                <h5 class="card-title">РЕФРИЖЕРАТОРНАЯ ПЕРЕВОЗКА</h5>
                <button type="button" class="btn btn-primary">Узнать больше</button>
              </div>
            </div>
          </div>
        </div>
      </div>
</main>
<br>