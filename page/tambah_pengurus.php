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
  $id_divisi       = $_POST['id_divisi'];
  $Id_user       = $_POST['Id_user'];
    $insert = mysqli_query($koneksi,"INSERT INTO tbl_pengurus values ('$id_pengurus', '$nama_pengurus', '$jabatan', '$periode', '$status_pengurus', '$id_divisi', '$Id_user')"); 
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
            <label>Divisi</label>
            <select class="form-control" name="id_divisi">
                <option value="">-- Nama Divisi --</option>
                <?php
                $divisi = mysqli_query($koneksi, "SELECT * FROM tbl_divisi");
                while($d = mysqli_fetch_array($divisi)){
                ?>
                    <option value="<?= $d['id_divisi']; ?>">
                        <?= $d['nama_divisi']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
                    <label>User Anggota</label>
                    <select name="Id_user" class="form-control">
                        <?php
                        $user = mysqli_query($koneksi,"SELECT * FROM tbl_users WHERE Role='pengurus'");
                        while($u = mysqli_fetch_array($user)){
                        ?>
                        <option value="<?= $u['Id_user']; ?>">
                            <?= $u['Username']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

            <div class="form-group">
                <label>Nama Pengurus</label>
                <select class="form-control" name="nama_pengurus">
                    <option value="" selected disabled>-- Pilih Nama Pengurus --</option>
                    <option value="Yohanes">Yohanes</option>
                    <option value="Maria">Maria</option>
                    <option value="Petrus">Petrus</option>
                    <option value="Paulus">Paulus</option>
                    <option value="Agustinus">Agustinus</option>
                    <option value="Fransiskus">Fransiskus</option>
                    <option value="Veronika">Veronika</option>
                    <option value="Elisabet">Elisabet</option>
                    <option value="Stefanus">Stefanus</option>
                    <option value="Martha">Martha</option>
                </select>
            </div>

        <div class="form-group">
            <label>Jabatan</label>
            <select class="form-control" name="jabatan">
                <option value="">-- Pilih Jabatan --</option>
                <option value="Ketua Presidium">Ketua Presidium</option>
                <option value="Sekretaris Jendral">Sekretaris Jendral</option>
                <option value="Bendahara">Bendahara</option>
                <option value="Ketua Bidang Kaderisasi">Ketua Bidang Kaderisasi</option>
                <option value="Ketua Bidang Organisasi">Ketua Bidang Organisasi</option>
            </select>
        </div>

        <div class="form-group">
            <label>Periode</label>
            <select class="form-control" name="periode">
                <option value="">-- Pilih Periode --</option>
                <option value="2020-2021">2020-2021</option>
                <option value="2022-2023">2022-2023</option>
                <option value="2024-2025">2024-2025</option>
                <option value="2026-2027">2026-2027</option>
                <option value="2028-2029">2028-2029</option>
            </select>
        </div>

        <div class="form-group">
            <label>Status Pengurus</label>
            <select class="form-control" name="status_pengurus">
                <option value="">-- Pilih Status --</option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
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