<?php
session_start();
include './header.php';
$smarty->display('predlosci/neregistrMeni.tpl');

if($_SERVER['REQUEST_METHOD']=="POST"){
    if($_POST['email']!=""){
        
        $upit = "select * from korisnik where email ='".$_POST['email']."'";
        $rezultatE = $baza->selectDB($upit);
        
        if($rezultatE->num_rows != 0){
            $red = $rezultatE->fetch_array();
                        $primatelj = $red['email'];
                        $naslovp="Poštovani/a,";
                        $naslov = "Vaša lozinka";
                        $poruka = " šaljemo vam vašu lozinku:".$red['lozinka']." ";
                        
                        mail($primatelj,$naslov, $poruka,$naslovp);
            $dobro.="<p>Poslan vam je mail s vašom lozinkom.</p>";
        }else{
            $greske.="<p>Niste unijeli ispravnu email adresu.</p>";
        }
        
    }  else {
        $greske.="<p>Niste unijeli email adresu.</p>";
    }
    
}
$smarty->assign('dobro',$dobro);
$smarty->assign('greske',$greske);
$smarty->display('predlosci/lozinka.tpl');
include './footer.php';
?>