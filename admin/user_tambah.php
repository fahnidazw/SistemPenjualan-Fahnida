<?php
include 'header.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><?php echo $id ? "Edit Data User" : "Tambah Data User"; ?></h4>
            </div>
            <div class="panel-body">

                <?php
                include '../koneksi.php';
                if($id != ''){
                    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$id'");
                    $d = mysqli_fetch_array($data);
                }
                ?>

                <form method="post" action="user_aksi.php">

                    <div class="form-group">
                        <label>ID User</label>
                        <input type="text" name="id"
                            class="form-control" placeholder="Masukkan user id ..">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username ..">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password ..">
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama ..">
                    </div>

                    <div class="form-group alert alert-info">
                        <label>Status (Akses Login)</label>
                        <select class="form-control" name="status" required>
                            <option value="admin" <?php if($id && $d['user_status']=="admin") echo "selected"; ?>>Admin</option>
                            <option value="kasir" <?php if($id && $d['user_status']=="kasir") echo "selected"; ?>>Kasir</option>
                            <option value="nonaktif" <?php if($id && $d['user_status']=="nonaktif") echo "selected"; ?>>Nonaktif</option>
                        </select>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="Simpan">

                </form>
            </div>
        </div>
    </div>
</div>
