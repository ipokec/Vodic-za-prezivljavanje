<?php
session_start();
include 'header.php';
if($_SESSION['tip']==3){
    $smarty->display('predlosci/moderatorMeni.tpl');
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
        
        if($_POST['naslov']!="" && $_POST['opis']!=""){
            
            $podrucje=$_POST['podrucje'];
            $naslov=$_POST['naslov'];
            $opis=$_POST['opis'];
            $obavjest=$_POST['posalji'];
            
            $upit = "INSERT INTO `clanak` (`podrucje`, `korisnik`, `naziv`,`opis`,`kreiran`) VALUES (".$podrucje.",".$_SESSION['id'].",'".$naslov."','".$opis."',CURRENT_TIMESTAMP)";
            
            if($baza->updateDB($upit)){
                if($obavjest=="da"){
                    
                    $upit = "SELECT * FROM clanak ORDER BY idclanak DESC LIMIT 1";
                    $rezultatId = $baza->selectDB($upit);
                    $redId = $rezultatId->fetch_array();
                    
                    $upit = "SELECT * FROM pretplate, korisnik WHERE pretplate.korisnik = korisnik.idkorisnik AND pretplate.podrucje ='".$podrucje."' ";
                    $rezultatPrima = $baza->selectDB($upit);
                    
                    while($redPrima = $rezultatPrima->fetch_array()){
                        $primatelj = $redPrima['email'];
                        $naslovp="Poštovani/a,";
                        $naslov = "Novi članak";
                        $poruka = " evo mojeg novog članka koji "
                        ."se nalazi na ovom linku http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/oClanku.php?id=".$redId['idclanak']." ";
                        
                        mail($primatelj,$naslov, $poruka,$naslovp);
                    }
                    
                    $dobro.="<p>Uspješno ste kreirali novi članak i obavijestili sve korisnike o njemu.</p>";
                }elseif ($obavjest=="ne") {
                    $dobro.="<p>Uspješno ste kreirali novi članak.</p>";
                }  else {
                    $greske.="<p>Došlo je do greške prilikom rada.</p>";
                }
                
            }  else {
                $greske.="<p>Došlo je do greške prilikom unosa.</p>";
            }
            
        } else {
            $greske.="<p>Niste sve popunili</p>";
        }
        
        
    }
    
    
    $upit = "SELECT * FROM `podrucje` , moderira WHERE podrucje.idpodrucje = moderira.podrucje and moderira.korisnik='".$_SESSION['id']."'";
    
    $rezultat = $baza->selectDB($upit);
    
    while($red = $rezultat->fetch_array())
    {
        
        $podrucje.="<option value='".$red['podrucje']."'>".$red['naziv']." </option>";
       
    }
    $smarty->assign('greske',$greske);
    $smarty->assign('dobro',$dobro);
    $smarty->assign('podrucje',$podrucje);
    $smarty->display('predlosci/noviClanak.tpl');
    include './footer.php';
}  else {
    echo '<h2>Nemate pravo pristupa.</h2>';
}








?>