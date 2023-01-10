<?php
include_once("db_fuggvenyek.php");


    $v_sportoloID = $_POST['edzoID'];
    $v_nev = $_POST['nev'];
    $v_szulev = $_POST['szulev'];
    $v_csapatID = $_POST['csapatID'];


if (isset($v_sportoloID) && isset($v_nev) && isset($v_szulev) && isset($v_csapatID)){
    $v_sportoloID = htmlspecialchars($v_sportoloID);
    $v_nev = htmlspecialchars($v_nev);
    $v_szulev = htmlspecialchars($v_szulev);
    $v_csapatID = htmlspecialchars($v_csapatID);


    $suc = edzo_modosit($v_sportoloID, $v_nev, $v_szulev, $v_csapatID);

    if($suc == false){
        die("Nem sikerült a record felvétele az táblába!");
    }else{
        header("Location: spo.php");
    }
}
?>