<?php

include './header.php';

$greske ="";

if (isset($_POST['registracija'])){
    
    $korisnici_ime = $_POST['ime'];
    $korisnici_prezime = $_POST['prezime'];
    $korisnici_slika = $_POST['slika'];
    $korisnici_zupanija = $_POST['zupanija'];
    $korisnici_grad = $_POST['grad'];
    $korisnici_adresa = $_POST['adresa'];
    $korisnici_email = $_POST['email'];
    $korisnici_kime = $_POST['korisnickoIme'];
    $korisnici_lozinka = $_POST['lozinka'];
    $korisnici_telefon = $_POST['telefon'];
    $korisnici_roden = $_POST['roden'];
    $korisnici_spol = $_POST['spol'];
    $korisnici_newsletter = $_POST['newsletter'];
    // pocetak cation
    require_once('./reCaptcha/recaptchalib.php');
  $privatekey = "6LdITgYTAAAAAO_jv3Lf1gD51vgESnhRC_bhZSlH";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    $greske .= "<p>Niste ispravno unjeli captchu. </p>";
    /*die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");*/
  } else {
    
  
    
    if( empty($korisnici_ime) || empty($korisnici_prezime) || empty($korisnici_zupanija) || empty($korisnici_grad) || empty($korisnici_adresa) || empty($korisnici_email) || empty($korisnici_kime) || empty($korisnici_lozinka) || empty($korisnici_telefon) || empty($korisnici_roden) || empty($korisnici_spol) ){
        $greske .= "<p>Niste popunili sva polja. </p>";
    }
    
    if(!filter_var($korisnici_email,FILTER_VALIDATE_EMAIL)){
        $greske .= "<p>Netočno strukturirana e-mail adresa. </p>";
    }
    if(!preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\w{5,}$/", $korisnici_lozinka)){
        $greske .= "<p>Krivo strukturirana lozinka. </p>";
    }
    
    $ime = substr($korisnici_ime, 0);
    $prezime = substr($korisnici_prezime, 0);
    $grad = substr($korisnici_grad, 0);
    /*
    require_once 'reCaptcha/recaptchalib.php';   
        if (!recaptcha_check_answer('6LdITgYTAAAAAO_jv3Lf1gD51vgESnhRC_bhZSlH', $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field'])->is_valid) 
        {
            $greske .="<p>Captcha nije dobra</p>";
        }*/
    
    if(empty($greske)){
        
        $upit = "select * from korisnik where email ='".$korisnici_email."'";
        $rezultatE = $baza->selectDB($upit);
        
        $upit = "select * from korisnik where korisnicko ='".$korisnici_kime."'";
        $rezultatI = $baza->selectDB($upit);
        
        if($rezultatE->num_rows != 0){
            
            $greske .= "<p>Zauzeta email adresa.</p>";
            
        } elseif($rezultatI->num_rows != 0){
            
            $greske .= "<p>Zauzeto korisničko ime.</p>";
            
        } elseif(ctype_upper($ime)){
            
            $greske .= "<p>Ime ne počinje velikim slovom.</p>";
            
        } elseif(ctype_upper($prezime)){
            
            $greske .= "<p>Prezime ne počinje velikim slovom.</p>";
            
        } elseif(ctype_upper($grad)){
            
            $greske .= "<p>Grad ne počinje velikim slovom.</p>";
            
        } else {
            
            do{
            $aktivacijskiKod = mt_rand(1,9999999999999999);
            $upit = "select * from korisnik where aktivacijskiKod ='".$aktivacijskiKod."'";
            $rezultatAkt = $baza->selectDB($upit);
            
            }while ($rezultatAkt->num_rows != 0);
            $upit = "insert into  korisnik (tipKorisnika, ime, prezime,slika,zupanija,grad,adresa,email,korisnicko,lozinka,telefon,roden,spol,newsletter,status,aktivacijskiKod,kreiran)"
                    . "values ('2','$korisnici_ime','$korisnici_prezime','$korisnici_slika','$korisnici_zupanija','$korisnici_grad','$korisnici_adresa','$korisnici_email','$korisnici_kime','$korisnici_lozinka','$korisnici_telefon','$korisnici_roden','$korisnici_spol','$korisnici_newsletter','1','$aktivacijskiKod',CURRENT_TIMESTAMP)";
            
            
            if($baza->updateDB($upit)){
                
                $primatelj = $korisnici_email;
                $naslov = "Aktivacija korisničkog računa";
                $poruka = "Poštovani/a, molimo vas da aktivirate svoj korinsnički račun"
                    ."putem ovog linka http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/aktivacija.php?kljuc=".$aktivacijskiKod." za aktivaciju.";
             
                mail($primatelj,$naslov, $poruka);
                $dobro= '<p>Uspješno ste se registrirali. Provjerite mail kako bi dovršili registraciju.</p>';
            } else {
                $greska .= "Greška pri radu sa bazom podataka.<br />";
            }
            
        }
    }
  }
    
    
}


require_once('./reCaptcha/recaptchalib.php');
$publickey = "6LdITgYTAAAAAFOsa_yNPMFyg25Eopi8yGpCQnoA";
$captcha=recaptcha_get_html($publickey);



$smarty->display('predlosci/neregistrMeni.tpl');
$smarty->assign('greske',$greske);
$smarty->assign('dobro',$dobro);
$smarty->assign('sigurnost',$captcha);
$smarty->display('predlosci/registracija.tpl');

include './footer.php';



?>

           
            
       