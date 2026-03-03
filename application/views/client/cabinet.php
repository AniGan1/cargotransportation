<div class="container">
    <h1>Здравствуйте, </h1>
    <hr>
    <h5>Ваши заявки</h5>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Номер заказа</th>
      <th scope="col">Название груза</th>
      <th scope="col">Тип груза</th>
      <th scope="col">Общий вес</th>
      <th scope="col">Пункт назначения</th>
      <th scope="col">Стоимость</th>
      <th scope="col">Статус</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">'.$row['number_application'].'</th>
      <td>'.$row['title_cargo'].'</td>
      <td>'.$row['title_type_cargo'].'</td>
      <td>'.$row['total_weight'].'т.</td>
      <td>'.$row['address'].'</td>
      <td>'.$row['total_cost'].'</td>
      <td>'.$row['status'].'</td>
    </tr>
  </tbody>
</table>
</div>