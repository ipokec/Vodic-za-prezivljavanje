<?php

session_start();
include 'header.php';
if($_SESSION['tip']==1){
    $smarty->display('predlosci/adminMeni.tpl');
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
        
        $naziv=$_POST['naziv'];
        $specif=$_POST['specificnost'];
        $moderator=$_POST['moderator'];
        
        if($naziv==""){
            $greske.="<p>Unesite naziv</p>";
        }elseif ($specif=="") {
            $greske.="<p>Unesite specifičnost</p>";
        }  else {
            
             $upit = "INSERT INTO podrucje (`naziv` ,`specificnost`)VALUES ('".$naziv."','".$specif."')";
             $baza->updateDB($upit);
             $dobro="<p>Uspješno ste kreirali novo područje.</p>";
        }
        
    }
    
    
    $smarty->assign('greske',$greske);
     $smarty->assign('dobro',$dobro);
     //$smarty->assign('moderatori',$moderatori);
     $smarty->display('predlosci/novoPodrucje.tpl');
    
}

include './footer.php';

?>