<?php
session_start();
if(!empty($_SESSION['login']))
{
    session_unset();
    session_destroy();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Déconnexion</title>
    </head>
    <body>
        Suppression de la session effectuée
    </body>
</html>
