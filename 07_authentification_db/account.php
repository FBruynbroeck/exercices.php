<?php
session_start();
if(empty($_SESSION['login'])){
    header("Location: index.php");
    exit();
}
$titre = "Mon compte";

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
$reponse = $bdd->prepare('SELECT * FROM USER WHERE login = :login');
$reponse->execute([':login' => $_SESSION['login']]);
$user = $reponse->fetch();
$reponse->closeCursor(); // Termine le traitement de la requête


$email = $user['email'];
$default = "https://blog.ramboll.com/fehmarnbelt/wp-content/themes/ramboll2/images/profile-img.jpg";
$size = 310;
$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;



ob_start()?>
<img class="rounded-circle mx-auto d-block img-thumbnail" src="<?php echo $grav_url; ?>" alt="" />
<br>
Identifiant: <?= $user['id']?>
<br>
Login: <?= $user['login']?>
<br>
Email: <?= $user['email']?>
<br>
<a href="edit.php" class="btn btn-warning">Editer</a>
<?php
$contenu = ob_get_clean();
include('template.php');
?>
