<?php include 'header.php'; ?>

<link rel="stylesheet" href="../assets/css/produk.css">

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4 class="font-cuy">Manajemen Data Produk</h4>
        </div>
        <div class="panel-body">
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

<br><br><br>

<?php include 'footer.php'; ?>