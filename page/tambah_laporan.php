<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Laporan Kegiatan</h1>
            </div>
        </div>
    </div>
</div>

<?php
$carikode = mysqli_query($koneksi, "select max(id_laporan) from tbl_laporan") or die(mysqli_error());
$datakode = mysqli_fetch_array($carikode);

if($datakode){
    $kode = (int)$datakode[0];
    $kode = $kode + 1;
    $hasilkode = str_pad($kode, 3, "0", STR_PAD_LEFT);
}else{
    $hasilkode = "001";
}
$_SESSION['KODE'] = $hasilkode;

if (isset($_POST['tambah'])) {
  $id_laporan      = $_POST['id_laporan'];
  $nama_kegiatan   = $_POST['nama_kegiatan'];
  $tanggal_laporan = $_POST['tanggal_laporan'];
  $keterangan      = $_POST['keterangan'];
  $id_kegiatan     = $_POST['id_kegiatan'];
    $insert = mysqli_query($koneksi,"INSERT INTO tbl_laporan values ('$id_laporan', '$nama_kegiatan', '$tanggal_laporan', '$keterangan', '$id_kegiatan')"); 
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
        <h4>Gagal Disimpan'.mysqli_error($koneksi).'</h4></div>';
    }
}
?>
               <section class="content">
  <div class="container-fluid">
    <div class="card">

      <div class="card-header bg-primary">
        <h3 class="card-title">Tambah Data Laporan</h3>
      </div>
      <div class="card-body">
        <form method="POST">

          <div class="form-group">
            <label>ID Laporan</label>
            <input type="text" name="id_laporan" value="<?= $hasilkode ?>" class="form-control" readonly>
          </div>

          <div class="form-group">
    <label>Kegiatan</label>
    <select class="form-control" name="id_kegiatan">
        <option value="">-- Pilih Kegiatan --</option>
        <?php
        $kegiatan = mysqli_query($koneksi,"SELECT * FROM tbl_kegiatan");
        while($k = mysqli_fetch_array($kegiatan)){
        ?>
        <option value="<?= $k['id_kegiatan']; ?>">
            <?= $k['nama_kegiatan']; ?>
        </option>
        <?php } ?>
    </select>
</div>

          <div class="form-group">
            <label>Nama Kegiatan</label>
            <select class="form-control" name="nama_kegiatan">
              <option value="">-- Pilih Kegiatan --</option>
              <option>Misa Mingguan</option>
              <option>Retret OMK</option>
              <option>Katekese</option>
              <option>Bakti Sosial</option>
              <option>Doa Lingkungan</option>
              <option>Latihan Koor</option>
            </select>
          </div>

          <div class="form-group">
            <label>Tanggal Laporan</label>
            <input type="date" name="tanggal_laporan" class="form-control">
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="4"></textarea>
          </div>

          <div class="card-footer">
            <input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
          </div>

        </form>
      </div>

    </div>
  </div>
</section>