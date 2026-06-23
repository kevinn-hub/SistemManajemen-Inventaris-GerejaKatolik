<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Informasi Anggota</h1>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_GET['id'];
$edit = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tbl_anggota WHERE id_anggota='$id'"));

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
    
    $insert = mysqli_query($koneksi,"UPDATE tbl_anggota SET nama_anggota='$nama_anggota', npm='$npm', fakultas='$fakultas', prodi='$prodi', angkatan='$angkatan', no_hp='$no_hp', alamat='$alamat', status_anggota='$status_anggota', Id_user='$Id_user' WHERE id_anggota='$id_anggota' ");
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
                            <label for="id_anggota">Kode Anggota</label>
                            <input type="int" name="id_anggota" value="<?= $edit['id_anggota']; ?>" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama_anggota">Nama Anggota</label>
                            <input type="text" name="nama_anggota" value="<?= $edit['nama_anggota']; ?>" id="nama_anggota" placeholder="Nama Anggota" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>User Anggota</label>
                            <select name="Id_user" class="form-control">
                                <?php
                                $user = mysqli_query($koneksi,"SELECT * FROM tbl_users WHERE Role='anggota'");
                                while($u = mysqli_fetch_array($user)){
                                ?>
                                <option value="<?= $u['Id_user']; ?>"
                                    <?= ($edit['Id_user'] == $u['Id_user']) ? 'selected' : ''; ?>>
                                    <?= $u['Username']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="npm">npm</label>
                            <input type="text" name="npm" value="<?= $edit['npm']; ?>" id="npm" placeholder="npm" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="fakultas">Fakultas</label>
                            <input type="text" name="fakultas" value="<?= $edit['fakultas']; ?>" id="fakultas" placeholder="Fakultas" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="prodi">prodi</label>
                            <input type="text" name="prodi" value="<?= $edit['prodi']; ?>" id="prodi" placeholder="prodi" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="fakultas">Fakultas</label>
                            <input type="text" name="fakultas" value="<?= $edit['fakultas']; ?>" id="fakultas" placeholder="Fakultas" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="angkatan">Angkatan</label>
                            <input type="text" name="angkatan" value="<?= $edit['angkatan']; ?>" id="angkatan" placeholder="Angakatan" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No Hp</label>
                            <input type="text" name="no_hp" value="<?= $edit['no_hp']; ?>" id="no_hp" placeholder="No Hp" class="form-control">
                        </div>

                         <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" value="<?= $edit['alamat']; ?>" id="alamat" placeholder="Alamat" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="status_anggota">Status Anggota</label>
                            <input type="text" name="status_anggota" value="<?= $edit['status_anggota']; ?>" id="status_anggota" placeholder="status_anggota" class="form-control">
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