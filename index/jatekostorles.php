<?php
include_once("db_fuggvenyek.php");

$v_sportoloID = $_POST['sportoloID'];

if(isset($v_sportoloID)){
    $v_sportoloID = htmlspecialchars($v_sportoloID);
    $sikeres = jatekos_torol($v_sportoloID);
    if($sikeres == false) {
        die("Nem sikerült törölni a rekordot.");
    }else{
        header("Location: spo.php");
    }
}else{
    error_log("Nincs beállítva legalább az egyik érték.");
}

?>