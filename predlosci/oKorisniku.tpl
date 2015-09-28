 <h1>Podaci o korisniku</h1>
            <article id="greske">
                {$izmjene}
            </article>
            <form  name="registracija" id="registracija" action="izmjeneOsobne.php" method="POST"    enctype="multipart/form-data">
                
                {$ispis}
                <input type="submit" value="Ažuriraj" class="gumb" id="submit" name="registracija" >
                
            </form>