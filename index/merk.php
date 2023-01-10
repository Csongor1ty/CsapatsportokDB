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
        <h3>Összesített:</h3>
        <table>
            <tr>
                <th>Csapat neve</th>
                <th>Csarnok neve</th>
                <th>Csarnok címe</th>
                <th>Mikor</th>
                <th>Dobott pontok</th>
                <th>Kapott pontok</th>
            </tr>
            <?php
            $csapatok = meccseketLeker();
            while( $egySor = mysqli_fetch_assoc($csapatok) ) {
                echo '<tr>';
                echo '<td>'. $egySor["csapatnév"] .'</td>';
                echo '<td>'. $egySor["csarnoknév"] .'</td>';
                echo '<td>'. $egySor["csarnokcím"] .'</td>';
                echo '<td>'. $egySor["mikor"] .'</td>';
                echo '<td>'. $egySor["dobott_pontok"] .'</td>';
                echo '<td>'. $egySor["kapott_pontok"] .'</td>';
                echo '</tr>';
            }
            mysqli_free_result($csapatok);
            ?>
        </table>
    </div>
    <div class="column">
        <h3>Előző havi mérkőzések:</h3>
        <table>
            <tr>
                <th>Csapat neve</th>
                <th>Csarnok neve</th>
                <th>Csarnok címe</th>
                <th>Mikor</th>
                <th>Dobott pontok</th>
                <th>Kapott pontok</th>
            </tr>
            <?php
            $csapatok = elozoHaviMeccseketLeker();
            while( $egySor = mysqli_fetch_assoc($csapatok) ) {
                echo '<tr>';
                echo '<td>'. $egySor["csapatnév"] .'</td>';
                echo '<td>'. $egySor["csarnoknév"] .'</td>';
                echo '<td>'. $egySor["csarnokcím"] .'</td>';
                echo '<td>'. $egySor["mikor"] .'</td>';
                echo '<td>'. $egySor["dobott_pontok"] .'</td>';
                echo '<td>'. $egySor["kapott_pontok"] .'</td>';
                echo '</tr>';
            }
            mysqli_free_result($csapatok);
            ?>
        </table>
    </div>
</div>

</body>
</html>
