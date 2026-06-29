<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Anggota </h1>
            </div>
        </div>
    </div>
</div>

<?php
$carikode = mysqli_query($koneksi, "select max(id_anggota) from tbl_anggota") or die(mysqli_error());
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
  $id_anggota       = $_POST['id_anggota'];
  $nama_anggota     = $_POST['nama_anggota'];
  $npm              = $_POST['npm'];
  $fakultas         = $_POST['fakultas'];
  $prodi            = $_POST['prodi'];
  $angkatan         = $_POST['angkatan'];
  $no_hp            = $_POST['no_hp'];
  $alamat           = $_POST['alamat'];
  $status_anggota   = $_POST['status_anggota'];
  $Id_user          = $_POST['Id_user'];
  $insert = mysqli_query($koneksi,"INSERT INTO tbl_anggota values ('$id_anggota', '$nama_anggota', '$npm', '$fakultas', '$prodi', '$angkatan', '$no_hp', '$alamat', '$status_anggota', '$Id_user')"); 
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=anggota">';
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
                <h3 class="card-title">Tambah Data Anggota</h3>
            </div>

            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label>ID Anggota</label>
                        <input type="text" name="id_anggota" value="<?= $hasilkode ?>" class="form-control" readonly>
                    </div>

                     <div class="form-group">
                        <label>Nama Anggota</label>
                        <select class="form-control" name="nama_anggota" id="nama_anggota">
                            <option value="" selected disabled>-- Pilih Nama Anggota --</option>
                            <option value="Yohanes Pratama">Yohanes Pratama</option>
                            <option value="Maria Natalia">Maria Natalia</option>
                            <option value="Petrus Adrian">Petrus Adrian</option>
                            <option value="Paulus Kristanto">Paulus Kristanto</option>
                            <option value="Veronika Angel">Veronika Angel</option>
                            <option value="Elisabet Maria">Elisabet Maria</option>
                            <option value="Stefanus Wijaya">Stefanus Wijaya</option>
                            <option value="Agustinus Saputra">Agustinus Saputra</option>
                            <option value="Fransiskus Andika">Fransiskus Andika</option>
                            <option value="Theresia Monica">Theresia Monica</option>
                        </select>
                    </div>

                    <div class="form-group">
                    <label>User Anggota</label>
                    <select name="Id_user" class="form-control">
                        <?php
                        $user = mysqli_query($koneksi,"SELECT * FROM tbl_users WHERE Role='anggota'");
                        while($u = mysqli_fetch_array($user)){
                        ?>
                        <option value="<?= $u['Id_user']; ?>">
                            <?= $u['Username']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                  <div class="form-group">
                            <label for="npm">npm</label>
                            <select class="form-control" name="npm" id="npm" placeholder="npm">
                            <option disable selected>-- Pilih npm --</option>
                            <option value="345-349">345-349</option>
                            <option value="346-313">346-313</option>
                            <option value="347-371">347-371</option>
                            <option value="356-311">356-311</option>
                            <option value="321-432">321-432</option>
                            <option value="353-423">353-423</option>
                            <option value="340-434">340-434</option>
                            <option value="378-500">378-500</option>
                        </select>
                    </div>

                    <div class="form-group">
                            <label for="fakultas">fakultas</label>
                            <select class="form-control" name="fakultas" id="fakultas" placeholder="fakultas">
                            <option disable selected>-- Pilih fakultas --</option>
                            <option value="Teknik">Teknik</option>
                            <option value="Ekonomi dan Bisnis">Ekonomi dan Bisnis</option>
                            <option value="Hukum">Hukum</option>
                            <option value="Keguruan dan Ilmu Pendidikan">Keguruan dan Ilmu Pendidikan</option>
                        </select>
                    </div>

                    <div class="form-group">
                            <label for="prodi">prodi</label>
                            <select class="form-control" name="prodi" id="prodi" placeholder="prodi">
                            <option disable selected>-- Pilih prodi  --</option>
                            <option value="Informatika">Informatika</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Ilmu Hukum">Ilmu Hukum</option>
                            <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                        </select>
                    </div>

                    <div class="form-group">
                            <label for="angkatan">angkatan</label>
                            <select class="form-control" name="angkatan" id="angkatan" placeholder="angkatan">
                            <option disable selected>-- Pilih angkatan  --</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>
                    </div>

                    <div class="form-group">
                    <label>Nomor HP</label>
                    <select class="form-control" name="no_hp" id="no_hp">
                        <option value="" selected disabled>-- Pilih Nomor HP --</option>
                        <option value="081234567890">081234567890</option>
                        <option value="081345678901">081345678901</option>
                        <option value="081456789012">081456789012</option>
                        <option value="081567890123">081567890123</option>
                        <option value="082112345678">082112345678</option>
                        <option value="082223456789">082223456789</option>
                        <option value="085712345678">085712345678</option>
                        <option value="087812345678">087812345678</option>
                        <option value="088212345678">088212345678</option>
                        <option value="089612345678">089612345678</option>
                    </select>
                </div>

                    <div class="form-group">
                    <label>Alamat Rumah Anggota</label>
                    <select class="form-control" name="alamat" id="alamat">
                        <option value="" selected disabled>-- Pilih Alamat Rumah --</option>
                        <option value="Jl. Melati No. 15, RT 03/RW 05, Kel. Sukamaju, Kec. Cibinong">Jl. Melati No. 15, RT 03/RW 05, Kel. Sukamaju, Kec. Cibinong</option>
                        <option value="Jl. Mawar No. 8, RT 02/RW 04, Kel. Karadenan, Kec. Cibinong">Jl. Mawar No. 8, RT 02/RW 04, Kel. Karadenan, Kec. Cibinong</option>
                        <option value="Jl. Kenanga No. 21, RT 01/RW 03, Kel. Nanggewer, Kec. Cibinong">Jl. Kenanga No. 21, RT 01/RW 03, Kel. Nanggewer, Kec. Cibinong</option>
                        <option value="Jl. Anggrek No. 10, RT 05/RW 02, Kel. Pakansari, Kec. Cibinong">Jl. Anggrek No. 10, RT 05/RW 02, Kel. Pakansari, Kec. Cibinong</option>
                        <option value="Jl. Flamboyan No. 7, RT 04/RW 01, Kel. Harapan Jaya, Kec. Bekasi Utara">Jl. Flamboyan No. 7, RT 04/RW 01, Kel. Harapan Jaya, Kec. Bekasi Utara</option>
                        <option value="Jl. Cempaka No. 12, RT 03/RW 06, Kel. Sukahati, Kec. Cibinong">Jl. Cempaka No. 12, RT 03/RW 06, Kel. Sukahati, Kec. Cibinong</option>
                        <option value="Jl. Teratai No. 9, RT 01/RW 02, Kel. Pabuaran, Kec. Cibinong">Jl. Teratai No. 9, RT 01/RW 02, Kel. Pabuaran, Kec. Cibinong</option>
                        <option value="Jl. Bougenville No. 18, RT 05/RW 03, Kel. Tengah, Kec. Cibinong">Jl. Bougenville No. 18, RT 05/RW 03, Kel. Tengah, Kec. Cibinong</option>
                    </select>
                </div>

                    <div class="form-group">
                        <label>Status Anggota</label>
                        <select class="form-control" name="status_anggota" id="status_anggota" placeholder="status_anggota">
                            <option value="">-- Pilih Status --</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak Aktif">Tidak Aktif</option>
                            <option value="alumni">Alumni</option>
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