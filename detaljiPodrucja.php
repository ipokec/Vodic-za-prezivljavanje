<?php
session_start();
include 'header.php';
 


$id=$_GET['idPodrucje'];
if(!isset($_SESSION['prijava'])){
$upit = "SELECT * FROM `podrucje` where idpodrucje = '".$id."' ";
    $rezultatP = $baza->selectDB($upit);
    $redP = $rezultatP->fetch_array();
    $naziv=$redP['naziv'];
    
$upit="select * FROM clanak where podrucje='".$id."' ";    
$rezultatC = $baza->selectDB($upit);
    while($redC = $rezultatC->fetch_array())
    {
        $popis.="<tr>";
        $popis.="<td>".$redC["naziv"]."</td>";
        
        $upit="SELECT COUNT( clanak ) FROM `video` WHERE clanak ='".$redC["idclanak"]."' ";    
        $rezultatV = $baza->selectDB($upit);
        $redV=$rezultatV->fetch_array();
        $popis.="<td>".$redV[0]."  </li>";
        
        $upit="SELECT COUNT( clanak ) FROM `slika` WHERE clanak ='".$redC["idclanak"]."' ";    
        $rezultatS = $baza->selectDB($upit);
        $redS=$rezultatS->fetch_array();
        $popis.="<td>".$redS[0]."</td>";
        
        $upit="SELECT COUNT( clanak ) FROM `dokumenti` WHERE clanak ='".$redC["idclanak"]."' ";    
        $rezultatM = $baza->selectDB($upit);
        $redM=$rezultatM->fetch_array();
        $popis.="<td>".$redM[0]."</td>";
        $popis.="</tr>";
        
    }
       
$smarty->display('predlosci/neregistrMeni.tpl');
$smarty->assign('naziv',$naziv);


if($popis==""){
        $popis.="<p>Nema nikakvih materijala</p>";
        $smarty->assign('popis',$popis);
        $smarty->display('predlosci/detaljiPodrucja.tpl');
    } else {
        $smarty->display('predlosci/detaljiPodrucja.tpl');
        $naslov="<td>Naziv</td><td>Br. videa</td><td>Br. slika</td><td>Br. ostalih materijala</td>";
        $smarty->assign('naslov',$naslov);
        $smarty->assign('sadrzaj',$popis);
        $smarty->display('predlosci/tablica.tpl');
        
}
}elseif ($_SESSION['tip']==2) {
    $upit = "SELECT * FROM `podrucje` where idpodrucje = '".$id."' ";
    $rezultatP = $baza->selectDB($upit);
    $redP = $rezultatP->fetch_array();
    $naziv=$redP['naziv'];
    
    $upit="select * FROM clanak where podrucje='".$id."' ";    
    $rezultatC = $baza->selectDB($upit);
    
    while($redC = $rezultatC->fetch_array())
    {
        $upit="SELECT * FROM zabrana WHERE korisnik ='".$_SESSION['id']."' and clanak='".$redC["idclanak"]."'";    
        $rezultatZab = $baza->selectDB($upit);
        if($rezultatZab->num_rows == 0){
        $popis.="<tr>";
        $popis.="<td><a href='oClanku.php?id=".$redC["idclanak"]."'>".$redC["naziv"]."</a></td>";
        $popis.="<td>".$redC["kreiran"]."</td>";
        
        $upit="SELECT * FROM korisnik WHERE idkorisnik ='".$redC["korisnik"]."'";    
        $rezultatA = $baza->selectDB($upit);
        $redA=$rezultatA->fetch_array();
        $popis.="<td>".$redA["ime"]." ".$redA["prezime"]."</td>";
        
        
        $upit="SELECT AVG( ocijena ) FROM `ocijene` WHERE clanak ='".$redC["idclanak"]."'";
        $rezultatPros = $baza->selectDB($upit);
        $redPros=$rezultatPros->fetch_array();
        $popis.="<td>".$redPros[0]."</td>";
        }
        
    }
    
    $smarty->display('predlosci/userMeni.tpl');
$smarty->assign('naziv',$naziv);


if($popis==""){
        $popis.="<p>Nema nikakvih materijala obican</p>";
        $smarty->assign('popis',$popis);
        $smarty->display('predlosci/detaljiPodrucja.tpl');
    } else {
        $smarty->display('predlosci/detaljiPodrucja.tpl');
        $naslov="<td>Naziv</td><td>Kreiran</td><td>Autor</td><td>Ocjena</td>";
        $smarty->assign('naslov',$naslov);
        $smarty->assign('sadrzaj',$popis);
        $smarty->display('predlosci/tablica.tpl');
    
}
}elseif ($_SESSION['tip']==3) {
    $id=$_GET['idPodrucje'];
    $smarty->display('predlosci/moderatorMeni.tpl');
    
    $upit = "SELECT * FROM `korisnik` , `pretplate` WHERE korisnik.idkorisnik = pretplate.korisnik AND pretplate.podrucje ='".$id."'";
        $rezultatKor = $baza->selectDB($upit);
        
        while($redKor = $rezultatKor->fetch_array()){
            $sadrzaj.="<tr>";
            $sadrzaj.="<td >".$redKor["ime"]." ".$redKor["prezime"]."  </td>";
            
            //$sadrzaj.="<td ><a href='odblokiraj.php?id=".$red['idkorisnik']."'>Odblokiraj</a></td>";
            
            $sadrzaj.="</tr>";
          
        }
        $naslov="<td>Pretplačeni</td>";
        $smarty->assign('naslov',$naslov);
        $smarty->assign('sadrzaj',$sadrzaj);
        
        
        $smarty->display('predlosci/tablica.tpl');
    
}
include 'footer.php';

?>