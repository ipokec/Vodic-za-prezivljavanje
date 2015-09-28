 <h2>Registracija</h2>
            <article id="greske">
                
                {$greske}
                
            </article>
                <article id="dobro">
                
                 {$dobro}
                
            </article> 
                <form method="POST" action="registracija.php" name="registracija" id="registracija" enctype="multipart/form-data">
                
                <label for="ime">Unesite vaše ime:</label>  <br/>
                <input type="text" id="ime" name="ime" placeholder="Unesite vaše ime" size="20" maxlength="30" onblur="provjeriPrvoSlovo(this);"><br/>
                
                <label for="prezime">Unesite vaše prezime:</label>  <br/>
                <input type="text" id="prezime" name="prezime" placeholder="Unesite vaše prezime" size="20" maxlength="50" onblur="provjeriPrvoSlovo(this);"><br/>
                
                <label for="slika">Odaberite sliku:</label> <br/> 
                <input type="file" id="slika" name="slika"><br/>
                
                
                
                <label for="zupanija">Odaberite županiju:</label><br/>  
                <select id="zupanija" name="zupanija">
                    <option disabled="" >-- Sjeverozapadna Hrvatska --</option>
                    <option value="0" >Grad Zagreb</option>
                    <option value="1" >Zagrebačka županija</option>
                    <option value="2" >Krapinsko-zagorska županija</option>
                    <option value="3" selected="">Varaždinska županiju</option>
                    <option value="4" >Koprivničko-križevačka županija</option>
                    <option value="5" >Međimurska županija</option>
                    <option disabled="" >-- Središnja i Istočna Hrvatska --</option>
                    <option value="6" >Bjelovarsko-bilogorska županija</option>
                    <option value="7" >Virovitičko-podravska županija</option>
                    <option value="8" >Požeško-slavonska županija</option>
                    <option value="9" >Brodsko-posavska županija</option>
                    <option value="10" >Osječko-baranjska županija</option>
                    <option value="11" >Vukovarsko-srijemska županija</option>
                    <option value="12" >Karlovačka županija</option>
                    <option value="13" >Sisačko-moslavačka županija</option>
                    <option disabled="" >-- Jadranska Hrvatska --</option>
                    <option value="14" >Primorsko-goranska županija</option>
                    <option value="15" >Ličko-senjska županija</option>
                    <option value="16" >Zadarska županija</option>
                    <option value="17" >Šibensko-kninska županija</option>
                    <option value="18" >Splitsko-dalmatinska županija</option>
                    <option value="19" >Istarska županija</option>
                    <option value="20" >Dubrovačko-neretvanska županija</option>
                                        
                </select><br/>
                
                <label for="grad">Grad:</label><br/>  
                <input type="text" id="grad" name="grad" placeholder="Grad iz kojeg dolazite" size="20" maxlength="50" onblur="provjeriPrvoSlovo(this);" ><br/>
                
                <label for="adresa">Unesite adresu:</label> <br/> 
                <textarea id="adresa" cols="20" rows="5" name="adresa" onblur="provjeriDuljinuAdrese(this)"></textarea><br/>
                
                <label for="email">Unesite e-mail adresu:</label><br/>  
                <input type="email" id="email" name="email" placeholder="Vaša e-mail adresa" ><br/>
                 
                <label for="korisnickoIme">Korisničko ime:</label><br/>  
                <input type="text" id="korisnickoIme" name="korisnickoIme" placeholder="Minimalno 5 znakova" size="20" ><br/>
                 
                <label for="lozinka">Lozinka:</label>  <br/>
                <input type="password" id="lozinka" name="lozinka" placeholder="Minimalno 10 znakova, veliko i malo slovo te 2 broja" size="20" ><br/>
                 
                <label for="telefon">Broj telefona:</label> <br/> 
                <input type="tel" id="telefon" name="telefon" placeholder="xxx xxxxxxx" size="20" ><br/>
                 
                <label for="roden">Datum rođenja:</label> <br/> 
                <input type="date" id="roden"  name="roden"><br/>
                
                <label for="spol">Spol:</label>
                <input type="radio" id="spolM" name="spol" value="M" >M
                <input type="radio" id="spolZ" name="spol" value="Ž">Ž
                <br/>
                
                <label for="newsletter">Želite li primat newsletter?</label>
                <input type="checkbox" id="newsletter" name="newsletter" value="da">Da
                <br/>
                
                
                {$sigurnost}
               
                <input type="submit" value="Registriraj se" class="gumb" id="submit" name="registracija" >
                <input type="reset" value="Očisti" class="gumb"  >
                
                
            </form>
            <script src="js/registracijaJQ.js"></script>
            <script src="js/validacija.js"></script>