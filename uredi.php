<?php
session_start();
include 'header.php';
 
$id=$_GET['id'];
$clanak=$_GET['id'];

if($_SESSION['tip']==3) {
    $smarty->display('predlosci/moderatorMeni.tpl');
    
    if($clanak==0){
    $id=$_SESSION['clanak'];
    }else{
        $_SESSION['clanak']=$id;
    }
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if($_POST['naslov']==""||$_POST['opis']==""){
            $greske="<p>Imate prazna polja.</p>";
        }  else {
            
                $upit = "UPDATE clanak SET naziv='".$_POST['naslov']."',opis='".$_POST['opis']."' ,kreiran=CURRENT_TIMESTAMP  WHERE idclanak = '".$id."' ";
    
                if($baza->updateDB($upit)){
                    $dobro="<p>Uspješno ste promijenili komentar.</p>";
                }  else {
                    $greske="<p>Desila se greška.</p>";
                }
                
            }
        }
        
    
    
    
    
    $upit = "SELECT * FROM `clanak` where idclanak='".$id."' and korisnik='".$_SESSION['id']."'";
    $rezultatC = $baza->selectDB($upit);
        $redC=$rezultatC->fetch_array();
        
        
    $smarty->assign('greske',$greske);
    $smarty->assign('dobro',$dobro);
    $smarty->assign('naslov',$redC['naziv']);
    $smarty->assign('opis',$redC['opis']);
    $smarty->display('predlosci/uredi.tpl');
    
}


include './footer.php';




?>