<?php include "../auth.php"; include "../koneksi.php"; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
<div class="card shadow">
<div class="card-header bg-primary text-white">
    <h5>➕ Tambah Buku</h5>
</div>

<div class="card-body">
<form method="post">
    <div class="mb-3">
        <label>ID Buku</label>
        <input class="form-control" name="id" required>
    </div>

    <div class="mb-3">
        <label>Judul Buku</label>
        <input class="form-control" name="judul" required>
    </div>

    <div class="mb-3">
        <label>Penulis</label>
        <input class="form-control" name="penulis">
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" class="form-control" name="stok" required>
    </div>

    <button class="btn btn-primary">💾 Simpan</button>
    <a href="tampil.php" class="btn btn-secondary">⬅ Kembali</a>
</form>
</div>
</div>
</div>
