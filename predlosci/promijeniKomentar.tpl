<article>

            <article id="greske">
                
                 {$greske}
                
            </article>
                 
            <article id="dobro">
                
                 {$dobro}
                
            </article>     
            <form method="POST" action="promijeniKomentar.php" name="promijenikomentar" enctype="multipart/form-data">
                
                <label for="komentar">Vaš komentar:</label><br/>  
                <input type="text" id="komentar" size="20" name="komentar" maxlength="50" placeholder=""  value="{$komentar}" ><br/>
                
                <input type="submit" value="Promijeni" class="gumb" >
                
            </form>
               
</article>