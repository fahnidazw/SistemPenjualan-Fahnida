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
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

<style>
body{
    background:#f7f3ee;
    font-family:'Segoe UI', sans-serif;
    color:#6b4b47;
}

/* === INVOICE WRAPPER === */
.invoice-box{
    background:#ffffff;
    padding:26px;
    margin:30px auto;
    max-width:700px;
    border-radius:16px;
    box-shadow:0 10px 24px rgba(246,183,197,.22);
}

/* === HEADER === */
.header{
    background:#f6b7c5;
    padding:16px;
    border-radius:12px;
    text-align:center;
}

.header h2{
    margin:0;
    font-size:20px;
    font-weight:700;
    letter-spacing:.8px;
}

.header p{
    margin:4px 0 0;
    font-size:12px;
    opacity:.95;
}

/* === INFO TABLE === */
.info-table{
    margin-top:16px;
    font-size:13px;
}

.info-table th{
    width:34%;
    padding:8px 10px;
    color:#8b5e5a;
    font-weight:600;
    border:none !important;
}

.info-table td{
    padding:8px 10px;
    border:none !important;
}

/* === STATUS === */
.status-success,
.status-failed{
    font-size:10px;
    padding:4px 12px;
    border-radius:20px;
    font-weight:600;
}

.status-success{ background:#7ac77a; color:#fff; }
.status-failed{ background:#e25d5d; color:#fff; }

/* === PRODUCT TABLE === */
.table{
    margin-top:10px;
    font-size:13px;
}

.table thead th{
    background:#fff1f4;
    color:#8b5e5a;
    font-size:11px;
    text-transform:uppercase;
    border:none;
    padding:10px;
}

.table tbody td{
    padding:10px;
    border-top:1px solid #f3e4de;
}

/* === TOTAL === */
.total-box{
    margin-top:14px;
    background:#fff1f4;
    padding:12px 16px;
    border-radius:12px;
    text-align:right;
    font-size:15px;
    font-weight:700;
    color:#7a3b3b;
}

/* === FOOTER === */
.footer{
    text-align:center;
    margin-top:18px;
    font-size:12px;
    color:#9a7a7a;
    font-style:italic;
}

/* === BUTTON === */
.btn-soft{
    background:#f2a7b5;
    border:none;
    color:#fff;
    border-radius:26px;
    padding:8px 20px;
    font-size:12px;
    margin:0 4px;
}

.btn-soft:hover{
    background:#ec93a6;
    color:#fff;
}

/* === PRINT === */
@media print{
    .no-print{ display:none; }
    body{ background:#fff; }
    .invoice-box{
        box-shadow:none;
        margin:0;
        padding:20px;
    }
}
</style>
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