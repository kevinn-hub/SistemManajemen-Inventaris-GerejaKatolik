<?php
include '../config/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Kegiatan</title>
    <style>
        body{
            font-family: Arial, sans-serif;
        }
        h2{
            text-align:center;
        }
        table{
            width:100%;
            border-collapse: collapse;
        }
        table, th, td{
            border:1px solid black;
        }
        th, td{
            padding:8px;
            text-align:center;
        }
    </style>
</head>
<body onload="window.print()">

<h2>LAPORAN KEGIATAN</h2>

<table>
    <tr>
        <th>No</th>
        <th>ID Laporan</th>
        <th>Nama Kegiatan</th>
        <th>Tanggal Laporan</th>
        <th>Keterangan</th>
    </tr>

    <?php
    $no = 1;
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_laporan ORDER BY id_laporan ASC");

    while($data = mysqli_fetch_array($query)){
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $data['id_laporan']; ?></td>
        <td><?= $data['nama_kegiatan']; ?></td>
        <td><?= $data['tanggal_laporan']; ?></td>
        <td><?= $data['keterangan']; ?></td>
    </tr>
    <?php } ?>
</table>

<br><br>

<table style="width:100%; border:none;">
    <tr>
        <td style="border:none; text-align:right;">
            Pangkalpinang, <?= date('d-m-Y'); ?>
            <br><br><br><br>
            ____________________
        </td>
    </tr>
</table>

</body>
</html>