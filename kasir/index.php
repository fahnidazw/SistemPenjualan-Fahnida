<?php
    include 'header.php'; 
    include '../koneksi.php';

    $id_kasir = $_SESSION['user_id']; 
    $username_kasir = $_SESSION['username'];
?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/index_kasir.css">

<div class="container">
    <div class="welcome-bg">
        <div>
            <h4 style="margin:0;font-weight:700; color: #5A3A32;">
                Have a good day, <?= $username_kasir; ?> ✨
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
        <div class="col-md-4">
            <a href="penjualan_tambah.php" class="btn-pos">
                <i class="fa fa-shopping-cart fa-2x" style="margin-bottom:8px;"></i>
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
                    <i class="fa fa-box" style="position:absolute; right:20px; bottom:20px; font-size:40px; color:#F3A6B8; opacity:0.2;"></i>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-stat">
                <a href="index.php" style="text-decoration:none;color:inherit;">
                    <span class="stat-label">Operator Aktif</span>
                    <span class="stat-value" style="color:#9A6B63;">
                        <?= $username_kasir; ?>
                    </span>
                    <i class="fa fa-user-circle" style="position:absolute; right:20px; bottom:20px; font-size:40px; color:#F3A6B8; opacity:0.2;"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="panel panel-history">
        <div class="panel-heading theme-dark">
            <h4 style="margin:0; font-weight: 600;"><i class="fa fa-history"></i> Riwayat Pembelian Terakhir</h4>
        </div>

        <div class="panel-body" style="padding: 0;">
            <div class="table-responsive">
                <table class="table table-hover" style="margin-bottom: 0;">
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

<?php include 'footer.php'; ?>