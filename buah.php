<?php
include("config.php");
include("fungsi/fungsi_rupiah.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Data Buah</title>
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

					<div class='panel panel-info'>
						<div class='panel-heading'>Semua Data Buah</div>
						<div class='panel-body'>
							<a class='btn btn-info' href='add_buah.php'><i class='fa fa-plus'></i> Tambah Data </a>
							<p>
							<table class="table table-hover table-bordered">
							  <thead>
								<tr>
								  <th>Kode Buah</th>
								  <th>Jenis Buah</th>
								  <th>Harga Jual</th>
								  <th>Potongan</th>
								  <th>Aksi</th>
								</tr>
							  </thead>
							  <tbody>
								<?php
									$sqlquery = "SELECT * FROM buah";
									if ($result = mysqli_query($koneksi, $sqlquery)) {
										while ($row = mysqli_fetch_assoc($result)) {
								?>
								<tr>
								<td><?php echo $row["kode_buah"];?></td>
								<td><?php echo $row["jenis_buah"];?></td>
								<td><?php echo rupiah($row["harga_jual"]);?></td>
								<td><?php echo $row["potongan"];?> %</td>
								<td>
								<div class="btn-group">
								 <a href="edit_buah.php?kode_buah=<?php echo $row["kode_buah"];?>" class="btn btn-xs btn-success" title='Edit'> <i class="fa fa-edit"></i> </a>
								  <a onclick="return confirm('Anda yakin ingin menghapus data tersebut?');" href="aksi_buah.php?act=delete&kode_buah=<?php echo $row["kode_buah"];?>" class="btn btn-xs btn-danger"> <i class="fa fa-remove" title='Hapus'></i> </a>
								</div>
								</td>
								</tr>
								<?php
										}
										mysqli_free_result($result);
									}
									mysqli_close($koneksi);
									?>
							  </tbody>
							</table>
						</div>
					</div>
					

				</div>
			</div>
		</div>
		<?php include("include/footer.php"); ?>
	</body>
	<?php include("include/js.php"); ?>
</html>
