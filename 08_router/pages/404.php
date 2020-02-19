<?php
$title="404";
$content="Désolé, la page <b>".$_SERVER['REQUEST_URI']."</b> n'existe pas...";
http_response_code(404);
require 'template.php';
