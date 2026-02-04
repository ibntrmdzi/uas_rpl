<?php 
include "../auth.php"; 
include "../koneksi.php"; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Anggota</title>
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
        <a href="tampil.php" class="active">👤 Data Anggota</a>
        <a href="../transaksi/pinjam.php">🔄 Peminjaman</a>
        <a href="../transaksi/laporan.php">📄 Laporan</a>
        <a href="../logout.php" class="logout">🚪 Logout</a>
    </div>
</div>

<!-- CONTENT -->
<div class="col-md-10 p-4 content">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>👤 Data Anggota</h3>
        <a href="tambah.php" class="btn btn-success">
            ➕ Tambah Anggota
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="120">ID</th>
                        <th>Nama</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $q = mysqli_query($conn,"SELECT * FROM anggota ORDER BY id_anggota");
                while($a = mysqli_fetch_assoc($q)){
                ?>
                    <tr>
                        <td><?= $a['id_anggota'] ?></td>
                        <td><?= $a['nama'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $a['id_anggota'] ?>" class="btn btn-sm btn-warning">✏ Edit</a>
                            <a href="hapus.php?id=<?= $a['id_anggota'] ?>" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Hapus anggota ini?')">🗑 Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
</div>
</div>

</body>
</html>
