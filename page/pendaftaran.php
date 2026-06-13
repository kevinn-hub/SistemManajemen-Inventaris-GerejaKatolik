<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Pendaftaran</h1>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "DELETE FROM tbl_pendaftaran where id_daftar = '$id' ");
        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
            Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=pendaftaran">';
        }
    }
}
?>
<div class="content">
    <div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?page=tambah_pendaftaran" class="btn btn-primary btn-sm">
                Tambah Pendaftaran</a>
            <table class="table table-striped">
                <tread>
                    <tr>
                        <th>NO</th>
                        <th>ID DAFTAR</th>
                        <th>NAMA PENDAFTARAN</th>
                        <th>NAMA KEGIATAN</th>
                        <th>TANGGAL DAFTAR</th>
                        <th>STATUS</th>
                        <th>Aksi</th>
                    </tr>
                </tread>
                <?php
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM tbl_pendaftaran");
                while ($result = mysqli_fetch_array($query)) {
                    $no++
                ?>
                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $result['id_daftar']; ?></td>
                        <td><?= $result['nama_pendaftar']; ?></td>
                        <td><?= $result['nama_kegiatan']; ?></td>
                        <td><?= $result['tanggal_daftar']; ?></td>
                        <td><?= $result['status']; ?></td>
                        <td>
                            <a href="index.php?page=pendaftaran&action=hapus&id=<?= $result['id_daftar'] ?>" title="">
                                <span class="badge badge-danger">Hapus</span>
                            </a>
                            <a href="index.php?page=edit_pendaftaran&id=<?= $result['id_daftar'] ?>" title="">
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