<?php
header("Content-Type: text/html; charset=iso-8859-1");
$db_connection = mysqli_connect("localhost", "root", "eliseekn", "agri-help");

session_start();

if (!isset($_SESSION['connected'])) {
    header("Location:login.php");
} else {
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="iso-8859-1">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Agri-Help</title>

        <meta name="author" content="eliseekn">
        <meta name="description" content="">
        <meta name="keywords" content="">

        <link rel="stylesheet" href="vendor/bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="vendor/fontawesome-5.11.2/css/all.css">
        <!-- <link rel="stylesheet" href="assets/css/style.css"> -->

        <style>
            body {
                background: url('assets/img/header-bg.png') no-repeat;
                background-position: center;
                background-size: cover;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Agri-Help</a>

            <?php
            session_start();
            if (isset($_SESSION['connected'])) {
            ?>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="logout.php">
                        D&eacute;connexion
                    </a>
                </li>
            </ul>

            <?php } ?>
        </nav>

        <h1 class="jumbotron">
            <div class="container px-5 d-flex align-items-center justify-content-between">
                <li class="fas fa-seedling fa-3x"></li>
                <span class="ml-3 display-4">AGROMETEOROLOGIE</span>
                <li class="fas fa-cloud-sun-rain fa-3x"></li>
            </div>
        </h1>

        <?php
            $city = $_SESSION['city'];

            $query = mysqli_query($db_connection, "SELECT * FROM calendar WHERE city='$city'");
            $city = mysqli_fetch_assoc($query);
        ?>

        <div class="container p-5">
            <div class="card mb-5 border-dark">
                <div class="card-header bg-dark text-white d-flex align-items-center">
                    <li class="fas fa-sun fa-2x"></li>
                    <span class="ml-3">Pr&eacute;visions m&eacute;t&eacute;o</span>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <?php echo $city['period']; ?>
                    </p>
                </div>
            </div>

            <div class="card border-dark">
                <div class="card-header bg-dark text-white d-flex align-items-center">
                    <li class="fas fa-seedling fa-2x"></li>
                    <span class="ml-3">Choix de la culture de production</span>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <select name="culture" class="form-control">
                            <option selected>Choisissez une culture</option>
                            <option value="Tomate">Tomate</option>
                            <option value="Aubergine">Aubergine</option>
                            <option value="Manioc">Manioc</option>
                            <option value="Choux">Choux</option>
                            <option value="Piment">Piment</option>
                        </select>
                        <button type="submit" class="btn btn-dark mt-3">
                            <li class="fas fa-check"></li>
                            <span>Valider</span>
                        </button>
                    </form>
                </div>
            </div>

            <?php
            if (isset($_POST['culture'])) {
                if (!empty($_POST['culture'])) {
                    $culture = $_POST['culture'];
                    $query = mysqli_query($db_connection, "SELECT * FROM culture WHERE name='$culture'");
                    $culture = mysqli_fetch_assoc($query);
            ?>

            <div class="card mt-5 border-dark">
                <div class="card-header bg-dark text-white d-flex align-items-center">
                    <li class="fas fa-compass fa-2x"></li>
                    <span class="ml-3">Pratiques culturales &agrave; observer</span>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <?php echo $culture['tips']; ?>
                    </p>
                </div>
            </div>

            <div class="card mt-5 border-dark">
                <div class="card-header bg-dark text-white d-flex align-items-center">
                    <li class="fas fa-shield-alt fa-2x"></li>
                    <span class="ml-3">Techniques de protection de la culture</span>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <?php echo $culture['protectoin']; ?>
                    </p>
                </div>
            </div>

            <?php
                }
            }
            ?>
       </div>

        <!-- <script type="text/javascript" src="vendor/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="vendor/popper.min.js"></script>
        <script type="text/javascript" src="vendor/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/script.js"></script> -->
    </body>
</html>

<?php } ?>
