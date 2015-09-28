<h2>Kreiranje novog članka</h2>
<article>

            <article id="greske">
                
                 {$greske}
                
            </article>
                 
            <article id="dobro">
                
                 {$dobro}
                
            </article>     
            <form method="POST" action="noviClanak.php" name="noviClanak" enctype="multipart/form-data">
                <label for="podrucje">Odaberite područje:</label><br/>  
                <select id="podrucje" name="podrucje">
                    
                    {$podrucje}
                    
                                        
                </select><br/>
                <label for="naslov">Naslov članka:</label><br/>  
                <input type="text" id="naslov" size="20" maxlength="200" placeholder="napišite naslov članka" name="naslov"  value="{$naslov}" ><br/>
                
                <label for="opis">Opis članka:</label><br/>  
                <input type="text" id="opis" size="20" maxlength="200" placeholder="kratak opis članka" name="opis"  value="{$opis}" ><br/>
                
                <label for="posalji" >Želite li poslati email obavjest preplatnicima vezanu za novi članak?</label>
                <input type="radio" id="spolM" name="posalji" value="da" >Da
                <input type="radio" id="spolZ" name="posalji" value="ne" checked="">Ne
                <br/>
                
                <input type="submit" value="Objavi članak" class="gumb" >
                
            </form>
               
</article>