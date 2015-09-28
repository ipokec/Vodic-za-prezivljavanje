<article>

            <article id="greske">
                
                 {$greske}
                
            </article>
                 
            <article id="dobro">
                
                 {$dobro}
                
            </article>     
            <form method="POST" action="oClanku.php" name="komentar" enctype="multipart/form-data">
                
                <label for="komentar">Komentiraj ovaj članak:</label><br/>  
                <input type="text" id="komentar" size="20" maxlength="50" placeholder="Napišite svoj komentar" name="komentar"  value="" ><br/>
                
                <input type="submit" value="Objavi" class="gumb" >
                
            </form>
               
</article>