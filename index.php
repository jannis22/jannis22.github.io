<!DOCTYPE html>
<!-- HTML 5 -->

<?php include_once("php/login.inc.php") ?>
<?php include_once("php/counter.inc.php");?>
<?php include_once("php/log.inc.php");?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>LOGIN | Gruppe 1.1.1</title>
        <meta name="description" content="Login zum Login" />
        <meta name="author" content="Kevin Ullrich, Jannis Kall" />
        <meta name="revisit-after" content="7 days" />
    </head>
    
    <body>
    <h1>Startseite</h1>
        
        <form method="post" action="index.php">
        <input type="text" name="n" placeholder="Dein Name" required> <br>
            <input type="submit" value="Anmeldung abschließen">
        
        </form>
    </body>
    <footer>

        <?php
        getCounter("counter1.tpl");
        ?>
        
    </footer>
    
</html>