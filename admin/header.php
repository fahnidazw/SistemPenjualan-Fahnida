<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Rental Kendaraan</title>

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background: #F6F3EF;
        }

        .navbar {
            background: transparent !important;
            border: none !important;
        }

        .navbar.navbar-custom {
            background: linear-gradient(
                135deg,
                #FFB6C1,
                #FFD6A5,
                #CDB4DB
            ) !important;
            border: none;
            border-radius: 0;
            padding: 16px 0;
            box-shadow: 0 12px 30px rgba(0,0,0,0.18);
        }

        .navbar-custom .navbar-brand {
            color: #FFFFFF !important;
            font-weight: 800;
            letter-spacing: 1.6px;
            font-size: 20px;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 8px;
            text-shadow: 0 3px 8px rgba(0,0,0,0.3);
        }

        .navbar-custom .navbar-brand i {
            color: #FFF2DC;
        }

        .navbar-custom .nav > li > a {
            color: #FFFFFF !important;
            font-size: 14px;
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 600;
            transition: 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
            text-shadow: 0 2px 6px rgba(0,0,0,0.25);
        }

        .navbar-custom .nav > li > a:hover {
            background: rgba(255,255,255,0.3) !important;
            transform: translateY(-2px);
        }

        .navbar-custom .nav > li.active > a {
            background: rgba(255,255,255,0.4) !important;
            font-weight: 700;
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.25);
        }

        .navbar-custom .navbar-text {
            color: #FFFFFF;
            margin-top: 13px;
            font-weight: 600;
            text-shadow: 0 2px 6px rgba(0,0,0,0.25);
        }
    </style>
</head>

<body>

<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-custom">
    <div class="container-fluid">

        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">
                Insights | <i class="fas fa-moon"></i> The Lumora Co
            </a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="<?= ($current_page == 'index.php') ? 'active' : '' ?>">
                    <a href="index.php"><i class="fa fa-th-large"></i> Dashboard</a>
                </li>

                <li class="<?= ($current_page == 'user.php') ? 'active' : '' ?>">
                    <a href="user.php"><i class="fa fa-users"></i> User</a>
                </li>

                <li class="<?= ($current_page == 'produk.php') ? 'active' : '' ?>">
                    <a href="produk.php"><i class="fa fa-flask"></i> Product</a>
                </li>

                <li class="<?= ($current_page == 'penjualan.php') ? 'active' : '' ?>">
                    <a href="penjualan.php"><i class="fa fa-cart-shopping"></i> Transaction</a>
                </li>

                <li class="<?= ($current_page == 'laporan.php') ? 'active' : '' ?>">
                    <a href="laporan.php"><i class="fa fa-pie-chart"></i> Laporan</a>
                </li>

                <li class="dropdown">   
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class= "glyphicon glyphicon-wrench"></i>      Pengaturan    <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="ganti_password.php"><i class="glyphicon glyphicon-lock"></i>  Ganti Password</a>
                        </ul>
                    </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="logout.php"><i class="fa fa-right-from-bracket"></i> Logout</a>
                </li>
                <li>
                    <p class="navbar-text" style="margin-right:15px;">
                        Hi, <b><?= $_SESSION['username']; ?></b>!
                    </p>
                </li>
            </ul>
        </div>

    </div>
</nav>

</body>
</html>
