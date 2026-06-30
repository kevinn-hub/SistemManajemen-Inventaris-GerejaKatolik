    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Panitia</h1>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "hapus") {
            $id = $_GET['id'];
            $query = mysqli_query($koneksi, "DELETE FROM tbl_panitia where id_panitia = '$id' ");
            if ($query) {
                echo '
                <div class="alert alert-warning alert-dismissible">
                Berhasil Di Hapus</div>';
                echo '<meta http-equiv="refresh" content="1;url=index.php?page=panitia">';
            }
        }
    }
    ?>
    <div class="content">
        <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_panitia" class="btn btn-primary btn-sm">
                    Tambah Panitia</a>
                <table class="table table-striped">
                    <tread>
                            <th>NO</th>
                            <th>ID PANITIA</th>
                            <th>NAMA PANITIA</th>
                            <th>NAMA KEGIATAN</th>
                            <th>JABATAN PANITIA</th>
                            <th>ID PENGURUS</th>
                            <th>ID KEGIATAN</th>
                            <?php if($_SESSION['Role']=="admin"){ ?>
                            <th>Aksi</th>
                            <?php } ?>
                    </tread>
                    <?php
                    $no = 0;
                    $query = mysqli_query($koneksi, "SELECT *
                    FROM tbl_panitia
                    INNER JOIN tbl_pengurus
                    ON tbl_panitia.id_pengurus = tbl_pengurus.id_pengurus
                    INNER JOIN tbl_kegiatan
                    ON tbl_panitia.id_kegiatan = tbl_kegiatan.id_kegiatan");
                    while ($result = mysqli_fetch_array($query)) {
                        $no++
                    ?>
                    <tbody>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $result['id_panitia']; ?></td>
                            <td><?= $result['nama_panitia']; ?></td>
                            <td><?= $result['nama_kegiatan']; ?></td>
                            <td><?= $result['jabatan_panitia']; ?></td>
                            <td><?= $result['id_pengurus']; ?></td>
                            <td><?= $result['id_kegiatan']; ?></td>
                            <td>
                                <?php if($_SESSION['Role']=="admin"){ ?>
                                <a href="index.php?page=panitia&action=hapus&id=<?= $result['id_panitia'] ?>" title="">
                                    <span class="badge badge-danger">Hapus</span>
                                </a>
                                <a href="index.php?page=edit_panitia&id=<?= $result['id_panitia'] ?>" title="">
                                    <span class="badge badge-warning">Edit</span>
                                </a>
                                 <?php } ?>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>