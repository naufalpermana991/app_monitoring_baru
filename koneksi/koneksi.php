<?php
// Koneksi ke database
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "app_kalibrasi";

$mysqli = mysqli_connect($servername, $dbUsername, $dbPassword, $dbname);

// Periksa koneksi
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
