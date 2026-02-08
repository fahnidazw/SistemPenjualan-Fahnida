<?php
	include 'header.php';
?>

<style>
body{
    background:#f7f3ee;
    font-family:'Segoe UI', sans-serif;
}

/* Container biar lega */
.container{
    width:90%;
    max-width:1200px;
}

/* Panel utama */
.panel{
    border:none;
    border-radius:20px;
    box-shadow:0 14px 35px rgba(246,183,197,.25);
    overflow:hidden;
    background:#fff;
}

/* Header */
.panel-heading{
    background:#f6b7c5;
    padding:22px;
    border:none;
}

.panel-heading h4{
    margin:0;
    color:#fff;
    font-weight:600;
    letter-spacing:.5px;
}

/* Body */
.panel-body{
    padding:30px;
}

/* Label */
.form-group label{
    font-weight:600;
    font-size:13px;
    text-transform:uppercase;
    color:#8b5e5a;
    margin-bottom:6px;
}

/* Input */
.form-control{
    border-radius:12px;
    border:1px solid #e8dcd7;
    padding:12px 14px;
    transition:.3s;
}

.form-control:focus{
    border-color:#f2a7b5;
    box-shadow:0 0 0 3px rgba(242,167,181,.25);
}

/* Alert status */
.alert-info{
    background:#fff1f4;
    border:none;
    border-left:5px solid #f2a7b5;
    border-radius:12px;
}

/* Button */
.btn-primary{
    background:#f2a7b5;
    border:none;
    border-radius:30px;
    padding:10px 26px;
    font-weight:600;
    box-shadow:0 6px 18px rgba(242,167,181,.45);
    transition:.3s;
}

.btn-primary:hover{
    background:#ec93a6;
}
/* Perbaikan alert status agar tidak kepotong */
.alert-info{
    padding:18px 20px;
    overflow: visible;
}

/* Select khusus status */
.alert-info .form-control{
    height:auto;
    min-height:44px;
    padding:10px 14px;
}

/* Label di dalam alert */
.alert-info label{
    display:block;
    margin-bottom:8px;
}
</style>

<div class="container">
	<br><br><br>
	<div class="col-md-6 col-md-offset-3">
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
		                        <option value="nonaktif" <?php if($d['user_status']=="nonaktif") echo "selected"; ?>>Nonaktif</option>
		                    </select>
		                </div>

						<br>
						<input type="submit" class="btn btn-primary" value="Simpan">
					</form>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>