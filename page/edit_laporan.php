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
$edit = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tbl_laporan WHERE id_laporan='$id'"));

if (isset($_POST['tambah'])) {
  $id_laporan      = $_POST['id_laporan'];
  $nama_kegiatan   = $_POST['nama_kegiatan'];
  $tanggal_laporan = $_POST['tanggal_laporan'];
  $keterangan      = $_POST['keterangan'];

    $insert = mysqli_query($koneksi,"UPDATE tbl_laporan SET nama_kegiatan='$nama_kegiatan', tanggal_laporan='$tanggal_laporan', keterangan='$keterangan' WHERE id_laporan='$id_laporan'");
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=laporan_kegiatan">';
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

      <div class="card-header bg-primary">
        <h3 class="card-title">Edit Data Laporan Kegiatan</h3>
      </div>

      <div class="card-body">
        <form method="POST">

          <div class="form-group">
            <label>ID Laporan</label>
            <input type="text" name="id_laporan"
              value="<?= $edit['id_laporan']; ?>"
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
            <label>Tanggal Laporan</label>
            <input type="date"
              name="tanggal_laporan"
              value="<?= $edit['tanggal_laporan']; ?>"
              class="form-control">
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="4"><?= $edit['keterangan']; ?></textarea>
          </div>

          <div class="card-footer">
            <input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
          </div>

        </form>
      </div>

    </div>
  </div>
</section>