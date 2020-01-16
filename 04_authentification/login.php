<?php
session_start();
if(!empty($_SESSION['login'])){
    header("Location: index.php");
    exit();
}
if(!empty($_POST)) {
    if(!empty($_POST['login']) && !empty($_POST['password']))
    {
        //Ici on va vérifier si le login/pass est bon
        if($_POST['login'] == 'toto' && password_verify($_POST['password'], '$2y$10$CoB3l94ft7r4yT7rQPmQDu/WGSDHWC3Gx.AWAsYNIK9h7aXvfm78W' ))
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
