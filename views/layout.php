<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Parallax Template - Materialize</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>
    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="pageprincipale" class="brand-logo">PTUT</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="pageprincipale">Accueil</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="identification">Connexion</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="pageprincipale">Accueil</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="identification">Connexion</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <div class="content">
     
        <?= $contenu?>
    </div>

    <footer class="page-footer teal">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Company Bio</h5>
                    <p class="grey-text text-lighten-4">Nous sommes une équipe d'étudiants travaillant sur ce projet, comme c'est notre travail à temps plein. Tout montant aiderait à soutenir et poursuivre le développement de ce projet est grandement apprécié.</p>


                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Settings</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Connect</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Twitter</a></li>
                        <li><a class="white-text" href="#!">Facebook</a></li>
                        <li><a class="white-text" href="#!">Github</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Made by <a class="brown-text text-lighten-3" href="https://iutbg-gitlab.iutbourg.univ-lyon1.fr/earthengine/ptut">Théo Goncalves, Ludovic Barthelemi et Nathan Caudeli</a>
            </div>
        </div>
    </footer>


    <!--  Scripts-->
    <script src="js/jquery.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

</body>

</html>
