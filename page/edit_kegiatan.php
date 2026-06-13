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
$edit = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tbl_kegiatan WHERE id_kegiatan='$id'"));

if(isset($_POST['tambah'])){
  $id_kegiatan        = $_POST['id_kegiatan'];
  $nama_kegiatan      = $_POST['nama_kegiatan'];
  $deskripsi          = $_POST['deskripsi'];
  $tanggal_kegiatan   = $_POST['tanggal_kegiatan'];
  $lokasi             = $_POST['lokasi'];
  $kuota_peserta      = $_POST['kuota_peserta'];
  $status_kegiatan    = $_POST['status_kegiatan'];
    
    $insert = mysqli_query($koneksi,"UPDATE tbl_kegiatan SET nama_kegiatan='$nama_kegiatan', deskripsi='$deskripsi', tanggal_kegiatan='$tanggal_kegiatan', lokasi='$lokasi', kuota_peserta='$kuota_peserta', status_kegiatan='$status_kegiatan' WHERE id_kegiatan='$id_kegiatan' ");
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=kegiatan">';
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
                            <label>ID Kegiatan</label>
                            <input type="text" name="id_kegiatan"
                                value="<?= $edit['id_kegiatan']; ?>"
                                class="form-control" readonly>
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
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4"><?= $edit['deskripsi']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Kegiatan</label>
                            <input type="date" name="tanggal_kegiatan"
                                value="<?= $edit['tanggal_kegiatan']; ?>"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Lokasi</label>
                            <select class="form-control" name="lokasi" id="lokasi">
                                <option value="Gereja Utama" <?= ($edit['lokasi']=='Gereja Utama')?'selected':''; ?>>Gereja Utama</option>
                                <option value="Aula Paroki" <?= ($edit['lokasi']=='Aula Paroki')?'selected':''; ?>>Aula Paroki</option>
                                <option value="Ruang Pertemuan" <?= ($edit['lokasi']=='Ruang Pertemuan')?'selected':''; ?>>Ruang Pertemuan</option>
                                <option value="Lapangan Gereja" <?= ($edit['lokasi']=='Lapangan Gereja')?'selected':''; ?>>Lapangan Gereja</option>
                                <option value="Lingkungan Umat" <?= ($edit['lokasi']=='Lingkungan Umat')?'selected':''; ?>>Lingkungan Umat</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Kuota Peserta</label>
                            <input type="number" name="kuota_peserta"
                                value="<?= $edit['kuota_peserta']; ?>"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Status Kegiatan</label>
                            <select class="form-control" name="status_kegiatan">
                                <option value="aktif" <?= ($edit['status_kegiatan']=='aktif')?'selected':''; ?>>Aktif</option>
                                <option value="selesai" <?= ($edit['status_kegiatan']=='selesai')?'selected':''; ?>>Selesai</option>
                                <option value="dibatalkan" <?= ($edit['status_kegiatan']=='dibatalkan')?'selected':''; ?>>Dibatalkan</option>
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