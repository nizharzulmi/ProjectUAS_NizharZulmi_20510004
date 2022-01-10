<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Data Nakama</title>
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


					<div class='panel panel-primary'>
						<div class='panel-heading'>Semua Data </div>
						<div class='panel-body'>
							<a class='btn btn-primary' href='add_nakama.php'><i class='fa fa-plus'></i> Tambah Data </a>
							<p>
							<table class="table table-hover table-bordered">
							  <thead>
								<tr>
								  <th>ID </th>
								  <th>Nakama</th>
								  <th>Alamat </th>
								  <th>Aksi</th>
								</tr>
							  </thead>
							  <tbody>
								<?php
									$sqlquery = "SELECT * FROM nakama";
									if ($result = mysqli_query($koneksi, $sqlquery)) {
										while ($row = mysqli_fetch_assoc($result)) {
								?>
								<tr>
								<td><?php echo $row["id_nakama"];?></td>
								<td><?php echo $row["nakama"];?></td>
								<td><?php echo $row["alamat"];?></td>
								<td>
								<div class="btn-group">
								   <a href="edit_nakama.php?id_nakama=<?php echo $row["id_nakama"];?>" class="btn btn-xs btn-success" title='Edit'> <i class="fa fa-edit"></i> </a>
								  <a onclick="return confirm('Anda yakin ingin menghapus data tersebut?');" href="aksi_nakama.php?act=delete&id_nakama=<?php echo $row["id_nakama"];?>" class="btn btn-xs btn-danger"> <i class="fa fa-remove" title='Hapus'></i> </a>
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
