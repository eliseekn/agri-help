<?php
require_once('api/sms.php');

if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['city'])) {
    if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['city'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];

        $db_connection = mysqli_connect("localhost", "root", "eliseekn", "agri-help");

        $query = mysqli_query($db_connection, "INSERT INTO users (id, name, phone, city)
            VALUES (NULL, '$name', '$phone', '$city')");

        // if(!$query) {
        //     die(mysqli_error($db_connection));
        // }

        session_start();
        $_SESSION['connected'] = 'true';
        $_SESSION['name'] = $name;
        $_SESSION['city'] = $city;

        SMS::send($phone, "Bienvenue sur l'application web de Agri-Help");

        header("Location:index.php");
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
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div class="card mt-5 p-4 container" id="register-form">
            <form method="post">
                <div class="form-group">
                    <label>Nom et prénoms</label>
                    <input type="text" class="form-control" name="name" placeholder="Entrez votre nom et prénoms">
                </div>
                <div class="form-group">
                    <label>Numéro de téléphone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Entrez votre numéro de téléphone">
                </div>
                <div class="form-group">
                    <label>Ville</label>
                    <!-- <input type="text" class="form-control" name="name" placeholder="Entrez votre ville"> -->
                    <select name="city" class="form-control">
                        <option selected>Choisissez votre localité</option>
                        <option value="Abidjan">Abidjan</option>
                        <option value="Bouake">Bouaké</option>
                        <option value="Daloa">Daloa</option>
                        <option value="Yamoussokro">Yamoussokro</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-dark">S'inscrire</button>
            </form>
        </div>
    </body>
</html>
