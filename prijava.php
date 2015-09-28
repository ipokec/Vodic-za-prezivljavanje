<?php
ob_start(); 
session_start();
include './header.php';


if($_SERVER['REQUEST_METHOD']=="POST"){
    
    $kor_ime=$_POST['korisnik'];
    $kor_lozinka=$_POST['lozinka'];
    
    $kreiranoVrijeme = new DateTime();
    $trenutnoVrijeme = $kreiranoVrijeme->format('Y-m-d H:i:s');
    
    $upit="SELECT * FROM korisnik WHERE korisnicko='$kor_ime'";
    $rezultat=$baza->selectDB($upit);
    $podaci=$rezultat->fetch_array();
    if(empty($kor_ime) || empty($kor_lozinka)){
        $greske.="<p>Korisničko ime i lozinka moraju biti uneseni </p>";
        }  else {
            if($podaci['brojPrijava']==3||$podaci['status']==3){
                $greske.="<p>Vaš korisnički račun je zaključan. </p>";
            }elseif ($podaci['lozinka']==$kor_lozinka && ($podaci['status']==2 || $podaci['status']==4 )) {
                $upit="UPDATE korisnik set brojPrijava='0' WHERE idkorisnik='".$podaci['idkorisnik']."'";
                $baza->updateDB($upit);
                $_SESSION['id']=$podaci['idkorisnik'];
                $_SESSION['tip']=$podaci['tipKorisnika'];
                $_SESSION['ime']=$podaci['korisnicko'];
                $_SESSION['ime2']=$podaci['ime'];
                $_SESSION['prezime']=$podaci['prezime'];
                $_SESSION['email']=$podaci['email'];
                $_SESSION['prijava']=true;
        
        if($_POST['zapamti']=='da'){
            
            setcookie("zapamti", $podaci['korisnicko'],time()+(84600*30));
            setcookie("zapamtiP", $podaci['lozinka'],time()+(84600*30));
            header ("Location: index.php",true);
            ob_end_flush();
            exit;
        }
        
        elseif($_POST['zapamti']!='da'){
            if(isset($_COOKIE['zapamti'])){
                $vrijeme_cookie = time() - 100;
                setcookie('zapamti', gone, $vrijeme_cookie);
                setcookie('zapamtiP', gone, $vrijeme_cookie);
            }
            
            header ("Location: index.php",true);
            ob_end_flush();
            exit;
            
        }
                
            } else {
                $broj=$podaci['brojPrijava']+1;
                $upit="UPDATE korisnik set brojPrijava='".$broj."' WHERE idkorisnik='".$podaci['idkorisnik']."'";
                $baza->updateDB($upit);
                if($broj==3){
                    $upit="UPDATE korisnik set status='3' WHERE idkorisnik='".$podaci['idkorisnik']."'";
                $baza->updateDB($upit);
                $greske.="<p>Neuspješna prijava.</p>";
                }  else {
                    $greske.="<p>Neuspješna prijava.</p>";
                }
                
            }
            
            
            
        }
      
}
$puni;
if($_COOKIE['zapamti']!=""){
    $puni=$_COOKIE['zapamti'];
    $puniP=$_COOKIE['zapamtiP'];
}  else {
    $puni="";
}  
    


$smarty->display('predlosci/neregistrMeni.tpl');
$smarty->assign('greske',$greske);
$smarty->assign('ispis',$puni);
$smarty->assign('ispisP',$puniP);
$smarty->display('predlosci/prijava.tpl');

include './footer.php';

?>

