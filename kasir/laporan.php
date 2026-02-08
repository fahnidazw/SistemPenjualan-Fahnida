<?php 
include 'header.php'; 
// Koneksi disertakan di sini atau di dalam header.php
include '../koneksi.php'; 
?>

<style>
    body {
        background: linear-gradient(180deg, #FFF8F3, #FCFAF8);
        font-family: 'Poppins', sans-serif;
        color: #5A3B33;
    }

    .container {
        width: 95%;
        margin-top: 30px;
    }

    .panel {
        background: #fff;
        border-radius: 20px;
        border: none;
        box-shadow: 0 18px 40px rgba(246, 183, 197, .25);
        overflow: hidden;
        margin-bottom: 30px;
    }

    .panel-heading {
        background: linear-gradient(135deg, #F6B7C5, #F5C6A8);
        color: #fff;
        padding: 22px 28px;
    }

    .panel-heading h4 {
        margin: 0;
        font-weight: 700;
        letter-spacing: .6px;
    }

    .panel-body {
        padding: 30px;
    }

    .table {
        width: 100%;
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        border-collapse: collapse;
    }

    .table th {
        background: #FFF1F4;
        color: #6B3A2C;
        text-transform: uppercase;
        font-size: 11px;
        letter-spacing: 1px;
        padding: 14px;
        text-align: center;
        border: 1px solid #F3E4DE;
    }

    .table td {
        padding: 15px;
        vertical-align: middle;
        font-size: 14px;
        border: 1px solid #F3E4DE;
    }

    .table tbody tr:hover {
        background: #FFF6F1;
    }

    .form-control-date {
        border-radius: 12px;
        padding: 10px 14px;
        border: 1px solid #EBD4CD;
        width: 100%;
        color: #5A3B33;
    }

    .btn-primary {
        background: linear-gradient(135deg, #F6B7C5, #EFA5B7);
        border: none;
        border-radius: 20px;
        padding: 10px 25px;
        color: white;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s;
        box-shadow: 0 8px 18px rgba(246, 183, 197, .45);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 22px rgba(246, 183, 197, .55);
    }

    .label {
        padding: 6px 12px;
        border-radius: 15px;
        font-size: 10px;
        font-weight: 700;
        text-align: center;
        display: inline-block;
    }

    .label-success { background: #E8F5E9; color: #2E7D32; border: 1px solid #A5D6A7; }
    .label-danger { background: #FFEBEE; color: #C62828; border: 1px solid #EF9A9A; }
    
    .text-center { text-align: center; }
</style>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4><i class="fa fa-filter"></i> Filter Laporan Penjualan</h4>
        </div>
        <div class="panel-body">
            <form action="laporan.php" method="get">
                <div style="display: flex; gap: 20px; align-items: flex-end;">
                    <div style="flex: 1;">
                        <label style="font-size: 12px; font-weight: 600; margin-bottom: 8px; display: block;">Dari Tanggal</label>
                        <input type="date" name="tgl_dari" class="form-control-date" value="<?php echo isset($_GET['tgl_dari']) ? $_GET['tgl_dari'] : ''; ?>" required>
                    </div>
                    <div style="flex: 1;">
                        <label style="font-size: 12px; font-weight: 600; margin-bottom: 8px; display: block;">Sampai Tanggal</label>
                        <input type="date" name="tgl_sampai" class="form-control-date" value="<?php echo isset($_GET['tgl_sampai']) ? $_GET['tgl_sampai'] : ''; ?>" required>
                    </div>
                    <div>
                        <button type="submit" class="btn-primary">
                            <i class="fa fa-search"></i> FILTER DATA
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php 
    if(isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])){
        $dari = $_GET['tgl_dari'];
        $sampai = $_GET['tgl_sampai'];
    ?>
        <div class="panel">
            <div class="panel-heading" style="display: flex; justify-content: space-between; align-items: center;">
                <h4>Data Laporan: <?php echo date('d/m/Y', strtotime($dari)); ?> - <?php echo date('d/m/Y', strtotime($sampai)); ?></h4>
                <a target="_blank" href="cetak_print.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn-primary" style="text-decoration: none; font-size: 12px;">
                    <i class="fa fa-print"></i> CETAK PDF
                </a>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Invoice</th>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th>Kasir</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Perbaikan Query: Menambahkan filter tgl_jual
                        $data = mysqli_query($koneksi, "
                            SELECT p.id_jual, p.tgl_jual, p.status, p.jumlah,
                                   u.user_nama, b.nama_barang, b.harga_jual,
                                   (b.harga_jual * p.jumlah) as total_akhir
                            FROM penjualan p
                            INNER JOIN user u ON p.user_id = u.user_id
                            INNER JOIN barang b ON p.id_barang = b.id_barang
                            WHERE p.status IN ('Selesai', 'Gagal')
                            AND DATE(p.tgl_jual) >= '$dari' 
                            AND DATE(p.tgl_jual) <= '$sampai'
                            ORDER BY p.id_jual DESC
                        ");
                        
                        $no = 1;
                        $grand_total = 0;
                        while($d = mysqli_fetch_array($data)){
                            $grand_total += $d['total_akhir'];
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td><strong style="color: #F6B7C5;">#INV-<?php echo $d['id_jual']; ?></strong></td>
                            <td class="text-center"><?php echo date('d-m-Y', strtotime($d['tgl_jual'])); ?></td>
                            <td><?php echo $d['nama_barang']; ?></td>
                            <td class="text-right">Rp <?php echo number_format($d['harga_jual']); ?></td>
                            <td class="text-center"><?php echo $d['jumlah']; ?></td>
                            <td><strong>Rp <?php echo number_format($d['total_akhir']); ?></strong></td>
                            <td><?php echo $d['user_nama']; ?></td>
                            <td class="text-center">
                                <?php if($d['status'] == "Selesai"): ?>
                                    <span class='label label-success'>SELESAI</span>
                                <?php else: ?>
                                    <span class='label label-danger'>GAGAL</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr style="background: #FCFAF8; font-weight: bold;">
                            <td colspan="6" class="text-right">TOTAL PENDAPATAN</td>
                            <td colspan="3" style="color: #C62828; font-size: 16px;">Rp <?php echo number_format($grand_total); ?></td>
                        </tr>
                    </tfoot>
                </table>
                
                <?php if(mysqli_num_rows($data) == 0): ?>
                    <div class="text-center" style="padding: 40px; color: #A08585;">
                        <i class="fa fa-folder-open" style="font-size: 40px; margin-bottom: 10px;"></i>
                        <p>Tidak ada data penjualan pada rentang tanggal ini.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php } ?>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">