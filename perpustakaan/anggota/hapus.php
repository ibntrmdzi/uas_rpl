<?php
include "../auth.php"; 
include "../koneksi.php";

$id = $_GET['id'];

// Cegah hapus jika anggota masih meminjam buku
$cek = mysqli_query($conn,"
    SELECT * FROM peminjaman 
    WHERE id_anggota='$id' AND tgl_kembali IS NULL
");

if(mysqli_num_rows($cek) > 0){
    echo "<script>
        alert('Anggota masih memiliki buku yang dipinjam');
        location='tampil.php';
    </script>";
    exit;
}

mysqli_query($conn,"DELETE FROM anggota WHERE id_anggota='$id'");

echo "<script>
    alert('Anggota berhasil dihapus');
    location='tampil.php';
</script>";
?>
