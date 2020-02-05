<?php
session_start();
if(!empty($_SESSION['login'])){
    header("Location: index.php");
    exit();
}
if(!empty($_POST)) {
    if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['confirm_password']))
    {
        //vérification du pass et confirm_pass
        if($_POST['password'] != $_POST['confirm_password']){
            $errorMessage = "Votre mot de passe et votre mot de passe de confirmation ne correspondent pas...";
        }
        else {
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
            //vérifier que le login n'existe pas
            $reponse = $bdd->prepare('SELECT * FROM USER WHERE login = :login');
            $reponse->execute([':login' => $_POST['login']]);
            $user = $reponse->fetch();
            $reponse->closeCursor(); // Termine le traitement de la requête

            if($user){
                $errorMessage = "Le login ".$_POST['login']." existe déjà...";
            }
            else {
                // ici faire l'insert en db
                $reponse = $bdd->prepare('INSERT INTO user SET login = :login, password = :password, email = :email');
                $reponse->execute([':login' => $_POST['login'], ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT), ':email' => $_POST['email']]);
                $reponse->closeCursor(); // Termine le traitement de la requête
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['message'] = "Bienvenue ".$_POST['login'];
                header('Location: index.php');
                exit();
            }
        }
    }
    else
    {
        //Ici on va prévenir l'utilisateur qu'il manque quelque chose
        $errorMessage = "Tu as oublié d'encoder quelque chose...";
    }
}
ob_start()
?>
<form action="signup.php" method="POST">
    <div class="form-group">
        <label for="idlogin">Login</label>
        <input type="text" class="form-control" id="idlogin" name="login">
    </div>
    <div class="form-group">
        <label for="idemail">Email</label>
        <input type="email" class="form-control" id="idemail" name="email">
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
$titre = "S'inscrire";
$contenu = ob_get_clean();
include("template.php");
?>
