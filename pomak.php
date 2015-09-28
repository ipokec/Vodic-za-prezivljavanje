<?php
include_once './baza.class.php';
$baza = new Baza();

$upit = "select * from pomak where id ='1'";
    $rezultatPomak = $baza->selectDB($upit);
    $redPomak = $rezultatPomak->fetch_array();
    
    $server= $redPomak['vrijeme'];
    
    $trenutno=date("Y-m-d H:i:s");
    
    $pomak= strtotime($trenutno)-strtotime($server);
    
    echo "trenutno=".$trenutno." pomak=".$server." razlika=".$pomak;
if($_SERVER['REQUEST_METHOD']=="POST"){
    if($_POST['pomak']!=""){
        
        $upit = "UPDATE pomak set vrijeme='".$_POST['pomak']."' where id='1'";
    $baza->updateDB($upit);
    if($baza->updateDB($upit)){
        echo 'Uspješno';
    }  else {
        echo 'greška';
    }
    }  else {
        echo 'prazno polje';
    }
    
    
}



?>


<form method="POST" action="pomak.php" name="pomakni" enctype="multipart/form-data">
                
                <label for="pomak">Pomak:</label><br/>  
                <input type="time" id="pomak"  placeholder="yyyy-mm-dd hh:mm:ss" name="pomak"  value="" ><br/>
                
                <input type="submit" value="Pomakni" class="gumb" >
                
            </form>