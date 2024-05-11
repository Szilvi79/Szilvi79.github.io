<?php require_once "basic/header.php"; ?>
  
<section class="ar">
    <aside>
        <div id="nyomtatvanyok">
            <img src="img/nyomtatvany.jpg" alt="Nyomtatvány">
        </div>
        <div id="nyomtatvany">
            <h3>Ingyen letölthető nyomtatványok</h3>
            <ul>
                <li><a href="media/E401.pdf">E 401 német <img src="img/pdf.png" alt="E401-nemet"></a></li>
                <li><a href="media/E401-hu.pdf">E 401 magyar <img src="img/pdf.png" alt="E401-magyar"></a></li>
                <li><a href="media/E411.pdf">E 411 német<img src="img/pdf.png" alt="E401-nemet"></a></li>
                <li><a href="media/E411-hu.pdf">E 411 magyar<img src="img/pdf.png" alt="E401-magyar"></a></li>
                <li><a href="media/KG1-de-hu.pdf">Családi pótlék igénylés <img src="img/pdf.png" alt="E401-nemet"></a></li>
                <li><a href="media/KG1-Anlage-Kind-de-hu.pdf">Családi pótlék melléklete <img src="img/pdf.png" alt="E401-nemet"></a></li>
                <li><a href="media/Familienstandsbescheinigung-de-hu.pdf">Családi állapot igazolása <img src="img/pdf.png" alt="E401-nemet"></a></li>
                <li><a href="media/Bescheinigung-eu-ewr-ungarisch-08.pdf">EU/EGT igazolás <img src="img/pdf.png" alt="E401-nemet"></a></li>
                <li><a href="media/Unterhaltserklärung-für-das-Kalenderjahr.pdf">Eltartási nyilatkozat <img src="img/pdf.png" alt="E401-nemet"></a></li>
                <li><a href="media/gepjarmu-adasveteli-szerzodes.pdf">Gépjűrmű adásvételi szerződés<img src="img/pdf.png" alt="E401-nemet"></a></li>
            </ul>
        </div>
        <div id="bizi">
            <img src="img/bizonyitvany.jpg" alt="Bizonyítvány">
        </div>
    </aside>
   
    <article>
        <h1>Árak</h1>
        <div id="egysegar">
            <h2>Egységáras fordítások</h2>
            <p>Az alábbi bizonyítványok fordítását vállaljuk magyarról német nyelvre egységáron, mely
                tartalmazza a záradékkal ellátott fordítást, a nyomtatást és a postai költséget is Németországon belül:</p>
            <ul id="egyseges-ar">
                <li>szakmunkás bizonyítvány</li>
                <li>érettségi bizonyítvány</li>
                <li>diploma</li>
                <li>egyéb bizonyítványok</li>
            </ul>
            <p>A Németországban használt nyomtatványok fordítását is egységáron készítjük magyar nyelvre.</p>   

            <?php
            require_once "admin/db_conn.php";
            
            $sql = "SELECT * FROM arak";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            ?>
            <table>
                <tr>
                    <th></th>
                    <th>Ár</th>
                </tr>
                <tr>
                    <td>Bizonyítványok</td>
                    <td><?php print $row["bizonyitvany"]; ?> € / db</td>
                </tr>
                <tr>
                    <td>Nyomtatványok</td>
                    <td><?php print $row["nyomtatvany"]; ?> € / oldal</td>
                </tr>
            </table>
        </div>

        <div id="lekt">
            <h2>Normál fordítás és lektorálás</h2>
            <p>3 munkanapos határidővel</p>
            <table>
                <tr>
                    <th style="width:70%"></th>
                    <th>Ár</th>
                </tr>
                <tr>
                    <td>Német/angol nyelvről magyar nyelvre</td>
                    <td><?php print $row["idegenrol"]; ?> € / kar.</td>
                </tr>
                <tr>
                    <td>Magyar nyelvről német/angol nyelvre</td>
                    <td><?php print $row["magyarrol"]; ?> € / kar.</td>
                </tr>
                <tr>
                    <td>Lektorálás</td>
                    <td><?php print $row["lektoralas"]; ?> € / kar.</td>
                </tr>
            </table>
        </div>

        <div id="felarak">
            <h2>Felárak</h2>
            <p>Rövidebb határidővel is vállalunk fordítást felár ellenében, az alábbiak szerint:</p>
            <table>
                <tr>
                    <th></th>
                    <th>Ár</th>
                </tr>
                <tr>
                    <td>2 napos határidő</td>
                    <td><?php print $row["felarKetto"]; ?>% felár</td>
                </tr>
                <tr>
                    <td>1 napos határidő</td>
                    <td><?php print $row["felarEgy"]; ?>% felár</td>
                </tr>
            </table>
        </div>
        
        <?php
        } else {
            print "Nincsenek elérhetőek árak jelenleg.";
        }
        ?>

        <p>Igény esetén vállalunk fordítást horvát, szerb, román, orosz, lengyel, olasz, francia, cseh, spanyol,
                portugál, holland, dán, szlovák, szlovén, török nyelven is. Amennyiben elküldi számunkra a
                fordítandó anyagot, ingyen adunk árajánlatot a fordításra.</p>
        </div>
   
            <div id="elszamolas">
                <h2>Elszámolás</h2>
                <p>Az elszámolás az <strong>elkészült fordítás karakterszáma alapján</strong> történik, tehát az árajánlat
                    tájékoztató jellegű, a pontos díj meghatározása csak az elkészült fordítás alapján lehetséges.
                    Karakternek számít minden betű, szóköz, szám és írásjel, mely ellenőrizhető a Microsoft Word
                    szövegszerkesztő által mérve (Menü/Eszközök/Szavak száma/Karakterek száma szóközökkel)</p>
                <p>A kis összegű megrendelések teljesítése esetén, a csekély szolgáltatási díjjal arányban nem álló
                    ügyintézési költségek fedezésére <strong>10 € alapdíjat </strong>állapítunk meg.</p>
                <p>A fordítás megrendelése történhet a Megrendelés menüpont alatt, postai úton, vagy e-mailben, de
                    minden esetben írásban, előzetes egyeztetést követően (forrásnyelv, célnyelv, vállalási
                    határidő, árajánlat, átvételi mód). <strong>A megrendelés egyben a jelen <a href="aszf.html">ÁSZF</a> elfogadását is jelenti.</strong></p>
                <p>A megrendelő következmények nélkül elállhat a megrendeléstől abban az esetben, ha a jelzésekor a
                    szolgáltatás teljesítése még semmilyen formában sem kezdődött el. Ellenkező esetben köteles
                    kifizetni a megrendelés visszamondásának pillanatáig teljesített szolgáltatás munkadíját.</p>
                <p>A fizetés módja <strong>banki átutalás</strong>. Az elkészült fordítás után a pontos célnyelvi karakterszám
                    alapján kiállítjuk a számlát, melyet e-mailben elküldünk. Változás: csak az átutalt összeg
                    jóváírása után postázzuk és küldjük e-mailben az elkészült fordítást. Új, vagy nem pontosan
                    fizető megrendelő esetében megrendelésekor 50% előleget kérünk az adott árajánlat alapján.</p>
                <p><strong>Postaköltségek:</strong> Németországon belül A/4-es méretű borítékban: 1,60 €.</p>
            </div>
            <div class="topup">
                <a href="arak.php"><img src="img/top.png" alt="Fel"></a>
            </div>    
    </article>
    </section>
        
    <?php require_once "basic/footer.php"; ?>