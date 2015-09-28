<?php
session_start();

if($_SESSION['tip']==1) {

include_once './header.php';


    $smarty->display('predlosci/adminMeni.tpl');

$upit = "SELECT * FROM korisnik where status = 2";
    $rezultat = $baza->selectDB($upit);
          
    $popis="";
    $upit = "SELECT * FROM `korisnik`";
    $rezultat = $baza->selectDB($upit);
    
    while($red = $rezultat->fetch_array())
    {
        $sadrzaj.="<tr>";
        $sadrzaj.="<td >".$red["ime"]." ".$red["prezime"]."  </td>";
        if($red["status"]==3 || $red["status"]==1 ){
            $sadrzaj.="<td ><a href='odblokiraj.php?id=".$red['idkorisnik']."'>Odblokiraj</a></td>";
        }  else {
            $sadrzaj.="<td ><a href='blokiraj.php?id=".$red['idkorisnik']."'>Blokiraj</a></td>";
        }
        $sadrzaj.="<td ><a href='izmjeneOsobne.php?id=".$red['idkorisnik']."'>Izmjeni</a></td>";
        $sadrzaj.="</tr>";
    }
    
    
        $naslov="<td>Naziv</td><td>Pretplati/Odplati</td><td>Osobni podaci</td>";
        $smarty->display('predlosci/popisKorisnika.tpl');
        $smarty->assign('naslov',$naslov);
        $smarty->assign('sadrzaj',$sadrzaj);
        $smarty->display('predlosci/tablica.tpl');
      

}



include './footer.php';
?>