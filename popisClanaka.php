<?php
session_start();


if($_SESSION['tip']==3) {
    include 'header.php';
    $smarty->display('predlosci/moderatorMeni.tpl');
    
    
    
    $upit = "SELECT * FROM `clanak`  WHERE korisnik ='".$_SESSION['id']."'";
    $rezultat = $baza->selectDB($upit);
    
    while($red = $rezultat->fetch_array())
    {
        $sadrzaj.="<tr>";
        $sadrzaj.="<td>".$red["naziv"]."</td>";
        $sadrzaj.="<td><a href='oClanku.php?id=".$red["idclanak"]."'>Detalji</a></td>";
        $sadrzaj.="<td><ul><li><a href='dodajMat.php?id=".$red["idclanak"]."'>Dodaj slike</a></li>";
        $sadrzaj.="<li><a href='dodajVid.php?id=".$red["idclanak"]."'>Dodaj video</a></li>";
        $sadrzaj.="<li><a href='dodajOst.php?id=".$red["idclanak"]."'>Dodaj ostalo</a></li></ul></td>";
        
        $sadrzaj.="</tr>";
    }
   
    
    $naslov="<td>Naziv</td><td>Detalji</td><td>Dodaj materjale</td>";
    $smarty->assign('naslov',$naslov);
    $smarty->assign('sadrzaj',$sadrzaj);
    $smarty->display('predlosci/tablica.tpl');
    
    
}

include 'footer.php';



?>