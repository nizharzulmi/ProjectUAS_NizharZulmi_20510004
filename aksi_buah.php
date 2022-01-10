<?php
include("config.php");

$act=$_GET['act'];

if ($act=='delete'){
	$kode_buah=$_GET['kode_buah'];
	$row = mysqli_query($koneksi, "DELETE FROM buah WHERE kode_buah = '$kode_buah'");
	header('location:buah.php');
}

elseif ($act=='input'){
	$jenis_buah = $_POST["jenis_buah"];
	$harga_jual = $_POST["harga_jual"];
	$potongan = $_POST["potongan"];

	$sql = "INSERT INTO buah VALUES ('','$jenis_buah','$harga_jual', '$potongan')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
	header('location:buah.php');
	}
	else {echo "gagal";}

}

elseif ($act=='update'){
	$jenis_buah = $_POST["jenis_buah"];
	$kode_buah = $_POST["kode_buah"];
	$harga_jual = $_POST["harga_jual"];
	$potongan = $_POST["potongan"];

	$sql = "UPDATE buah SET jenis_buah='$jenis_buah', harga_jual='$harga_jual', potongan='$potongan' WHERE kode_buah='$kode_buah'";

	if(mysqli_query($koneksi, $sql)){
		mysqli_close($koneksi);
		header('location:buah.php');
	}
	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

}
?>
