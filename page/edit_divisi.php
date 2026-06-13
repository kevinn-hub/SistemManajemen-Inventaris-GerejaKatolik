<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Informasi Divisi</h1>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_GET['id'];
$edit = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tbl_divisi WHERE id_divisi='$id'"));

if(isset($_POST['tambah'])){
    $id_divisi = $_POST['id_divisi'];
    $nama_divisi = $_POST['nama_divisi'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $status = $_POST['status'];
    $keterangan = $_POST['keterangan'];
    
    $insert = mysqli_query($koneksi,"UPDATE tbl_divisi SET nama_divisi='$nama_divisi' WHERE id_divisi='$id_divisi' ");
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

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-body p-2">
                    <form method="POST" action="">
                        
                        <div class="form-group">
                            <label for="id_divisi">Kode Divisi</label>
                            <input type="text" name="id_divisi" value="<?= $edit['id_divisi']; ?>" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama_divisi">Nama Divisi</label>
                            <input type="text" name="nama_divisi" value="<?= $edit['nama_divisi']; ?>" id="nama_divisi" placeholder="Nama Divisi" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="penanggung_jawab">penanggung Jawab</label>
                            <input type="text" name="penanggung_jawab" value="<?= $edit['penanggung_jawab']; ?>" id="penanggung_jawab" placeholder="penanggung Jawab" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" name="status" value="<?= $edit['status']; ?>" id="status" placeholder="Status" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" value="<?= $edit['keterangan']; ?>" id="keterangan" placeholder="Keterangan" class="form-control">
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