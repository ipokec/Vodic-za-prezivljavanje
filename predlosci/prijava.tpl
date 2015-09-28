<article>
<h2>Prijava</h2>
            <article id="greske">
                
                 {$greske}
                
            </article>
            <form method="POST" action="prijava.php" name="prijava" enctype="multipart/form-data">
                
                <label for="korisnik">Korisničko ime:</label><br/>  
                <input type="text" id="korisnik" placeholder="Unesite korisničko ime" name="korisnik" autofocus="" value="{$ispis}" ><br/>
                <label for="lozinka">Lozinka:</label> <br/>
                <input type="password" id="lozinka" placeholder="Unesite lozinku" name="lozinka" value="{$ispisP}"   ><br/>
                <label for="zapamti" class="zapl">Zapamti?</label>
                <input type="checkbox" id="zapamti" name="zapamti" value="da" >
                <br/>
                <input type="submit" value="Prijavi se" class="gumb" >
                
            </form>
            <p>Registriraj se <a href="registracija.php">ovdje</a>.</p>
            <p> <a href="lozinka.php">Zaboravio sam lozinku</a>.</p>
</article>