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
<ul>
    <li><a class="active" href="./index.php">Főoldal</a></li>
    <li><a href="./csop.php">Csoportok</a></li>
    <li><a href="./csap.php">Csapatok</a></li>
    <li><a href="./spo.php">Sportolók</a></li>
    <li><a href="./merk.php">Mérkőzések</a></li>
</ul>
<div class="row">
    <div class="column">
        <h3>Játékos szerkesztése:</h3>
        <?php
        $v_jatekosID = $_POST["sportoloID"];
        $v_jatekosID = htmlspecialchars($v_jatekosID);
        $jatekosadatai = jatekos_leker($v_jatekosID);
        ?>
        <form method = "POST" action="jatekosmodositas.php" accept-charset="utf-8">
            <table border="1">
                <tr>
                    <?php
                        echo '<input class="forminput" type="hidden" name="jatekosID" value="'.$v_jatekosID.'" />'
                        ?><tr>
                    <td><label class="formlabel">Név:</label></td>
                    <td><?php
                        echo '<input pattern=".{5,60}" required title="A név minimum 5, maximum 60 karakterből állhat!" class="forminput" type="text" name="nev" value="'.$jatekosadatai["nev"].'" />'
                        ?></td>
                </tr><tr>
                    <td><label class="formlabel">Születési év:</label></td>
                    <td><?php
                        echo '<input pattern=".{4,4}" required title="A születési évet négy karakterben kell megadni!" class="forminput" type="number" min="1970" max="2010" name="szulev" value="'.$jatekosadatai["szulev"].'" />'
                        ?></td>
                </tr><tr>
                    <td><label class="formlabel">Poszt:</label></td>
                    <td>
                        <select name="poszt">
                        <?php
                        $opciok = array("Irányító","Dobóhátvéd","Alacsonybedobó","Erőcsatár","Center");
                        foreach ($opciok as $adat){
                            if($jatekosadatai["poszt"] == $adat){
                                echo '<option value="'.$adat.'" selected>'.$adat.'</option>';
                            }else{
                                echo '<option value="'.$adat.'">'.$adat.'</option>';
                            }
                        }
                        ?>
                        </select>
                    </td>
                </tr><tr>
                    <td><label class="formlabel">Magasság:</label></td>
                    <td><?php
                        echo '<input pattern=".{3,3}" required title="A magasságot 3 karakterben kell megadni, cm-ben!" class="forminput" type="number" min="150" max="230" name="magassag" value="'.$jatekosadatai["magassag"].'" />'
                        ?></td>
                </tr><tr>
                    <td><label class="formlabel">Csapat:</label></td>
                    <td><select name="csapatID">
                            <?php
                            $csapatok = csapatlistatLeker();
                            if(mysqli_num_rows($csapatok)>0){
                                while($egySor = mysqli_fetch_assoc($csapatok)){
                                    if($jatekosadatai["csapatID"] == $egySor["csapatID"]){
                                        echo '<option value="'.$egySor["csapatID"].'" selected>'.$egySor["csapatnév"].'</option>';
                                    }else{
                                        echo'<option value="'.$egySor["csapatID"].'">'.$egySor["csapatnév"].'</option>';
                                    }
                                }
                            }
                            mysqli_free_result($csapatok);
                            ?>
                        </select></td>
                </tr>
            </table>
            <br/>
            <br/>
            <input class="forminput" type="submit" value="Módosítás">
        </form>
        <br/>
        <form method = "POST" action="jatekostorles.php" accept-charset="utf-8">
            <?php
            echo '<input type="hidden" name="sportoloID" value="'.$v_jatekosID.'">';
            ?>
            <input class="forminput" type="submit" value="Törlés">
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
                    echo '<tr>';
                    echo '<td>'. $egySor["név"] .'</td>';
                    echo '<td>'. $egySor["születési év"] .'</td>';
                    echo '<td>'. $egySor["poszt"] .'</td>';
                    echo '<td>'. $egySor["magasság"] .'</td>';
                    echo '<td>'. $egySor["csapatnév"] .'</td>';
                    echo '</tr>';
                    echo '</form>';
                }
                mysqli_free_result($csapatok);
                ?>
            </table>
        </div>
    </div>
</div>

</body>
</html>