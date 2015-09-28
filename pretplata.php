<?php

session_start();
include 'header.php';
if($_SESSION['tip']==2){
    $smarty->display('predlosci/userMeni.tpl');
    
    $id=$_GET['id'];
    
    $upit = "INSERT INTO pretplate (`podrucje` ,`korisnik`)VALUES ('".$id."','".$_SESSION['id']."')";
    $baza->updateDB($upit);
    
    
    echo '<h2>Uspješno ste se pretplatili na odabrano područje</h2>';
    
}

include './footer.php';
?>
