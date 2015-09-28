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
        
        $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
        
        
       if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
        && ($_FILES["file"]["size"] < 2097152)
        && in_array($extension, $allowedExts)) {
        if ($_FILES["file"]["error"] > 0) {
            $greske.="Return Code: " . $_FILES["file"]["error"] . "<br>";
        }else{
            echo "Upload: " . $_FILES["file"]["name"] . "<br>";
            echo "Type: " . $_FILES["file"]["type"] . "<br>";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
            
            $link="img/".$id;
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
                $upit = "INSERT INTO `slika` (`clanak`, `slika`) VALUES ('".$id."','".$url."')";
            
                if($baza->updateDB($upit)){
                    $dobro.="<p>Uspješno ste uplodali sliku.</p>";
                }

            }
       }
      }else {
        $greske.="<p>Slika je krivog formata ili je veća od 2MB.</p>";
        
      } 
        
        
        
        
    }
     
    $smarty->assign('greske',$greske);
    $smarty->assign('dobro',$dobro);

    $smarty->display('predlosci/dodajMat.tpl');
}
include './footer.php';
?>