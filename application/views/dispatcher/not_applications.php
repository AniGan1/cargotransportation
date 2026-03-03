<script>
function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
    const R = 6371;
    const dLat = (lat2 - lat1) * Math.PI / 180;
    const dLon = (lon2 - lon1) * Math.PI / 180;
    const a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    return R * c;
}

async function getCoordsFromAddress(address) {
    const url = "https://nominatim.openstreetmap.org/search";
    const params = new URLSearchParams({
        q: address,
        format: 'json',
        limit: 1
    });
    
    const headers = {
        'User-Agent': 'DistanceCalculator/1.0 (your-email@example.com)'
    };

    try {
        const response = await fetch(`${url}?${params}`, { headers });
        const data = await response.json();
        
        if (data && data.length > 0) {
            return {
                lat: parseFloat(data[0].lat),
                lon: parseFloat(data[0].lon),
                displayName: data[0].display_name
            };
        }
        return null;
    } catch (error) {
        console.error("Ошибка геокодирования:", error);
        return null;
    }
}

function delay(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function calculateDistanceBetweenAddresses(address1, address2, elementId) {
    const coords1 = await getCoordsFromAddress(address1);
    await delay(1000);
    const coords2 = await getCoordsFromAddress(address2);
    
    if (!coords1 || !coords2) {
        document.getElementById(elementId).textContent = 'Ошибка';
        return null;
    }
  
    const distance = getDistanceFromLatLonInKm(
        coords1.lat, coords1.lon,
        coords2.lat, coords2.lon
    );
    
    const distanceStr = distance.toFixed(1) + ' км';
    document.getElementById(elementId).textContent = distanceStr;
    return distance;
}

// Запускаем расчеты после загрузки страницы
document.addEventListener('DOMContentLoaded', function() {
    <?php foreach($appli as $index => $row): ?>
    calculateDistanceBetweenAddresses(
        "<?= addslashes($row['to']) ?>", 
        "<?= addslashes($row['from']) ?>", 
        "distance-<?= $index ?>"
    );
    <?php endforeach; ?>
});
</script>

<table class="table">
  <thead>
    <tr>
      <th scope="col">№договора</th>
      <th scope="col">Ф.И.О. клиента</th>
      <th scope="col">№ заявки</th>
      <th scope="col">Наименование груза</th>
      <th scope="col">Вес</th>
      <th scope="col">От</th>
      <th scope="col">До</th>
      <th scope="col">Расстояние</th>
      <th scope="col">Срок выполнения</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($appli as $index => $row): ?>
    <tr>
      <th scope="row"><?= ($row['id_contract']) ?></th>
      <th scope="row"><?= ($row['fio']) ?></th>
      <th scope="row"><?= ($row['id_application']) ?></th>
      <th scope="row"><?= ($row['title_cargo']) ?></th>
      <th scope="row"><?= ($row['total_weight']) ?></th>
      <th scope="row"><?= ($row['to']) ?></th>
      <th scope="row"><?= ($row['from']) ?></th>
      <th scope="row">
        <span id="distance-<?= $index ?>">Загрузка...</span>
      </th>
      <th scope="row">
      <?php 
      $days = (new DateTime($row['conclusion_date']))->diff(new DateTime($row['due_date']))->days;
      echo $days.' дней';
      ?>
      </th>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>