<?php 
include "../koneksi.php"; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Peminjaman</title>
    <style>
        body { font-family: Arial; }
        h2 { text-align: center; }
        table { width:100%; border-collapse: collapse; margin-top:20px; }
        th, td {
            border:1px solid #000;
            padding:8px;
            font-size:12px;
            text-align:center;
        }
        th { background:#eee; }
    </style>
</head>
<body onload="window.print()">

<h2>LAPORAN PEMINJAMAN BUKU</h2>
<p style="text-align:center;">Sistem Informasi Perpustakaan</p>

<table>
<tr>
    <th>No</th>
    <th>Anggota</th>
    <th>Buku</th>
    <th>Tgl Pinjam</th>
    <th>Tgl Kembali</th>
    <th>Denda</th>
</tr>

<?php
$no = 1;
$q = mysqli_query($conn,"
    SELECT 
        p.tgl_pinjam,
        p.tgl_kembali,
        p.denda,
        a.nama,
        b.judul
    FROM peminjaman p
    LEFT JOIN anggota a ON p.id_anggota = a.id_anggota
    LEFT JOIN buku b ON p.id_buku = b.id_buku
    ORDER BY p.id_pinjam DESC
");

while($r = mysqli_fetch_assoc($q)){
?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $r['nama'] ?? '-' ?></td>
    <td><?= $r['judul'] ?? '-' ?></td>
    <td><?= $r['tgl_pinjam'] ?></td>
    <td><?= $r['tgl_kembali'] ?? '-' ?></td>
    <td>Rp <?= number_format($r['denda']) ?></td>
</tr>
<?php } ?>

</table>

<p style="margin-top:30px;text-align:right;">
    Dicetak pada <?= date("d-m-Y") ?>
</p>

</body>
</html>
