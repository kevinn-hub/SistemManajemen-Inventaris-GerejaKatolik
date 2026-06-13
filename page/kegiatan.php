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
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "DELETE FROM tbl_kegiatan where id_kegiatan = '$id' ");
        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
            Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=kegiatan">';
        }
    }
}
?>
<div class="content">
    <div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?page=tambah_kegiatan" class="btn btn-primary btn-sm">
                Tambah Kegiatan</a>
            <table class="table table-striped">
                <tread>
                    <tr>
                        <th>NO</th>
                        <th>ID KEGIATAN</th>
                        <th>NAMA KEGIATAN</th>
                        <th>DESKRIPSI</th>
                        <th>TANGGAL KEGIATAN</th>
                        <th>LOKASI</th>
                        <th>KUOTA PESERTA</th>
                        <th>STATUS KEGIATAN</th>
                        <th>Aksi</th>
                    </tr>
                </tread>
                <?php
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM tbl_kegiatan");
                while ($result = mysqli_fetch_array($query)) {
                    $no++
                ?>
                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $result['id_kegiatan']; ?></td>
                        <td><?= $result['nama_kegiatan']; ?></td>
                        <td><?= $result['deskripsi']; ?></td>
                        <td><?= $result['tanggal_kegiatan']; ?></td>
                        <td><?= $result['lokasi']; ?></td>
                        <td><?= $result['kuota_peserta']; ?></td>
                        <td><?= $result['status_kegiatan']; ?></td>
                        <td>
                            <a href="index.php?page=kegiatan&action=hapus&id=<?= $result['id_kegiatan'] ?>" title="">
                                <span class="badge badge-danger">Hapus</span>
                            </a>
                            <a href="index.php?page=edit_kegiatan&id=<?= $result['id_kegiatan'] ?>" title="">
                                <span class="badge badge-warning">Edit</span>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>