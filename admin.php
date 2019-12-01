<?php
require_once('api_sms.php');

if (isset($_POST['message'])) {
    if (!empty($_POST['message'])) {
        $message = $_POST['message'];

        $db_connection = mysqli_connect("localhost", "root", "eliseekn", "agri-help");
        $query = mysqli_query($db_connection, "SELECT * FROM users");

        while ($user = mysqli_fetch_assoc($query)) {
            $phone = $user['phone'];
            SMS::send($phone, $message);
        }
    }
}
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
                <li class="fas fa-sms"></li> Alerte SMS
            </h3>

            <form method="post">
                <div class="form-group">
                    <label>Message d'alerte</label>
                    <textarea class="form-control" name="message" placeholder="Entrez le message d'alerte" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-dark">
                    <li class="fas fa-location-arrow"></li> Envoyer
                </button>
            </form>
        </div>
    </body>
</html>
