<?php
session_start();
$_SESSION['login'] = 'FakeUser';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Authentification</title>
    </head>
    <body>
        Alimentation de la session effectuée
    </body>
</html>
