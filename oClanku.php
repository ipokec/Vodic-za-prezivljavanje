<?php


session_start();
include 'header.php';
 
$id=$_GET['id'];
$clanak=$_GET['id'];

if($_SESSION['tip']==2||$_SESSION['tip']==3) {
    if($clanak==0){
    $id=$_SESSION['clanak'];
    }else{
        $_SESSION['clanak']=$id;
    }
    /*
    $_SESSION['clanak']=$id;
    if($id==""){
    $id=$_SESSION['clanak'];
    }*/
    $upit = "SELECT * FROM `clanak` where idclanak = '".$id."' ";
    $rezultat = $baza->selectDB($upit);
    $red = $rezultat->fetch_array();
    
    if($_SESSION['tip']==2){
    $smarty->display('predlosci/userMeni.tpl');
    }elseif ($_SESSION['tip']==3) {
        $smarty->display('predlosci/moderatorMeni.tpl');
    }
    
    


    //komentirnaje
    if(isset($_POST['komentar'])){
        if($_POST['komentar']!=""){
            $korisnik=$_SESSION['id'];
            $_SESSION['clanak']=$id;
             $komentar=$_POST['komentar'];
             $upit = "INSERT INTO `WebDiP2014x052`.`komentari` (`korisnik` ,`clanak` ,`komentar` ,`vrijeme` ,`status` ,`idkomentar`)VALUES ('".$korisnik."', "
                     . "'".$id."', '".$komentar."',CURRENT_TIMESTAMP , '1', NULL)";
             $baza->updateDB($upit);
             $dobro="<p>Vaš komentar je objavljen</p>";
        }else{
            $greske="<p>Nite napisali komentar</p>";
        }
        
    }
    
    //ispis komentara
    $upit = "SELECT * FROM `komentari` where clanak='".$id."' ";
    $rezultatK = $baza->selectDB($upit);
    
    while($redK = $rezultatK->fetch_array()){
    
        $upit="SELECT * FROM korisnik WHERE idkorisnik ='".$redK["korisnik"]."'";    
        $rezultatKor = $baza->selectDB($upit);
        $redKor=$rezultatKor->fetch_array();
        
        
        $komentari.="<div class='komentar'>";
        $komentari.= "<p>Komentira: ".$redKor["ime"]." ".$redKor["prezime"]."</p>";
        $komentari.="<p >".$redK["komentar"]."</p>";
        $komentari.="<p>Objavljeno: ".$redK["vrijeme"]."</p>";
        
        if($_SESSION['tip']==3){
            if($_SESSION['id']!=$redKor["idkorisnik"]){
                
                $upit = "SELECT * FROM `zabrana` where korisnik='".$redK['korisnik']."' and clanak='".$id."'";
    
                $rezultatPO = $baza->selectDB($upit);
        
                if($rezultatPO->num_rows != 0){
                    $komentari.="<p>Korisnik je blokiran<p>";
                }  else {
                    
                    $komentari.="<a href='zabrani.php?id=".$redK['korisnik']."'>Blokiraj korisnika</a>";
                }
                
               
            }
        }
        
        
        if ($redK["korisnik"]==$_SESSION['id']){
            $komentari.="<a href='promijeniKomentar.php?id=".$redK['idkomentar']."'>Promijeni svoj komentar</a></div>";
        }else{
            $komentari.="</div>";
        }
  
    }
    
    //$greske=$_SESSION['clanak'];
    //$materijali="<a href='meterijali.php?id=".$_SESSION['clanak']."'>Materijali</a>";
    
    //ispis podataka o calnku
    $vrijeme= $red["kreiran"] ;
    
    if($_SESSION['tip']==3){
        $vrijeme.="</p><p><a href='uredi.php?id=".$id."'>Uredi članak</a>";
    }
    
    $smarty->assign('naslov',$red["naziv"]);
    $smarty->assign('sadrzaj',$red["opis"]);
    
    
    //$smarty->assign('materijali',$materijali);
    $smarty->assign('vrijeme',$vrijeme);
    
    $smarty->assign('komentari',$komentari);
    $smarty->assign('greske',$greske);
    $smarty->assign('dobro',$dobro);
    $smarty->display('predlosci/oClanku.tpl');
    $smarty->display('predlosci/komentiraj.tpl');
    
    //slanje ocjene
    if(isset($_POST['ocjeni'])){
        
        $korisnik=$_SESSION['id'];
        $_SESSION['clanak']=$id;
        $ocjena=$_POST['ocjena'];
             $upit = "INSERT INTO ocijene (`korisnik` ,`clanak` ,`ocijena`)VALUES ('".$korisnik."','".$id."', '".$ocjena."')";
             $baza->updateDB($upit);
             $dobro="<p>Vaš komentar je objavljen</p>";
        
        
    }
    
    
    //ocjena i ocjenjivanje
    
    
    $upit="SELECT * FROM ocijene WHERE korisnik ='".$_SESSION['id']."' and clanak='".$_SESSION['clanak']."'";    
    $rezultatOc = $baza->selectDB($upit);
    
    if($rezultatOc->num_rows != 0 || $_SESSION['tip']==3){
        $upit="SELECT AVG( ocijena ) FROM `ocijene` WHERE clanak ='".$_SESSION['clanak']."'";
        $rezultatPros = $baza->selectDB($upit);
        $redPros=$rezultatPros->fetch_array();
        $prosjek="<p>".$redPros[0]."</p>";
        $smarty->assign('ocjena',$prosjek);
        $smarty->display('predlosci/ocjena.tpl');
    }  else {
        $smarty->display('predlosci/ocjeni.tpl');
        
    }
   
}
include 'footer.php';




?>