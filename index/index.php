<?php
    include_once 'db_fuggvenyek.php';
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Kosárlabdabajnokságok</title>
    <link rel="stylesheet" href="mystyle.css?v=<?php echo time(); ?>">
</head>

<body>

  <h1>Csapatsportok</h1>
  <h2>by: Tarjányi Csongor (ALEV84)</h2>
  <ul>
      <li><a class="active" href="./index.php">Főoldal</a></li>
      <li><a href="./csop.php">Csoportok</a></li>
      <li><a href="./csap.php">Csapatok</a></li>
      <li><a href="./spo.php">Sportolók</a></li>
      <li><a href="./merk.php">Mérkőzések</a></li>
  </ul>
<h2>Üdvözöllek az adatbázisok gyakorlatra készített alkalmazásomban!</h2>
<h3 style="background: rgba(1,1,1,70%)">Alap funkciók:

    <p>A felhasználó megtekintheti a nyomon követett bajnokságokat név és korosztály szerinti bontásban, továbbá a
    jelenleg legtöbb csapattal rendelkező bajnokságot/bajnokságokat.</p><p>Hozzáadhat új csapatot illetve módosíthat és törölhet
    meglévő csapatokat bármelyik meglévő csoportban a csapatnév és sportcsarnok adatainak kitöltésével. Ugyanitt megtekintheti
    azt a csapatot, amelyik jelenleg a legtöbb győzelemmel rendelkezik a mérkőzés adatok alapján. </p><p>Hozzáadhat új, illetve módosíthat
    és törölhet már meglévő sportolót attól függően, hogy játékost vagy edzőt szeretne hozzáadni egy adott csapathoz. Megtekintheti
    az összes eddigi mérkőzés adatait időrendi sorrendben, illetve megtekintheti azokat a mérkőzéseket, amelyeket csak az előző hónapban
        játszottak le a könnyebb elérhetőség érdekében (gyors bajnokságok).</p> <br/> <ol type="i"><li>Adatmanipuláció: 4 táblán (csapat, sportember, játékos, edző)
        </li><br/><li>Lekérdezések száma: 10, több összetett lekérdezéssel</li><br/><li>Összesen több, mint 100 rekorddal rendelkező táblák
            ( rekordok száma a táblák mellett)
        </li><br/><li>CRUD műveletek Specializáló kapcsolattal rendelkező táblákon</li></ol><br/> <p></p>
</h3>
</body>
</html>