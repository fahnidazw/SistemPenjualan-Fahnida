<?php
	include 'header.php';
?>

<div class="container">
	<br><br><br>
	<div class="col-md-5 col-md-offset-3">
		<div class="panel">
			<div class="panel-heading">
				<h4>Edit User</h4>
			</div>
			<div class="panel-body">
				<?php
					include '../koneksi.php';
					$id   = $_GET['id'];
					$data = mysqli_query($koneksi, "select * from user where user_id='$id'");
					while ($d=mysqli_fetch_array($data)) {
				?>
					<form method="post" action="user_update.php">
						<div class="form-group">
							<label>ID User</label>
							<input type="number" name="id" class="form-control" value="<?php echo $d['user_id']; ?>">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" value="<?php echo $d['username']; ?>">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" value="<?php echo $d['password']; ?>">
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" value="<?php echo $d['user_nama']; ?>">
						</div>
						<div class="form-group alert alert-info">
		                    <label>Status</label>
		                    <select class="form-control" name="status" required>
		                        <option value="admin" <?php if($d['user_status']=="admin") echo "selected"; ?>>Admin</option>
		                        <option value="kasir" <?php if($d['user_status']=="kasir") echo "selected"; ?>>Kasir</option>
		                        <option value="nonaktif" <?php if($id && $d['user_status']=="nonaktif") echo "selected"; ?>>Nonaktif</option>
		                    </select>
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