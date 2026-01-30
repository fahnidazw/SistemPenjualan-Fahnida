<?php include 'header.php'; ?>

<style>
    body {
        background: #fcfaf8;
        font-family: Arial, sans-serif;
    }

    .container {
        width: 95% !important;
        max-width: none !important;
        margin-top: 20px;
    }

    .panel {
        border-radius: 8px !important;
        border: 1px solid #ddd !important;
        box-shadow: none !important; 
        margin-bottom: 20px;
    }

    .panel-heading {
        background: #3B2A20 !important;
        color: #fff !important;
        padding: 15px 20px !important;
    }

    .panel-body {
        padding: 20px !important;
    }

    .table {
        width: 100%;
        margin-top: 10px;
    }

    .table thead th {
        background: #f5f5f5;
        color: #333;
        font-size: 14px;
        padding: 12px !important;
        border-bottom: 2px solid #eee !important;
    }

    .table tbody td {
        padding: 12px !important;
        border-top: 1px solid #eee !important;
        font-size: 14px;
        vertical-align: middle !important;
    }

    .label {
        border-radius: 4px;
        font-size: 11px;
        padding: 4px 8px;
        text-transform: uppercase;
    }
    .font-cuy {
        margin:0; 
        font-weight: 600;
    }

    .btn-info {
        color: #fff !important;
        background-color: #A68B77 !important; /* Cokelat susu Lumora */
        border-color: #8E735B !important;
        font-weight: 600 !important;
        text-shadow: none !important;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1) !important;
    }

    .btn-info:hover, 
    .btn-info:focus, 
    .btn-info:active, 
    .btn-info.active,
    .btn-info:active:hover,
    .btn-info:active:focus {
        color: #fff !important;
        background-color: #8E735B !important; /* Cokelat lebih gelap */
        border-color: #7A624E !important;
        outline: none !important;
    }

    .btn-info i {
        color: #fff !important;
    }
</style>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4 class="font-cuy">Manajemen Data User</h4>
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-md-12">
                    <a href="user_tambah.php" class="btn btn-info pull-left">
                        <i class="fa fa-user-plus"></i>  Tambah User
                    </a>
                </div>
            </div>
            <br/>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>ID User</th>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>Password</th>
                            <th>Status</th>
                            <th width="15%">Opsi</th>
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
                                <td><?php echo $d['password']; ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($d['user_status'] == 'admin') {
                                        echo "<span class='label label-primary'>Admin</span>";
                                    } else if ($d['user_status'] == 'kasir') {
                                        echo "<span class='label label-warning'>Kasir</span>";
                                    } else {
                                        echo "<span class='label label-default'>Nonaktif</span>";
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="user_edit.php?id=<?php echo $d['user_id']; ?>" class="btn btn-xs btn-info">
                                        <i class="fa fa-edit"></i>  Edit
                                    </a>
                                    <a onclick="return confirm('Yakin hapus user ini?')" 
                                       href="user_hapus.php?id=<?php echo $d['user_id']; ?>" 
                                       class="btn btn-xs btn-danger">
                                        <i class="fa fa-trash"></i>  Hapus
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

<?php include 'footer.php'; ?>