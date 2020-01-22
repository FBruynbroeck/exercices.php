<?php
session_start();
if(!empty($_SESSION['login'])){
    header("Location: index.php");
    exit();
}
if(!empty($_POST)) {
    if(!empty($_POST['login']) && !empty($_POST['password']))
    {

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
        $reponse = $bdd->query('SELECT * FROM USER WHERE login = "'.$_POST['login'].'"');
        $user = $reponse->fetch();
        $reponse->closeCursor(); // Termine le traitement de la requête
        //Ici on va vérifier si le login/pass est bon
        if($user && password_verify($_POST['password'], $user['password'] ))
        {
            //Authentification OK
            $_SESSION['login'] = $_POST['login'];
            header("Location: index.php");
            exit();
        }
        else
        {
            //Authentification NOK
            $errorMessage = "Mauvais login/password";
        }
    }
    else
    {
        //Ici on va prévenir l'utilisateur qu'il manque quelque chose
        $errorMessage = "Tu as oublié d'encoder quelque chose...";
    }
}
ob_start()?>
<form action="login.php" method="POST">
    <div class="form-group">
        <label for="idlogin">Login</label>
        <input type="text" class="form-control" id="idlogin" name="login">
    </div>
    <div class="form-group">
        <label for="idpassword">Password</label>
        <input type="password" class="form-control" id="idpassword" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
$titre = "Se connecter";
$contenu = ob_get_clean();
include("template.php");
?>
