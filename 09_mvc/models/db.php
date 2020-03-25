<?php
function getDB() {
    try
    {
        //PDO: PHP Data Objects
        $bdd = new PDO('mysql:host=localhost;dbname=cours;charset=utf8', 'root', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }
    catch (Exception $e)
    {
        //die — Alias de la fonction exit qui affiche un message et termine le script courant
        die('Erreur : ' . $e->getMessage());
    }
}
