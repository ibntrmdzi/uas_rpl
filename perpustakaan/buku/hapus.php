<?php
include "../auth.php"; 
include "../koneksi.php";

$id = $_GET['id'];

// (opsional) cegah hapus jika sedang dipinjam
$cek = mysqli_query($conn,"
    SELECT * FROM peminjaman 
    WHERE id_buku='$id' AND tgl_kembali IS NULL
");

if(mysqli_num_rows($cek) > 0){
    echo "<script>
        alert('Buku sedang dipinjam, tidak bisa dihapus');
        location='tampil.php';
    </script>";
    exit;
}

mysqli_query($conn,"DELETE FROM buku WHERE id_buku='$id'");

echo "<script>
    alert('Buku berhasil dihapus');
    location='tampil.php';
</script>";
?>
