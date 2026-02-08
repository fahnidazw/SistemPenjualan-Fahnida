<?php include 'header.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<style>
body{
    background-color:#f6efe9;
    font-family:'Inter',sans-serif;
    color:#4a4a4a;
}

.main-card{
    background:#ffffff;
    border:none;
    border-radius:18px;
    box-shadow:0 12px 32px rgba(0,0,0,0.06);
    margin-top:50px;
    overflow:hidden;
}

.card-header{
    background:#f6b7c5;
    padding:22px;
    color:#ffffff;
    text-align:center;
}

.card-header h4{
    margin:0;
    font-weight:600;
    letter-spacing:0.5px;
}

.card-body{
    padding:32px;
}

.form-label{
    font-weight:600;
    color:#8a4f4f;
    margin-bottom:8px;
    font-size:12px;
    text-transform:uppercase;
    letter-spacing:0.6px;
}

.form-control{
    height:48px;
    padding:12px 16px;
    font-size:14px;
    border-radius:14px;
    border:1px solid #ead6cf;
    transition:0.25s;
    line-height:1.4;
}

.form-control:focus{
    border-color:#f6b7c5;
    box-shadow:0 0 0 3px rgba(246,183,197,0.25);
    outline:none;
}

.btn-save{
    background:#f6b7c5;
    color:#ffffff;
    border:none;
    padding:14px;
    border-radius:14px;
    font-weight:600;
    width:100%;
    margin-top:14px;
    box-shadow:0 6px 18px rgba(246,183,197,0.35);
    transition:0.3s;
}

.btn-save:hover{
    background:#f2a9b8;
    transform:translateY(-2px);
    color:#ffffff;
}

.btn-default{
    border-radius:14px;
    background:#ffffff;
    border:1px solid #ead6cf;
    color:#8a4f4f;
}

.btn-default:hover{
    background:#fdf4f2;
    color:#8a4f4f;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="main-card">
                <div class="card-header">
                    <h4><i class="fa fa-plus-circle"></i> TAMBAH PRODUK</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="produk_aksi.php">
                        <div class="form-group">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama" placeholder="Contoh: Kopi Susu Gula Aren" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Harga Beli</label>
                                    <input type="number" class="form-control" name="beli" placeholder="0" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Harga Jual</label>
                                    <input type="number" class="form-control" name="jual" placeholder="0" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Stok Awal</label>
                            <input type="number" class="form-control" name="stok" placeholder="Masukkan jumlah stok.." required>
                        </div>

                        <button type="submit" class="btn btn-save">
                            <i class="fa fa-save"></i> SIMPAN PRODUK
                        </button>

                        <a href="produk.php" class="btn btn-block btn-default" style="margin-top:10px;">
                            Batal
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br>

<?php include 'footer.php'; ?>