<?php
include("config.php");

$act=$_GET['act'];

if ($act=='delete'){
	$id_nakama=$_GET['id_nakama'];
	$row = mysqli_query($koneksi, "DELETE FROM nakama WHERE id_nakama = '$id_nakama'");
	header('location:nakama.php');
}

elseif ($act=='input'){
	$nama_nakama = $_POST["nama_nakama"];
	$alamat_nakama = $_POST["alamat_nakama"];

	$sql = "INSERT INTO nakama VALUES ('','$nama_nakama','$alamat_nakama')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
	header('location:nakama.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$id_nakama = $_POST["id_nakama"];
	$nama_nakama = $_POST["nama_nakama"];
	$alamat_nakama = $_POST["alamat_nakama"];

	$sql = "UPDATE nakama SET nama_nakama='$nama_nakama', alamat_nakama='$alamat_nakama' WHERE id_nakama='$id_nakama'";

	if(mysqli_query($koneksi, $sql)){
		mysqli_close($koneksi);
		header('location:nakama.php');
	}
	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

}
?>
