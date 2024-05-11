<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sly e-fordítás, magyar nyelvű ügyintézés Németországban</title>
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;0,600;1,300;1,600&family=Roboto:wght@100&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="favicon.ico"  />
</head>

<body>

    <?php
    date_default_timezone_set("Europe/Budapest");

    $nyitva = 9;
    $zarva = 17;
    $most = date("H");

    print '<header>
        <div id="head" class="flex-container">
            <img src="img/email.svg" alt="E-mail cím">
            <p><a href="mailto:info@e-forditas.eu">info@e-forditas.eu</a></p>
            <img src="img/phone.svg" alt="Telefonszám">
            <p><a href="tel:+491796681728">+49 179 6681728</a></p>
            <p>Telefonos ügyfélszolgálatunk minden nap ' .$nyitva. '-' .$zarva. ' óráig érhető el.</p>
            <p><a href="admin/login.php">ADMIN</a></p>
        </div>
    </header>;'
    ?>

    <nav>
        <div id="nav" class="flex-container">
            <div class="hamburger-menu">
                &#9776;
            </div>
            <div>
                <img src="img/e-forditas.logo.png" alt="Sly e-fordítás">
                <p> magyar nyelvű ügyintézés, magyar árak Németországban</p>
            </div>
            <div>
                <ul>
                    <li><a href="index.php">Főoldal</a></li>
                    <li><a href="megrendeles-menete.php">Fordítás</a></li>
                    <li><a href="arak.php">Árak</a></li>
                    <li><a href="arajanlat.php">Ajánlatot kérek</a></li>
                    <li><a href="gyik.php">GY.I.K.</a></li>
                    <li><a href="kapcsolat.php">Kapcsolat</a></li>
                </ul>
            </div>   
        </div>
        <div class="nav-menu" hidden>
            <ul>
                <li><a href="index.php">Főoldal</a></li>
                <li><a href="megrendeles-menete.php">Fordítás</a></li>
                <li><a href="arak.php">Árak</a></li>
                <li><a href="arajanlat.php">Ajánlatot kérek</a></li>
                <li><a href="gyik.php">GY.I.K.</a></li>
                <li><a href="kapcsolat.php">Kapcsolat</a></li>
            </ul>
        </div>  
    </nav>