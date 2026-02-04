<?php 
include "../auth.php"; 
include "../koneksi.php"; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/custom.css">
</head>
<body>

<div class="container-fluid">
<div class="row">

<!-- SIDEBAR -->
<div class="col-md-2 sidebar d-none d-md-block">
    <div class="brand">📚 Perpustakaan</div>
    <div class="menu">
        <a href="../index.php">🏠 Dashboard</a>
        <a href="../buku/tampil.php">📘 Data Buku</a>
        <a href="../anggota/tampil.php">👤 Data Anggota</a>
        <a href="pinjam.php" class="active">🔄 Peminjaman</a>
        <a href="../transaksi/laporan.php">📄 Laporan</a>
        <a href="../logout.php" class="logout">🚪 Logout</a>
    </div>
</div>

<!-- CONTENT -->
<div class="col-md-10 p-4 content">

    <h3 class="mb-3">🔄 Transaksi Peminjaman</h3>

    <div class="card shadow col-md-6">
        <div class="card-body">

            <form method="post">
                <div class="mb-3">
                    <label>ID Anggota</label>
                    <input class="form-control" name="id_anggota" required>
                </div>

                <div class="mb-3">
                    <label>ID Buku</label>
                    <input class="form-control" name="id_buku" required>
                </div>

                <button class="btn btn-warning">📌 Pinjam Buku</button>
                <a href="../index.php" class="btn btn-secondary">⬅ Kembali</a>
            </form>

            <?php
            if($_POST){
                $cek = mysqli_fetch_assoc(
                    mysqli_query($conn,"SELECT stok FROM buku WHERE id_buku='$_POST[id_buku]'")
                );

                if(!$cek || $cek['stok'] <= 0){
                    echo "<div class='alert alert-danger mt-3'>Stok buku habis</div>";
                } else {
                    mysqli_query($conn,"
                        INSERT INTO peminjaman(id_anggota,id_buku,tgl_pinjam)
                        VALUES('$_POST[id_anggota]','$_POST[id_buku]',CURDATE())
                    ");
                    mysqli_query($conn,"
                        UPDATE buku SET stok=stok-1 WHERE id_buku='$_POST[id_buku]'
                    ");
                    echo "<div class='alert alert-success mt-3'>Buku berhasil dipinjam</div>";
                }
            }
            ?>

        </div>
    </div>

</div>
</div>
</div>

</body>
</html>
