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
        
        $allowedExts = array("mp4");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
        
   
       if (($_FILES["file"]["type"] == "video/mp4")
        
        && in_array($extension, $allowedExts)) {
           
        if ($_FILES["file"]["error"] > 0) {
            $greske.="Return Code: " . $_FILES["file"]["error"] . "<br>";
        }else{
            
            echo "Poslan: " . $_FILES["file"]["name"] . "<br>";
            echo "Tip: " . $_FILES["file"]["type"] . "<br>";
            echo "Veličina: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            
            
            $link="video/".$id;
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
                $upit = "INSERT INTO `video` (`clanak`, `video_link`) VALUES ('".$id."','".$url."')";
            
                if($baza->updateDB($upit)){
                    $dobro.="<p>Uspješno ste uplodali video.</p>";
                }  else {
                    $greske.="<p>Greška kod rada s bazom.</p>";
                }

            }
       }
      }else {
        $greske.="<p>Video je krivog formata ili je preveliki.</p>";
        
      } 
        
        
        
        
    }
     
    $smarty->assign('greske',$greske);
    $smarty->assign('dobro',$dobro);

    $smarty->display('predlosci/dodajVid.tpl');
}
include './footer.php';



?>