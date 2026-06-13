<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Data Panitia</h1>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_GET['id'];
$edit = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tbl_panitia WHERE id_panitia='$id'"));

if(isset($_POST['tambah'])){
    $id_panitia      = $_POST['id_panitia'];
    $nama_panitia    = $_POST['nama_panitia'];
    $nama_kegiatan   = $_POST['nama_kegiatan'];
    $jabatan_panitia = $_POST['jabatan_panitia'];

    $update = mysqli_query($koneksi,"UPDATE tbl_panitia SET
        nama_panitia='$nama_panitia',
        nama_kegiatan='$nama_kegiatan',
        jabatan_panitia='$jabatan_panitia'
        WHERE id_panitia='$id_panitia'
    ");

    if ($update) {
        echo '<div class="alert alert-success">
                Berhasil Disimpan
              </div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=panitia">';
    } else {
        echo '<div class="alert alert-danger">
                Gagal Disimpan '.mysqli_error($koneksi).'
              </div>';
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form method="POST">

                    <div class="form-group">
                        <label>ID Panitia</label>
                        <input type="text" name="id_panitia"
                               value="<?= $edit['id_panitia']; ?>"
                               class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Nama Panitia</label>
                        <select class="form-control" name="nama_panitia">
                            <option value="Yohanes" <?= ($edit['nama_panitia']=='Yohanes')?'selected':''; ?>>Yohanes</option>
                            <option value="Maria" <?= ($edit['nama_panitia']=='Maria')?'selected':''; ?>>Maria</option>
                            <option value="Antonius" <?= ($edit['nama_panitia']=='Antonius')?'selected':''; ?>>Antonius</option>
                            <option value="Fransiskus" <?= ($edit['nama_panitia']=='Fransiskus')?'selected':''; ?>>Fransiskus</option>
                            <option value="Agustinus" <?= ($edit['nama_panitia']=='Agustinus')?'selected':''; ?>>Agustinus</option>
                            <option value="Theresia" <?= ($edit['nama_panitia']=='Theresia')?'selected':''; ?>>Theresia</option>
                            <option value="Bernadeth" <?= ($edit['nama_panitia']=='Bernadeth')?'selected':''; ?>>Bernadeth</option>
                            <option value="Petrus" <?= ($edit['nama_panitia']=='Petrus')?'selected':''; ?>>Petrus</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <select class="form-control" name="nama_kegiatan">
                            <option value="Misa Mingguan" <?= ($edit['nama_kegiatan']=='Misa Mingguan')?'selected':''; ?>>Misa Mingguan</option>
                            <option value="Retret OMK" <?= ($edit['nama_kegiatan']=='Retret OMK')?'selected':''; ?>>Retret OMK</option>
                            <option value="Katekese" <?= ($edit['nama_kegiatan']=='Katekese')?'selected':''; ?>>Katekese</option>
                            <option value="Bakti Sosial" <?= ($edit['nama_kegiatan']=='Bakti Sosial')?'selected':''; ?>>Bakti Sosial</option>
                            <option value="Doa Lingkungan" <?= ($edit['nama_kegiatan']=='Doa Lingkungan')?'selected':''; ?>>Doa Lingkungan</option>
                            <option value="Latihan Koor" <?= ($edit['nama_kegiatan']=='Latihan Koor')?'selected':''; ?>>Latihan Koor</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jabatan Panitia</label>
                        <select class="form-control" name="jabatan_panitia">
                            <option value="Ketua" <?= ($edit['jabatan_panitia']=='Ketua')?'selected':''; ?>>Ketua</option>
                            <option value="Wakil Ketua" <?= ($edit['jabatan_panitia']=='Wakil Ketua')?'selected':''; ?>>Wakil Ketua</option>
                            <option value="Sekretaris" <?= ($edit['jabatan_panitia']=='Sekretaris')?'selected':''; ?>>Sekretaris</option>
                            <option value="Bendahara" <?= ($edit['jabatan_panitia']=='Bendahara')?'selected':''; ?>>Bendahara</option>
                            <option value="Koordinator" <?= ($edit['jabatan_panitia']=='Koordinator')?'selected':''; ?>>Koordinator</option>
                            <option value="Anggota" <?= ($edit['jabatan_panitia']=='Anggota')?'selected':''; ?>>Anggota</option>
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