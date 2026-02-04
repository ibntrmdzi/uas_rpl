<?php 
include "../auth.php"; 
include "../koneksi.php"; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pengembalian Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
<div class="card shadow col-md-6">
<div class="card-header bg-success text-white">
    ↩ Pengembalian Buku
</div>
<div class="card-body">

<form method="post">
    <div class="mb-3">
        <label>ID Peminjaman</label>
        <input class="form-control" name="id_pinjam" required>
    </div>

    <button class="btn btn-success">↩ Kembalikan</button>
    <a href="../index.php" class="btn btn-secondary">⬅ Kembali</a>
</form>

<?php
if($_POST){
    $id = $_POST['id_pinjam'];

    $q = mysqli_query($conn,"SELECT * FROM peminjaman WHERE id_pinjam='$id'");
    if(mysqli_num_rows($q)==0){
        echo "<div class='alert alert-danger mt-3'>Data tidak ditemukan</div>";
    } else {
        $p = mysqli_fetch_assoc($q);

        if($p['tgl_kembali'] != NULL){
            echo "<div class='alert alert-warning mt-3'>Buku sudah dikembalikan</div>";
        } else {
            $hari = (strtotime(date("Y-m-d")) - strtotime($p['tgl_pinjam'])) / 86400;
            $denda = ($hari > 7) ? ($hari - 7) * 1000 : 0;

            mysqli_query($conn,"
                UPDATE peminjaman 
                SET tgl_kembali=CURDATE(), denda='$denda'
                WHERE id_pinjam='$id'
            ");

            mysqli_query($conn,"
                UPDATE buku SET stok=stok+1 WHERE id_buku='{$p['id_buku']}'
            ");

            echo "<div class='alert alert-success mt-3'>
                Buku berhasil dikembalikan <br>
                <strong>Denda: Rp ".number_format($denda)."</strong>
            </div>";
        }
    }
}
?>

</div>
</div>
</div>

</body>
</html>
