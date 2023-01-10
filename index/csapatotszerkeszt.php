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
        <h3>Csapat szerkesztése:</h3>
        <?php
        $v_csapatID = $_POST["csapatID"];
        $v_csapatID = htmlspecialchars($v_csapatID);
        $csapatadatai = csapat_leker($v_csapatID);
        ?>
        <form method = "POST" action="csapatmodositas.php" accept-charset="utf-8">
            <table border="1">
                <tr>
                    <?php
                        echo '<input class="forminput" type="hidden" name="csapatID" value="'.$v_csapatID.'" />'
                        ?><tr>
                    <td><label class="formlabel">Csapat neve:</label></td>
                    <td><?php
                        echo '<input pattern=".{5,60}" required title="A csapat neve minimum 5, maximum 60 karakterből állhat!" class="forminput" type="text" name="csapatnev" value="'.$csapatadatai["csapatnev"].'" />'
                        ?></td>
                </tr><tr>
                    <td><label class="formlabel">Csarnok/székhely név:</label></td>
                    <td><?php
                        echo '<input pattern=".{5,60}" required title="A csarnok/székhely neve minimum 5, maximum 60 karakterből állhat!" class="forminput" type="text" name="csarnoknev" value="'.$csapatadatai["csarnoknev"].'" />'
                        ?></td>
                </tr><tr>
                    <td><label class="formlabel">Csarnok/székhely cím:</label></td>
                    <td><?php
                        echo '<input pattern=".{5,60}" required title="A csarnok/székhely címe minimum 5, maximum 60 karakterből állhat!" class="forminput" type="text" name="csarnokcim" value="'.$csapatadatai["csarnokcim"].'" />'
                        ?></td>
                </tr><tr>
                    <td><label class="formlabel">Csoport:</label></td>
                    <td><select name="csoportID">
                            <?php
                            $csapatok = csoportokatLeker();
                            if(mysqli_num_rows($csapatok)>0){
                                while($egySor = mysqli_fetch_assoc($csapatok)){
                                    if($csapatadatai["csoportID"] == $egySor["csoportID"]){
                                        echo '<option value="'.$egySor["csoportID"].'" selected>'.$egySor["csoportnév"].'</option>';
                                    }else{
                                        echo'<option value="'.$egySor["csoportID"].'">'.$egySor["csoportnév"].'</option>';
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
        <form method = "POST" action="csapattorles.php" accept-charset="utf-8">
            <?php
            echo '<input type="hidden" name="csapatID" value="'.$v_csapatID.'">';
            ?>
            <input class="forminput" type="submit" value="Törlés">
        </form>
    </div>
    <div class="column">
        <div>
            <h3>Csapatok:</h3>
            <table>
                <tr>
                    <th>Csapat neve</th>
                    <th>Csoport neve</th>
                    <th>Csarnok neve</th>
                    <th>Csarnok címe</th>
                </tr>
                <?php
                $csapatok = csapatlistatLeker();
                while( $egySor = mysqli_fetch_assoc($csapatok) ) {
                    echo '<form action="csapatotszerkeszt.php" method="POST">';
                    echo '<tr>';
                    echo '<td>'. $egySor["csapatnév"] .'</td>';
                    echo '<td>'. $egySor["csoportnév"] .'</td>';
                    echo '<td>'. $egySor["csarnoknév"] .'</td>';
                    echo '<td>'. $egySor["csarnokcím"] .'</td>';
                    echo '<td><input type="submit" value="Szerkesztés"></td>';
                    echo '</tr>';
                    echo '<input type="hidden" name="csapatID" value="'.$egySor["csapatID"].'">';
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