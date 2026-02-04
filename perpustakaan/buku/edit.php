<?php 
include "../auth.php"; 
include "../koneksi.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM buku WHERE id_buku='$id'")
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
<div class="card shadow">
<div class="card-header bg-warning">
    ✏ Edit Buku
</div>
<div class="card-body">

<form method="post">
    <div class="mb-3">
        <label>ID Buku</label>
        <input class="form-control" value="<?= $data['id_buku'] ?>" readonly>
    </div>

    <div class="mb-3">
        <label>Judul</label>
        <input class="form-control" name="judul" value="<?= $data['judul'] ?>" required>
    </div>

    <div class="mb-3">
        <label>Penulis</label>
        <input class="form-control" name="penulis" value="<?= $data['penulis'] ?>">
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" class="form-control" name="stok" value="<?= $data['stok'] ?>" required>
    </div>

    <button class="btn btn-warning">💾 Update</button>
    <a href="tampil.php" class="btn btn-secondary">⬅ Kembali</a>
</form>

<?php
if($_POST){
    mysqli_query($conn,"
        UPDATE buku SET
        judul='$_POST[judul]',
        penulis='$_POST[penulis]',
        stok='$_POST[stok]'
        WHERE id_buku='$id'
    ");
    echo "<script>alert('Data buku berhasil diupdate');location='tampil.php';</script>";
}
?>

</div>
</div>
</div>

</body>
</html>
