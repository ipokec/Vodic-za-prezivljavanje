<?php

session_start();
include 'header.php';
 
$id=$_GET['id'];


if($_SESSION['tip']==2) {
    $smarty->display('predlosci/userMeni.tpl');
    
    if($id==0){
    $id=$_SESSION['komentar'];
    }else{
        $_SESSION['komentar']=$id;
    }
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if($_POST['komentar']==""){
            $greske="<p>Niste napisali komentar.</p>";
        }  else {
            $upit = "SELECT * FROM `komentari` where idkomentar='".$id."' and korisnik='".$_SESSION['id']."'";
            $rezultatK = $baza->selectDB($upit);
            $redK=$rezultatK->fetch_array();
            if($redK['komentar']==$_POST['komentar']){
                $greske="<p>Niste promijenili komentar.</p>";
            }  else {
                //mjenjanje komentara
                $upit = "UPDATE komentari SET komentar='".$_POST['komentar']."',vrijeme=CURRENT_TIMESTAMP  WHERE idkomentar = '".$id."' ";
    
                if($baza->updateDB($upit)){
                    $dobro="<p>Uspješno ste promijenili komentar.</p>";
                }  else {
                    $greske="<p>Desila se greška.</p>";
                }
                
            }
        }
        
    }
    
    
    
    $upit = "SELECT * FROM `komentari` where idkomentar='".$id."' and korisnik='".$_SESSION['id']."'";
    $rezultatK = $baza->selectDB($upit);
        $redK=$rezultatK->fetch_array();
        
        
    $smarty->assign('greske',$greske);
    $smarty->assign('dobro',$dobro);
    $smarty->assign('komentar',$redK['komentar']);
    $smarty->display('predlosci/promijeniKomentar.tpl');
    
}


include './footer.php';
?>