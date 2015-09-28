<article>

            <article id="greske">
                
                 {$greske}
                
            </article>
                 
                 <article id="dobro" >
                
                 {$dobro}
                
            </article>     
            <form method="POST" action="kreiraj.php" name="kreiranje" enctype="multipart/form-data">
                
                <label for="naziv">Naziv područja:</label><br/>  
                <input type="text" id="naziv" size="20" maxlength="50" placeholder="Unesite naziv" name="naziv"  value="" ><br/>
                
                
                <label for="specificnost">Specifičnost:</label><br/>  
                <input type="text" id="specificnost" size="20" maxlength="100" placeholder="Po čemu je specifično?" name="specificnost"  value="" ><br/>
                
                <input type="submit" value="Izradi" class="gumb" >
                
            </form >
               
</article>