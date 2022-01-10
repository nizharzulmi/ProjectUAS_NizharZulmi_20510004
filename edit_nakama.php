<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edit Data Nakama</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php include("include/css.php"); ?>
	</head>
	<body>
		<header>
			<?php include("include/header.php"); ?>
		</header>
		<div class='container' style='margin-top:70px'>
			<div class='row' style='min-height:520px'>
				<div class='col-md-12'>


					<?php
						$id_nakama = $_GET['id_nakama'];
						$sqlquery = "SELECT * FROM nakama WHERE id_nakama='$id_nakama'";
						$result = mysqli_query($koneksi, $sqlquery) or die (mysqli_connect_error());
						$row = mysqli_fetch_assoc($result);
						?>
					<div class='panel panel-success'>
						<div class='panel-heading'>Edit Data </div>
						<div class='panel-body'>
							<form method='post' action='aksi_nakama.php?act=update'>
								<div class='form-group'>
									<input type="hidden" name="id_nakama" id="id_nakama" value="<?php echo $row["id_nakama"]; ?>">
									<label>Nama Nakama</label>
									<input type='text' class='form-control' name='nama_nakama' value="<?php echo $row["nama_nakama"]; ?>" required/>
								</div>
								<div class='form-group'>
									<label>Alamat </label>
									<input type='text' class='form-control' name='alamat_nakama' value="<?php echo $row["alamat_nakama"]; ?>" required/>
								</div>
								<button type='input' name='update' class='btn btn-success'>Edit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include("include/footer.php"); ?>
	</body>
	<?php include("include/js.php"); ?>
</html>
