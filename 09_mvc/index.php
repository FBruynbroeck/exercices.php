<?php
session_start(); // On démarre toujours la session
define('ROOT_PATH', "/exercices.php/09_mvc/"); // Chemin qui suit le nom de domaine. Exemple: http://monprojet.local/09_mvc/ le path a indiqué sera donc '/09_mvc/'
$request = str_replace(ROOT_PATH, "", $_SERVER['REQUEST_URI']); // On récupère juste la request, sans le chemin du dossier.
$segments = array_filter(explode('/', $request)); // On découpe la requête pour obtenir une liste et on supprime les éléments Null
if (!count($segments) or $segments[0] == 'index'){
    $segments[0] = 'welcome';
}
// Structure URL: http://monprojet.be/{REQ_TYPE}/{REQ_TYPE_ID}/{REQ_ACTION}
// Exemple URL: http://monprojet.be/article/pomme/edit
define('REQ_TYPE', $segments[0] ?? Null);
define('REQ_TYPE_ID', $segments[1] ?? Null);
define('REQ_ACTION', $segments[2] ?? Null);
// Structure controller: {REQ_TYPE}.php ou {REQ_TYPE}_{REQ_ACTION}.php
$file = 'controllers/'.REQ_TYPE.(REQ_ACTION ? '_'.REQ_ACTION : '').'.php'; // Si REQ_ACTION alors controllers/{REQ_TYPE}_{REQ_ACTION}.php, si pas alors controllers/{REQ_TYPE}.php
if(file_exists($file)){ // On vérifie que le fichier php existe
    require $file;
    exit();
}
else {
    require 'controllers/404.php';
    exit();
}
?>
