<?php
session_start();
$titre = "Bienvenue";
$contenu = "Prochainement...";
//$contenu = "Hash du mot de passe 'tata': ".password_hash("tata", PASSWORD_DEFAULT);
include('template.php');
?>
