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
include 'views/user.php';
?>
