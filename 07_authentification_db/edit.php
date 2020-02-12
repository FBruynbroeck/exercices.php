<?php
session_start();
if(empty($_SESSION['login'])){
    header("Location: index.php");
    exit();
}

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
if(!empty($_GET) || !empty($_POST)){
    if (!empty($_GET['login'])) {
        $reponse->execute([':login' => $_GET['login']]);
    } else {
        $reponse->execute([':login' => $_POST['login']]);
    }
}
else {
    $reponse->execute([':login' => $_SESSION['login']]);
}
$user = $reponse->fetch();
if (!empty($_POST) && !empty($_POST['login']) && !empty($_POST['email'])){
    if($_POST['password'] != $_POST['confirm_password'])
    {
        $errorMessage = "Votre mot de passe et votre mot de passe de confirmation ne correspondent pas...";
    }
    else
    {
        //C'est ici qu'on va faire l'update de l'utilisateur.
        $reponse = $bdd->prepare('UPDATE USER SET email = :email, password = :password WHERE login = :login');
        if($_POST['password']){
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        else {
            $password = $user['password'];
        }
        $reponse->execute([':email' => $_POST['email'], ':password' => $password, ':login' => $user['login']]);
        $_SESSION['message'] = 'L\'utilisateur '.$user['login'].' a bien été mis à jour';
        header('Location: index.php');
        exit();
    }
}
$reponse->closeCursor(); // Termine le traitement de la requête
ob_start()
?>
<form action="edit.php" method="POST">
    <div class="form-group">
        <label for="idlogin">Login</label>
        <input type="text" class="form-control" id="idlogin" name="login" value="<?= $user['login']?>" readonly>
    </div>
    <div class="form-group">
        <label for="idemail">Email</label>
        <input type="email" class="form-control" id="idemail" name="email" value="<?= $user['email']?>">
    </div>
    <div class="form-group">
        <label for="idpassword">Password</label>
        <input type="password" class="form-control" id="idpassword" name="password">
    </div>
    <div class="form-group">
        <label for="idconfirmpassword">Confirm password</label>
        <input type="password" class="form-control" id="idconfirmpassword" name="confirm_password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
$titre = "Editer";
$contenu = ob_get_clean();
include("template.php");
?>
