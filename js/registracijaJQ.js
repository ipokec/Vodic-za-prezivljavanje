



$("#lozinka").focusout(function (event){
    var potrebno = /^(?=(?:.*?[0-9]){1})(?=(?:.*?[a-z]){1})(?=.*[A-Z])\w{8,}$/;
    var lozinka = $("#lozinka").val();
    if(potrebno.test(lozinka)){
        $("#lozinka").css("background-color","#33CC33");
        $("#lozinka").effect( "highlight", {color:"#FFFFFF"}, 3000 );
        $("#greske").html("");
    }else{
        $("#lozinka").css("background-color","#FF8D70");
        $("#lozinka").effect( "highlight", {color:"#FFFFFF"}, 3000 );
        $("#greske").html("<p>Nije unesena ispravna lozinka.</p>");
        $('#lozinka').focus();
    }
       
   });

