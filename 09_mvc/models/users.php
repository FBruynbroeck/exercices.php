<?php
require_once 'models/db.php';

function getUserById($id) {
    $reponse = getDB()->prepare('SELECT * FROM USER WHERE id = :id');
    $reponse->execute([':id' => $id]);
    $user = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $user;
}

function getUserByLogin($login) {
    $reponse = getDB()->prepare('SELECT * FROM USER WHERE login = :login');
    $reponse->execute([':login' => $login]);
    $user = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $user;
}

function setUser($id, $login, $email, $password) {
    $user = getUserById($id);
    //C'est ici qu'on va faire l'update de l'utilisateur.
    $reponse = getDB()->prepare('UPDATE USER SET login = :login, email = :email, password = :password WHERE id = :id');
    if($password){
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
    else {
        $password = $user['password'];
    }
    $reponse->execute([':id' => $id, ':email' => $email, ':password' => $password, ':login' => $login]);
    $reponse->closeCursor(); // Termine le traitement de la requête
}

?>
