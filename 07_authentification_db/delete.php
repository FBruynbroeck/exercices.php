<?php
session_start();
if(empty($_SESSION['login'])){
    header("Location: index.php");
    exit();
}
if(!empty($_GET) && !empty($_GET['login'])) {
    try
    {
        //PDO: PHP Data Objects
        $bdd = new PDO('mysql:host=localhost;dbname=cours;charset=utf8', 'root', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        //die — Alias de la fonction exit qui affiche un message et termine le script courant
        die('Erreur : ' . $e->getMessage());
    }
    $response = $bdd->prepare("DELETE FROM USER WHERE login = :login");
    $response->execute([':login' => $_GET['login']]);
    $response->closeCursor();
    $_SESSION['message'] = 'L\'utilisateur '.$_GET['login'].' a bien été supprimé';
}
header("Location: admin.php");
exit();
?>
