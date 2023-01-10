<?php
include_once 'db_fuggvenyek.php';
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF8" >
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
        <h3>Játékos felvétele:</h3>

        <form method = "POST" action="sportolofelvitel.php" accept-charset="utf-8">
            <table border="1">
                <tr>
             <td><label class="formlabel">Azonosítószám:</label></td>
            <td><input pattern=".{5,5}" required title="5 karakter szükséges!" type="number" name="sportoloID"/></td>
                <tr>
                <td><label class="formlabel">Név:</label></td>
                <td><input pattern=".{5,60}" required title="A név minimum 5, maximum 60 karakterből állhat!"  type="text" name="nev"/></td>
                </tr><tr>
                    <td><label class="formlabel">Születési év:</label></td>
                    <td><input pattern=".{4,4}" required title="A születési évet négy karakterben kell megadni!" type="number" min="1970" max="2010" name="szulev"/></td>
                </tr><tr>
                    <td><label class="formlabel">Poszt:</label></td>
                    <td><select name="poszt">
                        <option value="Irányító">Irányító</option>
                        <option value="Dobóhátvéd">Dobóhátvéd</option>
                        <option value="Alacsonybedobó">Alacsonybedobó</option>
                        <option value="Erőcsatár">Erőcsatár</option>
                        <option value="Center">Center</option>
                        </select>
                    </td>
                    </td>
                </tr><tr>
                    <td><label class="formlabel">Magasság:</label></td>
                    <td><input pattern=".{3,3}" required title="A magasságot 3 karakterben kell megadni, cm-ben!" type="number" min="150" max="230" name="magassag"/></td>
                </tr><tr>
                    <td><label class="formlabel">Csapat:</label></td>
                    <td><select name="csapatID">
                            <?php
                            $csapatok = csapatlistatLeker();
                            if(mysqli_num_rows($csapatok)>0){
                                while($egySor = mysqli_fetch_assoc($csapatok)){
                                    echo'<option value="'.$egySor["csapatID"].'">'.$egySor["csapatnév"].'</option>';
                                }
                            }
                            mysqli_free_result($csapatok);
                            ?>
                        </select></td>
                </tr>
             </table>
            <br/>
            <br/>
            <input class="forminput" type="submit" value="Felvétel">
        </form>
        <br/>

        <h3>Edző felvétele:</h3>

        <form method = "POST" action="sportolofelvitel.php" accept-charset="utf-8">
            <table border="1">
                <tr>
                    <td><label class="formlabel">Azonosítószám:</label></td>
                    <td><input pattern=".{5,5}" required title="5 karakter szükséges!" type="number" name="sportoloID"/></td><tr>
                    <td><label class="formlabel">Név:</label></td>
                    <td><input pattern=".{5,60}" required title="A név minimum 5, maximum 60 karakterből állhat!" type="text" name="nev"/></td>
                </tr><tr>
                    <td><label class="formlabel">Születési év:</label></td>
                    <td><input pattern=".{4,4}" required title="A születési évet négy karakterben kell megadni!" type="number" min="1950" max="2005" name="szulev"/></td>
                </tr><tr>
                    <td><label class="formlabel">Csapat:</label></td>
                    <td><select name="csapatID">
                            <?php
                            $csapatok = csapatlistatLeker();
                            if(mysqli_num_rows($csapatok)>0){
                                while($egySor = mysqli_fetch_assoc($csapatok)){
                                    echo'<option value="'.$egySor["csapatID"].'">'.$egySor["csapatnév"].'</option>';
                                }
                            }
                            mysqli_free_result($csapatok);
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
        <div>
            <h3>Játékosok:</h3>
            <table>
                <tr>
                    <th>Név</th>
                    <th>Születési év</th>
                    <th>Poszt</th>
                    <th>Magasság</th>
                    <th>Csapatnév</th>
                </tr>
                <?php
                $csapatok = sportemberJatekosokLeker();
                while( $egySor = mysqli_fetch_assoc($csapatok) ) {
                    echo '<form action="jatekostszerkeszt.php" method="POST">';
                    echo '<tr>';
                    '<td>'.$egySor["sportoloID"].'</td>'; #Játékos ID-ját lekérdezem a sportemberből, de nem iratom ki
                    echo '<td>'. $egySor["név"] .'</td>';
                    echo '<td>'. $egySor["születési év"] .'</td>';
                    echo '<td>'. $egySor["poszt"] .'</td>';
                    echo '<td>'. $egySor["magasság"] .'</td>';
                    echo '<td>'. $egySor["csapatnév"] .'</td>';
                    echo '<td><input type="submit" value="Szerkesztés"></td>';
                    echo '</tr>';
                    echo '<input type="hidden" name="sportoloID" value="'.$egySor["sportoloID"].'">';
                    echo '</form>';
                }
                mysqli_free_result($csapatok);
                ?>
            </table>
        </div>

    </div>
    <div class="column">
        <div>
            <h3>Edzők:</h3>
            <table>
                <tr>
                    <th>Név</th>
                    <th>Születési év</th>
                    <th>Csapatnév</th>
                </tr>
                <?php
                $edzok = sportemberEdzokLeker();
                while( $valami = mysqli_fetch_assoc($edzok) ) {
                    echo '<form action="edzotszerkeszt.php" method="POST">';
                    echo '<tr>';
                    '<td>'.$valami["sportoloID"].'</td>'; #EDZO ID-ja!!!
                    echo '<td>'. $valami["név"] .'</td>';
                    echo '<td>'. $valami["születési év"] .'</td>';
                    echo '<td>'. $valami["csapatnév"] .'</td>';
                    echo '<td><input type="submit" value="Szerkesztés"></td>';
                    echo '<input type="hidden" name="edzoID" value="'.$valami["sportoloID"].'">';
                    echo '</tr>';
                    echo '</form>';
                }
                mysqli_free_result($edzok);
                ?>
            </table>
        </div>
    </div>
</div>

</body>
</html>
