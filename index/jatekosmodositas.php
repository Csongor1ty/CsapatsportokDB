<?php
include_once("db_fuggvenyek.php");


    $v_sportoloID = $_POST['jatekosID'];
    $v_nev = $_POST['nev'];
    $v_szulev = $_POST['szulev'];
    $v_poszt = $_POST['poszt'];
    $v_magassag = $_POST['magassag'];
    $v_csapatID = $_POST['csapatID'];


if (isset($v_sportoloID) && isset($v_nev) && isset($v_szulev) && isset($v_poszt) && isset($v_magassag) && isset($v_csapatID)){
    $v_sportoloID = htmlspecialchars($v_sportoloID);
    $v_nev = htmlspecialchars($v_nev);
    $v_szulev = htmlspecialchars($v_szulev);
    $v_csapatID = htmlspecialchars($v_csapatID);
    $v_poszt = htmlspecialchars($v_poszt);
    $v_magassag = htmlspecialchars($v_magassag);


    $suc = jatekos_modosit($v_sportoloID, $v_nev, $v_szulev,$v_poszt,$v_magassag, $v_csapatID);

    if($suc == false){
        die("Nem sikerült a record felvétele az táblába!");
    }else{
        header("Location: spo.php");
    }
}
?>