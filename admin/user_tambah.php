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
<link rel="stylesheet" href="../assets/css/user-tambah.css">

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