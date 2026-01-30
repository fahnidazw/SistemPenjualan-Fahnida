<?php
    include 'header.php'; 
    include '../koneksi.php';

    $id_kasir = $_SESSION['user_id']; 
    $username_kasir = $_SESSION['username'];
?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

<style>
    body { background: #f8f5f2; font-family: 'Inter', sans-serif; color: #3B2A20; }
    .container { width: 92% !important; margin-top: 30px; padding-bottom: 50px; }
    
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


    .panel-history {
        border-radius: 15px !important;
        overflow: hidden;
        border: none !important;
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
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
    .panel-stat {
        background: #ffffff !important; border-radius: 20px !important; border: none !important;
        box-shadow: 0 10px 25px rgba(59, 42, 32, 0.03) !important; margin-bottom: 30px;
        padding: 20px; position: relative; overflow: hidden; height: 120px;
    }

    .stat-value { font-size: 24px; font-weight: 700; display: block; color: #3B2A20; margin-top: 5px; }
    .stat-label { text-transform: uppercase; font-size: 10px; letter-spacing: 1.2px; font-weight: 600; color: #8D7765; }
    
    .btn-pos {
        background: linear-gradient(135deg, #3B2A20 0%, #5D4037 100%) !important;
        color: #fff !important; border-radius: 15px !important;
        padding: 20px !important; text-align: center; font-weight: 700;
        display: block; text-decoration: none; transition: 0.3s;
        box-shadow: 0 10px 20px rgba(59, 42, 32, 0.2);
        height: 120px; display: flex; flex-direction: column; justify-content: center; align-items: center;
    }
    .theme-dark {
        background: linear-gradient(135deg, #3B2A20 0%, #5D4037 100%) !important;
        color: #F7F1EA !important;
    }

    .btn-pos:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(59, 42, 32, 0.3); color: #fff !important; }

    .table-history { background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.03); margin-top: 20px; }
    .status-badge { background: #EFE6DB; color: #8D7765; padding: 4px 12px; border-radius: 50px; font-size: 11px; font-weight: 700; }
</style>

    <div class="container">
        <div class="welcome-bg">
            <div>
                <h4 style="margin:0;font-weight:700;">
                    Have a good day, <?= $username_kasir; ?> ✨
                </h4>
                <small style="color:#8D7765;">
                    Welcome back to your dashboard
                </small>
            </div>

            <!-- KANAN -->
            <div style="color:#A38A75; font-weight:600;">
                <?= date('l, d M Y'); ?>
            </div>
        </div>


        <div class="row">
        <div class="col-md-4">
            <a href="penjualan_tambah.php" class="btn-pos">
                <i class="fa fa-shopping-cart fa-2x" style="margin-bottom:5px;"></i>
                <span>MULAI TRANSAKSI BARU</span>
            </a>
        </div>

        <div class="col-md-4">
            <div class="panel panel-stat">
                <a href="produk.php" style="text-decoration:none;color:inherit;">
                    <span class="stat-label">Total Jenis Produk</span>
                    <span class="stat-value">
                        <?php
                            $query_produk = mysqli_query($koneksi, "SELECT id_barang FROM barang");
                            echo mysqli_num_rows($query_produk);
                        ?>
                    </span>
                    <i class="fa fa-box"
                       style="position:absolute; right:20px; bottom:20px; font-size:40px; opacity:0.1;"></i>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-stat">
                <a href="index.php" style="text-decoration:none;color:inherit;">
                    <span class="stat-label">Operator Aktif</span>
                    <span class="stat-value" style="color:#A38A75;">
                        <?= $username_kasir; ?>
                    </span>
                    <i class="fa fa-user-circle"
                       style="position:absolute; right:20px; bottom:20px; font-size:40px; opacity:0.1;"></i>
                </a>
            </div>
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
                            <th>Total Harga</th>
                            <th>Name Cashier</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM penjualan 
                                    JOIN user ON penjualan.user_id = user.user_id 
                                    ORDER BY penjualan.id_jual DESC LIMIT 10");
                            $no = 1;
                            while ($d = mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="invoice-text">INV-<?php echo $d['id_jual']; ?></td>
                            <td><?= date('d M Y', strtotime($d['tgl_jual'])); ?></td>
                            <td style="font-weight: 600;">Rp. <?= number_format($d['total_harga']); ?></td>
                            <td><i class="fa fa-user-circle-o" style="color:#A38A75;"></i> <?= $d['user_nama']; ?></td>
                            <td class="text-center">
                                <span class="label label-success">SELESAI</span>
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