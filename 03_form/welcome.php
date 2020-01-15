<?php
$titre = "Bienvenue";
if(isset($_POST['sexe']) and isset($_POST['prenom']) and $_POST['prenom'] != ""){
    $sexe = $_POST['sexe'];
    $prenom = $_POST['prenom'];
    $sexetrad = [
        'H' => "Monsieur",
        'F' => "Madame"];
    $contenu = "Bienvenue ".$sexetrad[$sexe]." ".$prenom;
    include("template.php");
}
else {
    header("Location: index.php");
}
?>
