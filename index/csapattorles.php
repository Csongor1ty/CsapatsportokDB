<?php
include_once("db_fuggvenyek.php");

$v_csapatID = $_POST['csapatID'];

if(isset($v_csapatID)){
    $v_csapatID = htmlspecialchars($v_csapatID);
    $sikeres = csapat_torol($v_csapatID);
    if($sikeres == false) {
        die("Nem sikerült törölni a rekordot.");
    }else{
        header("Location: csap.php");
    }
}else{
    error_log("Nincs beállítva legalább az egyik érték.");
}

?>