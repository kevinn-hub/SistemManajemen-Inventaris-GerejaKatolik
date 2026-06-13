<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Anggota</h1>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "DELETE FROM tbl_anggota where id_anggota = '$id' ");
        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
            Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=anggota">';
        }
    }
}
?>
<div class="content">
    <div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?page=tambah_anggota" class="btn btn-primary btn-sm">
                Tambah Anggota</a>
            <table class="table table-striped">
                <tread>
                    <tr>
                        <th>NO</th>
                        <th>ID ANGGOTA</th>
                        <th>NAMA ANGGOTA</th>
                        <th>NPM</th>
                        <th>FAKULTAS</th>
                        <th>PRODI</th>
                        <th>ANGKATAN</th>
                        <th>NO HP</th>
                        <th>ALAMAT</th>
                        <th>STATUS ANGGOTA</th>
                        <th>Aksi</th>
                    </tr>
                </tread>
                <?php
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM tbl_anggota");
                while ($result = mysqli_fetch_array($query)) {
                    $no++
                ?>
                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $result['id_anggota']; ?></td>
                        <td><?= $result['nama_anggota']; ?></td>
                        <td><?= $result['npm']; ?></td>
                        <td><?= $result['fakultas']; ?></td>
                        <td><?= $result['prodi']; ?></td>
                        <td><?= $result['angkatan']; ?></td>
                        <td><?= $result['no_hp']; ?></td>
                        <td><?= $result['alamat']; ?></td>
                        <td><?= $result['status_anggota']; ?></td>
                        <td>
                            <a href="index.php?page=anggota&action=hapus&id=<?= $result['id_anggota'] ?>" title="">
                                <span class="badge badge-danger">Hapus</span>
                            </a>
                            <a href="index.php?page=edit_anggota&id=<?= $result['id_anggota'] ?>" title="">
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