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
        <h3>Új csapat hozzáadása:</h3>

        <form method = "POST" action="csapatfelvitel.php" accept-charset="utf-8">
            <table border="1">
                <tr>
                    <td><label class="formlabel">Csapat neve:</label></td>
                    <td><input pattern=".{10,60}" required title="A csapat neve minimum 5, maximum 60 karakterből állhat!" type="text" name="csapatnev"/></td><tr>
                    <td><label class="formlabel">Csarnok/Székhely név:</label></td>
                    <td><input pattern=".{10,60}" required title="A csarnok/székhely neve minimum 5, maximum 60 karakterből állhat!" type="text" name="csaphelynev"/></td>
                </tr><tr>
                    <td><label class="formlabel">Csarnok/Székhely cím:</label></td>
                    <td><input pattern=".{10,60}" required title="A csarnok/székhely címe minimum 5, maximum 60 karakterből állhat!" type="text" name="csaphelycim"/></td>
                </tr><tr>
                    <td><label class="formlabel">Csoport:</label></td>
                    <td><select name="csoportID">
                            <?php
                            $csoportok = csoportokatLeker();
                            if(mysqli_num_rows($csoportok)>0){
                                while($egySor = mysqli_fetch_assoc($csoportok)){
                                    echo'<option value="'.$egySor["csoportID"].'">'.$egySor["csoportnév"].'</option>';
                                }
                            }
                            mysqli_free_result($csoportok);
                            ?>
                        </select></td>
                </tr>
            </table>
            <br/>
            <br/>
            <input class="forminput" type="submit" value="Felvétel">
        </form>
    </div>
    <div class="column">
        <button onclick="myFunction()">Tábla elrejtése</button>
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
            <h3>Csapatok:</h3>
            <table>
                <tr>
                    <th>Csapat neve</th>
                    <th>Csoport neve</th>
                    <th>Csarnok neve</th>
                    <th>Csarnok címe</th>
                </tr>
                <?php
                $csapatok = csapatlistatLeker(); // ez egy eredményhalmazt ad vissza

                // soronként dolgozzuk fel az eredményt
                // minden sort egy asszociatív tömbben kapunk meg
                while( $egySor = mysqli_fetch_assoc($csapatok) ) {
                    echo '<form action="csapatotszerkeszt.php" method="POST">';
                    echo '<tr>';
                    '<td>'.$egySor["csapatID"].'</td>';
                    echo '<td>'. $egySor["csapatnév"] .'</td>';
                    echo '<td>'. $egySor["csoportnév"] .'</td>';
                    echo '<td>'. $egySor["csarnoknév"] .'</td>';
                    echo '<td>'. $egySor["csarnokcím"] .'</td>';
                    echo '<td><input type="submit" value="Szerkesztés"></td>';
                    echo '</tr>';
                    echo '<input type="hidden" name="csapatID" value="'.$egySor["csapatID"].'">';
                    echo '</form>';
                }
                mysqli_free_result($csapatok); // töröljük a listát a memóriából
                ?>
            </table>
        </div>
    </div>
    <div class="column">
        <h3>Top 1 csapat a győzelmek alapján:</h3>
        <table>
            <tr>
                <th>Csoport neve</th>
                <th>Csapat neve</th>
                <th>Csarnok neve</th>
                <th>Győzelmek száma</th>
            </tr>
            <?php
            $csapatok = topEgyCsapatLeker();
            while( $egySor = mysqli_fetch_assoc($csapatok) ) {
                echo '<tr>';
                echo '<td>'. $egySor["csoportnév"] .'</td>';
                echo '<td>'. $egySor["csapatnév"] .'</td>';
                echo '<td>'. $egySor["csarnoknév"] .'</td>';
                echo '<td>'. $egySor["count(dobott_pontok)"] .'</td>';
                echo '</tr>';
            }
            mysqli_free_result($csapatok);
            ?>
        </table>
    </div>
</div>

</body>
</html>
