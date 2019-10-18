<?php include_once("php/logout_secur.inc.php") ?>

<html>
    <head>
        <title>Bilder-Berlin-Manuel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/styleBerlin.css"  />
    </head>
    <body>
        <header>
            <a href="menue.php" onclick="return myFunction();">Zurück zum Menü</a>
        </header>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <div class="numbertext">1 / 5</div>
                <img src="img/berlin/3.jpg" style="width:100%" />
                <!--<div class="text">Caption Text</div>-->
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 5</div>
                <img src="img/berlin/2.jpg" style="width:100%" />
                <!--<div class="text">Caption Two</div>-->
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 5</div>
                <img src="img/berlin/4.jpg" style="width:100%" />
                <!--<div class="text">Caption Three</div>-->
            </div>
            <div class="mySlides fade">
                <div class="numbertext">4 / 5</div>
                <img src="img/berlin/1.jpg" style="width:100%" />
                <!--<div class="text">Caption Text</div>-->
            </div>
            <div class="mySlides fade">
                <div class="numbertext">5 / 5</div>
                <img src="img/berlin/5.jpg" style="width:100%" />
                <!--<div class="text">Caption Text</div>-->
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br />

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
        </div>

        <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides((slideIndex += n));
            }

            function currentSlide(n) {
                showSlides((slideIndex = n));
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                if (n > slides.length) {
                    slideIndex = 1;
                }
                if (n < 1) {
                    slideIndex = slides.length;
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(
                        " active",
                        ""
                    );
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
            }
        </script>
    </body>
</html>
