<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Pengurus </h1>
            </div>
        </div>
    </div>
</div>

<?php
$carikode = mysqli_query($koneksi, "select max(id_pengurus) from tbl_pengurus") or die(mysqli_error());
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
  $id_pengurus       = $_POST['id_pengurus'];
  $nama_pengurus     = $_POST['nama_pengurus'];
  $jabatan           = $_POST['jabatan'];
  $periode           = $_POST['periode'];
  $status_pengurus   = $_POST['status_pengurus'];
  $nama_divisi       = $_POST['nama_divisi'];
    $insert = mysqli_query($koneksi,"INSERT INTO tbl_pengurus values ('$id_pengurus', '$nama_pengurus', '$jabatan', '$periode', '$status_pengurus', '$nama_divisi')"); 
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=pengurus">';
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
                <h3 class="card-title">Tambah Data Pengurus</h3>
            </div>

            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label>ID Pengurus</label>
                        <input type="text" name="id_pengurus" value="<?= $hasilkode ?>" class="form-control" readonly>
                    </div>

                     <div class="form-group">
                        <label>Nama Pengurus</label>
                        <input type="text" name="nama_pengurus" id="nama_pengurus" class="form-control">
                    </div>

                  <div class="form-group">
                            <label for="jabatan">jabatan</label>
                            <select class="form-control" name="jabatan" id="jabatan" placeholder="jabatan">
                            <option disable selected>-- Pilih jabaatan --</option>
                            <option value="Ketua Predisium">Ketua Predisium</option>
                            <option value="Sekretaris Jendral">Sekretaris Jendral</option>
                            <option value="Bendahara">Bendahara</option>
                            <option value="Ketua Bidang Kaderisasi">"Ketua Bidang Kaderisasi</option>
                            <option value="Ketua Bidang Organisasi">Ketua Bidang Organisasi</option>
                        </select>
                    </div>

                    <div class="form-group">
                            <label for="periode">periode</label>
                            <select class="form-control" name="periode" id="periode" placeholder="periode">
                            <option disable selected>-- Pilih periode --</option>
                            <option value="2020-2021">2020-2021</option>
                            <option value="2022-2023">2022-2023</option>
                            <option value="2024-2025">2024-2025</option>
                            <option value="2026-2027">2026-2027</option>
                            <option value="2028-2029">2026-2027</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status Pengurus</label>
                        <select class="form-control" name="status_pengurus" id="status_pengurus" placeholder="status_pengurus">
                            <option value="">-- Pilih Status --</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>

                    div class="form-group">
                            <label for="nama_divisi">Nama Divisi</label>
                            <select class="form-control" name="nama_divisi" id="nama_divisi" placeholder="nama_divisi">
                            <option disable selected>-- Pilih jenis divisi --</option>
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

                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
                    </div>
            </form>
            </div>
        </div>
    </div>
</section>