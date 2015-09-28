<?php
session_start();
include 'header.php';
if($_SESSION['tip']==1){
    $smarty->display('predlosci/adminMeni.tpl');
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
        
        $novi=$_POST['novi'];
        
        
             $upit = "update korisnik set tipKorisnika='3' where idkorisnik='".$novi."'";
             $baza->updateDB($upit);
             $dobro="<p>Uspješno ste dodali novog moderatora.</p>";
        
        
    }
    
    
    
    
$upit = "SELECT * FROM `korisnik` where tipKorisnika='2'";
    $rezultat = $baza->selectDB($upit);
    
    while($red = $rezultat->fetch_array())
    {
        
        $korisnik.="<option value='".$red['idkorisnik']."'>".$red['ime']." ".$red['prezime']."</option>";
       
    }
    $smarty->assign('greske',$greske);
     $smarty->assign('dobro',$dobro);
    $smarty->assign('korisnik',$korisnik);
    $smarty->display('predlosci/noviModerator.tpl');

}
include './footer.php';
?>