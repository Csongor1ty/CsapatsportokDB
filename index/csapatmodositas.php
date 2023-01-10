<?php
include_once("db_fuggvenyek.php");


    $v_csapatID = $_POST['csapatID'];
    $v_csapatnev = $_POST['csapatnev'];
    $v_csarnoknev = $_POST['csarnoknev'];
    $v_csarnokcim = $_POST['csarnokcim'];
    $v_csoportID = $_POST['csoportID'];


if (isset($v_csapatID) && isset( $v_csapatnev) && isset($v_csarnoknev) && isset($v_csarnokcim) && isset($v_csoportID)){
    $v_csapatID = htmlspecialchars($v_csapatID);
    $v_csapatnev = htmlspecialchars($v_csapatnev);
    $v_csarnoknev = htmlspecialchars($v_csarnoknev);
    $v_csarnokcim = htmlspecialchars( $v_csarnokcim);
    $v_csoportID = htmlspecialchars(  $v_csoportID);


    $suc = csapat_modosit($v_csapatID, $v_csapatnev, $v_csarnoknev,$v_csarnokcim, $v_csoportID);

    if($suc == false){
        die("Nem sikerült a record felvétele az táblába!");
    }else{
        header("Location: csap.php");
    }
}
?>