<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Kegiatan</h1>
            </div>
        </div>
    </div>
</div>

<?php
$carikode = mysqli_query($koneksi, "select max(id_daftar) from tbl_pendaftaran") or die(mysqli_error());
$datakode = mysqli_fetch_array($carikode);

if($datakode){
    $kode = (int)$datakode[0];
    $kode = $kode + 1;
    $hasilkode = str_pad($kode, 3, "0", STR_PAD_LEFT);
}else{
    $hasilkode = "001";
}
$_SESSION['KODE'] = $hasilkode;

if(isset($_POST['tambah'])){
  $id_daftar        = $_POST['id_daftar'];
  $nama_pendaftar = $_POST['nama_pendaftar'];
  $nama_kegiatan    = $_POST['nama_kegiatan'];
  $tanggal_daftar   = $_POST['tanggal_daftar'];
  $status           = $_POST['status'];
    $insert = mysqli_query($koneksi,"INSERT INTO tbl_pendaftaran values ('$id_daftar','$nama_pendaftar','$nama_kegiatan','$tanggal_daftar','$status')"); 
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
        <h4>Gagal Disimpan'.mysqli_error($koneksi).'</h4></div>';
    }
}
?>
                <section class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title">Tambah Data pendaftaran</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST">

                                    <div class="form-group">
                                        <label>ID Pendaftaran</label>
                                        <input type="text" name="id_daftar" value="<?= $hasilkode ?>" class="form-control" readonly>
                                    </div>

        <div class="form-group">
            <label>Nama Pendaftar</label>
            <select class="form-control" name="nama_pendaftar" id="nama_pendaftar">
                <option value="">-- Pilih Nama Pendaftar --</option>
                <option value="Yohanes">Yohanes</option>
                <option value="Maria">Maria</option>
                <option value="Antonius">Antonius</option>
                <option value="Fransiskus">Fransiskus</option>
                <option value="Agustinus">Agustinus</option>
                <option value="Theresia">Theresia</option>
                <option value="Bernadeth">Bernadeth</option>
                <option value="Petrus">Petrus</option>
            </select>
        </div>

        <div class="form-group">
            <label>Nama Kegiatan</label>
            <select class="form-control" name="nama_kegiatan">
                <option value="">-- Pilih Nama Kegiatan --</option>
                <option value="Misa Mingguan">Misa Mingguan</option>
                <option value="Retret OMK">Retret OMK</option>
                <option value="Katekese">Katekese</option>
                <option value="Bakti Sosial">Bakti Sosial</option>
                <option value="Doa Lingkungan">Doa Lingkungan</option>
                <option value="Latihan Koor">Latihan Koor</option>
            </select>
        </div>

        <div class="form-group">
            <label>Tanggal Daftar</label>
            <input type="date" name="tanggal_daftar" class="form-control">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status">
                <option value="">-- Pilih Status --</option>
                <option value="menunggu">Menunggu</option>
                <option value="diterima">Diterima</option>
                <option value="ditolak">Ditolak</option>
            </select>
        </div>

                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
                    </div>
            </form>
            </div>
        </div>
    </div>
</section>