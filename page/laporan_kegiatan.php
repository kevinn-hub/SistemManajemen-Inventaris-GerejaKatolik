<?php
if(isset($_GET['hapus'])){

    $id_laporan = $_GET['hapus'];

    mysqli_query($koneksi,"DELETE FROM tbl_detail_laporan
    WHERE id_laporan='$id_laporan'
    ");

    $hapus = mysqli_query($koneksi,"DELETE FROM tbl_laporan
    WHERE id_laporan='$id_laporan'
    ");

    if($hapus){
        echo "<div class='alert alert-success alert-dismissible fade show'>
        <strong>Berhasil!</strong> Data laporan berhasil dihapus.
        </div>";
    }else{
        echo "<div class='alert alert-danger alert-dismissible fade show'>
        Gagal menghapus data.
        </div>";
    }
}
?>

<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0 text-dark">Data Laporan Kegiatan</h1>
</div>
</div>
</div>
</div>

<div class="content">
<div class="container-fluid">

<div class="card">

<div class="card-body">

<?php if($_SESSION['Role']=="admin" || $_SESSION['Role']=="pengurus"){ ?>

<a href="index.php?page=tambah_laporan" class="btn btn-primary btn-sm">
Tambah Laporan
</a>

<a href="index.php?page=cetak_laporan_kegiatan" class="btn btn-success btn-sm">
    Cetak Semua Laporan
</a>
<?php } ?>

<table class="table table-bordered table-hover mt-3">

<thead>

<tr>
<th>No</th>
<th>ID Laporan</th>
<th>Nama Kegiatan</th>
<th>Tanggal</th>
<th>Keterangan</th>
<th>Detail Laporan</th>

<?php
if($_SESSION['Role']=="admin" || $_SESSION['Role']=="pengurus"){
?>
<th>Aksi</th>
<?php } ?>

</tr>

</thead>

<tbody>

<?php

$no=1;

$query=mysqli_query($koneksi,"SELECT tbl_laporan.*, tbl_kegiatan.nama_kegiatan
FROM tbl_laporan
LEFT JOIN tbl_kegiatan
ON tbl_laporan.id_kegiatan = tbl_kegiatan.id_kegiatan
ORDER BY tbl_laporan.id_laporan DESC
");

while($row=mysqli_fetch_assoc($query)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $row['id_laporan']; ?></td>

<td><?= $row['nama_kegiatan']; ?></td>

<td><?= $row['tanggal_laporan']; ?></td>

<td><?= $row['keterangan']; ?></td>

<td>

<ul>

<?php

$detail=mysqli_query($koneksi,"SELECT
tbl_detail_laporan.*,
tbl_pengurus.nama_pengurus,
tbl_panitia.nama_panitia

FROM tbl_detail_laporan

LEFT JOIN tbl_kegiatan
ON tbl_detail_laporan.id_kegiatan=tbl_kegiatan.id_kegiatan

LEFT JOIN tbl_pengurus
ON tbl_detail_laporan.id_pengurus=tbl_pengurus.id_pengurus

LEFT JOIN tbl_panitia
ON tbl_detail_laporan.id_panitia=tbl_panitia.id_panitia

WHERE tbl_detail_laporan.id_laporan='".$row['id_laporan']."'
");

while($d=mysqli_fetch_assoc($detail)){

?>

<li>

<?php
if($d['nama_pengurus']!=""){
echo "<b>Pengurus :</b> ".$d['nama_pengurus']."<br>";
}

if($d['nama_panitia']!=""){
echo "<b>Panitia :</b> ".$d['nama_panitia']."<br>";
}
?>

<b>Uraian :</b> <?= $d['uraian']; ?><br>

<b>Kendala :</b> <?= $d['kendala']; ?><br>

<b>Hasil :</b> <?= $d['hasil']; ?>

</li>

<hr>

<?php } ?>

</ul>

</td>

<?php
if($_SESSION['Role']=="admin"){
?>

<td>

<a href="index.php?page=laporan_kegiatan&hapus=<?= $row['id_laporan']; ?>"
onclick="return confirm('Yakin ingin menghapus data?')"
class="btn btn-danger btn-sm">
Hapus
</a>

<a href="index.php?page=edit_laporan&id=<?= $row['id_laporan']; ?>"
class="btn btn-warning btn-sm">
Edit
</a>

</td>

<?php
}elseif($_SESSION['Role']=="pengurus"){
?>

<td>

<a href="index.php?page=edit_laporan&id=<?= $row['id_laporan']; ?>"
class="btn btn-warning btn-sm">
Edit
</a>

</td>

<?php } ?>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</div>