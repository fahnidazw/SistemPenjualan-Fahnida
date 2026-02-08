<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan - Laundry</title>

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

    <style>
        body{
            font-family: "Segoe UI", Arial, sans-serif;
            color:#000;
        }

        h2{
            margin-bottom:5px;
            font-weight:700;
            letter-spacing:1px;
        }

        h4{
            margin-top:0;
            font-size:14px;
        }

        .header{
            text-align:center;
            border-bottom:2px solid #000;
            padding-bottom:10px;
            margin-bottom:20px;
        }

        .table{
            font-size:12px;
        }

        .table th{
            background:#f5f5f5;
            text-align:center;
        }

        .table td{
            vertical-align:middle;
        }

        .label{
            padding:4px 10px;
            border-radius:10px;
            font-size:10px;
            font-weight:700;
            color:#000;
            border:1px solid #000;
        }

        @media print{
            .no-print{
                display:none;
            }
        }
    </style>
</head>
<body>

<?php
session_start();
if($_SESSION['status']!="login"){
    header("location:../index.php?pesan=belum_login");
}

include '../koneksi.php';
?>

<div class="container">

    <div class="header">
        <h2>SISTEM INFORMASI LAUNDRY</h2>
        <h4>Laporan Penjualan</h4>
    </div>

    <?php
    if(isset($_GET['dari']) && isset($_GET['sampai'])){

        $dari   = $_GET['dari'];
        $sampai = $_GET['sampai'];
    ?>

    <p>
        Periode :
        <strong><?php echo date('d-m-Y', strtotime($dari)); ?></strong>
        s/d
        <strong><?php echo date('d-m-Y', strtotime($sampai)); ?></strong>
    </p>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Invoice</th>
            <th>Tanggal</th>
            <th>Total Produk</th>
            <th>Total Bayar</th>
            <th>Kasir</th>
            <th>Status</th>
        </tr>

        <?php
        $data = mysqli_query($koneksi, "
            SELECT p.id_jual, p.tgl_jual, p.status, p.jumlah,
                   u.user_nama, b.harga_jual,
                   (b.harga_jual * p.jumlah) as total_akhir
            FROM penjualan p
            INNER JOIN user u ON p.user_id = u.user_id
            INNER JOIN barang b ON p.id_barang = b.id_barang
            WHERE p.status IN ('Selesai','Gagal')
            ORDER BY p.id_jual DESC
        ");

        $no = 1;
        while($d = mysqli_fetch_array($data)){
        ?>

        <tr>
            <td class="text-center"><?php echo $no++; ?></td>
            <td>INV-<?php echo $d['id_jual']; ?></td>
            <td class="text-center"><?php echo date('d-m-Y', strtotime($d['tgl_jual'])); ?></td>
            <td class="text-center"><?php echo $d['jumlah']; ?></td>
            <td>Rp <?php echo number_format($d['total_akhir']); ?></td>
            <td><?php echo $d['user_nama']; ?></td>
            <td class="text-center">
                                            <?php 
                                            if($d['status']=="Selesai"){
                                                echo "<span class='label label-success'>SELESAI</span>";
                                            } else {
                                                echo "<span class='label label-danger'>GAGAL</span>";
                                            }
                                            ?>          
                                        </td>
        </tr>

        <?php } ?>
    </table>

    <?php } ?>

</div>

<script>
    window.print();
</script>

</body>
</html>