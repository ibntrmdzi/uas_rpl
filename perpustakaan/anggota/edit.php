<?php 
include "../auth.php"; 
include "../koneksi.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM anggota WHERE id_anggota='$id'")
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
<div class="card shadow">
<div class="card-header bg-warning">
    ✏ Edit Anggota
</div>
<div class="card-body">

<form method="post">
    <div class="mb-3">
        <label>ID Anggota</label>
        <input class="form-control" value="<?= $data['id_anggota'] ?>" readonly>
    </div>

    <div class="mb-3">
        <label>Nama Anggota</label>
        <input class="form-control" name="nama" value="<?= $data['nama'] ?>" required>
    </div>

    <button class="btn btn-warning">💾 Update</button>
    <a href="tampil.php" class="btn btn-secondary">⬅ Kembali</a>
</form>

<?php
if($_POST){
    mysqli_query($conn,"
        UPDATE anggota SET 
        nama='$_POST[nama]'
        WHERE id_anggota='$id'
    ");
    echo "<script>alert('Data anggota berhasil diupdate');location='tampil.php';</script>";
}
?>

</div>
</div>
</div>

</body>
</html>
