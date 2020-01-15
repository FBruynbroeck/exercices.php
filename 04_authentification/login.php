<?php
ob_start()?>
<form action="login.php" method="POST">
  <div class="form-group">
    <label for="idlogin">Login</label>
    <input type="text" class="form-control" id="idlogin" name="login">
  </div>
  <div class="form-group">
    <label for="idpassword">Password</label>
    <input type="password" class="form-control" id="idpassword" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
$titre = "Se connecter";
$contenu = ob_get_clean();
include("template.php");
?>
