<?php
include 'header.php';
include '../koneksi.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id != '') {
    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$id'");
    $d = mysqli_fetch_assoc($data);
}
?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<style>
body {
    background-color: #f5f1ee;
    font-family: 'Inter', sans-serif;
}

.main-card {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.06);
    margin: 50px auto;
}

.card-header {
    background: #f6b7c5;
    padding: 18px;
    color: #7a3b3b;
    border-radius: 16px 16px 0 0;
    text-align: center;
}

.card-header h4 {
    margin: 0;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.card-body {
    padding: 28px 32px;
}

.form-group {
    margin-bottom: 18px;
}

.form-label {
    font-weight: 600;
    color: #7a3b3b;
    font-size: 12px;
    text-transform: uppercase;
    margin-bottom: 6px;
    display: block;
}

.form-control {
    border-radius: 10px;
    border: 1px solid #e6d3d3;
    padding: 11px 14px;
    height: 44px;
    font-size: 14px;
}

.form-control:focus {
    border-color: #f6b7c5;
    box-shadow: 0 0 0 3px rgba(246,183,197,0.3);
}

.btn-save {
    background: #f6b7c5;
    color: #7a3b3b;
    border: none;
    padding: 12px;
    border-radius: 30px;
    font-weight: 600;
    width: 100%;
    margin-top: 5px;
}

.btn-save:hover {
    background: #f4a9ba;
}

.btn-cancel {
    margin-top: 12px;
    border-radius: 30px;
    border: 1px solid #f6b7c5;
    color: #7a3b3b;
    background: transparent;
}
</style>

<div class="container">
    <div class="row">

        <!-- INI KUNCI PROPORSI -->
        <div class="col-md-6 col-md-offset-3">

            <div class="main-card">

                <div class="card-header">
                    <h4>
                        <i class="fa fa-user"></i>
                        <?php echo $id ? 'EDIT USER' : 'TAMBAH USER'; ?>
                    </h4>
                </div>

                <div class="card-body">
                    <form method="post" action="user_aksi.php">

                        <?php if($id){ ?>
                            <input type="hidden" name="id" value="<?php echo $d['user_id']; ?>">
                        <?php } ?>

                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control"
                                value="<?php echo $id ? $d['username'] : ''; ?>"
                                placeholder="Masukkan username" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="<?php echo $id ? 'Kosongkan jika tidak diubah' : 'Masukkan password'; ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control"
                                value="<?php echo $id ? $d['user_nama'] : ''; ?>"
                                placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Status Akses</label>
                            <select name="status" class="form-control" required>
                                <option value="admin" <?php if($id && $d['user_status']=='admin') echo 'selected'; ?>>Admin</option>
                                <option value="kasir" <?php if($id && $d['user_status']=='kasir') echo 'selected'; ?>>Kasir</option>
                                <option value="nonaktif" <?php if($id && $d['user_status']=='nonaktif') echo 'selected'; ?>>Nonaktif</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-save">
                            <i class="fa fa-save"></i>
                            <?php echo $id ? 'Simpan Perubahan' : 'Simpan User'; ?>
                        </button>

                        <a href="user.php" class="btn btn-cancel btn-block">
                            Batal
                        </a>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

<br><br><br>

<?php include 'footer.php'; ?>