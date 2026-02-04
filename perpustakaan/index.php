<?php 
include "auth.php"; 
include "koneksi.php";

/* ===== AUTO ACTIVE MENU ===== */
$halaman = basename($_SERVER['PHP_SELF']);

/* ===== STATISTIK ===== */
$jmlBuku = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS total FROM buku")
)['total'];

$jmlAnggota = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS total FROM anggota")
)['total'];

$jmlPinjam = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS total FROM peminjaman WHERE tgl_kembali IS NULL")
)['total'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Perpustakaan</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>

<!-- NAVBAR MOBILE -->
<nav class="navbar navbar-dark bg-dark d-md-none">
    <div class="container-fluid">
        <button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
            ☰
        </button>
        <span class="navbar-brand">Perpustakaan</span>
    </div>
</nav>

<div class="container-fluid">
<div class="row">

<!-- SIDEBAR -->
<div class="col-md-2 sidebar offcanvas-md offcanvas-start" id="sidebar">
    <div class="brand">
        📚 Perpustakaan
    </div>

    <div class="menu">
        <a href="index.php" class="<?= ($halaman=='index.php')?'active':'' ?>">
            🏠 Dashboard
        </a>
        <a href="buku/tampil.php" class="<?= ($halaman=='tampil.php' && strpos($_SERVER['REQUEST_URI'],'buku'))?'active':'' ?>">
            📘 Data Buku
        </a>
        <a href="anggota/tampil.php" class="<?= ($halaman=='tampil.php' && strpos($_SERVER['REQUEST_URI'],'anggota'))?'active':'' ?>">
            👤 Data Anggota
        </a>
        <a href="transaksi/pinjam.php" class="<?= ($halaman=='pinjam.php')?'active':'' ?>">
            🔄 Peminjaman
        </a>
        <a href="transaksi/laporan.php"
            class="<?= ($halaman=='laporan.php')?'active':'' ?>">
                📄 Laporan
        </a>
        <a href="logout.php" class="logout">
            🚪 Logout
        </a>
    </div>
</div>

<!-- CONTENT -->
<div class="col-md-10 p-4 content">
    <h2>Dashboard</h2>
    <p class="text-muted">Selamat datang di Sistem Informasi Perpustakaan</p>

    <div class="row mt-4">

        <!-- TOTAL BUKU -->
        <div class="col-md-4 mb-3">
            <div class="card shadow border-primary">
                <div class="card-body">
                    <h6 class="text-primary">📘 Total Buku</h6>
                    <h2><?= $jmlBuku ?></h2>
                </div>
            </div>
        </div>

        <!-- TOTAL ANGGOTA -->
        <div class="col-md-4 mb-3">
            <div class="card shadow border-success">
                <div class="card-body">
                    <h6 class="text-success">👤 Total Anggota</h6>
                    <h2><?= $jmlAnggota ?></h2>
                </div>
            </div>
        </div>

        <!-- SEDANG DIPINJAM -->
        <div class="col-md-4 mb-3">
        <a href="transaksi/laporan.php" style="text-decoration:none;">
            <div class="card shadow border-warning">
                <div class="card-body">
                    <h6 class="text-warning">🔄 Sedang Dipinjam</h6>
                    <h2><?= $jmlPinjam ?></h2>
                    <small class="text-muted">Klik untuk lihat laporan</small>
                </div>
            </div>
        </a>
        </div>
    </div>
</div>

</div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
