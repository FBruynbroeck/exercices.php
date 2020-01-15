<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Index</title>
    </head>
    <body>
        <h2>Les variables en php</h2>
        <?php
$prenom = "Luc";
$nom = 'Dupont';
//echo $prenom;
//echo " ";
//echo $nom;
echo $prenom." ".$nom;
$age = 25;
$taille = 1.81;
echo "<br>";
echo "Age: ".$age;
echo "<br>";
echo "Taille: ".$taille;
$adulte = true;
$adultetrad = array ( true => "Oui",
                      false => "Non");
echo "<br>";
echo "Adulte: ".($adultetrad[true]);
$variable = NULL;
echo "<br>";
echo "NULL: ".$variable;
$liste = array("pomme", "poire", "peche");
echo "<br>";
echo print_r($liste);
echo "<br>";
echo $liste[0];
$liste[3] = "fraise";
echo "<br>";
echo print_r($liste);
//Et depuis php5.4, vous pouvez également utiliser la syntaxe courte, qui remplace array() par [].
$liste2 = ["pomme", "poire", "peche"];
echo "<br>";
echo print_r($liste2);
unset($liste2[0]);
echo "<br>";
echo print_r($liste2);
// https://www.php.net/manual/fr/function.array-splice.php
array_splice($liste2, 1);
echo "<br>";
echo print_r($liste2);
        ?>
    </body>
</html>
