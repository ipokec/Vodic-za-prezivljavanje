<?php


session_start();

if($_SESSION['tip']==1) {

include_once './header.php';


    $smarty->display('predlosci/adminMeni.tpl');

$upit = "SELECT * FROM podrucje ";
    $rezultat = $baza->selectDB($upit);
          
    
    
    while($red = $rezultat->fetch_array())
    {
        $sadrzaj.="<tr>";
        $sadrzaj.="<td >".$red["naziv"]."</td>";
        
        $upit = "SELECT count(podrucje) FROM clanak where podrucje='".$red['idpodrucje']."'";
        $rezultatBroj = $baza->selectDB($upit);
        $redBroj = $rezultatBroj->fetch_array();
                
        
        $sadrzaj.="<td >".$redBroj[0]."</td>";
        $sadrzaj.="</tr>";
    }
    
    
        $naslov="<td>Područje</td><td>Broj članaka</td>";
        $smarty->display('predlosci/poPodrucju.tpl');
        $smarty->assign('naslov',$naslov);
        $smarty->assign('sadrzaj',$sadrzaj);
        $smarty->display('predlosci/tablica.tpl');
      

}



include './footer.php';





?>