<?php
include 'header.php';
include '../koneksi.php';

$id_kasir = $_SESSION['user_id'];
$username_admin = $_SESSION['username'];
?>

<link rel="stylesheet" href="../assets/css/index_admin.css">


<div class="container">

<div class="welcome-bg">
        <div>
            <h4 style="margin:0;font-weight:700; color: #5A3A32;">
                Have a good day, <?= $username_admin; ?> ✨
            </h4>
            <small style="color:#9A6B63;">
                Welcome back to your dashboard
            </small>
        </div>

        <div style="color:#9A6B63; font-weight:600;">
            <i class="fa fa-calendar-alt"></i> <?= date('l, d M Y'); ?>
        </div>
    </div>

<div class="row">

    <div class="col-md-3">
        <a href="produk.php" style="text-decoration:none;color:inherit;">
            <div class="panel panel-stat theme-brown-3">
                <div class="panel-heading-stat">
                    <h1>
                        <i class="fa fa-cubes"></i>
                        <span class="val-large">
                            <?php
                                $barang = mysqli_query($koneksi,"select * from barang");
                                echo mysqli_num_rows($barang);
                            ?>
                        </span>
                    </h1>
                    <div class="stat-label">Most Loved Scent</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="user.php" style="text-decoration:none;color:inherit;">
            <div class="panel panel-stat theme-brown-3">
                <div class="panel-heading-stat">
                    <h1>
                        <i class="fa fa-users"></i>
                        <span class="val-large">
                            <?php
                                $user = mysqli_query($koneksi,"select * from user");
                                echo mysqli_num_rows($user);
                            ?>
                        </span>
                    </h1>
                    <div class="stat-label">Lovely Community</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="penjualan.php" style="text-decoration:none;color:inherit;">
            <div class="panel panel-stat theme-brown-3">
                <div class="panel-heading-stat">
                    <h1>
                        <i class="fa fa-shopping-bag"></i>
                        <span class="val-large">
                            <?php
                                $data_terjual = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT COUNT(*) AS total FROM penjualan"));
                                echo $data_terjual['total'];
                            ?>
                        </span>
                    </h1>
                        <div class="stat-label">Products Delivered</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="penjualan.php" style="text-decoration:none;color:inherit;">
            <div class="panel panel-stat theme-brown-3">
                <div class="panel-heading-stat">
                    <h1>
                        <i class="fa fa-line-chart"></i>
                        <span class="val-small">
                            <?php
                                $data_masuk = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT SUM(total_harga) AS total FROM penjualan"));
                                echo "Rp ".number_format($data_masuk['total']);
                            ?>
                        </span>
                    </h1>
                    <div class="stat-label">Success Harvest</div>
                </div>
            </div>
        </a>
    </div>

</div>

<div class="panel panel-history">
    <div class="panel-heading theme-dark">
        <h4 style="margin:0;font-weight:700;">
            <i class="fa fa-history"></i>
                Riwayat Pembelian Terakhir
        </h4>
    </div>

    <div class="panel-body" style="padding:0;">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Total</th>
                        <th>Cashier</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $data = mysqli_query($koneksi,"
                            SELECT penjualan.id_jual, penjualan.tgl_jual, penjualan.status, penjualan.jumlah,
                            user.user_nama, barang.nama_barang, barang.harga_jual,
                            (barang.harga_jual * penjualan.jumlah) AS total_akhir
                            FROM penjualan
                            INNER JOIN user ON penjualan.user_id = user.user_id
                            INNER JOIN barang ON penjualan.id_barang = barang.id_barang
                            ORDER BY penjualan.id_jual DESC
                            LIMIT 10
                        ");

                        $no=1;
                            while($d=mysqli_fetch_array($data)){
                    ?>
                        <tr>
                            <td class="text-center" style="color: #9A6B63;"><?= $no++; ?></td>
                            <td class="invoice-text">INV-<?php echo $d['id_jual']; ?></td>
                            <td><?= date('d M Y', strtotime($d['tgl_jual'])); ?></td>
                            <td><?= $d['nama_barang']; ?></td>
                            <td class="text-center"><?= $d['jumlah']; ?></td>
                            <td class="text-center" style="font-weight: 600; color: #5A3A32;">Rp <?= number_format($d['total_akhir'], 0, ',', '.'); ?></td>
                            <td><i class="fa fa-user-circle" style="color:#F5C6A8;"></i> <?= $d['user_nama']; ?></td>
                            <td class="text-center">
                                <span class="status-badge">SELESAI</span>
                            </td>
                        </tr>
                    <?php 
                        } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

<br><br>

<?php include 'footer.php'; ?>
