<?php
if (isset($_POST['name']) && isset($_POST['phone'])) {
    if (!empty($_POST['name']) && !empty($_POST['phone'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];

        $db_connection = mysqli_connect("localhost", "root", "eliseekn", "agri-help");
        $query = mysqli_query($db_connection, "SELECT * FROM users WHERE name='$name' AND phone='$phone'");
        $row = mysqli_fetch_assoc($query);

        // if(!$query) {
        //     die(mysqli_error($db_connection));
        // }

        if (!empty($row['name'])) {
            session_start();
            $_SESSION['connected'] = 'true';
            $_SESSION['name'] = $row['name'];
            $_SESSION['city'] = $row['city'];
            $_SESSION['phone'] = $row['phone'];

            header("Location:index.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Agri-Help</title>

        <meta name="author" content="eliseekn">
        <meta name="description" content="">
        <meta name="keywords" content="">

        <link rel="stylesheet" href="vendor/bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="vendor/fontawesome-5.11.2/css/all.css">

        <style>
            body {
                background: url('assets/img/header-bg.png') no-repeat;
                background-position: center;
                background-size: cover;
            }

            @media (max-width: 768px) {
                .jumbotron {
                    display: none;
                }
            }

            @media (max-width: 375px) {
                .card-title {
                    font-size: 1.5rem;
                }
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Agri-Help</a>
        </nav>

        <h1 class="jumbotron">
            <div class="container px-5 d-flex align-items-center justify-content-between">
                <li class="fas fa-seedling fa-3x"></li>
                <span class="ml-3 display-4">AGROMETEOROLOGIE</span>
                <li class="fas fa-cloud-sun-rain fa-3x"></li>
            </div>
        </h1>

        <div class="card mt-5 p-4 mb-5 container">
            <h3 class="card-title mb-5">
                <li class="fas fa-user"></li> Connexion à votre compte
            </h3>

            <form method="post">
                <div class="form-group">
                    <label>Nom et pr&eacute;noms</label>
                    <input type="text" class="form-control" name="name" placeholder="Entrez votre nom et pr&eacute;noms">
                </div>
                <div class="form-group">
                    <label>Num&eacute;ro de t&eacute;l&eacute;phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Entrez votre num&eacute;ro de t&eacute;l&eacute;phone">
                </div>
                <button type="submit" class="btn btn-dark">
                    <li class="fas fa-sign-out-alt"></li> Se connecter
                </button>

                <a href="register.php" class="btn btn-dark ml-3">
                    <li class="fas fa-save"></li> S'inscrire
                </a>
            </form>
        </div>

        <script type="text/javascript" src="vendor/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="vendor/popper.min.js"></script>
        <script type="text/javascript" src="vendor/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    </body>
</html>
