<?php
header("Content-Type: text/html; charset=iso-8859-1");
//$db_connection = mysqli_connect("localhost", "root", "eliseekn", "agri-help");
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
        <link rel="stylesheet" href="assets/css/style.css">

        <style>
            body {
                background: url('assets/img/header-bg.png');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>

        <!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">
            var geocoder;

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
            }
            //Get the latitude and the longitude;
            function successFunction(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                codeLatLng(lat, lng)
            }

            function errorFunction() {
                alert("Geocoder failed");
            }

            function initialize() {
                geocoder = new google.maps.Geocoder();
            }

            function codeLatLng(lat, lng) {
                var latlng = new google.maps.LatLng(lat, lng);
                geocoder.geocode({'latLng': latlng}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        console.log(results)

                        if (results[1]) {
                            //formatted address
                            alert(results[0].formatted_address)
                            //find country name
                            for (var i=0; i<results[0].address_components.length; i++) {
                                for (var b=0;b<results[0].address_components[i].types.length;b++) {

                                //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                                if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                                    //this is the object you are looking for
                                    city= results[0].address_components[i];
                                    break;
                                }
                            }
                        }
                        //city data
                        alert(city.short_name + " " + city.long_name)

                        } else {
                            alert("No results found");
                        }
                    } else {
                        alert("Geocoder failed due to: " + status);
                    }
                });
            }
        </script> -->
    </head>
    <!-- <body onload="initialize()"> -->
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Agri-Help</a>
        </nav>

        <h1 class="jumbotron">
            <div class="container px-5">AGROMETEOROLOGIE</div>
        </h1>

        <?php
        session_start();
        if (!isset($_SESSION['connected'])) {
        ?>

        <div class="card mt-5 p-4 container" id="register-form">
            <form method="post">
                <div class="form-group">
                    <label>Nom et pr&eacute;noms</label>
                    <input type="text" class="form-control" name="name" placeholder="Entrez votre nom et pr&eacute;noms">
                </div>
                <div class="form-group">
                    <label>Num&eacute;ro de t&eacute;l&eacute;phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Entrez votre num&eacute;ro de t&eacute;l&eacute;phone">
                </div>
                <button type="submit" class="btn btn-dark">Se connecter</button>
                <a href="register.php" class="btn btn-dark">S'inscrire</a>
            </form>
        </div>

        <?php
        } else {
            $city = $_SESSION['city'];

            $db_connection = mysqli_connect("localhost", "root", "eliseekn", "agri-help");
            $query = mysqli_query($db_connection, "SELECT * FROM calendar WHERE city='$city'");
            $city = mysqli_fetch_assoc($query);
        ?>

        <div class="container p-5">
           <!-- <div class="card border-dark">
               <div class="card-header bg-dark text-white">Zone de production</div>
               <div class="card-body">
                   <form action="" method="post">
                       <select name="city" class="form-control">
                           <option selected>Choisissez votre localit&eacute;</option>
                           <option value="daloa">Daloa</option>
                       </select>
                       <button type="submit" class="btn btn-dark mt-3">Valider</button>
                   </form>
               </div>
           </div> -->

           <div class="card mt-5 border-dark">
               <div class="card-header bg-dark text-white">Pr&eacute;visons m&eacute;t&eacute;o</div>
               <div class="card-body">
                   <p class="card-text">
                       <?php echo $city['period']; ?>
                   </p>
               </div>
           </div>

           <div class="card mt-5 border-dark">
               <div class="card-header bg-dark text-white">Conseils culturaux</div>
               <div class="card-body">
                   <p class="card-text">
                       <?php echo $city['tips']; ?>
                   </p>
               </div>
           </div>

           <?php } ?>
       </div>

        <script type="text/javascript" src="vendor/jquery-3.4.1.min.js"></script>
        <!-- <script type="text/javascript" src="vendor/popper.min.js"></script> -->
        <script type="text/javascript" src="vendor/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/script.js"></script>
    </body>
</html>
