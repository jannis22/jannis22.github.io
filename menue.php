<?php include_once("php/logout_secur.inc.php") ?>

<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Slideshows</title>
</head>
<body>
    <h1>Slideshowmenü</h1>
    <div class="angemeldetals">
      <?php echo "Sie sind als: ".$_SESSION['user']." angemeldet." ?>
      <a href="?logout=true">logout</a>
      </div>
    <main>
        <h2>Bildergalerie</h2>
        <p>Klicken Sie auf die gewünschte Galerie</p>
        <section class="galerie">
            <div>
                <img src="img/head/berlin.jpg" alt="Berlin">
                <a href="berlin.php" onclick="return myFunction();">Bildergalerie Berlin</a>
            </div>
            <div>
                <img src="img/head/duester.jpg" alt="Düster">
                <a href="duester.php" onclick="return myFunction();">Bildergalerie Düster</a>
            </div>
            <div>
                <img src="img/head/freude.jpg" alt="Freude">
                <a href="freude.php" onclick="return myFunction();">Bildergalerie Freude</a>
            </div>
            <div>
                <img src="img/head/landschaft.jpg" alt="Landschaft">
                <a href="landschaft.php" onclick="return myFunction();">Bildergalerie Landschaft</a>
            </div>
            
        </section>
    </main>


</body>
</html>