<?php
include_once("db_fuggvenyek.php");

$v_csapatnev = $_POST['csapatnev'];
$v_csaphelynev = $_POST['csaphelynev'];
$v_csaphelycim = $_POST['csaphelycim'];
$v_csoportID = $_POST['csoportID'];

if (isset($v_csapatnev) && isset($v_csaphelynev) && isset($v_csaphelycim) && isset($v_csoportID)){
    $v_csapatnev = htmlspecialchars($v_csapatnev);
    $v_csaphelynev = htmlspecialchars($v_csaphelynev);
    $v_csaphelycim = htmlspecialchars($v_csaphelycim);
    $v_csoportID = htmlspecialchars($v_csoportID);


    $suc = csapat_beszur($v_csapatnev, $v_csaphelynev, $v_csaphelycim, $v_csoportID);

    if($suc == false){
        die("Nem sikerült a record felvétele az táblába!");
    }else{
        header("Location: csap.php");
    }
}else{
    error_log("Valamelyik érték nincs beállítva!");
}
?>