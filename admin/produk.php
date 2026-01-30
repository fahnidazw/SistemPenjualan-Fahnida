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
        vertical-align: middle !important;
    }

    .btn-info {
        color: #fff !important;
        background-color: #A68B77 !important; /* Cokelat susu Lumora */
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
        background-color: #8E735B !important; /* Cokelat lebih gelap */
        border-color: #7A624E !important;
        outline: none !important;
    }

    .btn-info i {
        color: #fff !important;
    }

    .stok-habis {
        color: #d9534f;
        font-weight: bold;
    }

    .font-cuy {
        margin:0; 
        font-weight: 600;
    }
</style>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4 class="font-cuy">Manajemen Data Produk</h4>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="produk_tambah.php" class="btn btn-info pull-left">
                        <i class="fa fa-plus"></i>  Transaksi Baru
                    </a>
                </div>
            </div>

            <br>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="1%" class="text-center">No</th>
                            <th>ID Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th class="text-center">Stok</th>
                            <th width="15%" class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../koneksi.php';
                            $data = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id_barang ASC");
                            $no = 1;
                            while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td><strong>IDPRD-<?php echo $d['id_barang']; ?></strong></td>
                                <td><?php echo $d['nama_barang']; ?></td>
                                <td><?php echo "Rp. " . number_format($d['harga_beli']); ?></td>
                                <td style="color: #3B2A20; font-weight: bold;"><?php echo "Rp. " . number_format($d['harga_jual']); ?></td>
                                <td class="text-center <?php echo ($d['stok'] <= 5) ? 'stok-habis' : ''; ?>">
                                    <?php echo $d['stok']; ?>
                                </td>
                                <td class="text-center">
                                    <a href="produk_edit.php?id_barang=<?php echo $d['id_barang']; ?>" class="btn btn-xs btn-info">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a onclick="return confirm('Hapus produk ini?')" 
                                       href="produk_hapus.php?id_barang=<?php echo $d['id_barang']; ?>" 
                                       class="btn btn-xs btn-danger">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
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