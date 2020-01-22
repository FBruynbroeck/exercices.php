<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Index</title>
    </head>
    <body>
<?php
// https://www.php.net/manual/fr/language.exceptions.php
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
$reponse = $bdd->query('SELECT * FROM USER');
//reponse est un objet PDOStatement (voir doc)

//avec fetch
while ($donnees = $reponse->fetch())
{
    echo "ID: ".$donnees['id'];
    echo '<br>';
    echo "LOGIN: ".$donnees['login'];
    echo '<br>';
    echo "PASSWORD: ".$donnees['password'];
}
$reponse->closeCursor(); // Termine le traitement de la requête

echo '<br>';
$reponse = $bdd->query('SELECT * FROM USER');
//avec fetchAll
foreach($reponse->fetchAll() as $donnees){
    echo "ID: ".$donnees['id'];
    echo '<br>';
    echo "LOGIN: ".$donnees['login'];
    echo '<br>';
    echo "PASSWORD: ".$donnees['password'];
}
$reponse->closeCursor(); // Termine le traitement de la requête
?>
    </body>
</html>
