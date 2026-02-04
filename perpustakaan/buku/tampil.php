<?php 
include "../auth.php"; 
include "../koneksi.php"; 

// auto active menu
$halaman = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
</head>
<body>

<div class="container-fluid">
<div class="row">

<!-- SIDEBAR -->
<div class="col-md-2 sidebar d-none d-md-block">
    <div class="brand">
        📚 Perpustakaan
    </div>

    <div class="menu">
        <a href="../index.php">🏠 Dashboard</a>
        <a href="tampil.php" class="active">📘 Data Buku</a>
        <a href="../anggota/tampil.php">👤 Data Anggota</a>
        <a href="../transaksi/pinjam.php">🔄 Peminjaman</a>
        <a href="../transaksi/laporan.php">📄 Laporan</a>
        <a href="../logout.php" class="logout">🚪 Logout</a>
    </div>
</div>

<!-- CONTENT -->
<div class="col-md-10 p-4 content">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>📘 Data Buku</h3>
        <a href="tambah.php" class="btn btn-primary">
            ➕ Tambah Buku
        </a>
    </div>

    <!-- TABLE CARD -->
    <div class="card shadow">
        <div class="card-body">

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="80">ID</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th width="100">Stok</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                $q = mysqli_query($conn,"SELECT * FROM buku ORDER BY id_buku ASC");
                while($b = mysqli_fetch_assoc($q)){
                ?>

                    <tr>
                        <td><?= $b['id_buku'] ?></td>
                        <td><?= $b['judul'] ?></td>
                        <td><?= $b['penulis'] ?></td>
                        <td>
                            <?php if($b['stok'] > 0){ ?>
                                <span class="badge bg-success">
                                    <?= $b['stok'] ?>
                                </span>
                            <?php } else { ?>
                                <span class="badge bg-danger">
                                    Habis
                                </span>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="edit.php?id=<?= $b['id_buku'] ?>" 
                               class="btn btn-sm btn-warning">
                                ✏ Edit
                            </a>

                            <a href="hapus.php?id=<?= $b['id_buku'] ?>" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                🗑 Hapus
                            </a>
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
