<?php include 'header.php'; ?>

<link rel="stylesheet" href="../assets/css/penjualan-style.css">

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