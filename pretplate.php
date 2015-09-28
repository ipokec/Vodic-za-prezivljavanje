<?php


$upit = "SELECT * FROM `podrucje` , `pretplate` WHERE pretplate.korisnik ='".$_SESSION['id']."' AND pretplate.podrucje = podrucje.idpodrucje";
    $rezultat = $baza->selectDB($upit);
    
    while($red = $rezultat->fetch_array())
    {
        $popis.="<a href='detaljiPodrucja.php?idPodrucje=".$red["idpodrucje"]."' class='podrucja'>".$red["naziv"]."  </a>";
        
        
    }
    
    
    if($popis==""){
        $popis.="<p>Nema nikakvih pretplata</p>";
        $smarty->assign('popis',$popis);
        $smarty->display('predlosci/popisPretplate.tpl');
    } else {
        $smarty->assign('popis',$popis);
        $smarty->display('predlosci/popisPretplate.tpl');
        
}

    
    
    


?>
