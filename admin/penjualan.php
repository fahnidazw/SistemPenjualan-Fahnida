<?php include 'header.php'; ?>

<style>
    body {
        background: linear-gradient(180deg, #FFF8F3, #FCFAF8);
        font-family: 'Segoe UI', Arial, sans-serif;
        color: #5A3B33;
    }

    .container {
        width: 95%;
        margin-top: 28px;
    }

    /* Panel Styling */
    .panel {
        background: #FFFFFF;
        border-radius: 22px;
        border: none;
        box-shadow: 0 18px 40px rgba(246, 183, 197, 0.25);
        overflow: hidden;
    }

    .panel-heading {
        background: linear-gradient(135deg, #F6B7C5, #F5C6A8);
        color: #fff;
        padding: 24px 30px;
    }

    .panel-heading h4 {
        margin: 0;
        font-weight: 700;
        letter-spacing: 0.6px;
    }

    .panel-body {
        padding: 32px;
    }

    /* Button Styling */
    .btn-add {
        background: linear-gradient(135deg, #F6B7C5, #EFA5B7);
        color: #fff;
        padding: 11px 26px;
        border-radius: 28px;
        font-weight: 600;
        border: none;
        box-shadow: 0 8px 18px rgba(246, 183, 197, 0.45);
        margin-bottom: 20px;
    }

    .btn-add:hover {
        background: linear-gradient(135deg, #EFA5B7, #E39AAE);
        color: #fff;
    }

    /* Table Styling */
    .table {
        background: #FFFFFF;
        border-radius: 18px;
        overflow: hidden;
        margin-top: 18px;
    }

    .table thead th {
        background: #FFF1F4;
        color: #6B3A2C;
        font-size: 11.5px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        padding: 16px;
        border-bottom: 1px solid #F1D8D2;
    }

    .table tbody td {
        border-top: 1px solid #F3E4DE;
        color: #5A3B33;
        padding: 18px 16px;
        vertical-align: middle;
        font-size: 14px;
    }

    .table tbody tr:hover {
        background: #FFF6F1;
    }

    /* Labels & Badges */
    .label {
        padding: 7px 18px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        display: inline-block;
    }

    .label-success { background: #C1E1C1; color: #1B4D3E; }
    .label-danger { background: #FFB3B3; color: #7D0000; }
    .label-warning { background: #F3C3A3; color: #6B3E2E; }

    .btn-xs {
        padding: 7px 16px;
        border-radius: 18px;
        font-size: 12px;
        border: none;
        margin: 2px;
    }

    .btn-info { background: #F6B7C5; color: #fff; }
    .btn-info:hover { background: #EFA5B7; }
    .btn-danger { background: #E05656; color: #fff; }
    .btn-danger:hover { background: #C84545; }
</style>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Manajemen Data Transaksi</h4>
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <a href="penjualan_tambah.php" class="btn btn-add">
                        <i class="fa fa-plus-circle"></i> Tambah Transaksi
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No</th>
                            <th>Invoice</th>
                            <th class="text-center">Tanggal</th>
                            <th>Nama Barang</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Jumlah</th>
                            <th>Subtotal</th>
                            <th>Kasir</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include '../koneksi.php';
                        $data = mysqli_query($koneksi, "
                            SELECT p.id_jual, p.tgl_jual, p.status, p.jumlah,
                                   u.user_nama, b.nama_barang, b.harga_jual,
                                   (b.harga_jual * p.jumlah) as total_akhir
                            FROM penjualan p
                            INNER JOIN user u ON p.user_id = u.user_id
                            INNER JOIN barang b ON p.id_barang = b.id_barang
                            WHERE p.status IN ('Selesai', 'Gagal')
                            ORDER BY p.id_jual DESC
                        ");
                        
                        $no = 1;
                        while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td><strong>INVOICE-<?php echo $d['id_jual']; ?></strong></td>
                            <td class="text-center"><?php echo date('d-m-Y', strtotime($d['tgl_jual'])); ?></td>
                            <td><?php echo $d['nama_barang']; ?></td>
                            <td><strong>Rp. <?php echo number_format($d['harga_jual']); ?> -</strong></td>
                            <td class="text-center"><?php echo $d['jumlah']; ?></td>
                            <td><strong>Rp. <?php echo number_format($d['total_akhir']); ?> -</strong></td>
                            <td><?php echo $d['user_nama']; ?></td>
                            <td class="text-center">
                                <?php if($d['status'] == "Selesai"): ?>
                                    <span class='label label-success'>SELESAI</span>
                                <?php else: ?>
                                    <span class='label label-danger'>GAGAL</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <a href="penjualan_invoice.php?id=<?php echo $d['id_jual']; ?>" target="_blank" class="btn btn-xs btn-warning" title="Cetak">
                                    <i class="fa fa-print"></i>
                                </a>
                                <a href="penjualan_edit.php?id=<?php echo $d['id_jual']; ?>" class="btn btn-xs btn-info" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="penjualan_hapus.php?id=<?php echo $d['id_jual']; ?>" class="btn btn-xs btn-danger" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div> </div> </div> </div> <br><br><br>

<?php include 'footer.php'; ?>