<!DOCTYPE html>
<html>
<head>
    <title>Invoice Cetak | The Lumora Co</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <style>
        body {
            background: #fff;
            font-family: 'Segoe UI', sans-serif;
        }

        .invoice-print {
            border: 2px solid #f3c6c6;
            padding: 30px;
            border-radius: 18px;
        }

        .header {
            text-align: center;
            border-bottom: 2px dashed #f3c6c6;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            color: #d46a7e;
            letter-spacing: 2px;
        }

        .header p {
            margin: 4px 0 0;
            color: #a87c7c;
            font-size: 13px;
        }

        .info-table th {
            width: 30%;
            color: #9a5a5a;
        }

        .table th {
            background: #fde8e3 !important;
            border-color: #f3c6c6 !important;
        }

        .table td {
            border-color: #f3c6c6 !important;
        }

        .total-box {
            background: #fde8e3;
            padding: 15px;
            border-radius: 12px;
            text-align: right;
            font-size: 17px;
            font-weight: bold;
            color: #8a3b3b;
        }

        .status {
            padding: 5px 14px;
            border-radius: 20px;
            font-size: 11px;
            color: #fff;
        }

        .status-selesai { background: #7ac77a; }
        .status-gagal { background: #e25d5d; }

        .footer {
            text-align: center;
            margin-top: 25px;
            font-style: italic;
            color: #9a7a7a;
        }

        @media print {
            body {
                margin: 0;
            }
        }
    </style>
</head>

<body>

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
?>

<div class="container">
    <div class="col-md-10 col-md-offset-1 invoice-print">

        <div class="header">
            <h2>THE LUMORA CO</h2>
            <p>Aromatherapy • Soft Glow • Comfort</p>
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
                    if ($d['status'] == "Selesai") {
                        echo "<span class='status status-selesai'>SELESAI</span>";
                    } else {
                        echo "<span class='status status-gagal'>GAGAL</span>";
                    }
                    ?>
                </td>
            </tr>
        </table>

        <h4 style="color:#9a5a5a;">Detail Produk</h4>

        <table class="table table-bordered">
            <tr>
                <th>Produk</th>
                <th class="text-center">Jumlah</th>
                <th class="text-right">Harga</th>
                <th class="text-right">Subtotal</th>
            </tr>
            <tr>
                <td><?php echo $d['nama_barang']; ?></td>
                <td class="text-center"><?php echo $d['jumlah']; ?></td>
                <td class="text-right">Rp <?php echo number_format($d['harga_jual']); ?></td>
                <td class="text-right"><b>Rp <?php echo number_format($d['total_akhir']); ?></b></td>
            </tr>
        </table>

        <div class="total-box">
            Total Bayar : Rp <?php echo number_format($d['total_akhir']); ?>
        </div>

        <div class="footer">
            "Terima kasih telah mempercayakan pilihan Anda pada The Lumora Co"
        </div>

    </div>
</div>

<script>
    window.print();
</script>

</body>
</html>