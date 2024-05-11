<?php require_once "basic/header.php"; ?>

<section> 
    <?php
    date_default_timezone_set("Europe/Budapest");

    $nyitva = 9;
    $zarva = 17;
    $most = date("H");

    $uzenet = "Jelenleg elérhetőek vagyunk.";

    if ($most < $nyitva) {
        $nyitas = $nyitva - $most;
        $uzenet = "Jelenleg még zárva vagyunk. A nyitásig még " . $nyitas . " óra van vissza.";
    } else if ($most >= $zarva) {
        $nyitas = (24-$most) + $nyitva;
        $uzenet = "Ma már nem vagyunk elérhetőek, de " . $nyitas . " óra múlva várjuk ismét a hívását.";
    }
    ?>
    
    <div id="kapcs">
        <h1>Kapcsolat</h1>
        <p>Telefonos ügyfélszolgálatunk minden nap <?php print $nyitva; ?>-<?php print $zarva; ?> óráig érhető el.</p>
        <p>Telefon: <a href="tel:+491796681728">+49 179 6681728</a></p>
        <p><?php print $uzenet; ?></p>
        <p>e-mail: <a href="mailto:info@e-forditas.eu">info@e-forditas.eu</a></p>
        <p>Levelezési cím: <address>Kapellenplatz 5. 91541 Rothenburg ob der Tauber<address></p>
        <img src="img/zaszlok.jpg" alt="zaszlok">
    </div>

    <div class="container-kapcsolat">
    <div>
        <h2>Itt is írhat nekünk üzenetet:</h2>
        <form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="name">Név:</label>
            <input type="text" name="name" id="name" placeholder="Kiss Péter" required>
            <label for="email">E-mail cím:</label>
            <input type="email" name="email" id="email" placeholder="valami@gmail.com" required>
            <label for="message">Üzenet szövege:</label>
            <textarea name="message" id="message" rows="10" placeholder="Ide írhat üzenetet..." required></textarea>
            <br>
            <input type="submit" value="Elküld">
            
    <?php

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if (isset($_POST['name']) 
        && isset($_POST['email']) 
        && isset($_POST['message'])
        ) {
            
        $name = test_input($_POST['name']);
        $email = test_input($_POST['email']);
        $message = test_input($_POST['message']);

        include "admin/db_conn.php"; 
                
        $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";
        if ($conn->query($sql) === TRUE) {
            print "<p style='color:red;' class='success'> Üzenetét sikeresen elküldte.</p>";
        } else {
            print "<p style='color:red;' class='error'>Hiba történt az üzenet küldése közben: " . $conn->error . "</p>";
        }

        $conn->close();
        }
    ?>

        </form>
    </div>
    
    <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2597.6402093284864!2d10.177535876494483!3d49.377880471407266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47988fa6882d4047%3A0xe908947d4559ae22!2sKapellenpl.%205%2C%2091541%20Rothenburg%20ob%20der%20Tauber!5e0!3m2!1shu!2sde!4v1700693594545!5m2!1shu!2sde" width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

        <div class="topup">
            <a href="kapcsolat.php"><img src="img/top.png" alt="Fel"></a>
        </div>
</section>

<?php require_once "basic/footer.php"; ?>
