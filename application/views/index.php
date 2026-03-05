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
  
  <div class="container">
    <h2>Калькулятор расчета стоимости перевозки</h2>
    <div class="card">
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-3">
            <label class="form-label">Откуда</label>
            <input type="text" id="departure_point" class="form-control" placeholder="Москва">
          </div>
          <div class="col-md-3">
            <label class="form-label">Куда</label>
            <input type="text" id="destination_point" class="form-control" placeholder="Воронеж">
          </div>
          <div class="col-md-2">
            <label class="form-label">Расстояние (км)</label>
            <input type="number" id="distance" class="form-control" placeholder="500">
          </div>
          <div class="col-md-2">
            <label class="form-label">Вес (тонн)</label>
            <input type="number" step="0.1" id="total_weight" class="form-control" placeholder="10">
          </div>
          <div class="col-md-2">
            <label class="form-label">Тип груза</label>
            <select id="type_cargo" class="form-select">
              <option value="">Тип груза</option>
              <option value="1">Стройматериалы</option>
              <option value="2">Продукты</option>
              <option value="3">Оборудование</option>
              <option value="4">Бытовая техника</option>
              <option value="5">Химия</option>
            </select>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-8">
            <p id="route" class="fw-bold mb-0"></p>
          </div>
          <div class="col-md-4">
            <div class="input-group">
              <span class="input-group-text">Стоимость:</span>
              <input type="text" id="price_display" class="form-control fw-bold" readonly value="Введите данные">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
  $(document).ready(function() {
    function calculatePrice() {
      let weight = $('#total_weight').val();
      let distance = $('#distance').val();
      let type = $('#type_cargo').val();
      let departure = $('#departure_point').val();
      let destination = $('#destination_point').val();
      
      if(departure && destination) {
        $('#route').text('Маршрут: ' + departure + ' → ' + destination);
      } else {
        $('#route').text('');
      }
      
      if(weight && distance && type) {
        let base = 50;
        let coef = 1;
        
        if(type == 1) coef = 1.2;
        else if(type == 2) coef = 1;
        else if(type == 3) coef = 1.5;
        else if(type == 4) coef = 1.1;
        else if(type == 5) coef = 1.3;
        
        let cost = weight * distance * base * coef;
        $('#price_display').val(Math.round(cost).toLocaleString('ru-RU') + ' ₽');
      } else {
        $('#price_display').val('Введите данные');
      }
    }
    
    $('#departure_point, #destination_point, #total_weight, #distance, #type_cargo').on('input change', calculatePrice);
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