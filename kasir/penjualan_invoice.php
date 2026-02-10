<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
    exit;
}

include '../koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "
    SELECT 
        penjualan.id_jual,
        penjualan.tgl_jual,
        penjualan.jumlah,
        penjualan.status,
        user.user_nama,
        barang.nama_barang,
        barang.harga_jual,
        (barang.harga_jual * penjualan.jumlah) AS total_akhir
    FROM penjualan
    INNER JOIN user ON penjualan.user_id = user.user_id
    INNER JOIN barang ON penjualan.id_barang = barang.id_barang
    WHERE penjualan.id_jual = '$id'
");

$d = mysqli_fetch_assoc($query);
if (!$d) {
    echo "Data tidak ditemukan";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice | The Lumora Co</title>
    <link rel="stylesheet" href="../assets/css/invoice.css">
</head>

<body>

<div class="invoice-box">

    <div class="header">
        <h2>THE LUMORA CO</h2>
        <p>Soft Glow • Aromatherapy • Comfort</p>
    </div>

    <table class="table info-table">
        <tr>
            <th>Invoice</th>
            <td>INV-<?php echo $d['id_jual']; ?></td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td><?php echo date('d F Y', strtotime($d['tgl_jual'])); ?></td>
        </tr>
        <tr>
            <th>Kasir</th>
            <td><?php echo $d['user_nama']; ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <?php
                echo ($d['status']=="Selesai")
                ? "<span class='status-success'>SELESAI</span>"
                : "<span class='status-failed'>GAGAL</span>";
                ?>
            </td>
        </tr>
    </table>

    <h4 style="color:#8b5e5e;margin-top:20px;">Detail Produk</h4>

    <table class="table">
        <thead>
            <tr>
                <th>Produk</th>
                <th class="text-center">Jumlah</th>
                <th class="text-right">Harga</th>
                <th class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $d['nama_barang']; ?></td>
                <td class="text-center"><?php echo $d['jumlah']; ?></td>
                <td class="text-right">Rp <?php echo number_format($d['harga_jual']); ?></td>
                <td class="text-right"><b>Rp <?php echo number_format($d['total_akhir']); ?></b></td>
            </tr>
        </tbody>
    </table>

    <div class="total-box">
        Total Bayar : Rp <?php echo number_format($d['total_akhir']); ?>
    </div>

    <div class="footer">
        “Terima kasih telah memilih kehangatan dari The Lumora Co”
    </div>

    <center class="no-print" style="margin-top:26px;">
        <button onclick="window.print()" class="btn-soft">
            <i class="glyphicon glyphicon-print"></i> Cetak Invoice
        </button>
        <a href="penjualan.php" class="btn-soft">
            <i class="glyphicon glyphicon-arrow-left"></i> Kembali
        </a>
    </center>

</div>

</body>
</html>