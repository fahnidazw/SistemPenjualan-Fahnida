<?php include 'header.php'; ?>

<style>
    body {
        background: #fcfaf8;
        font-family: Arial, sans-serif;
    }

    .container {
        width: 95% !important;
        max-width: none !important;
        margin-top: 20px;
    }

    .panel {
        border-radius: 8px !important;
        border: 1px solid #ddd !important;
        box-shadow: none !important;
        margin-bottom: 20px;
    }

    .panel-heading {
        background: #3B2A20 !important;
        color: #fff !important;
        padding: 15px 20px !important;
    }

    .panel-body {
        padding: 20px !important;
    }

    .table {
        width: 100%;
        margin-top: 10px;
    }

    .table thead th {
        background: #f5f5f5;
        color: #333;
        font-size: 14px;
        padding: 12px !important;
        border-bottom: 2px solid #eee !important;
    }

    .table tbody td {
        padding: 12px !important;
        border-top: 1px solid #eee !important;
        font-size: 14px;
    }

    .label {
        border-radius: 4px;
        font-size: 11px;
        padding: 4px 8px;
    }

    .btn-sm {
        font-size: 15px;
        border-radius: 4px;
    }

    .btn-info {
        color: #fff !important;
        background-color: #A68B77 !important;
        border-color: #8E735B !important;
        font-weight: 600 !important;
        text-shadow: none !important;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1) !important;
    }

    .btn-info:hover, 
    .btn-info:focus, 
    .btn-info:active, 
    .btn-info.active,
    .btn-info:active:hover,
    .btn-info:active:focus {
        color: #fff !important;
        background-color: #8E735B !important;
        border-color: #7A624E !important;
        outline: none !important;
    }

    .btn-info i {
        color: #fff !important;
    }

    .font-cuy {
        margin:0; 
        font-weight: 600;
    }
</style>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4 class="font-cuy">Data Transaksi</h4>
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-md-12">
                    <a href="penjualan_tambah.php" class="btn btn-info pull-left">
                        <i class="fa fa-plus"></i>  Transaksi Baru
                    </a>
                </div>
            </div>
            <br/>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="1%" class="text-center">No</th>
                            <th>Invoice</th>
                            <th class="text-center">Tanggal Transaksi</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th width="5%" class="text-center">Jumlah</th>
                            <th>Total Bayar</th>
                            <th>Kasir</th>
                            <th class="text-center">Status</th>
                            <th>Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include '../koneksi.php';
                        
                        $data = mysqli_query($koneksi, "
                            SELECT 
                                penjualan.id_jual, 
                                penjualan.tgl_jual, 
                                penjualan.status,
                                penjualan.jumlah, 
                                user.user_nama,
                                barang.nama_barang,
                                barang.harga_jual,
                                (barang.harga_jual * penjualan.jumlah) as total_akhir
                            FROM penjualan
                            INNER JOIN user ON penjualan.user_id = user.user_id
                            INNER JOIN barang ON penjualan.id_barang = barang.id_barang
                            WHERE penjualan.status = 'Selesai' OR penjualan.status = 'Gagal'
                            ORDER BY penjualan.id_jual ASC
                        ");

                        $no = 1;
                        while($d = mysqli_fetch_array($data)){
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td><strong>INV-<?php echo $d['id_jual']; ?></strong></td>
                                <td class="text-center"><?php echo date('d-m-Y', strtotime($d['tgl_jual'])); ?></td>
                                <td><?php echo $d['nama_barang']; ?></td>
                                <td><?php echo "Rp ".number_format($d['harga_jual']); ?></td>
                                <td class="text-center"><?php echo $d['jumlah']; ?></td>
                                <td><strong><?php echo "Rp ".number_format($d['total_akhir']); ?></strong></td>
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

                                <td class="text-center">
                                    <a href="penjualan_invoice.php?id=<?php echo $d['id_jual']; ?>" target="_blank" class="btn btn-xs btn-warning"><i class="fa fa-print"></i>  Invc</a>
                                    <a href="penjualan_edit.php?id=<?php echo $d['id_jual']; ?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i>  Edit</a>
                                    <a href="penjualan_hapus.php?id=<?php echo $d['id_jual']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>  Batal</a>
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