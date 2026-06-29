<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Laporan Kegiatan</h1>
            </div>
        </div>
    </div>
</div>

<?php

$carikode = mysqli_query($koneksi,"SELECT MAX(id_laporan) FROM tbl_laporan");
$datakode = mysqli_fetch_array($carikode);

if($datakode[0] != NULL){
    $kode = (int)$datakode[0];
    $kode++;
    $hasilkode = $kode;
}else{
    $hasilkode = 1;
}

if(isset($_POST['tambah'])){

    $id_laporan       = $_POST['id_laporan'];
    $tanggal_laporan  = $_POST['tanggal_laporan'];
    $keterangan       = $_POST['keterangan'];
    $id_kegiatan      = $_POST['id_kegiatan'];

    $insert = mysqli_query($koneksi,"
INSERT INTO tbl_laporan
(
id_laporan,
tanggal_laporan,
keterangan,
id_kegiatan
)
VALUES
(
'$id_laporan',
'$tanggal_laporan',
'$keterangan',
'$id_kegiatan'
)
");

    if($insert){
        $id_kegiatan = $_POST['id_kegiatan'];
        $id_pengurus = $_POST['id_pengurus'];
        $id_panitia  = $_POST['id_panitia'];
        $uraian      = $_POST['uraian'];
        $kendala     = $_POST['kendala'];
        $hasil       = $_POST['hasil'];

        $berhasil = true;

        for($i=0;$i<count($uraian);$i++){

           $detail = mysqli_query($koneksi,"
INSERT INTO tbl_detail_laporan
(
id_laporan,
id_kegiatan,
id_pengurus,
id_panitia,
uraian,
kendala,
hasil
)
VALUES
(
'$id_laporan',
'$id_kegiatan',
'{$id_pengurus[$i]}',
'{$id_panitia[$i]}',
'{$uraian[$i]}',
'{$kendala[$i]}',
'{$hasil[$i]}'
)
");

            if(!$detail){
    die(mysqli_error($koneksi));
}

        }

        if($berhasil){

            echo "<div class='alert alert-success'>
            Data berhasil disimpan
            </div>";

            echo "<meta http-equiv='refresh' content='1;url=index.php?page=laporan_kegiatan'>";

        }else{

            echo "<div class='alert alert-danger'>
            Gagal menyimpan detail laporan
            </div>";

        }

    }else{

        echo "<div class='alert alert-danger'>
        ".mysqli_error($koneksi)."
        </div>";

    }

}

?>

<section class="content">
<div class="container-fluid">

<div class="card">

<div class="card-header bg-primary">
<h3 class="card-title">Form Tambah Laporan</h3>
</div>

<div class="card-body">

<form method="POST">

<div class="form-group">
<label>ID Laporan</label>
<input type="text"
name="id_laporan"
class="form-control"
value="<?= $hasilkode; ?>"
readonly>
</div>

<div class="form-group">
<label>Kegiatan</label>

<select name="id_kegiatan" class="form-control" required>

<option value="">-- Pilih Kegiatan --</option>

<?php

$kegiatan=mysqli_query($koneksi,"SELECT * FROM tbl_kegiatan
");

while($k=mysqli_fetch_assoc($kegiatan)){

?>

<option value="<?= $k['id_kegiatan']; ?>">
<?= $k['nama_kegiatan']; ?>
</option>

<?php } ?>

</select>

</div>


<div class="form-group">
    <label>Tanggal Laporan</label>
    <select name="tanggal_laporan" class="form-control" required>
        <option value="" selected disabled>-- Pilih Tanggal Laporan --</option>
        <option value="2026-06-01">01 Juni 2026</option>
        <option value="2026-06-05">05 Juni 2026</option>
        <option value="2026-06-10">10 Juni 2026</option>
        <option value="2026-06-15">15 Juni 2026</option>
        <option value="2026-06-20">20 Juni 2026</option>
        <option value="2026-06-25">25 Juni 2026</option>
        <option value="2026-07-01">01 Juli 2026</option>
        <option value="2026-07-05">05 Juli 2026</option>
        <option value="2026-07-10">10 Juli 2026</option>
        <option value="2026-07-15">15 Juli 2026</option>
    </select>
</div>

<div class="form-group">
    <label>Keterangan</label>
    <select name="keterangan" class="form-control" required>
        <option value="" selected disabled>-- Pilih Keterangan --</option>
        <option value="Laporan Kegiatan Berjalan Lancar">Laporan Kegiatan Berjalan Lancar</option>
        <option value="Kegiatan Selesai Sesuai Rencana">Kegiatan Selesai Sesuai Rencana</option>
        <option value="Ada Kendala Teknis di Lapangan">Ada Kendala Teknis di Lapangan</option>
        <option value="Kegiatan Ditunda">Kegiatan Ditunda</option>
        <option value="Kegiatan Dibatalkan">Kegiatan Dibatalkan</option>
        <option value="Perlu Evaluasi Lanjutan">Perlu Evaluasi Lanjutan</option>
        <option value="Berjalan dengan Baik dan Tertib">Berjalan dengan Baik dan Tertib</option>
    </select>
</div>

<hr>

<h4>Detail Laporan</h4>

<div id="detail-laporan">
<div class="row mb-3">

<div class="col-md-6">
<label>Pengurus</label>

<select name="id_pengurus[]" class="form-control" required>

<option value="">-- Pilih Pengurus --</option>

<?php
$pengurus = mysqli_query($koneksi,"SELECT * FROM tbl_pengurus");
while($p = mysqli_fetch_assoc($pengurus)){
?>

<option value="<?= $p['id_pengurus']; ?>">
<?= $p['nama_pengurus']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="col-md-6">

<label>Panitia</label>

<select name="id_panitia[]" class="form-control">

<option value="">-- Pilih Panitia --</option>

<?php
$panitia = mysqli_query($koneksi,"SELECT * FROM tbl_panitia");
while($pn = mysqli_fetch_assoc($panitia)){
?>

<option value="<?= $pn['id_panitia']; ?>">
<?= $pn['nama_panitia']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="col-md-12 mt-2">
    <label>Uraian</label>
    <select name="uraian[]" class="form-control" required>
        <option value="" selected disabled>-- Pilih Uraian --</option>
        <option value="Persiapan kegiatan berjalan sesuai rencana">Persiapan kegiatan berjalan sesuai rencana</option>
        <option value="Pelaksanaan kegiatan berlangsung lancar">Pelaksanaan kegiatan berlangsung lancar</option>
        <option value="Pembagian tugas kepada panitia sudah dilakukan">Pembagian tugas kepada panitia sudah dilakukan</option>
        <option value="Koordinasi antar pengurus berjalan baik">Koordinasi antar pengurus berjalan baik</option>
        <option value="Kegiatan didukung penuh oleh anggota">Kegiatan didukung penuh oleh anggota</option>
        <option value="Dokumentasi kegiatan telah dilakukan">Dokumentasi kegiatan telah dilakukan</option>
        <option value="Evaluasi kegiatan sedang dilakukan">Evaluasi kegiatan sedang dilakukan</option>
    </select>
</div>

<div class="col-md-12 mt-2">
    <label>Kendala</label>
    <select name="kendala[]" class="form-control" required>
        <option value="" selected disabled>-- Pilih Kendala --</option>
        <option value="Tidak ada kendala">Tidak ada kendala</option>
        <option value="Kendala teknis (sound/speaker)">Kendala teknis (sound/speaker)</option>
        <option value="Keterlambatan peserta">Keterlambatan peserta</option>
        <option value="Cuaca tidak mendukung">Cuaca tidak mendukung</option>
        <option value="Kurang koordinasi panitia">Kurang koordinasi panitia</option>
        <option value="Peralatan tidak lengkap">Peralatan tidak lengkap</option>
        <option value="Lokasi kurang memadai">Lokasi kurang memadai</option>
        <option value="Tidak ada kendala berarti">Tidak ada kendala berarti</option>
    </select>
</div>

<div class="col-md-12 mt-2">
    <label>Hasil</label>
    <select name="hasil[]" class="form-control" required>
        <option value="" selected disabled>-- Pilih Hasil --</option>
        <option value="Kegiatan berjalan sukses">Kegiatan berjalan sukses</option>
        <option value="Kegiatan selesai sesuai rencana">Kegiatan selesai sesuai rencana</option>
        <option value="Kegiatan berjalan cukup baik">Kegiatan berjalan cukup baik</option>
        <option value="Kegiatan kurang maksimal">Kegiatan kurang maksimal</option>
        <option value="Kegiatan tertunda">Kegiatan tertunda</option>
        <option value="Kegiatan dibatalkan">Kegiatan dibatalkan</option>
        <option value="Target kegiatan tercapai">Target kegiatan tercapai</option>
        <option value="Perlu evaluasi lanjutan">Perlu evaluasi lanjutan</option>
    </select>
</div>

</div>

</div>

<br>

<button
type="button"
class="btn btn-info"
onclick="tambahDetail()">

+ Tambah Detail

</button>

<br><br>

<input
type="submit"
name="tambah"
value="Simpan"
class="btn btn-primary">
</form>

</div>
</div>
</div>
</section>

<script>

function tambahDetail(){

var container = document.getElementById("detail-laporan");

var row = container.firstElementChild.cloneNode(true);

row.querySelectorAll("textarea").forEach(function(item){
    item.value="";
});

row.querySelectorAll("select").forEach(function(item){
    item.selectedIndex=0;
});

container.appendChild(row);

}

</script>
