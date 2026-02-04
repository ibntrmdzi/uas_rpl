<?php
$halaman = basename($_SERVER['PHP_SELF']);
$path = dirname($_SERVER['PHP_SELF']);
?>

<div class="sidebar" id="sidebar">
    <div class="brand">
        📚 Perpustakaan
    </div>

    <div class="menu">
        <a href="<?= $path=='/' ? 'index.php' : '../index.php' ?>"
           class="<?= ($halaman=='index.php')?'active':'' ?>">
            🏠 Dashboard
        </a>

        <a href="<?= $path=='/buku' ? 'tampil.php' : '../buku/tampil.php' ?>"
           class="<?= (strpos($path,'buku')!==false)?'active':'' ?>">
            📘 Data Buku
        </a>

        <a href="<?= $path=='/anggota' ? 'tampil.php' : '../anggota/tampil.php' ?>"
           class="<?= (strpos($path,'anggota')!==false)?'active':'' ?>">
            👤 Data Anggota
        </a>

        <a href="<?= $path=='/transaksi' ? 'pinjam.php' : '../transaksi/pinjam.php' ?>"
           class="<?= (strpos($path,'transaksi')!==false)?'active':'' ?>">
            🔄 Peminjaman
        </a>

        <a href="<?= $path=='/' ? 'logout.php' : '../logout.php' ?>" class="logout">
            🚪 Logout
        </a>
    </div>
</div>
