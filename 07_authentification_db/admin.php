<?php
session_start();
if(empty($_SESSION['login'])){
    header("Location: login.php");
    exit();
}
try
{
    //PDO: PHP Data Objects
    $bdd = new PDO('mysql:host=localhost;dbname=cours;charset=utf8', 'root', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    //die — Alias de la fonction exit qui affiche un message et termine le script courant
    die('Erreur : ' . $e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM USER');
$users = $reponse->fetchAll();
$reponse->closeCursor(); // Termine le traitement de la requête

ob_start()?>
<h3>Liste des utilisateurs</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Identifiant</th>
      <th scope="col">Login</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($users as $user):?>
    <tr>
      <th scope="row"><?= $user['id'] ?></th>
      <td><?= $user['login'] ?></td>
      <td><?= $user['email'] ?></td>
      <td>
          <a href="account.php?login=<?= $user['login']?>" class="btn btn-primary">Voir<a>
          <a href="edit.php?login=<?= $user['login']?>" class="btn btn-warning">Editer<a>
          <?php if($_SESSION['login'] != $user['login']):?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal<?= $user['id']?>">
              Supprimer
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modal<?= $user['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      Voulez-vous vraiment supprimer l'utilisateur <?= $user['login']?> ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <a href="delete.php?login=<?= $user['login']?>" class="btn btn-danger">Supprimer<a>
                  </div>
                </div>
              </div>
            </div>
          <?php endif?>
      </td>
    </tr>
<?php endforeach ?>
  </tbody>
</table>
<?php
$titre = "Administration";
$contenu = ob_get_clean();
include('template.php');
?>
