<?php
define('ROOT_PATH', "/exercices.php/08_router/"); // Chemin qui suit le nom de domaine. Exemple: http://monprojet.local/08_router/ le path a indiqué sera donc '/08_router/'
$request = str_replace(ROOT_PATH, "", $_SERVER['REQUEST_URI']); // On récupère juste la request, sans le chemin du dossier.
$request = trim($request, '/'); // Permer de supprimer le slash devant la request si elle existe
$segments = array_filter(explode('/', $request)); // On découpe la requête pour obtenir une liste et on supprime les éléments Null
if (!$segments){
    $segments[] = 'welcome'; // Si rien dans segments alors on injecte la page "welcome" qui sera la page par défaut (page d'accueil)
}
// Structure URL: http://monprojet.be/{REQ_TYPE}/{REQ_TYPE_ID}/{REQ_ACTION}
define('REQ_TYPE', $segments[0] ?? Null);
define('REQ_TYPE_ID', $segments[1] ?? Null);
define('REQ_ACTION', $segments[2] ?? Null);
$file = 'pages/'.REQ_TYPE.'.php';
if(file_exists($file)){ // On vérifie que le fichier php existe
    require $file;
    exit();
}
else {
    require 'pages/404.php';
    exit();
}
?>
