<h2>Uredi članak</h2>
<article>

            <article id="greske">
                
                 {$greske}
                
            </article>
                 
            <article id="dobro">
                
                 {$dobro}
                
            </article>     
            <form method="POST" action="uredi.php" name="uredi" enctype="multipart/form-data">
                
                <label for="naslov">Naslov članka:</label><br/>  
                <input type="text" id="naslov" size="20" maxlength="200" placeholder="napišite naslov članka" name="naslov"  value="{$naslov}" ><br/>
                
                <label for="opis">Opis članka:</label><br/>  
                <input type="text" id="opis" size="20" maxlength="200" placeholder="kratak opis članka" name="opis"  value="{$opis}" ><br/>
                
                
                
                <input type="submit" value="Uredi" class="gumb" >
                
            </form>
               
</article>