<?php include 'header.php'; ?>

<style>
body {
    background: linear-gradient(180deg,#FFF8F3,#FCFAF8);
    font-family: 'Segoe UI', Arial, sans-serif;
    color: #5A3B33;
}

.container {
    width: 95%;
    margin-top: 28px;
}

.panel {
    background: #FFFFFF;
    border-radius: 22px;
    border: none;
    box-shadow: 0 18px 40px rgba(246,183,197,0.25);
    overflow: hidden;
}

.panel-heading {
    background: linear-gradient(135deg,#F6B7C5,#F5C6A8);
    color: #fff;
    padding: 24px 30px;
}

.panel-heading h4 {
    margin: 0;
    font-weight: 700;
    letter-spacing: 0.6px;
}

.panel-body {
    padding: 32px;
}

.btn-add {
    background: linear-gradient(135deg,#F6B7C5,#EFA5B7);
    color: #fff;
    padding: 11px 26px;
    border-radius: 28px;
    font-weight: 600;
    border: none;
    box-shadow: 0 8px 18px rgba(246,183,197,0.45);
}

.btn-add:hover {
    background: linear-gradient(135deg,#EFA5B7,#E39AAE);
    color: #fff;
}

.table {
    background: #FFFFFF;
    border-radius: 18px;
    overflow: hidden;
    margin-top: 18px;
}

.table thead th {
    background: #FFF1F4;
    color: #6B3A2C;
    font-size: 11.5px;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    padding: 16px;
    border-bottom: 1px solid #F1D8D2;
}

.table tbody td {
    border-top: 1px solid #F3E4DE;
    color: #5A3B33;
    padding: 18px 16px;
    vertical-align: middle;
    font-size: 14px;
}

.table tbody tr:hover {
    background: #FFF6F1;
}

.password {
    max-width: 420px;
    font-family: monospace;
    font-size: 13px;
    color: #A0897D;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.label {
    padding: 7px 18px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    display: inline-block;
}

.label-primary {
    background: #F6B7C5;
    color: #6B2F3A;
}

.label-warning {
    background: #F3C3A3;
    color: #6B3E2E;
}

.label-default {
    background: #E0D6CF;
    color: #5A3B33;
}

.btn-xs {
    padding: 8px 18px;
    border-radius: 22px;
    font-size: 12px;
    border: none;
}

.btn-info {
    background: #F6B7C5;
    color: #fff;
}

.btn-info:hover {
    background: #EFA5B7;
    color: #fff;
}

.btn-danger {
    background: #E05656;
    color: #fff;
}

.btn-danger:hover {
    background: #C84545;
}

.font-cuy {
    margin: 0;
    font-weight: 600;
}
</style>

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
