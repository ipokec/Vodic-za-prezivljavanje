<?php

session_start();

$upit = "SELECT * FROM `podrucje` , `moderira` WHERE moderira.korisnik ='".$_SESSION['id']."' AND moderira.podrucje = podrucje.idpodrucje";
    $rezultat = $baza->selectDB($upit);
    
    while($red = $rezultat->fetch_array())
    {
        
        $popis.="<a href='detaljiPodrucja.php?idPodrucje=".$red["idpodrucje"]."' class='podrucja'>".$red["naziv"]."  </a>";
        
        echo "<h2>".$red['naziv']."</h2>";
        echo '<p>Pretplačeni:</p>';
        
        $upit = "SELECT * FROM `korisnik` , `pretplate` WHERE korisnik.idkorisnik = pretplate.korisnik AND pretplate.podrucje ='".$red['idpodrucje']."'";
        $rezultatKor = $baza->selectDB($upit);
        while($redKor = $rezultatKor->fetch_array()){
            $sadrzaj.="<tr>";
            $sadrzaj.="<td >".$redKor["ime"]." ".$redKor["prezime"]."  </td>";
        
            
            $sadrzaj.="<td>Odblokiraj</td>";
            $sadrzaj.="</tr>";
            
            
        }
        $naslov="<td>Pretplačeni</td><td>Blokiraj/Odblokiraj</td>";
        $smarty->assign('naslov',$naslov);
        $smarty->assign('sadrzaj',$sadrzaj);
        $smarty->assign('sadrzaj',$sadrzaj);
        
        $smarty->display('predlosci/tablica.tpl');
        
    }
    //echo "<script src='js/tablica.js></script>";






?>