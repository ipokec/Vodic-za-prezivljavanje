 <h1>Osobni podaci</h1>
            <article id="greske">
                {$izmjene}
            </article>
            <form  name="registracija" id="registracija" action="osobniPodaci.php" method="POST"    enctype="multipart/form-data">
                
                {$ispis}
                <input type="submit" value="Ažuriraj" class="gumb" id="submit" name="registracija" >
                
            </form>