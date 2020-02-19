<?php
if (!REQ_TYPE_ID){
    $title="Les articles";
    $content="<a href='".ROOT_PATH."article/pomme'>Voir Pomme</a>";
    $content.="<br>";
    $content.="<a href='".ROOT_PATH."article/pomme/edit'>Editer Pomme</a>";
    $content.="<br>";
    $content.="<a href='".ROOT_PATH."article/pomme/delete'>Supprimer Pomme</a>";
} else {
    if(!REQ_ACTION) {
        $title= REQ_TYPE_ID;
        $content="Description de l'article ".REQ_TYPE_ID;
    } else {
        $title= REQ_TYPE_ID;
        $content="Type d'action: ".REQ_ACTION;
    }
}
require 'template.php';
?>
