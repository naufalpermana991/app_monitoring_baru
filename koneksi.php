<?php

$dbhost	= "localhost";
$dbuser	= "root";

$dbpass	= "";
$dbname	= "app_kalibrasi"; /*Database powered By Untoro*/

$connect =  mysqli_connect ($dbhost,$dbuser,$dbpass,$dbname);

if ($connect->connect_error) {
	die ('Mohon maaf koneksi gagal:'. $connect->connect_error);

}


?>
