<?php include 'header.php'; ?>

<link rel="stylesheet" href="../assets/css/user.css">

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Manajemen Data User</h4>
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-md-6">
                    <a href="user_tambah.php" class="btn btn-add">
                        <i class="fa fa-user-plus"></i> Tambah User
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>ID User</th>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>Password</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../koneksi.php';
                        $data = mysqli_query($koneksi, "SELECT * FROM user");
                        $no = 1;
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td><strong>IDUSR-<?php echo $d['user_id']; ?></strong></td>
                            <td><?php echo $d['username']; ?></td>
                            <td><?php echo $d['user_nama']; ?></td>
                            <td class="password"><?php echo $d['password']; ?></td>
                            <td class="text-center">
                                <?php
                                if ($d['user_status'] == 'admin') {
                                    echo "<span class='label label-primary'>Admin</span>";
                                } elseif ($d['user_status'] == 'kasir') {
                                    echo "<span class='label label-warning'>Kasir</span>";
                                } else {
                                    echo "<span class='label label-default'>Nonaktif</span>";
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <a href="user_edit.php?id=<?php echo $d['user_id']; ?>" class="btn btn-xs btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="user_hapus.php?id=<?php echo $d['user_id']; ?>" class="btn btn-xs btn-info">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<br><br><br><br><br><br>

<?php include 'footer.php'; ?>
