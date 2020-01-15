<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/sticky-footer-navbar.css">
        <script src="js/jquery-3.4.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <title><?php echo $titre; ?></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="index">Mon super projet</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menu1 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menu2</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="login">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Se connecter</button>
                </form>
            </div>
        </nav>
        <main role="main" class="container">
            <div class="jumbotron">
                <h1><?php echo $titre; ?></h1>
                <?php echo $contenu; ?>
            </div>
        </main>
        <footer class="footer">
            <div class="container">
                <span class="text-muted">Mon super projet</span>
            </div>
        </footer>
    </body>
</html>
