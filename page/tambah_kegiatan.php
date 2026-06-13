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
$carikode = mysqli_query($koneksi, "select max(id_kegiatan) from tbl_kegiatan") or die(mysqli_error());
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
  $id_kegiatan        = $_POST['id_kegiatan'];
  $nama_kegiatan      = $_POST['nama_kegiatan'];
  $deskripsi          = $_POST['deskripsi'];
  $tanggal_kegiatan   = $_POST['tanggal_kegiatan'];
  $lokasi             = $_POST['lokasi'];
  $kuota_peserta      = $_POST['kuota_peserta'];
  $status_kegiatan    = $_POST['status_kegiatan'];
    $insert = mysqli_query($koneksi,"INSERT INTO tbl_kegiatan values ('$id_kegiatan','$nama_kegiatan','$deskripsi','$tanggal_kegiatan','$lokasi', '$kuota_peserta', '$status_kegiatan')"); 
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
        <h4>Gagal Disimpan'.mysqli_error($koneksi).'</h4></div>';
    }
}
?>
                <section class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title">Tambah Data kegiatan</h3>
                            </div>
                                <div class="card-body">
                                    <form method="POST">
                                        
                                        <div class="form-group">
                                            <label>ID Kegiatan</label>
                                            <input type="text" name="id_kegiatan" value="<?= $hasilkode ?>" class="form-control" readonly>
                                        </div>

                                        <div class="form-group">
                                        <label>Nama Kegiatan</label>
                                        <select class="form-control" name="nama_kegiatan">
                                            <option value="">-- Pilih Kegiatan --</option>
                                            <option value="Misa Mingguan">Misa Mingguan</option>
                                            <option value="Retret OMK">Retret OMK</option>
                                            <option value="Katekese">Katekese</option>
                                            <option value="Bakti Sosial">Bakti Sosial</option>
                                            <option value="Doa Lingkungan">Doa Lingkungan</option>
                                            <option value="Latihan Koor">Latihan Koor</option>
                                        </select>
                                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Masukkan Deskripsi Kegiatan"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kegiatan</label>
                        <input type="date" name="tanggal_kegiatan" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Lokasi</label>
                        <select class="form-control" name="lokasi">
                            <option value="">-- Pilih Lokasi --</option>
                            <option value="Gereja Utama">Gereja Utama</option>
                            <option value="Aula Paroki">Aula Paroki</option>
                            <option value="Ruang Pertemuan">Ruang Pertemuan</option>
                            <option value="Lapangan Gereja">Lapangan Gereja</option>
                            <option value="Lingkungan Umat">Lingkungan Umat</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Kuota Peserta</label>
                        <input type="number" name="kuota_peserta" class="form-control" placeholder="Masukkan Kuota Peserta">
                    </div>

                    <div class="form-group">
                        <label>Status Kegiatan</label>
                        <select class="form-control" name="status_kegiatan">
                            <option value="">-- Pilih Status --</option>
                            <option value="aktif">Aktif</option>
                            <option value="selesai">Selesai</option>
                            <option value="dibatalkan">Dibatalkan</option>
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