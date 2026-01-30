<?php
    include 'header.php'; 
    include '../koneksi.php';

    $id_kasir = $_SESSION['user_id']; 
    $username_admin = $_SESSION['username'];
?>

<style>
    body {
        background: #f4f1ee;
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        color: #3B2A20;
    }

    .container {
        width: 95% !important;
        max-width: none !important;
        margin-top: 20px;
    }

    .theme-dark {
        background: linear-gradient(135deg, #3B2A20 0%, #5D4037 100%) !important;
        color: #F7F1EA !important;
    }

    .theme-brown-3 {
        background: #ffffff !important;
        color: #3B2A20 !important;
        border-bottom: 4px solid #A38A75;
    }

    .panel-stat {
        border-radius: 15px !important;
        border: 1px solid rgba(163, 138, 117, 0.2) !important;
        box-shadow: 0 8px 20px rgba(59, 42, 32, 0.08) !important;
        margin-bottom: 30px;
        transition: all 0.3s ease;
        min-height: 120px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .panel-stat:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(59, 42, 32, 0.15) !important;
    }

    .panel-heading-stat {
        padding: 15px 20px !important;
        border-bottom: none !important;
        background: transparent !important;
    }

    .panel-heading-stat h1 {
        margin: 0 0 5px 0;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .val-large { font-size: 28px; }
    .val-small { font-size: 20px; }

    .panel-heading-stat h1 i {
        font-size: 32px;
        color: #A38A75;
    }

    .stat-label {
        text-transform: uppercase;
        font-size: 11px;
        letter-spacing: 1.2px;
        font-weight: 600;
        color: #8D7765;
    }

    .welcome-bg {
    background: linear-gradient(
        135deg,
        #FAF6F2 0%,
        #EFE6DB 100%
    );

    border-left: 6px solid #3B2A20;
    border-radius: 16px;

    padding: 24px 28px;
    max-width: 1100px;
    margin: 0 auto 30px auto;

    box-shadow:
        0 10px 25px rgba(59, 42, 32, 0.12),
        inset 0 1px 0 rgba(255,255,255,0.6);

    display: flex;
    justify-content: space-between;
    align-items: center;
    }

    .table thead th {
        background-color: #fcfaf8;
        text-transform: uppercase;
        font-size: 12px;
        padding: 15px !important;
        border-bottom: 2px solid #EFE6DB !important;
    }

    .table tbody td {
        padding: 15px !important;
        vertical-align: middle !important;
    }

    .label-success {
        background-color: #6d8c6d !important;
        padding: 5px 12px;
        border-radius: 50px;
    }

    .invoice-text {
        font-weight: bold;
        color: #A38A75;
    }
</style>

    <div class="container">
        <div class="welcome-bg">
            <div>
                <h4 style="margin:0;font-weight:700;">
                    Selamat Datang!, <?= $username_admin; ?> ✨
                </h4>
                <small style="color:#8D7765;">
                    In Insights | <i class="fas fa-moon"></i> The Lumora Co.
                </small>
            </div>

            <!-- KANAN -->
            <div style="color:#A38A75; font-weight:600;">
                <?= date('l, d M Y'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <a href="produk.php" style="text-decoration: none; color: inherit;">
                <div class="panel panel-stat theme-brown-3">
                    <div class="panel-heading-stat">
                        <h1>
                            <i class="fa fa-cubes"></i>
                            <span class="val-large">
                                <?php
                                    $barang = mysqli_query($koneksi, "select * from barang");
                                    echo mysqli_num_rows($barang);
                                ?>
                            </span>
                        </h1>
                        <span class="stat-label">Most Loved Scent</span>
                    </div>
                </a>
                </div>
            </div>

            <div class="col-md-3">
                <a href="user.php" style="text-decoration: none; color: inherit;">
                <div class="panel panel-stat theme-brown-3">
                    <div class="panel-heading-stat">
                        <h1>
                            <i class="fa fa-users"></i>
                            <span class="val-large">
                                <?php
                                    $user = mysqli_query($koneksi, "select * from user");
                                    echo mysqli_num_rows($user);
                                ?>
                            </span>
                        </h1>
                        <span class="stat-label">Lovely Community</span>
                    </div>
                </a>
                </div>
            </div>

            <div class="col-md-3">
                <a href="penjualan.php" style="text-decoration: none; color: inherit;">
                <div class="panel panel-stat theme-brown-3">
                    <div class="panel-heading-stat">
                        <h1>
                            <i class="fa fa-shopping-bag"></i> 
                            <span class="val-large">
                                <?php
                                    $data_terjual = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM penjualan"));
                                    echo $data_terjual['total'];
                                ?>
                            </span>
                        </h1>
                        <span class="stat-label">Products Delivered</span>
                    </div>
                </a>
                </div>
            </div>

            <div class="col-md-3">
                <a href="penjualan.php" style="text-decoration: none; color: inherit;">
                <div class="panel panel-stat theme-brown-3">
                    <div class="panel-heading-stat">
                        <h1>
                            <i class="fa fa-line-chart"></i>
                            <span class="val-small">
                                <?php
                                    $data_masuk = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(total_harga) AS total FROM penjualan"));
                                    echo "Rp." . number_format($data_masuk['total']);
                                ?>
                            </span>
                        </h1>
                        <span class="stat-label">Success Harvest</span>
                    </div>
                </div>
            </a>
            </div>
    </div>

    <div class="panel panel-history">
        <div class="panel-heading theme-dark">
            <h4 style="margin:0;"><i class="fa fa-history"></i> Riwayat Pembelian Terakhir</h4>
        </div>

        <div class="panel-body" style="padding: 0;">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" width="1%">NO</th>
                            <th>Invoice</th>
                            <th>Tanggal Pembelian</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Name Cashier</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                include '../koneksi.php';
                                
                                $data = mysqli_query($koneksi, "
                                    SELECT penjualan.id_jual, penjualan.tgl_jual, penjualan.status, penjualan.jumlah, user.user_nama, barang.nama_barang, barang.harga_jual, (barang.harga_jual * penjualan.jumlah) as total_akhir
                                    FROM penjualan
                                    INNER JOIN user ON penjualan.user_id = user.user_id
                                    INNER JOIN barang ON penjualan.id_barang = barang.id_barang
                                    WHERE penjualan.status = 'Selesai' OR penjualan.status = 'Gagal'
                                    ORDER BY penjualan.id_jual DESC
                                ");

                                $no = 1;
                                while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="invoice-text">INV-<?php echo $d['id_jual']; ?></td>
                            <td><?= date('d M Y', strtotime($d['tgl_jual'])); ?></td>
                            <td><?php echo $d['nama_barang']; ?></td>
                            <td class="text-center"><?php echo $d['jumlah']; ?></td>
                            <td style="font-weight: 600;">Rp. <?= number_format($d['total_akhir']); ?></td>
                            <td><i class="fa fa-user-circle-o" style="color:#A38A75;"></i> <?= $d['user_nama']; ?></td>
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

<?php include 'footer.php'; ?>