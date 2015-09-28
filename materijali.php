<?php

session_start();
include 'header.php';

//$id=$_GET['id'];

if($_SESSION['tip']==2||$_SESSION['tip']==3) {
    
    if($_SESSION['tip']==2){
         $smarty->display('predlosci/userMeni.tpl');
    }elseif ($_SESSION['tip']==3) {
         $smarty->display('predlosci/moderatorMeni.tpl');
    }
   
    $id=$_SESSION['clanak'];
    
    
    $upit = "SELECT * FROM `slika` where clanak='".$id."' ";
    $rezultatSlike = $baza->selectDB($upit);
    
    while($redSlike = $rezultatSlike->fetch_array())
    {
        $slike.="<img src='".$redSlike['slika']."' alt='greška' style='width:304px;height:228px; margin:5px;'>";
  
    }
    if ($slike==""){
        $slike="<p>Ovaj članak nema slika</p>";
    }  
    
    
    $upit = "SELECT * FROM `video` where clanak='".$id."' ";
    $rezultatVideo = $baza->selectDB($upit);
    
    while($redVideo = $rezultatVideo->fetch_array())
    {
        //$video.="<iframe width='420' src='315' data='".$redVideo['video_link']."?autoplay=1'></iframe>";
            $video.="<video width='320' height='240' controls><source src='".$redVideo['video_link']."' type='video/mp4'></video>";
           
    }
    if ($video==""){
        $video="<p>Ovaj članak nema video materijala</p>";
    }
     
    $upit = "SELECT * FROM `dokumenti` where clanak='".$id."' ";
    $rezultatOstalo = $baza->selectDB($upit);
    
    while($redOstalo = $rezultatOstalo->fetch_array())
    {
       if($redOstalo['naziv']==""){
           $ostalo.="<a href='".$redOstalo['dokument']."'>Ostalo</a><br/>";
       }else{
           $ostalo.="<a href='".$redOstalo['dokument']."'>".$redOstalo['naziv']."</a><br/>";
       }
           
    }
    if ($ostalo==""){
        $ostalo="<p>Ovaj članak nema Dodathih materijala</p>";
    }
    
    
    $smarty->assign('slike',$slike);
    $smarty->assign('video',$video);
    $smarty->assign('ostalo',$ostalo);
    $smarty->display('predlosci/materijali.tpl');
    include 'footer.php';
    
}


?>
