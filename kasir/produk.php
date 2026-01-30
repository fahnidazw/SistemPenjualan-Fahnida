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

    .btn-sm {
        font-size: 15px;
        border-radius: 4px;
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
            <h4 class="font-cuy">Data Produk</h4>
        </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="1%" class="text-center">No</th>
                            <th>ID Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga Jual</th>
                            <th class="text-center">Stok</th>
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
                                <td style="color: #3B2A20; font-weight: bold;"><?php echo "Rp. " . number_format($d['harga_jual']); ?></td>
                                <td class="text-center <?php echo ($d['stok'] <= 5) ? 'stok-habis' : ''; ?>">
                                    <?php echo $d['stok']; ?>
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