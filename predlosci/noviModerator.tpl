<article>

            <article id="greske">
                
                 {$greske}
                
            </article>
                 
            <article id="dobro">
                
                 {$dobro}
                
            </article>
                 
            <form method="POST" action="noviModerator.php" name="moderira" enctype="multipart/form-data">
                
                
               
                <label for="novi">Novi moderator.:</label><br/>  
                <select id="novi" name="novi">
                    
                    {$korisnik}
                    
                                        
                </select><br/>
                
                
                
                <input type="submit" value="Dodaj" class="gumb" >
                
            </form>
                    
                    
</article>