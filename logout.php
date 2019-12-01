<?php
session_start();

if (isset($_SESSION['connected'])) {
    session_destroy();
    header("Location:login.php");
}
