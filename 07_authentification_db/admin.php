<?php
session_start();
if(empty($_SESSION['login'])){
    header("Location: login.php");
    exit();
}
$titre = "Administration";
$contenu = "Prochainement...";
include('template.php');
?>
