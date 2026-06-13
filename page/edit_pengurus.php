<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Informasi Pengurus</h1>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_GET['id'];
$edit = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tbl_pengurus WHERE id_pengurus='$id'"));

if(isset($_POST['tambah'])){
    $id_pengurus = $_POST['id_pengurus'];
    $nama_pengurus = $_POST['nama_pengurus'];
    $jabatan = $_POST['jabatan'];
    $periode = $_POST['periode'];
    $status_pengurus = $_POST['status_pengurus'];
    $nama_divisi = $_POST['nama_divisi'];
    
    $insert = mysqli_query($koneksi,"UPDATE tbl_pengurus SET nama_pengurus='$nama_pengurus', jabatan='$jabatan', periode='$periode', status_pengurus='$status_pengurus', nama_divisi='$nama_divisi' WHERE id_pengurus='$id_pengurus' ");
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
                            <label for="id_divisi">Kode Pengurus</label>
                            <input type="text" name="id_pengurus" value="<?= $edit['id_pengurus']; ?>" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama_pengurus">Nama Pengurus</label>
                            <input type="text" name="nama_pengurus" value="<?= $edit['nama_pengurus']; ?>" id="nama_pengurus" placeholder="Nama Pengurus" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="jabatan">jabatan</label>
                            <input type="text" name="jabatan" value="<?= $edit['jabatan']; ?>" id="jabatan" placeholder="jabataan" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="periode">Periode</label>
                            <input type="text" name="periode" value="<?= $edit['periode']; ?>" id="status" placeholder="Periode" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="status_pengurus">Status Pengurus</label>
                            <input type="text" name="status_pengurus" value="<?= $edit['status_pengurus']; ?>" id="status_pengurus" placeholder="Periode" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="nama_divisi">Nama Divisi</label>
                            <input type="text" name="nama_divisi" value="<?= $edit['nama_divisi']; ?>" id="nama_divisi" placeholder="Nama Divisi" class="form-control">
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