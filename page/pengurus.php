<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Pengurus</h1>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "DELETE FROM tbl_pengurus where id_pengurus = '$id' ");
        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
            Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=pengurus">';
        }
    }
}
?>
<div class="content">
    <div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?page=tambah_pengurus" class="btn btn-primary btn-sm">
                Tambah Pengurus</a>
            <table class="table table-striped">
                <tread>
                    <tr>
                        <th>NO</th>
                        <th>ID PENGURUS</th>
                        <th>NAMA PENGURUS</th>
                        <th>JABATAN</th>
                        <th>PERIODE</th>
                        <th>STATUS PENGURUS</th>
                        <th>ID DIVISI</th>
                        <th>ID USER</th>
                        <th>Aksi</th>
                    </tr>
                </tread>
                <?php
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT *
                FROM tbl_pengurus
                INNER JOIN tbl_divisi
                ON tbl_pengurus.id_divisi = tbl_divisi.id_divisi
                INNER JOIN tbl_users
                ON tbl_pengurus.id_user = tbl_users.Id_user");
                while ($result = mysqli_fetch_array($query)) {
                    $no++
                ?>
                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $result['id_pengurus']; ?></td>
                        <td><?= $result['nama_pengurus']; ?></td>
                        <td><?= $result['jabatan']; ?></td>
                        <td><?= $result['periode']; ?></td>
                        <td><?= $result['status_pengurus']; ?></td>
                        <td><?= $result['id_divisi']; ?></td>
                        <td><?= $result['id_user']; ?></td>
                        <td>
                            <a href="index.php?page=pengurus&action=hapus&id=<?= $result['id_pengurus'] ?>" title="">
                                <span class="badge badge-danger">Hapus</span>
                            </a>
                            <a href="index.php?page=edit_pengurus&id=<?= $result['id_pengurus'] ?>" title="">
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