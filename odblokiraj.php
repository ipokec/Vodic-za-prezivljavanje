<?php


session_start();
include 'header.php';
if($_SESSION['tip']==1){
    $smarty->display('predlosci/adminMeni.tpl');
    
    $id=$_GET['id'];
    
     $upit = "SELECT * FROM `korisnik` where status='3' and idkorisnik='".$id."'";
    
    $rezultatPO = $baza->selectDB($upit);
        
        if($rezultatPO->num_rows != 0){
    
    $upit = "UPDATE korisnik set status='2', brojPrijava='0' where idkorisnik='".$id."'";
    
    if($baza->updateDB($upit)){
        echo '<h2>Uspješno ste odblokirali korisnika.</h2>';
    }  else {
        echo '<h2>Desila se greška.</h2>';
    }
        }  else {
            echo '<h2>Greška</h2>';
        }
    
    
}

include './footer.php';



?>