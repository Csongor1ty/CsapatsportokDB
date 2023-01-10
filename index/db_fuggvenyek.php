<?php
function csapatsportok_csatlakozas() {
    
    $conn = mysqli_connect("localhost", "root", "") 
			or die("Csatlakozási hiba");
			
    if ( false == mysqli_select_db($conn, "csapatsport" )  ) {
        return null;
    }
    
    mysqli_query($conn, 'SET NAMES UTF-8');
    mysqli_query($conn, 'SET character_set_results=utf8');
    mysqli_set_charset($conn, 'utf8');
    
    return $conn;
    
}

function csapatlistatLeker() {
    
    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }
    
	$result = mysqli_query( $conn,"SELECT csapatID, csapatnév, csoportnév, csarnoknév, csarnokcím FROM csapat, csoport WHERE csapat.csoportID=csoport.csoportID");
	if($result == false){
        die(mysqli_error($conn));
    }

    mysqli_close($conn);
	return $result;
}

function csoportokatLeker() {

    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }

    $result = mysqli_query( $conn,"SELECT csoportID, csoportnév, korosztály FROM csoport");
    mysqli_close($conn);
    return $result;
}

function noiCsoportokatLeker() {

    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }

    $result = mysqli_query( $conn,"SELECT csoportnév, korosztály FROM csoport where nem != 'F'");

    mysqli_close($conn);
    return $result;
}
function ferfiCsoportokatLeker() {

    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }

    $result = mysqli_query( $conn,"SELECT csoportnév, korosztály FROM csoport where nem != 'N'");

    mysqli_close($conn);
    return $result;
}

function sportemberJatekosokLeker() {

    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }

    $result = mysqli_query( $conn,"SELECT játékos.sportoloID, név, `születési év`, poszt, magasság, csapatnév from sportember, csapat, játékos where (csapat.csapatID=sportember.csapatID) and (sportember.sportoloID = játékos.sportoloID) order by név");

    mysqli_close($conn);
    return $result;
}
function sportemberEdzokLeker() {

    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }

    $result = mysqli_query( $conn,"SELECT edző.sportoloID, név, `születési év`, csapatnév from sportember, csapat, edző where (csapat.csapatID=sportember.csapatID) and (sportember.sportoloID = edző.sportoloID) order by név");

    mysqli_close($conn);
    return $result;
}

function jatekos_beszur($sportoloID, $nev, $szuletesi_ev, $poszt, $magassag, $csapatID) {
    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"INSERT INTO sportember(sportoloID, név, `születési év`, csapatID) 
							VALUES (?, ?, ?, ?)");

    $stmt2 = mysqli_prepare($conn, "INSERT INTO játékos(sportoloID, poszt, magasság) VALUES (?,?,?)");

    mysqli_stmt_bind_param($stmt, "dsdd", $sportoloID, $nev, $szuletesi_ev, $csapatID);
    mysqli_stmt_bind_param($stmt2, "dss", $sportoloID, $poszt, $magassag);

    $sikeres = mysqli_stmt_execute($stmt); mysqli_stmt_execute($stmt2);
    if ($sikeres == false){
        die(mysqli_error($conn));
    }
    mysqli_close($conn);
    return $sikeres;
}
function edzo_beszur($sportoloID, $nev, $szuletesi_ev, $csapatID) {
    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"INSERT INTO sportember(sportoloID, név, `születési év`, csapatID) 
							VALUES (?, ?, ?, ?)");

    $stmt2 = mysqli_prepare($conn, "INSERT INTO edző(sportoloID) VALUES (?)");

    mysqli_stmt_bind_param($stmt, "dsdd", $sportoloID, $nev, $szuletesi_ev, $csapatID);
    mysqli_stmt_bind_param($stmt2, "d", $sportoloID);

    $sikeres = mysqli_stmt_execute($stmt); mysqli_stmt_execute($stmt2);
    if ($sikeres == false){
        die(mysqli_error($conn));
    }
    mysqli_close($conn);
    return $sikeres;
}


function jatekos_modosit($sportoloID, $nev, $szuletesi_ev, $poszt, $magassag, $csapatID){
    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"UPDATE sportember, játékos SET `név` = ?, `születési év` = ?, poszt = ?, magasság = ?, csapatID = ? WHERE `sportember`.`sportoloID` = ? and játékos.sportoloID = ?");

    mysqli_stmt_bind_param($stmt, "sdsdddd",   $nev, $szuletesi_ev, $poszt, $magassag, $csapatID, $sportoloID, $sportoloID);

    $sikeres = mysqli_stmt_execute($stmt);
    if ($sikeres == false){
        die(mysqli_error($conn));
    }
    mysqli_close($conn);
    return $sikeres;
}

function jatekos_torol($sportoloID){
    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }
    $stmt1 = mysqli_prepare( $conn,"DELETE FROM sportember WHERE sportoloID = ?");
    $stmt2 = mysqli_prepare($conn, "DELETE FROM játékos WHERE sportoloID = ?");
    $stmt3 = mysqli_prepare( $conn,"DELETE FROM játékos WHERE sportoloID is NULL");

    mysqli_stmt_bind_param($stmt1, "d", $sportoloID);
    mysqli_stmt_bind_param($stmt2, "d", $sportoloID);

    $sikeres = mysqli_stmt_execute($stmt1);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_execute($stmt3);
    if ($sikeres == false){
        die(mysqli_error($conn));
    }
    mysqli_close($conn);
    return $sikeres;
}


function jatekos_leker($sportoloID){
    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }

    $stmt = mysqli_prepare( $conn,"SELECT sportember.sportoloID, név, `születési év`,poszt, magasság, csapatID FROM  játékos, sportember WHERE sportember.sportoloID = ? AND sportember.sportoloID=játékos.sportoloID");

    mysqli_stmt_bind_param($stmt, "d",$sportoloID);

    $sikeres = mysqli_stmt_execute($stmt);
    if ($sikeres == false){
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_result($stmt, $sportoloID, $nev, $szuletesi_ev, $poszt, $magassag, $csapatID);

    $eredmeny=array();
    mysqli_stmt_fetch($stmt);
    $eredmeny["sportoloID"]=$sportoloID;
    $eredmeny["nev"]=$nev;
    $eredmeny["szulev"]=$szuletesi_ev;
    $eredmeny["csapatID"]=$csapatID;
    $eredmeny["poszt"]=$poszt;
    $eredmeny["magassag"]=$magassag;

    mysqli_close($conn);
    return $eredmeny;
}
function edzo_leker($edzoID){
    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }

    $stmt = mysqli_prepare( $conn,"SELECT sportember.sportoloID, név, `születési év`, csapatID FROM  edző, sportember WHERE sportember.sportoloID = ? AND sportember.sportoloID=edző.sportoloID");

    mysqli_stmt_bind_param($stmt, "d",$edzoID);

    $sikeres = mysqli_stmt_execute($stmt);
    if ($sikeres == false){
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_result($stmt, $edzoID, $nev, $szuletesi_ev, $csapatID);

    $eredmeny=array();
    mysqli_stmt_fetch($stmt);
    $eredmeny["edzoID"]=$edzoID;
    $eredmeny["nev"]=$nev;
    $eredmeny["szulev"]=$szuletesi_ev;
    $eredmeny["csapatID"]=$csapatID;

    mysqli_close($conn);
    return $eredmeny;
}

function edzo_modosit($sportoloID, $nev, $szuletesi_ev, $csapatID){
    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"UPDATE sportember, edző SET `név` = ?, `születési év` = ?, csapatID = ? WHERE `sportember`.`sportoloID` = ? and edző.sportoloID = ?");

    mysqli_stmt_bind_param($stmt, "sdddd",   $nev, $szuletesi_ev, $csapatID, $sportoloID, $sportoloID);

    $sikeres = mysqli_stmt_execute($stmt);
    if ($sikeres == false){
        die(mysqli_error($conn));
    }
    mysqli_close($conn);
    return $sikeres;
}

function edzo_torol($sportoloID){
    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }
    $stmt1 = mysqli_prepare( $conn,"DELETE FROM sportember WHERE sportoloID = ?");
    $stmt2 = mysqli_prepare($conn, "DELETE FROM edző WHERE sportoloID = ?");
    $stmt3 = mysqli_prepare( $conn,"DELETE FROM edző WHERE sportoloID is NULL");

    mysqli_stmt_bind_param($stmt1, "d", $sportoloID);
    mysqli_stmt_bind_param($stmt2, "d", $sportoloID);

    $sikeres = mysqli_stmt_execute($stmt1);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_execute($stmt3);
    if ($sikeres == false){
        die(mysqli_error($conn));
    }
    mysqli_close($conn);
    return $sikeres;
}

function meccseketLeker() {

    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }

    $result = mysqli_query( $conn,"SELECT csapatnév, csarnoknév, csarnokcím, mikor, dobott_pontok, kapott_pontok FROM csapat, játszik, mérkőzés where csapat.csapatID=játszik.csapatID and játszik.meccsID = mérkőzés.meccsID order by mikor desc");

    mysqli_close($conn);
    return $result;
}

function elozoHaviMeccseketLeker() {

    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }

    $result = mysqli_query( $conn,"SELECT csapatnév, csarnoknév, csarnokcím, mikor, dobott_pontok, kapott_pontok
FROM
csapat, játszik, mérkőzés
where
csapat.csapatID=játszik.csapatID and játszik.meccsID = mérkőzés.meccsID and mikor = (SELECT mikor where year(mikor) = year(current_date - interval 1 month ) and month(mikor) = month(current_date - interval 1 month )) order by mikor desc");

    mysqli_close($conn);
    return $result;
}

function legtobbCsapatszamuBajnoksagLeker() {

    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }

    $result = mysqli_query( $conn,"select csoportnév, korosztály, count(csapat.csoportID) from csapat, csoport where csapat.csoportID = csoport.csoportID group by csoport.csoportID desc limit 1");

    mysqli_close($conn);
    return $result;
}

function topEgyCsapatLeker() {

    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }

    $result = mysqli_query( $conn,"select csoportnév, csapatnév, csarnoknév, count(dobott_pontok) from csoport, mérkőzés, csapat, játszik where csapat.csoportID = csoport.csoportID and csapat.csapatID = játszik.csapatID and játszik.meccsID = mérkőzés.meccsID and (dobott_pontok > kapott_pontok) group by csapatnév order by count(dobott_pontok) DESC LIMIT 1");

    mysqli_close($conn);
    return $result;
}

function csapat_beszur($csapatnev, $csaphelynev, $csaphelycim, $csoportID) {
    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"INSERT INTO csapat(csapatID, csapatnév, csarnoknév, csarnokcím, csoportID)
							VALUES (NULL, ?, ?, ?, ?)");

    mysqli_stmt_bind_param($stmt, "sssd", $csapatnev, $csaphelynev, $csaphelycim, $csoportID);

    $sikeres = mysqli_stmt_execute($stmt);
    if ($sikeres == false){
        die(mysqli_error($conn));
    }
    mysqli_close($conn);
    return $sikeres;
}

function csapat_leker($csapatID){
    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }

    $stmt = mysqli_prepare( $conn,"SELECT csapatID, csapatnév, csarnoknév, csarnokcím, csapat.csoportID from csapat, csoport where csapatID = ? and csapat.csoportID = csoport.csoportID");

    mysqli_stmt_bind_param($stmt, "d",$csapatID);

    $sikeres = mysqli_stmt_execute($stmt);
    if ($sikeres == false){
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_result($stmt, $csapatID, $csapatnev, $csarnoknev, $csarnokcim, $csoportID);

    $eredmeny=array();
    mysqli_stmt_fetch($stmt);
    $eredmeny["csapatID"]=$csapatID;
    $eredmeny["csapatnev"]=$csapatnev;
    $eredmeny["csarnoknev"]=$csarnoknev;
    $eredmeny["csarnokcim"]=$csarnokcim;
    $eredmeny["csoportID"]=$csoportID;

    mysqli_close($conn);
    return $eredmeny;
}

function csapat_modosit($csapatID, $csapatnev, $csarnoknev, $csarnokcim, $csoportID){
    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"UPDATE csapat SET csapatnév = ?, csarnoknév = ?, csarnokcím = ?, csoportID = ? WHERE csapatID = ?");

    mysqli_stmt_bind_param($stmt, "sssdd",   $csapatnev, $csarnoknev, $csarnokcim, $csoportID, $csapatID);

    $sikeres = mysqli_stmt_execute($stmt);
    if ($sikeres == false){
        die(mysqli_error($conn));
    }
    mysqli_close($conn);
    return $sikeres;
}

function csapat_torol($sportoloID){
    if ( !($conn = csapatsportok_csatlakozas()) ) {
        return false;
    }
    $stmt1 = mysqli_prepare( $conn,"DELETE FROM csapat WHERE csapatID = ?");

    mysqli_stmt_bind_param($stmt1, "d", $sportoloID);

    $sikeres = mysqli_stmt_execute($stmt1);
    if ($sikeres == false){
        die(mysqli_error($conn));
    }
    mysqli_close($conn);
    return $sikeres;
}
?>