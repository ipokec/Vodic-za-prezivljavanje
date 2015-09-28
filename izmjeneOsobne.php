<?php
session_start();

if($_SESSION['tip']==1){
    include 'header.php';
     $smarty->display('predlosci/adminMeni.tpl');
    
    $id=$_GET['id'];
    
    if($id==0){
    $id=$_SESSION['mjenja'];
    }else{
        $_SESSION['mjenja']=$id;
    }
     
    $upit = "SELECT * FROM korisnik where idKorisnik = '".$id."' ";
    $rezultat = $baza->selectDB($upit);
    $red = $rezultat->fetch_array();
    
    if(isset($_POST['registracija'])){
    
    $promjene="";
    $izmjena="";
    
    if($red["ime"] != $_POST['ime']){
        if ($promjene == ""){
            $promjene .= "ime='".$_POST['ime']."'";
        }  else {
            $promjene .= ",ime='".$_POST['ime']."'";
        }
        
        $izmjena .="<p>Promijenili ste ime.</p>";
    }
    
    if($red["prezime"] != $_POST['prezime']){
        if ($promjene == ""){
            $promjene .= "prezime='".$_POST['prezime']."'";
        }  else {
            $promjene .= ",prezime='".$_POST['prezime']."'";
        }
        
        $izmjena .="<p>Promijenili ste prezime.</p>";
    }
    
    if($red["grad"] != $_POST['grad']){
        if ($promjene == ""){
            $promjene .= "grad='".$_POST['grad']."'";
        }  else {
            $promjene .= ",grad='".$_POST['grad']."'";
        }
        
        $izmjena .="<p>Promijenili ste grad.</p>";
    }
    
    if($red["adresa"] != $_POST['adresa']){
        if ($promjene == ""){
            $promjene .= "adresa='".$_POST['adresa']."'";
        }  else {
            $promjene .= ",adresa='".$_POST['adresa']."'";
        }
        
        $izmjena .="<p>Promijenili ste adresu.</p>";
    }
    
    if($red["email"] != $_POST['email']){
        if ($promjene == ""){
            $promjene .= "email='".$_POST['email']."'";
        }  else {
            $promjene .= ",email='".$_POST['email']."'";
        }
        
        $izmjena .="<p>Promijenili ste email.</p>";
    }
    
    if($red["korisnicko"] != $_POST['korisnicko']){
        if ($promjene == ""){
            $promjene .= "korisnicko='".$_POST['korisnicko']."'";
        }  else {
            $promjene .= ",korisnicko='".$_POST['korisnicko']."'";
        }
        
        $izmjena .="<p>Promijenili ste korisničko ime.</p>";
    }
    
    if($red["lozinka"] != $_POST['lozinka']){
        if ($promjene == ""){
            $promjene .= "lozinka='".$_POST['lozinka']."'";
        }  else {
            $promjene .= ",lozinka='".$_POST['lozinka']."'";
        }
        
        $izmjena .="<p>Promijenili ste lozinku.</p>";
    }
    
    if($red["telefon"] != $_POST['telefon']){
        if ($promjene == ""){
            $promjene .= "telefon='".$_POST['telefon']."'";
        }  else {
            $promjene .= ",telefon='".$_POST['telefon']."'";
        }
        
        $izmjena .="<p>Promijenili ste telefonski broj.</p>";
    }
    
    if($red["roden"] != $_POST['roden']){
        if ($promjene == ""){
            $promjene .= "roden='".$_POST['roden']."'";
        }  else {
            $promjene .= ",roden='".$_POST['roden']."'";
        }
        
        $izmjena .="<p>Promijenili ste datum rođenja.</p>";
    }
    
    if($red["spol"] != $_POST['spol']){
        if ($promjene == ""){
            $promjene .= "spol='".$_POST['spol']."'";
        }  else {
            $promjene .= ",spol='".$_POST['spol']."'";
        }
        
        $izmjena .="<p>Promijenili ste spol.</p>";
    }
    
    if($red["newsletter"] != $_POST['newsletter']){
        if ($promjene == ""){
            $promjene .= "newsletter='".$_POST['newsletter']."'";
        }  else {
            $promjene .= ",newsletter='".$_POST['newsletter']."'";
        }
        
        $izmjena .="<p>Promijenili ste primanje newslettera.</p>";
    }
    
    if($promjene!=""){
    $upit = "UPDATE korisnik SET ".$promjene
            . "  WHERE idKorisnik = '".$id."' ";
    
    if($baza->updateDB($upit)){
        
        
                $kraj="<p>Uspjeno ste obavili sljedeće izmjenje:</p>".$izmjena;
                $_SESSION['izmjene']=$kraj;
               
            
    }  else {
        $kraj="<p>Dogodila se pogreška</p>";
    }
    }
    
  }
    
    $upit = "SELECT * FROM korisnik where idkorisnik = '".$id."' ";
    $rezultat = $baza->selectDB($upit);
    $red = $rezultat->fetch_array();
    $ispis = '<label for="ime">Ime: </label><br/>';
    $ispis.= '<input id="ime" name="ime" value="'.$red["ime"].'">'. '<br/>';
    $ispis.= '<label for="prezime">Prezime: </label><br/>';
    $ispis.= '<input id="prezime" name="prezime" value="'.$red["prezime"].'">'. '<br/>';
    $ispis.= '<label for="slika">Slika: </label><br/>';
    $ispis.= '<img src=" '.$red["slika"].'" height=100 width=100><br/>';
    
    $ispis.= '<label for="zupanija">Županija: </label><br/>';
    $upit = "select * from zupanija where idzupanija='".$red["zupanija"]."'";
    $zupanijaR=$baza->selectDB($upit);
    $zupanija = $zupanijaR->fetch_array();
    $ispis.= '<input id="zupanija" value="'.$zupanija["naziv"].' ">'. '<br/>';
    
    $ispis.= '<label for="grad">Grad: </label><br/>';
    $ispis.= '<input id="grad" name="grad" value="'.$red["grad"].'">'. '<br/>';
    $ispis.= '<label for="adresa">Adresa: </label><br/>';
    $ispis.= '<input id="adresa" name="adresa" value="'.$red["adresa"].'">'. '<br/>';
    
    $ispis.= '<label for="email">Email: </label><br/>';
    $ispis.= '<input id="email" name="email" value="'.$red["email"].'">'. '<br/>';
    $ispis.= '<label for="korime">Korisničko ime: </label><br/>';
    $ispis.= '<input id="korime" name="korisnicko" value="'.$red["korisnicko"].'">'. '<br/>';
    
    $ispis.= '<label for="lozinka">Lozinka: </label><br/>';
    $ispis.= '<input id="lozinka" name="lozinka" value="'.$red["lozinka"].'">'. '<br/>';
    $ispis.= '<label for="telefon">Broj telefona: </label><br/>';
    $ispis.= '<input id="telefon" name="telefon" value="'.$red["telefon"].'">'. '<br/>';
    $ispis.= '<label for="datum">Datum rođenja: </label><br/>';
    $ispis.= '<input id="datum" name="roden" value="'.$red["roden"].'">'.'<br/>';
    
    $ispis.= '<label for="spol">Spol: </label><br/>';
    if ($red["spol"]=="M"){
        $ispis.='<input type="radio" id="spolM" name="spol" value="M" checked>M';
        $ispis.='<input type="radio" id="spolZ" name="spol" value="Z">Ž <br/>';      
    }
    if ($red["spol"]=="Z"){
        $ispis.='<input type="radio" id="spolM" name="spol" value="M" >M';
        $ispis.='<input type="radio" id="spolZ" name="spol" value="Z" checked>Ž <br/>';      
    }
    
    
    $ispis.= '<label for="newsletter">Prima li newsletter?</label><br/>';
    if ($red["newsletter"]=="da"){
        $ispis.='<input type="checkbox" id="newsletter" name="newsletter" value="da" checked>Da<br/>';
        $ispis.='<input type="checkbox" id="newsletter" name="newsletter" value="ne" >Ne';      
    } else {
        $ispis.='<input type="checkbox" id="newsletter" name="newsletter" value="da" >Da<br/>';
        $ispis.='<input type="checkbox" id="newsletter" name="newsletter" value="ne" checked>Ne';
    }
    

    
    
  if($_SESSION[izmjene]!=""){
      $izmjene=$_SESSION[izmjene];
      $_SESSION[izmjene]="";
  }
    
    $smarty->assign('izmjene',$izmjene);
$smarty->assign('ispis',$ispis);
$smarty->display('predlosci/oKorisniku.tpl');
    
    
    include './footer.php';
}



?>