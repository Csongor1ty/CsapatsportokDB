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
        <h3>Edző szerkesztése:</h3>
        <?php
        $v_edzoID = $_POST["edzoID"];
        $v_edzoID = htmlspecialchars($v_edzoID);
        $edzoadatai = edzo_leker($v_edzoID);
        ?>
        <form method = "POST" action="edzomodositas.php" accept-charset="utf-8">
            <table border="1">
                <tr>
                    <?php
                        echo '<input class="forminput" type="hidden" name="edzoID" value="'.$v_edzoID.'" />'
                        ?><tr>
                    <td><label class="formlabel">Név:</label></td>
                    <td><?php
                        echo '<input pattern=".{5,60}" required title="A név minimum 5, maximum 60 karakterből állhat!" class="forminput" type="text" name="nev" value="'.$edzoadatai["nev"].'" />'
                        ?></td>
                </tr><tr>
                    <td><label class="formlabel">Születési év:</label></td>
                    <td><?php
                        echo '<input pattern=".{4,4}" required title="A születési évet négy karakterben kell megadni!" class="forminput" type="number" min="1950" max="2005" name="szulev" value="'.$edzoadatai["szulev"].'" />'
                        ?></td>
                </tr><tr>
                    <td><label class="formlabel">Csapat:</label></td>
                    <td><select name="csapatID">
                            <?php
                            $csapatok = csapatlistatLeker();
                            if(mysqli_num_rows($csapatok)>0){
                                while($egySor = mysqli_fetch_assoc($csapatok)){
                                    if($edzoadatai["csapatID"] == $egySor["csapatID"]){
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
        <form method = "POST" action="edzotorles.php" accept-charset="utf-8">
            <?php
            echo '<input type="hidden" name="edzoID" value="'.$v_edzoID.'">';
            ?>
            <input class="forminput" type="submit" value="Törlés">
        </form>
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
                $csapatok = sportemberEdzokLeker();
                while( $egySor = mysqli_fetch_assoc($csapatok) ) {
                    echo '<tr>';
                    '<td>'.$egySor["sportoloID"].'</td>';
                    echo '<td>'. $egySor["név"] .'</td>';
                    echo '<td>'. $egySor["születési év"] .'</td>';
                    echo '<td>'. $egySor["csapatnév"] .'</td>';
                    echo '</tr>';
                }
                mysqli_free_result($csapatok);
                ?>
            </table>
        </div>
    </div>
</div>

</body>
</html>