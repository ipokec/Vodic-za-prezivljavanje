<h2>Dodavanje video materijala</h2>


<article id="greske">
                
                 {$greske}
                
            </article>
                 
            <article id="dobro">
                
                 {$dobro}
                
            </article>  

<form enctype="multipart/form-data" action="dodajVid.php" method="post">
    
    <label  for="file">Odabei video:</label>
                        <input type="file" id="file" name="file" required >
    
    
            <input type="submit" value="Postavi" name="postavi"/>
        </form>