<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Guru</h1>
            </div>
        </div>
    </div>
</div>

<?php
$carikode = mysqli_query($koneksi,"select max(id_divisi) from tbl_divisi") or die(mysqli_error());
$datakode = mysqli_fetch_array($carikode);

if($datakode){
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {$hasilkode = ""; }
$_SESSION['KODE'] = $hasilkode;

if(isset($_POST['tambah'])){
  $id_divisi        = $_POST['id_divisi'];
  $nama_divisi      = $_POST['nama_divisi'];
  $penanggung_jawab = $_POST['penanggung_jawab'];
  $status           = $_POST['status'];
  $keterangan       = $_POST['keterangan'];
    $insert = mysqli_query($koneksi,"INSERT INTO tbl_divisi values ('$id_divisi', '$nama_divisi','$penanggung_jawab','$status','$keterangan')"); 
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
        <h4>Gagal Disimpan'.mysqli_error($koneksi).'</h4></div>';
    }
}
?>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Tambah Data Divisi</h3>
            </div>

            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label>ID Divisi</label>
                        <input type="text" name="id_divisi" value="<?= $hasilkode ?>" class="form-control" readonly>
                    </div>

                     <div class="form-group">
                            <label for="nama_divisi">Nama Divisi</label>
                            <select class="form-control" name="nama_divisi" id="nama_divisi" placeholder="nama_divisi">
                            <option disable selected>-- Pilih jenis Divisi --</option>
                            <option value="Liturgi">Liturgi</option>
                            <option value="Koor">Koor</option>
                            <option value="Katekese">Katekese</option>
                            <option value="OMK">Orang Muda Katolik (OMK)</option>
                            <option value="PSE">PSE</option>
                            <option value="Perlengkapan">Perlengkapan</option>
                            <option value="Inventaris">Inventaris</option>
                            <option value="Humas">Hubungan Masyarakat</option>
                            <option value="Keuangan">Keuangan</option>
                            <option value="Sekretariat">Sekretariat</option>
                        </select>
                    </div>

                  <div class="form-group">
                            <label for="penanggung_jawab">Penanggung Jawab</label>
                            <select class="form-control" name="penanggung_jawab" id="penanggung_jawab" placeholder="penanggung_jawab">
                            <option disable selected>-- Pilih Penanggung Jawab --</option>
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
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" placeholder="keterangan" class="form-control">
                    </div>

                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
                    </div>
            </form>
            </div>
        </div>
    </div>
</section>