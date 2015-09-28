<?php

session_start();
include 'header.php';
if($_SESSION['tip']==2){
    $smarty->display('predlosci/userMeni.tpl');
    

    $smarty->assign('popis',$popis);
    $smarty->display('predlosci/popisPodrucja.tpl');
    
    $upit = "SELECT * FROM `podrucje`";
    $rezultat = $baza->selectDB($upit);
    
    while($red = $rezultat->fetch_array())
    {
        $sadrzaj.="<tr>";
        $sadrzaj.="<td >".$red["naziv"]."  </td>";
        
        $upit = "select * from pretplate where podrucje ='".$red['idpodrucje']."' and korisnik='".$_SESSION['id']."'";
        $rezultatPO = $baza->selectDB($upit);
        
        if($rezultatPO->num_rows != 0){
            //$sadrzaj.="<td ><a href='odplata.php?id=".$red['idpodrucje']."'>odplati</a></td>";
            $sadrzaj.="<td >Več ste pretplačeni</td>";
        }  else {
            $sadrzaj.="<td ><a href='pretplata.php?id=".$red['idpodrucje']."'>Pretplati</a></td>";
            
        }
        
        
        $sadrzaj.="</tr>";
    }
    
    $naslov="<td>Naziv</td><td>Pretplati/Odplati</td>";
    $smarty->assign('naslov',$naslov);
    $smarty->assign('sadrzaj',$sadrzaj);
    $smarty->display('predlosci/tablica.tpl');
    
}
elseif($_SESSION['tip']==1){
    $smarty->display('predlosci/adminMeni.tpl');
    

    $smarty->assign('popis',$popis);
    $smarty->display('predlosci/popisPodrucja.tpl');
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
        
        $podrucje=$_POST['podrucje'];
        $moderator=$_POST['moderator'];
        
        $upit = "select * from moderira where podrucje ='".$podrucje."' and korisnik='".$moderator."'";
        $rezultatMod = $baza->selectDB($upit);
        
        if($rezultatMod->num_rows != 0){
            
            $greske .= "<p>Ovaj moderator već moderira to područje.</p>";
            
        }  else {
            $upit = "INSERT INTO moderira (`podrucje` ,`korisnik`)VALUES ('".$podrucje."','".$moderator."')";
             $baza->updateDB($upit);
        }
        
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
    
    
    $upit = "SELECT * FROM `podrucje`";
    $rezultat = $baza->selectDB($upit);
    
    while($red = $rezultat->fetch_array())
    {
        $sadrzaj.="<tr>";
        $sadrzaj.="<td >".$red["naziv"]."  </td>";
        
        $upit = "select count( korisnik ) from moderira where podrucje ='".$red['idpodrucje']."'";
        $rezultatBroj = $baza->selectDB($upit);
        $redBr = $rezultatBroj->fetch_array();
        
        $sadrzaj.="<td>".$redBr[0]."  </td>";
        
        $upit="SELECT * FROM `korisnik` , `moderira` WHERE moderira.podrucje='".$red['idpodrucje']."' AND moderira.korisnik=korisnik.idkorisnik";
        $rezultatModeratori = $baza->selectDB($upit);
        $sadrzaj.="<td><ul>";
        while($redModer = $rezultatModeratori->fetch_array()){
            $sadrzaj.="<li>".$redModer['ime']." ".$redModer['prezime']."</li>";
        }
        
        
        $sadrzaj.="</ul></td></tr>";
    }
    $naslov="<td>Naziv</td><td>Broj moderatora</td><td>Moderatori</td>";
    $smarty->assign('naslov',$naslov);
    $smarty->assign('sadrzaj',$sadrzaj);
    $smarty->display('predlosci/tablica.tpl');
    
    
    
    //puni formu
    $upit = "SELECT * FROM `korisnik` where tipKorisnika='3'";
    $rezultat = $baza->selectDB($upit);
    
    while($red = $rezultat->fetch_array())
    {
        
        $moderatori.="<option value='".$red['idkorisnik']."'>".$red['ime']." ".$red['prezime']."</option>";
        
    }
    
    $upit = "SELECT * FROM `podrucje` ";
    $rezultat = $baza->selectDB($upit);
    
    while($red = $rezultat->fetch_array())
    {
        
        $podrucje.="<option value='".$red['idpodrucje']."'>".$red['naziv']."</option>";
        
    }
    $smarty->assign('podrucje',$podrucje);
    $smarty->assign('moderatori',$moderatori);
    $smarty->display('predlosci/moderira.tpl');
    
}

include './footer.php';


?>