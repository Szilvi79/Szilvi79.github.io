<?php require_once "basic/header.php"; ?>

<section>
    <div id="ajanlat">
        <div>
            <img src="img/arajanlat.jpg" alt="arajanlat">
        </div>  
        <div>
            <h1>Árajánlatkérés</h1>
            <p>Kérjük, töltse ki az alábbi ajánlatkérő űrlapot és hamarosan küldjük Önnek e-mailben az árajánlatunk.
            Az <strong>árajánlat ingyenes</strong>, abban az esetben is, ha az árajánlat megtekintését követően Ön mégsem rendeli meg a fordítási munkát.</p>
            <p> Amennyiben több különböző, vagy nagyobb mennyiségű anyagra szeretne árajánlatot kérni, azt e-mailben küldje el számunkra!</p>
        </div>
    </div>

    <form enctype="multipart/form-data" method="post">
        
        <div class="section-ajanlat">
            <label for="name"><strong>Név:</strong></label>
                <input type="text" id="name" name="name" placeholder="Kocsács Annamária" required>
            <label for="phone"><strong>Telefonszám:</strong></label>
                <input type="tel" id="phone" name="phone" placeholder="+36-30-1234567" required>
            <label for="email"><strong>E-mail cím:</strong></label>
                <input type="email" id="email" name="email" placeholder="valami@gmail.com" required>
        </div>

        <div id="nyelvpar">
            <div id="nyelvrol">
                <div><p><strong>Milyen nyelvről?</strong></p></div>
                <div><select id="language1" name="language1">
                        <option value="magyar">Magyar</option>
                        <option value="nemet">Német</option>
                        <option value="angol">Angol</option>
                        <option value="francia">Francia</option>
                        <option value="lengyel">Lengyel</option>
                        <option value="olasz">Olasz</option>
                        <option value="szlovak">Szlovák</option>
                        <option value="szloven">Szlovén</option>
                        <option value="horvat">Horváth</option>
                        <option value="szerb">Szerb</option>
                        <option value="roman">Román</option>
                        <option value="cseh">Cseh</option>
                        <option value="orosz">Orosz</option>
                        <option value="ukran">Ukrán</option>
                        <option value="spanyol">Spanyol</option>
                        <option value="torok">Török</option>
                    </select>
                </div>
            </div>
            <div id="nyelvre">
                <div><p><strong>Milyen nyelvre?</strong></p></div>
                <div><select id="language2" name="language2">
                        <option value="magyar">Magyar</option>
                        <option value="nemet">Német</option>
                        <option value="angol">Angol</option>
                        <option value="francia">Francia</option>
                        <option value="lengyel">Lengyel</option>
                        <option value="olasz">Olasz</option>
                        <option value="szlovak">Szlovák</option>
                        <option value="szloven">Szlovén</option>
                        <option value="horvat">Horváth</option>
                        <option value="szerb">Szerb</option>
                        <option value="roman">Román</option>
                        <option value="cseh">Cseh</option>
                        <option value="orosz">Orosz</option>
                        <option value="ukran">Ukrán</option>
                        <option value="spanyol">Spanyol</option>
                        <option value="torok">Török</option>
                    </select>
                </div>
            </div>
        </div>

        <div id="szolg">    
            <div><p><strong>Igényelt szolgáltatás:</strong></p></div>
            <div>
                <div id="szolg1"><input type="radio" id="forditas" name="szolgaltatas" value="1">
                    <label for="forditas">Fordítás</label>
            </div>
                <div id="szolg2"><input type="radio" id="tolmacsolas" name="szolgaltatas" value="2">
                    <label for="tolmacsolas">Tolmácsolás</label>
            </div>
                <div id="szolg3"><input type="radio" id="lektoralas" name="szolgaltatas" value="3">
                    <label for="lektoralas">Lektorálás</label>
                </div>
            </div>
        </div>

        <div id="hatar">   
            <div><p><strong>A kért határidő:</strong></p></div>
            <div>
                <div id="hatar1"><input type="radio" id="hatarido1" name="hatarido" value="1">
                    <label for="hataridő1">Normál, 3 munkanap</label>
                </div>
                <div id="hatar2"><input type="radio" id="hatarido2" name="hatarido" value="2">
                    <label for="hataridő2">sűrgős, 2 munkanap (50% felár)</label>
                </div>
                <div id="hatar3"><input type="radio" id="hatarido3" name="hatarido" value="3">
                    <label for="hataridő3">Sűrgős, 1 munkanap (100% felár)</label>
                </div>
            </div>
        </div> 

        <div id="kuld">
            <div><p><strong>A kért forítás:</strong></p></div>
            <div>
                <div id="kuld1"><input type="radio" id="sima-e" name="kuldes" value="1">
                    <label for="sima-e">Sima forditás e-mailben küldve</label>
                </div>
                <div id="kuld2"><input type="radio" id="sima-p" name="kuldes" value="2">
                    <label for="sima-p">Sima fordítás postán küldve</label>
                </div>
                <div id="kuld3"><input type="radio" id="zaradekolt" name="kuldes" value="3">
                    <label for="zaradekolt">Záradékolt fordítás postán küldve</label>
                </div>
            </div>
        </div>            

        <div id="feltolt">
            <strong>Fordítandó dokumentum feltöltése:</strong>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Feltölt" name="submit">
        </div>    
        

        <div id="message2">
            <label for="message"></label>
            <textarea name="message" rows="10" placeholder="Ide írhat megjegyzést a fordítandó anyaggal kapcsolatban..."></textarea>
        </div> 

        <div>
            <input type="checkbox" id="aszf" name="aszf" required>
            <label for="aszf"><strong>Elolvastam és elfogadom az Általános Szerződési Feltételeket és az Adatvédelmi Tájékoztatót</strong></label>
        </div>  
               
        <div id="elkuld">
            <input type="submit" value="Elküld">
        </div>

        </div>             

<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) 
        && isset($_POST['email']) 
        && isset($_POST['phone']) 
        && isset($_POST['language1']) 
        && isset($_POST['language2'])
        && isset($_POST['szolgaltatas'])
        && isset($_POST['hatarido'])
        && isset($_POST['kuldes'])
        && isset($_FILES['fileToUpload'])
        && isset($_POST['message'])) 

        require_once "admin/db_conn.php"; 

        $name = test_input($_POST['name']);
        $phone = test_input($_POST['phone']);
        $email = test_input($_POST['email']);
        $language1 = test_input($_POST['language1']);
        $language2 = test_input($_POST['language2']);
        $szolgaltatas = test_input((int)$_POST['szolgaltatas']);
        $hatarido = test_input((int)$_POST['hatarido']);
        $kuldes = test_input((int)$_POST['kuldes']);
        if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === 0){
            $fileName = uniqid('fileToUpload_');
            $lastPunkt = strrpos($_FILES['fileToUpload']['name'],'.',-1);
            $fileExtension = substr($_FILES['fileToUpload']['name'], $lastPunkt);
            $fullfileName = $fileName.$fileExtension;
            copy($_FILES['fileToUpload']['tmp_name'], './uploads/'.$fullfileName);
        }
        $message = test_input($_POST['message']);

        $mysqli = new mysqli("localhost","root","","akciowebshop_p"); 

          $stmt = $mysqli -> prepare("INSERT INTO arajanlat (name, email, phone, language1, language2, szolgaltatas, hatarido, kuldes, fileToUpload, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("ssssssssss", $name, $email,  $phone, $language1, $language2, $szolgaltatas, $hatarido, $kuldes, $fullfileName, $message);
          
          if ($stmt->execute()) {
            print "<p style='color:red;' class='success'> Kérését sikeresen elküldte.</p>";
        } else {
            print "<p style='color:red;' class='error'>Hiba történt a kérés küldése közben: " . $stmt->error . "</p>";
        }
          $stmt->close();
          $mysqli->close();
        }    
?>

    </form>
        
        <div class="topup">
           <a href="arajanlat.php"><img src="img/top.png" alt="Fel"></a>
       </div>

</section>

<?php require_once "basic/footer.php"; ?>