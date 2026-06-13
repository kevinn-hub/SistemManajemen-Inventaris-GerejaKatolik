<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Pendaftaran</h1>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_GET['id'];
$edit = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tbl_pendaftaran WHERE id_daftar='$id'"));

if(isset($_POST['tambah'])){
  $id_daftar        = $_POST['id_daftar'];
  $nama_pendaftar = $_POST['nama_pendaftar'];
  $nama_kegiatan    = $_POST['nama_kegiatan'];
  $tanggal_daftar   = $_POST['tanggal_daftar'];
  $status           = $_POST['status'];
    
    $insert = mysqli_query($koneksi,"UPDATE tbl_pendaftaran SET nama_pendaftar='$nama_pendaftar', nama_kegiatan='$nama_kegiatan', tanggal_daftar='$tanggal_daftar', status='$status' WHERE id_daftar='$id_daftar' ");
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=pendaftaran">';
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
        <label>ID Pendaftaran</label>
        <input type="text" name="id_daftar"
            value="<?= $edit['id_daftar']; ?>"
            class="form-control" readonly>
    </div>

    <div class="form-group">
        <label>Nama Pendaftar</label>
        <select class="form-control" name="nama_pendaftar">
            <option value="Yohanes" <?= ($edit['nama_pendaftar']=='Yohanes')?'selected':''; ?>>Yohanes</option>
            <option value="Maria" <?= ($edit['nama_pendaftar']=='Maria')?'selected':''; ?>>Maria</option>
            <option value="Antonius" <?= ($edit['nama_pendaftar']=='Antonius')?'selected':''; ?>>Antonius</option>
            <option value="Fransiskus" <?= ($edit['nama_pendaftar']=='Fransiskus')?'selected':''; ?>>Fransiskus</option>
            <option value="Agustinus" <?= ($edit['nama_pendaftar']=='Agustinus')?'selected':''; ?>>Agustinus</option>
            <option value="Theresia" <?= ($edit['nama_pendaftar']=='Theresia')?'selected':''; ?>>Theresia</option>
            <option value="Bernadeth" <?= ($edit['nama_pendaftar']=='Bernadeth')?'selected':''; ?>>Bernadeth</option>
            <option value="Petrus" <?= ($edit['nama_pendaftar']=='Petrus')?'selected':''; ?>>Petrus</option>
        </select>
    </div>

    <div class="form-group">
        <label>Nama Kegiatan</label>
        <select class="form-control" name="nama_kegiatan">
            <option value="Misa Mingguan" <?= ($edit['nama_kegiatan']=='Misa Mingguan')?'selected':''; ?>>Misa Mingguan</option>
            <option value="Retret OMK" <?= ($edit['nama_kegiatan']=='Retret OMK')?'selected':''; ?>>Retret OMK</option>
            <option value="Katekese" <?= ($edit['nama_kegiatan']=='Katekese')?'selected':''; ?>>Katekese</option>
            <option value="Bakti Sosial" <?= ($edit['nama_kegiatan']=='Bakti Sosial')?'selected':''; ?>>Bakti Sosial</option>
            <option value="Doa Lingkungan" <?= ($edit['nama_kegiatan']=='Doa Lingkungan')?'selected':''; ?>>Doa Lingkungan</option>
            <option value="Latihan Koor" <?= ($edit['nama_kegiatan']=='Latihan Koor')?'selected':''; ?>>Latihan Koor</option>
        </select>
    </div>

    <div class="form-group">
        <label>Tanggal Daftar</label>
        <input type="date" name="tanggal_daftar"
            value="<?= $edit['tanggal_daftar']; ?>"
            class="form-control">
    </div>

    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
            <option value="menunggu" <?= ($edit['status']=='menunggu')?'selected':''; ?>>Menunggu</option>
            <option value="diterima" <?= ($edit['status']=='diterima')?'selected':''; ?>>Diterima</option>
            <option value="ditolak" <?= ($edit['status']=='ditolak')?'selected':''; ?>>Ditolak</option>
        </select>
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