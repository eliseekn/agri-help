<?php
require_once('api/sms.php');

$db_connection = mysqli_connect("localhost", "root", "eliseekn", "agri-help");
$query = mysqli_query($db_connection, "SELECT * FROM users");

while ($user = mysqli_fetch_assoc($query)) {
    $phone = $user['phone'];
    SMS::send($phone, "Période: Décembre 2019 à Mars 2020 Saison: Grande saison sèche Pluviométrie: 1500 mm d'eau Température: 27º à 38º C");
}
