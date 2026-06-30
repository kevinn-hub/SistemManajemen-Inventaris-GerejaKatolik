<?php
include "config/koneksi.php";

$laporan = mysqli_query($koneksi, "SELECT tbl_laporan.*, tbl_kegiatan.nama_kegiatan
FROM tbl_laporan
JOIN tbl_kegiatan
ON tbl_laporan.id_kegiatan = tbl_kegiatan.id_kegiatan
ORDER BY tbl_laporan.id_laporan DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Cetak Laporan</title>
<HR>

<style>
body{
    font-family: Arial, sans-serif;
    margin:20px;
}

.kop{
    text-align:center;
    border-bottom:2px solid #000;
    margin-bottom:15px;
    padding-bottom:10px;
}

.kop img{
    width:130px;
    height:130px;
    border-radius:50%;
    object-fit:cover;
    border:2px solid #000;
    margin:8px 0;
}

.kop h2{
    margin:0;
    font-size:24px;
}

.kop h3{
    margin:5px 0 0;
    font-size:18px;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-bottom:20px;
}

th, td{
    border:1px solid #000;
    padding:6px;
    font-size:12px;
    vertical-align:top;
}

th{
    background:#f2f2f2;
}

.print-btn{
    margin-bottom:10px;
}

@media print{
    .print-btn{
        display:none;
    }
}
</style>
</head>

<body>

<div class="print-btn">
    <button onclick="window.print()">Cetak</button>
</div>

<div>

<img src="dist/img/Logo-Gereja.jpg">
<link rel="stylesheet" href="../dist/css/custom.css">
<div class="kop">
    <h2>GEREJA SANTA BERNADETH</h2>
<table>
<tr>
    <th>No</th>
    <th>ID</th>
    <th>Kegiatan</th>
    <th>Tanggal</th>
    <th>Keterangan</th>
    <th>Detail</th>
</tr>

<?php
$no = 1;

while($row = mysqli_fetch_assoc($laporan)){

    $detail = mysqli_query($koneksi,"SELECT tbl_detail_laporan.*,
    tbl_pengurus.nama_pengurus,
    tbl_panitia.nama_panitia
    FROM tbl_detail_laporan
    LEFT JOIN tbl_pengurus
    ON tbl_detail_laporan.id_pengurus = tbl_pengurus.id_pengurus
    LEFT JOIN tbl_panitia
    ON tbl_detail_laporan.id_panitia = tbl_panitia.id_panitia
    WHERE tbl_detail_laporan.id_laporan = '".$row['id_laporan']."'
    ");

    $isiDetail = "";

    while($d = mysqli_fetch_assoc($detail)){
        $isiDetail .= "
        <b>Pengurus:</b> {$d['nama_pengurus']}<br>
        <b>Panitia:</b> {$d['nama_panitia']}<br>
        <b>Uraian:</b> {$d['uraian']}<br>
        <b>Kendala:</b> {$d['kendala']}<br>
        <b>Hasil:</b> {$d['hasil']}<br>
        ";
    }
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['id_laporan']; ?></td>
    <td><?= $row['nama_kegiatan']; ?></td>
    <td><?= $row['tanggal_laporan']; ?></td>
    <td><?= $row['keterangan']; ?></td>
    <td><?= $isiDetail; ?></td>
</tr>

<?php } ?>

</table>

<script>
window.onload = function(){
    window.print();
}
</script>

</body>
</html>