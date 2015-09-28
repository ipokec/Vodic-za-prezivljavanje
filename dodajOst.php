<?php
session_start();
include 'header.php';
if($_SESSION['tip']==3){
    $smarty->display('predlosci/moderatorMeni.tpl');
    
    $id=$_GET['id'];
    if($id==0){
    $id=$_SESSION['clanak'];
    }else{
        $_SESSION['clanak']=$id;
    }
    
    if (isset($_POST['postavi'])){
        
        $allowedExts = array("pdf");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
        
   
       if (
        
        in_array($extension, $allowedExts)) {
           
        if ($_FILES["file"]["error"] > 0) {
            $greske.="Return Code: " . $_FILES["file"]["error"] . "<br>";
        }else{
            
            echo "Poslan: " . $_FILES["file"]["name"] . "<br>";
            echo "Tip: " . $_FILES["file"]["type"] . "<br>";
            echo "Veličina: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            
            
            $link="ostalo/".$id;
            if (file_exists($link)) {
              $link.="/";
            }  else {
                mkdir($link,$mode=0777);
                
                $link.="/";
            }
            
            if (file_exists($link.$_FILES["file"]["name"])) {
              $greske.=$_FILES["file"]["name"] . " već postoji. <br> ";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"],
                $link.$_FILES["file"]["name"]);
                
                
                $url="http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x052/".$link.$_FILES["file"]["name"];
                $upit = "INSERT INTO `dokumenti` (`clanak`, `dokument`) VALUES ('".$id."','".$url."')";
            
                if($baza->updateDB($upit)){
                    $dobro.="<p>Uspješno ste dodali.</p>";
                }  else {
                    $greske.="<p>Greška kod rada s bazom.</p>";
                }

            }
       }
      }else {
        $greske.="<p>Krivo formatirana datoteka.</p>";
        
      } 
        
        
        
        
    }
     
    $smarty->assign('greske',$greske);
    $smarty->assign('dobro',$dobro);

    $smarty->display('predlosci/dodajOst.tpl');
}
include './footer.php';



?>