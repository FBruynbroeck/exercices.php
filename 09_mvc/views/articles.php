<?php ob_start() ?>
    <div class="card-deck">
    <?php foreach($articles as $article):?>
        <div class="card text-center">
          <div class="card-header">
              <?=$article['nom']?>
          </div>
          <div class="card-body">
              <h5 class="card-title"><?=$article['prix']?></h5>
              <p class="card-text"><?=$article['description']?></p>
              <a href="<?=ROOT_PATH.'article/'.$article['nom']?>" class="btn btn-primary">Voir le détail</a>
          </div>
        </div>
    <?php endforeach?>
    </div>
<?php
$title="Les articles";
$content = ob_get_clean();
include 'includes/template.php';
?>
