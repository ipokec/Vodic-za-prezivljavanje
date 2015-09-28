<?php
session_start();
include 'header.php';
if($_SESSION['tip']==3){
    $smarty->display('predlosci/moderatorMeni.tpl');
    
    $id=$_GET['id'];
    $cl=$_SESSION['clanak'];
    
    
     $upit = "SELECT * FROM `korisnik` where idkorisnik='".$id."'";
    
    $rezultatPO = $baza->selectDB($upit);
        
    if($rezultatPO->num_rows != 0){
    
    $upit = "INSERT INTO `zabrana` (`korisnik`, `clanak`, `razlog`) VALUES (".$id.",".$cl.",'neprimjereni komentar')";
    
    if($baza->updateDB($upit)){
        echo '<h2>Uspješno ste zabranili korisniku priptup članku.</h2>';
    }  else {
        echo '<h2>Desila se greška.</h2>';
    }
        }  else {
            echo '<h2>Greška</h2>';
        }
    
    
}  else {
    echo '<h2>Nemate pravo pristupa.</h2>';
}

include './footer.php';





?>