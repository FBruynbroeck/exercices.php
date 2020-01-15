<?php
session_start();
if(empty($_SESSION['login'])){
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Admin</title>
    </head>
    <body>
        <h1>Panneau d'administration</h1>
        Accessible uniquement si la clé login de la session est alimentée
    </body>
</html>
