<?php

class Baza {
        
        const server = "localhost";
        const korisnik = "WebDiP2014x052";
        const lozinka = "admin_iy62";
        const baza = "WebDiP2014x052";

        private function spojiDB(){
            
            $mysqli = new mysqli(self::server,self::korisnik,self::lozinka,self::baza);
            if($mysqli->connect_errno){
                echo "Neuspješno spajanje na bazu: ".$mysqli->connect_errno.", ".$mysqli->connect_error;
            }  else {
                $znakovi = 'utf8';
                mysqli_set_charset($mysqli, $znakovi);
                
            }
            return $mysqli;
        }
        
        function odspojiDB($veza){
            $odgovor=  mysqli_close($veza);
            return $odgovor;
        } 
                
        function selectDB($upit){
            $veza = self::spojiDB();
            $rezultat = $veza->query($upit) or trigger_error("Greška kod upita: {$upit} - ".
                    "Greška: ".$veza->error . " " . E_USER_ERROR);
            
            if(!$rezultat){
                $rezultat = null;
            }
            $this->odspojiDB($veza);
            
            return $rezultat;
        }
        
        function updateDB($upit,$skripta=''){
            $veza = self::spojiDB();
            $rezultat = $veza->query($upit);
            if($rezultat){
                $this->odspojiDB($veza);
                
                if($skripta != ''){
                    header("Location: $skripta");
                }
                
                return $rezultat;
                
            }else{
                echo "Pogreška: ".$veza->error;
                $this->odspojiDB($veza);
                return $rezultat; 
            }
        }
        
        
    }
?>
