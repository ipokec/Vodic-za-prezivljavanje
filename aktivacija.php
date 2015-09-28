<?php

include_once './baza.class.php';

$baza = new Baza();

if(isset($_GET['kljuc'])){
    $poruka="";
    
    $kljuc=$_GET['kljuc'];
    
    $upit = "select * from korisnik where aktivacijskiKod ='".$kljuc."'";
    $rezultatK = $baza->selectDB($upit);
    $red = $rezultatK->fetch_array(); 
    
        
    $upit = "select * from pomak where id ='1'";
    $rezultatPomak = $baza->selectDB($upit);
    $redPomak = $rezultatPomak->fetch_array();
    
    $server= $redPomak['vrijeme'];
    
    $trenutnoVrijeme = date("Y-m-d H:i:s");
    
    $datumRegistracije=$red["kreiran"];
    
    
    
    $razlikaAktivacije = strtotime($datumRegistracije) - strtotime($server);
    
    echo $razlikaAktivacije;
    
        if($rezultatK->num_rows != 0){
            
            if($razlikaAktivacije > 86400){
                $poruka .= "<h2>Isteklo je vrijeme aktivacije.</h2>";
            } else {
                $poruka .= "<h2>Uspješno ste aktivirali svoj korisnički račun.</h2>";
                $upit = "update korisnik set status=4 where aktivacijskiKod ='".$kljuc."'";
                $baza->updateDB($upit);
            
                $poruka .="<a href='prijava.php'>Nastavite dalje.</a>";
                 /*
                header("Location: http://arka.foi.hr/WebDiP/2014/zadaca_04/ipokec/registracija.php");
                exit;
                */
            }
         
        }  else {
            
             $poruka .= "<h2>Desila se pogreška.</h2>";
            
        }
    
} else {
    $poruka.="<h2>Greška</h2>";
}

include './header.php';
$smarty->display('predlosci/neregistrMeni.tpl');

echo $poruka;

include './footer.php';

?>

