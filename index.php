<?php

session_start();
if(!isset($_SESSION['prijava'])){
    
    include 'header.php';
    
    $upit = "SELECT * FROM `podrucje`";
    $rezultat = $baza->selectDB($upit);
    
    while($red = $rezultat->fetch_array())
    {
        $popis.="<a href='detaljiPodrucja.php?idPodrucje=".$red["idpodrucje"]."' class='podrucja'>".$red["naziv"]."  </a>";
        
        
    }
    $smarty->display('predlosci/neregistrMeni.tpl');
    $smarty->assign('popis',$popis);
    $smarty->display('predlosci/popisPodrucja.tpl');
    include 'footer.php';
    

}
//registrirani korisnik
elseif ($_SESSION['tip']==2) {
    include 'header.php';
    $smarty->display('predlosci/userMeni.tpl');
    
    include 'pretplate.php';
    
    include 'footer.php';
} 
//administrator
elseif ($_SESSION['tip']==1) {
    include 'header.php';
    $smarty->display('predlosci/adminMeni.tpl');
    
    
    
    
    $upit = "SELECT * FROM `korisnik` where status='3'";
    $rezultat = $baza->selectDB($upit);
    
    while($red = $rezultat->fetch_array())
    {
        $sadrzaj.="<tr>";
        $sadrzaj.="<td >".$red["ime"]." ".$red["prezime"]."  </td>";
        
            $sadrzaj.="<td ><a href='odblokiraj.php?id=".$red['idkorisnik']."'>Odblokiraj</a></td>";
       
        $sadrzaj.="</tr>";
    }
    
    if($sadrzaj!=""){
        $naslov="<td>Ime i prezime</td><td>Promijeni status</td>";
        $smarty->display('predlosci/adminIndex.tpl');
        $smarty->assign('naslov',$naslov);
        $smarty->assign('sadrzaj',$sadrzaj);
        $smarty->display('predlosci/tablica.tpl');
    }  else {
        $sadrzaj="<p>Nema blokiranih korisnika.</p>";
        $smarty->assign('blokirani',$sadrzaj);
        $smarty->display('predlosci/adminIndex.tpl');
        
        
    }
     $smarty->display('predlosci/ostalo.tpl');
    
    include 'footer.php';
}
//moderator
elseif ($_SESSION['tip']==3) {
    include 'header.php';
    $smarty->display('predlosci/moderatorMeni.tpl');
    
    //include './podrucjeClanovi.php';
    
    $upit = "SELECT * FROM `podrucje` , `moderira` WHERE moderira.korisnik ='".$_SESSION['id']."' AND moderira.podrucje = podrucje.idpodrucje";
    $rezultat = $baza->selectDB($upit);
    
    while($red = $rezultat->fetch_array())
    {
        
        $popis.="<a href='detaljiPodrucja.php?idPodrucje=".$red["idpodrucje"]."' class='podrucja'>".$red["naziv"]."  </a>";
    }
    echo $popis;
    
    
    
    include 'footer.php';
}







?>