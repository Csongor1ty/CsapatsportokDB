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
<div class="row">
    <div class="column">

    </div>
    <div class="column">
        <button onclick="myFunction()">Összesített tábla elrejtése</button>
        <?php
        echo '<script type="text/JavaScript"> 
     function myFunction() {
  var x = document.getElementById("hide");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
     </script>'
        ;
        ?>
        <div id="hide">
            <h3>Összesített:</h3>
            <table>
                <tr>
                    <th>Csoport neve</th>
                    <th>Korosztály</th>
                </tr>
                <?php
                $csapatok = csoportokatLeker();
                while( $egySor = mysqli_fetch_assoc($csapatok) ) {
                    echo '<tr>';
                    echo '<td>'. $egySor["csoportnév"] .'</td>';
                    echo '<td>'. $egySor["korosztály"] .'</td>';
                    echo '</tr>';
                }
                mysqli_free_result($csapatok);
                ?>
            </table>
        </div>
        <h3>Férfi csoportok:</h3>
        <table>
            <tr>
                <th>Csoport neve</th>
                <th>Korosztály</th>
            </tr>
            <?php
            $csapatok = ferfiCsoportokatLeker();
            while( $egySor = mysqli_fetch_assoc($csapatok) ) {
                echo '<tr>';
                echo '<td>'. $egySor["csoportnév"] .'</td>';
                echo '<td>'. $egySor["korosztály"] .'</td>';
                echo '</tr>';
            }
            mysqli_free_result($csapatok);
            ?>
        </table>
            <h3>Női csoportok:</h3>
            <table>
                <tr>
                    <th>Csoport neve</th>
                    <th>Korosztály</th>
                </tr>
                <?php
                $csapatok = noiCsoportokatLeker();
                while( $egySor = mysqli_fetch_assoc($csapatok) ) {
                    echo '<tr>';
                    echo '<td>'. $egySor["csoportnév"] .'</td>';
                    echo '<td>'. $egySor["korosztály"] .'</td>';
                    echo '</tr>';
                }
                mysqli_free_result($csapatok);
                ?>
            </table>
    </div>
    <div class="column">
        <h3>A legtöbb csapattal rendelkező csoport:</h3>
        <table>
            <tr>
                <th>Csoport neve</th>
                <th>Korosztály</th>
                <th>Csapatok száma</th>
            </tr>
            <?php
            $csapatok = legtobbCsapatszamuBajnoksagLeker();
            while( $egySor = mysqli_fetch_assoc($csapatok) ) {
                echo '<tr>';
                echo '<td>'. $egySor["csoportnév"] .'</td>';
                echo '<td>'. $egySor["korosztály"] .'</td>';
                echo '<td>'. $egySor["count(csapat.csoportID)"] .'</td>';
                echo '</tr>';
            }
            mysqli_free_result($csapatok);
            ?>
        </table>
    </div>
</div>

</body>
</html>
