<footer>
        <div class="container-grid-2">
            <div class="grid-f1">
                <h2>Információk</h2>
                <ul>
                    <li><a href="aszf.php">ÁSZF</a></li>
                    <li><a href="adatvedelem.php">Adatvédelem</a></li>
                    <li><a href="impresszum.php">Impresszum</a></li>
                </ul>
            </div>
            <div class="grid-f2">
                <h2>Fordítóknak</h2>
                <ul>
                    <li><a href="jelentkezz.php">Jelentkezz fordítónak!</a></li>
                    <li><a href="erdekesseg.php">Érdekesség a szakmáról</a></li>
                </ul>
            </div>
            <div class="grid-f3">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-pinterest"></a>
                <a href="#" class="fa fa-skype"></a>
            </div>
        </div>

        <div class="footer">
            <p>A weboldal <strong>Bakó Szilvia</strong> vizsgamunkája, a valóságban nem működik!</p>
        </div>
    </footer>

    <script>

        $(document).ready(function () {
            $('.hamburger-menu').click(function () {
                $('.nav-menu').slideToggle(); 
            });
        });

        $(window).resize(function () {
            if ($(window).width() > 768) {
                $('.nav-menu').hide(); 
            }
        });

        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("Slides");
            let dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 3000); 

            for (i = 0; i < dots.length; i++) {
             dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
        }

    </script>
</body>

</html>