<article>
<h2>Zaboravljene lozinke</h2>
            <article id="greske">
                
                 {$greske}
                
            </article>
                 <article id="dobro">
                
                 {$dobro}
                
            </article> 
            <form method="POST" action="lozinka.php" name="lozinka" enctype="multipart/form-data">
                
                <label for="email">Email adresa:</label><br/>  
                <input type="text" id="email" placeholder="Unesite email adresu" name="email" autofocus=""  ><br/>
               
                <input type="submit" value="Saznaj" class="gumb" >
                
            </form>
            
</article>