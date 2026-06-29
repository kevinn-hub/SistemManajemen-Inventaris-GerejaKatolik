<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Panitia</h1>
            </div>
        </div>
    </div>
</div>

<?php
$carikode = mysqli_query($koneksi, "select max(id_panitia) from tbl_panitia") or die(mysqli_error());
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
  $id_panitia        = $_POST['id_panitia'];
  $nama_panitia      = $_POST['nama_panitia'];
  $nama_kegiatan     = $_POST['nama_kegiatan'];
  $jabatan_panitia   = $_POST['jabatan_panitia'];
  $id_pengurus       = $_POST['id_pengurus'];
  $id_kegiatan       = $_POST['id_kegiatan'];
    $insert = mysqli_query($koneksi,"INSERT INTO tbl_panitia values ('$id_panitia','$nama_panitia','$nama_kegiatan','$jabatan_panitia', '$id_pengurus', '$id_kegiatan')"); 
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=panitia">';
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
                <h3 class="card-title">Tambah Data Panitia</h3>
            </div>
            <div class="card-body">
            <form method="POST">

                    <div class="form-group">
                        <label>ID Panitia</label>
                        <input type="text" name="id_panitia" value="<?= $hasilkode ?>" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                    <label>Pengurus</label>
                    <select name="id_pengurus" class="form-control">
                        <?php
                        $pengurus = mysqli_query($koneksi,"SELECT * FROM tbl_pengurus");
                        while($p = mysqli_fetch_array($pengurus)){
                        ?>
                        <option value="<?= $p['id_pengurus']; ?>">
                            <?= $p['nama_pengurus']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kegiatan</label>
                    <select name="id_kegiatan" class="form-control">
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
                        <label>Nama Panitia</label>
                        <select class="form-control" name="nama_panitia">
                            <option value="">-- Pilih Nama Panitia --</option>
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
                        <label>Jabatan Panitia</label>
                        <select class="form-control" name="jabatan_panitia">
                            <option value="">-- Pilih Jabatan --</option>
                            <option value="Ketua">Ketua</option>
                            <option value="Wakil Ketua">Wakil Ketua</option>
                            <option value="Sekretaris">Sekretaris</option>
                            <option value="Bendahara">Bendahara</option>
                            <option value="Koordinator">Koordinator</option>
                            <option value="Anggota">Anggota</option>
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