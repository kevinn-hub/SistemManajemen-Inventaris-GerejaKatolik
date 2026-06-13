<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Informasi Divisi</h1>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_GET['id'];
$edit = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tbl_divisi WHERE id_divisi='$id'"));

if(isset($_POST['tambah'])){
    $id_divisi = $_POST['id_divisi'];
    $nama_divisi = $_POST['nama_divisi'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $status = $_POST['status'];
    $keterangan = $_POST['keterangan'];
    
    $insert = mysqli_query($koneksi,"UPDATE tbl_divisi SET nama_divisi='$nama_divisi', penanggung_jawab='$penanggung_jawab', status='$status', keterangan='$keterangan' WHERE id_divisi='$id_divisi' ");
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=divisi">';
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Gagal Disimpan</h4></div>';
    }
}
?>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-body p-2">
                    <form method="POST" action="">
                        
                    <div class="form-group">
                        <label>ID Divisi</label>
                        <input type="text" name="id_divisi" value="<?= $edit['id_divisi']; ?>" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Nama Divisi</label>
                        <select class="form-control" name="nama_divisi">
                            <option value="Liturgi" <?= ($edit['nama_divisi']=='Liturgi')?'selected':''; ?>>Liturgi</option>
                            <option value="Koor" <?= ($edit['nama_divisi']=='Koor')?'selected':''; ?>>Koor</option>
                            <option value="Katekese" <?= ($edit['nama_divisi']=='Katekese')?'selected':''; ?>>Katekese</option>
                            <option value="OMK" <?= ($edit['nama_divisi']=='OMK')?'selected':''; ?>>OMK</option>
                            <option value="PSE" <?= ($edit['nama_divisi']=='PSE')?'selected':''; ?>>PSE</option>
                            <option value="Perlengkapan" <?= ($edit['nama_divisi']=='Perlengkapan')?'selected':''; ?>>Perlengkapan</option>
                            <option value="Inventaris" <?= ($edit['nama_divisi']=='Inventaris')?'selected':''; ?>>Inventaris</option>
                            <option value="Humas" <?= ($edit['nama_divisi']=='Humas')?'selected':''; ?>>Humas</option>
                            <option value="Keuangan" <?= ($edit['nama_divisi']=='Keuangan')?'selected':''; ?>>Keuangan</option>
                            <option value="Sekretariat" <?= ($edit['nama_divisi']=='Sekretariat')?'selected':''; ?>>Sekretariat</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Penanggung Jawab</label>
                        <select class="form-control" name="penanggung_jawab">
                            <option value="Yohanes" <?= ($edit['penanggung_jawab']=='Yohanes')?'selected':''; ?>>Yohanes</option>
                            <option value="Maria" <?= ($edit['penanggung_jawab']=='Maria')?'selected':''; ?>>Maria</option>
                            <option value="Antonius" <?= ($edit['penanggung_jawab']=='Antonius')?'selected':''; ?>>Antonius</option>
                            <option value="Fransiskus" <?= ($edit['penanggung_jawab']=='Fransiskus')?'selected':''; ?>>Fransiskus</option>
                            <option value="Agustinus" <?= ($edit['penanggung_jawab']=='Agustinus')?'selected':''; ?>>Agustinus</option>
                            <option value="Theresia" <?= ($edit['penanggung_jawab']=='Theresia')?'selected':''; ?>>Theresia</option>
                            <option value="Bernadeth" <?= ($edit['penanggung_jawab']=='Bernadeth')?'selected':''; ?>>Bernadeth</option>
                            <option value="Petrus" <?= ($edit['penanggung_jawab']=='Petrus')?'selected':''; ?>>Petrus</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="aktif" <?= ($edit['status']=='aktif')?'selected':''; ?>>Aktif</option>
                            <option value="tidak aktif" <?= ($edit['status']=='tidak aktif')?'selected':''; ?>>Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" value="<?= $edit['keterangan']; ?>" class="form-control">
                    </div>



                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>