<?php
$host     = "localhost";
$user     = "root";
$password = "";
$database = "buah";

$hari_ini = date("Y-m-d");

$koneksi   = mysqli_connect($host, $user, $password, $database);

if ($koneksi->connect_error) {
   die("Connection failed: " . $koneksi->connect_error);
}  

?>
