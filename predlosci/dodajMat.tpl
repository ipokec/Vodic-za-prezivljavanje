<h2>Dodavanje slika</h2>


<article id="greske">
                
                 {$greske}
                
            </article>
                 
            <article id="dobro">
                
                 {$dobro}
                
            </article>  

<form enctype="multipart/form-data" action="dodajMat.php" method="post">
    
    <label for="file">Odabei sliku:</label>
                        <input type="file" id="file" name="file" required >
    
    
            <input type="submit" value="Postavi" name="postavi"/>
        </form>