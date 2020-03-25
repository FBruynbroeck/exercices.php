<?php
require 'models/users.php';
if(empty($_SESSION['id'])){
    header("Location: ".ROOT_PATH);
    exit();
}
if(REQ_TYPE_ID){
    $user = getUserByLogin(REQ_TYPE_ID);
}
else {
    $user = getUserById($_SESSION['id']);
    header("Location: ".ROOT_PATH."user/".$user['login']);
    exit();
}
if(!$user){
    http_response_code(404);
    include 'views/404.php';
    exit();
}

if (!empty($_POST) && !empty($_POST['login']) && !empty($_POST['email'])){
    if($_POST['password'] != $_POST['confirm_password'])
    {
        $_SESSION['error'] = "Votre mot de passe et votre mot de passe de confirmation ne correspondent pas...";
    }
    else
    {
        setUser($user['id'], $_POST['login'], $_POST['email'], $_POST['password']);
        $_SESSION['message'] = 'L\'utilisateur '.$user['login'].' a bien été mis à jour';
        header("Location: ".ROOT_PATH);
        exit();
    }
}
include 'views/user_edit.php';
?>
