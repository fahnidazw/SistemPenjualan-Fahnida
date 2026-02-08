<?php
include 'header.php';
include '../koneksi.php';

$id_kasir = $_SESSION['user_id'];
$username_admin = $_SESSION['username'];
?>


<style>
    body {
        background: linear-gradient(180deg, #FFF8F5, #F4EFEA);
        font-family: 'Inter', 'Segoe UI', sans-serif;
        color: #5A3A32;
    }

    .container {
        width: 95%;
        margin-top: 28px;
    }

    .welcome-bg {
        background: linear-gradient(135deg, #FFF1F4, #FFE6D8);
        border-left: 6px solid #F3A6B8;
        border-radius: 18px;
        padding: 26px 30px;
        margin-bottom: 35px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 14px 28px rgba(243,166,184,.25);
    }

    .welcome-bg h4 {
        margin: 0;
        font-weight: 700;
    }

    .welcome-bg small {
        color: #9A6B63;
        font-weight: 500;
    }

        .panel-stat {
    background: linear-gradient(145deg, #FFFFFF, #FFF3ED);
    border-radius: 18px;
    box-shadow: 0 12px 26px rgba(243,166,184,.25);
    transition: .35s ease;
    min-height: 120px;
    display: flex;
    align-items: center;
}

        .panel-stat:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 36px rgba(243,166,184,.35);
}

        .panel-heading-stat {
    padding: 22px;
    width: 100%;
}

        .panel-heading-stat h1 {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0;
}
        
        .panel-heading-stat i {
    font-size: 32px;
    color: #E39AAE;
}

        .val-large {
    font-size: 32px;
    font-weight: 800;
    color: #7A3E34;
}

        .val-small {
    font-size: 22px;
    font-weight: 800;
    color: #7A3E34;
}

        .stat-label {
    margin-top: 6px;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1.4px;
    color: #9A6B63;
    font-weight: 600;
}

        .panel-history {
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 16px 30px rgba(243,166,184,.25);
    margin-bottom: 40px;
}

        .theme-dark {
    background: linear-gradient(135deg, #E39AAE);
    color: #fff;
}

        .table thead th {
    background: #FFF1F4;
    color: #7A4A42;
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 1px;
    padding: 16px;
    border-bottom: 2px solid #F2C2A3;
}

        .table tbody td {
    padding: 15px;
    vertical-align: middle;
}

        .table tbody tr:hover {
    background: #FFF6F1;
}

        .invoice-text {
    font-weight: 700;
    color: #E39AAE;
}

        .label-success {
    background: linear-gradient(135deg, #F5C6A8);
    padding: 6px 14px;
    border-radius: 20px;
    font-weight: 600;
    color: #fff;
}
</style>


<div class="container">

        <div class="welcome-bg">
            <div>
                <h4 style="margin:0;font-weight:700;">
                    Selamat Datang, <?= $username_admin; ?> ✨
                </h4>
                <small>
                    Insights | <i class="fas fa-moon"></i> The Lumora Co
                </small>
        </div>

        <div>
                <?= date('l, d M Y'); ?>
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
                        <th>Jumlah</th>
                        <th>Total</th>
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
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="invoice-text">INV-<?= $d['id_jual']; ?></td>
                            <td><?= date('d M Y',strtotime($d['tgl_jual'])); ?></td>
                            <td><?= $d['nama_barang']; ?></td>
                            <td class="text-center"><?= $d['jumlah']; ?></td>
                            <td>Rp <?= number_format($d['total_akhir']); ?></td>
                            <td><?= $d['user_nama']; ?></td>
                            <td class="text-center">
                                <span class="label label-success">SELESAI</span>
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
