<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Index</title>
    </head>
    <body>
    <?php
    if(empty($_SESSION['login']))
    {
        echo "<a href=\"login.php\">S'identifier</a>";
    }else {
        echo "Bonjour ".$_SESSION['login'];
        echo "<br>";
        echo "<a href=\"logout.php\">Se déconnecter</a>";
    }
?>
    </body>
</html>
