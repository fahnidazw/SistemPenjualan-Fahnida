<?php
	include 'header.php';
?>

<div class="container">
	<br><br><br>
	<div class="col-md-5 col-md-offset-3">
		<div class="panel">
			<div class="panel-heading">
				<center>
					<h4>Edit Produk</h4>
				</center>
			</div>
			<div class="panel-body">
				<?php
					include '../koneksi.php';
					$id   = $_GET['id_barang'];
					$data = mysqli_query($koneksi, "select * from barang where id_barang='$id'");
					while ($d=mysqli_fetch_array($data)) {
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
						<input type="submit" class="btn btn-primary" value="Simpan">
					</form>
				<?php
					}
				?>
			</div>
		</div>
	</div>
	
</div>

<?php include 'footer.php'; ?>