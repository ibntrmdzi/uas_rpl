<?php 
include "../auth.php"; 
include "../koneksi.php";

/* auto active */
$halaman = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
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
    <div class="brand">📚 Perpustakaan</div>

    <div class="menu">
        <a href="../index.php">🏠 Dashboard</a>
        <a href="../buku/tampil.php">📘 Data Buku</a>
        <a href="../anggota/tampil.php">👤 Data Anggota</a>
        <a href="pinjam.php">🔄 Peminjaman</a>
        <a href="laporan.php" class="active">📄 Laporan</a>
        <a href="../logout.php" class="logout">🚪 Logout</a>
    </div>
</div>

<!-- CONTENT -->
<div class="col-md-10 p-4 content">

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>📄 Laporan Peminjaman</h3>
    <a href="cetak.php" target="_blank" class="btn btn-danger">
        🖨 Cetak Laporan
    </a>
</div>

<div class="card shadow-lg">
<div class="card-header bg-dark text-white">
    Data Peminjaman Buku
</div>

<div class="card-body">

<table class="table table-bordered table-hover align-middle">
<thead class="table-secondary">
<tr>
    <th>ID</th>
    <th>Anggota</th>
    <th>Buku</th>
    <th>Tgl Pinjam</th>
    <th>Tgl Kembali</th>
    <th>Denda</th>
    <th>Status</th>
</tr>
</thead>
<tbody>

<?php
$q = mysqli_query($conn,"
    SELECT 
        p.id_pinjam,
        p.tgl_pinjam,
        p.tgl_kembali,
        p.denda,
        a.nama AS anggota,
        b.judul AS buku
    FROM peminjaman p
    LEFT JOIN anggota a ON p.id_anggota = a.id_anggota
    LEFT JOIN buku b ON p.id_buku = b.id_buku
    ORDER BY p.id_pinjam DESC
");

while($r = mysqli_fetch_assoc($q)){
    $status = ($r['tgl_kembali'] == NULL)
        ? "<span class='badge bg-warning'>Dipinjam</span>"
        : "<span class='badge bg-success'>Selesai</span>";
?>
<tr>
    <td><?= $r['id_pinjam'] ?></td>
    <td><?= $r['anggota'] ?? '-' ?></td>
    <td><?= $r['buku'] ?? '-' ?></td>
    <td><?= $r['tgl_pinjam'] ?></td>
    <td><?= $r['tgl_kembali'] ?? '-' ?></td>
    <td>Rp <?= number_format($r['denda']) ?></td>
    <td><?= $status ?></td>
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
