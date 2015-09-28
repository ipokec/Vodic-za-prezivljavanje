


function provjeriPrvoSlovo(polje){
    vrijednost = polje.value;
    
    if(vrijednost.length > 0){
        prvoSlovo = vrijednost[0];
        
        if(prvoSlovo !== prvoSlovo.toUpperCase()){
            porukaGreske = document.getElementById("greske").innerHTML;
            porukaGreske += "<p>Polje " + polje.name + " nema veliko prvo slovo.</p>";
            document.getElementById("greske").innerHTML = porukaGreske;
            document.getElementById(polje.name).className = "lose";
            document.getElementById("submit").disabled = true;
            return false;
        }
        else{
        document.getElementById("greske").innerHTML="";
        document.getElementById(polje.name).className = "dobro";
        document.getElementById("submit").disabled = false;
        return true;
    
    }
    }
    
}

function provjeriDuljinuAdrese(polje){
    adresa=polje.value;
    
    if(adresa.length > 100){
        
        porukaGreske = document.getElementById("greske").innerHTML;
        porukaGreske += "<p>Polje " + polje.name + " ima previše znakova.</p>";
        document.getElementById("greske").innerHTML = porukaGreske;
        document.getElementById(polje.name).className = "lose";
        document.getElementById("submit").disabled = true;
        return false;
    }
    else{
        
        document.getElementById("greske").innerHTML="";
        document.getElementById(polje.name).className = "dobro";
        document.getElementById("submit").disabled = false;
        return true;
    }
    
    
}



function provjeriPrvoSlovoIP(polje){
    vrijednost = polje.value;
    
    if(vrijednost.length === 1 ){
        prvoSlovo = vrijednost[0];
        
        if(prvoSlovo !== prvoSlovo.toUpperCase()){
            porukaGreske = document.getElementById("greske").innerHTML;
            porukaGreske += "<p>Polje " + polje.name + " nema veliko prvo slovo.</p>";
            document.getElementById("greske").innerHTML = porukaGreske;
            document.getElementById(polje.name).className = "lose";
            document.getElementById("submit").disabled = true;
            return false;
        }
        else{
        document.getElementById("greske").innerHTML="";
        document.getElementById(polje.name).className = "dobro";
        document.getElementById("submit").disabled = false;
        return true;
    
    }
    }
    
}



var formular = document.getElementById("registracija");
formular.addEventListener("submit", function(e){
   
   if(document.getElementById('spolM').checked || document.getElementById('spolZ').checked) {
            document.getElementById("greske").innerHTML="";
            return true;
        
} else{
        porukaGreske = document.getElementById("greske").innerHTML;
        porukaGreske += "<p>Niste odabrali spol.</p>";
        document.getElementById("greske").innerHTML = porukaGreske;
        e.preventDefault();
        
         
        
        
    }
   
}, false);





