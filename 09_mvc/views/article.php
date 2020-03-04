<?php ob_start() ?>
<dl class="row">
    <dt class="col-sm-2">Nom</dt> 
    <dd class="col-sm-10"><?= $article['nom']?></dd>
    <dt class="col-sm-2">Description</dt> 
    <dd class="col-sm-10"><?= $article['description']?></dd>
    <dt class="col-sm-2">Origine</dt> 
    <dd class="col-sm-10"><?= $article['origine']?></dd>
    <dt class="col-sm-2">Prix</dt> 
    <dd class="col-sm-10"><?= $article['prix']?> €</dd>
</dl>
<?php
$title=$article['nom'];
$content = ob_get_clean();
include 'includes/template.php';
?>
