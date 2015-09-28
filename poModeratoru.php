<?php


session_start();

if($_SESSION['tip']==1) {

include_once './header.php';


    $smarty->display('predlosci/adminMeni.tpl');

$upit = "SELECT * FROM korisnik where tipKorisnika=3";
    $rezultat = $baza->selectDB($upit);
          
    
    
    while($red = $rezultat->fetch_array())
    {
        $sadrzaj.="<tr>";
        $sadrzaj.="<td >".$red["ime"]." ".$red["prezime"]."</td>";
        
        $upit = "SELECT count(korisnik) FROM clanak where korisnik='".$red['idkorisnik']."'";
        $rezultatBroj = $baza->selectDB($upit);
        $redBroj = $rezultatBroj->fetch_array();
                
        
        $sadrzaj.="<td >".$redBroj[0]."</td>";
        $sadrzaj.="</tr>";
    }
    
    
        $naslov="<td>Moderator</td><td>Broj članaka</td>";
        $smarty->display('predlosci/poModeratoru.tpl');
        $smarty->assign('naslov',$naslov);
        $smarty->assign('sadrzaj',$sadrzaj);
        $smarty->display('predlosci/tablica.tpl');
      

}



include './footer.php';





?>