<?php include "../auth.php"; include "../koneksi.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
<div class="card shadow">
<div class="card-header bg-success text-white">
    ➕ Tambah Anggota
</div>
<div class="card-body">

<form method="post">
    <div class="mb-3">
        <label>ID Anggota</label>
        <input class="form-control" name="id" required>
    </div>
    <div class="mb-3">
        <label>Nama Anggota</label>
        <input class="form-control" name="nama" required>
    </div>

    <button class="btn btn-success">💾 Simpan</button>
    <a href="tampil.php" class="btn btn-secondary">⬅ Kembali</a>
</form>

<?php
if($_POST){
    mysqli_query($conn,"
        INSERT INTO anggota VALUES('$_POST[id]','$_POST[nama]')
    ");
    echo "<script>alert('Anggota berhasil ditambahkan');location='tampil.php';</script>";
}
?>

</div>
</div>
</div>

</body>
</html>
