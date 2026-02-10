<?php
	include 'header.php';
?>

<link rel="stylesheet" href="../assets/css/produk_edit.css">

<div class="container">
	<br><br><br>
	<div class="col-md-5 col-md-offset-4">
		<div class="panel">
			<div class="panel-heading text-center">
				<h4>Edit Produk</h4>
			</div>

			<div class="panel-body">
				<?php
					include '../koneksi.php';
					$id   = $_GET['id'];
					$data = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id'");
					while ($d = mysqli_fetch_array($data)) {
				?>
				<form method="post" action="produk_update.php">

					<div class="form-group">
						<label>ID Barang</label>
						<input type="number" name="id" class="form-control" value="<?php echo $d['id_barang']; ?>">
					</div>

					<div class="form-group">
						<label>Nama Produk</label>
						<input type="text" name="nama" class="form-control" value="<?php echo $d['nama_barang']; ?>">
					</div>

					<div class="form-group">
						<label>Harga Beli</label>
						<input type="number" name="beli" class="form-control" value="<?php echo $d['harga_beli']; ?>">
					</div>

					<div class="form-group">
						<label>Harga Jual</label>
						<input type="number" name="jual" class="form-control" value="<?php echo $d['harga_jual']; ?>">
					</div>

					<div class="form-group">
						<label>Stock</label>
						<input type="number" name="stok" class="form-control" value="<?php echo $d['stok']; ?>">
					</div>

					<br>
					<input type="submit" class="btn btn-primary btn-block" value="Simpan">
				</form>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<br><br><br><br>