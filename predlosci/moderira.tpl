<a href="kreiraj.php">Kreiranje novog područja. </a>
<article>

            <article id="greske">
                
                 {$greske}
                
            </article>
                 
            <article id="dobro">
                
                 {$dobro}
                
            </article>
                 <h3>Povezivanje moderatora s područjem.</h3>     
            <form method="POST" action="popisPodrucja.php" name="moderira" enctype="multipart/form-data">
                
                
                
                <label for="podrucje">Odaberite područje:</label><br/>  
                <select id="podrucje" name="podrucje">
                    
                    {$podrucje}
                    
                                        
                </select><br/>
                
                <label for="moderator">Odaberite moderatora:</label><br/>  
                <select id="moderator" name="moderator">
                    
                    {$moderatori}
                    
                                        
                </select><br/>
                
                <input type="submit" value="Spremi" class="gumb" >
                
            </form>
                    
            <a href="noviModerator.php">Kreiranje novog moderatora. </a>           
</article>