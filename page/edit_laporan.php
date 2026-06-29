<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Laporan Kegiatan</h1>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_GET['id'] ?? null;

if(!$id){
    die("ID tidak ditemukan");
}

$edit = mysqli_query($koneksi,"
SELECT tbl_laporan.*, tbl_kegiatan.nama_kegiatan
FROM tbl_laporan
JOIN tbl_kegiatan ON tbl_laporan.id_kegiatan = tbl_kegiatan.id_kegiatan
WHERE tbl_laporan.id_laporan='$id'
");

$data = mysqli_fetch_assoc($edit);

if(!$data){
    die("Data tidak ditemukan");
}

/* UPDATE */
if(isset($_POST['edit'])){

    $id_laporan      = $_POST['id_laporan'];
    $id_kegiatan     = $_POST['id_kegiatan'];
    $tanggal_laporan = $_POST['tanggal_laporan'];
    $keterangan      = $_POST['keterangan'];

    $update = mysqli_query($koneksi,"
        UPDATE tbl_laporan 
        SET 
            id_kegiatan='$id_kegiatan',
            tanggal_laporan='$tanggal_laporan',
            keterangan='$keterangan'
        WHERE id_laporan='$id_laporan'
    ");

    if($update){
        echo '<div class="alert alert-success">Berhasil diupdate</div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=laporan_kegiatan">';
    }else{
        echo '<div class="alert alert-danger">'.mysqli_error($koneksi).'</div>';
    }
}
?>

<section class="content">
<div class="container-fluid">

<div class="card">

<div class="card-header bg-primary">
    <h3 class="card-title">Edit Data Laporan</h3>
</div>

<div class="card-body">

<form method="POST">

<div class="form-group">
    <label>ID Laporan</label>
    <input type="text" name="id_laporan"
        value="<?= $data['id_laporan']; ?>"
        class="form-control" readonly>
</div>

<div class="form-group">
    <label>Kegiatan</label>
    <select name="id_kegiatan" class="form-control">

        <?php
        $kegiatan = mysqli_query($koneksi,"SELECT * FROM tbl_kegiatan");
        while($k = mysqli_fetch_assoc($kegiatan)){
        ?>
            <option value="<?= $k['id_kegiatan']; ?>"
                <?= ($k['id_kegiatan'] == $data['id_kegiatan']) ? 'selected' : ''; ?>>
                <?= $k['nama_kegiatan']; ?>
            </option>
        <?php } ?>

    </select>
</div>

<div class="form-group">
    <label>Tanggal Laporan</label>
    <input type="date"
        name="tanggal_laporan"
        value="<?= $data['tanggal_laporan']; ?>"
        class="form-control">
</div>

<div class="form-group">
    <label>Keterangan</label>
    <textarea name="keterangan" class="form-control" rows="4"><?= $data['keterangan']; ?></textarea>
</div>

<div class="card-footer">
    <input type="submit" name="edit" value="Update" class="btn btn-primary">
</div>

</form>

</div>
</div>

</div>
</section>