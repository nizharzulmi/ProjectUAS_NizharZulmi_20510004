<?php
include("config.php");

$act=$_GET['act'];

if ($act=='input'){
	$id_nakama = $_POST['id_nakama'];
	$kode_buah = $_POST['kode_buah'];
	$berat = $_POST['berat'];

	$sql = "INSERT INTO transaksi VALUES ('','$id_nakama','$kode_buah', '$berat', '$hari_ini')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
	header('location:laporan.php');
	}
	else {echo "gagal";}

}




?>
