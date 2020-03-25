<?php ob_start()?>
<form method="POST">
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
$title = "Se connecter";
$content = ob_get_clean();
include 'includes/template.php';
?>
