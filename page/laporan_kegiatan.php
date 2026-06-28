<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Laporan Kegiatan</h1>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "DELETE FROM tbl_laporan where id_laporan = '$id' ");
        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
            Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=laporan_kegiatan">';
        }
    }
}
?>
<div class="content">
    <div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="index.php?page=tambah_laporan" class="btn btn-primary btn-sm">
                Tambah Laporan Kegiatan</a>

                <a href="page/cetak_laporan_kegiatan.php" target="_blank" class="btn btn-success btn-sm">
                Cetak Laporan</a>
            <table class="table table-striped">
                <tread>
                    <tr>
                        <th>NO</th>
                        <th>ID LAPORAN</th>
                        <th>NAMA KEGIATAN</th>
                        <th>TANGGAL LAPORAN</th>
                        <th>KETERANGAN</th>
                        <th>ID KEGIATAN</th>
                        <th>Aksi</th>
                    </tr>
                </tread>
                <?php
                $no = 0;
                $query = mysqli_query($koneksi,"SELECT *
                FROM tbl_laporan
                INNER JOIN tbl_kegiatan
                ON tbl_laporan.id_kegiatan = tbl_kegiatan.id_kegiatan
                ");
                while ($result = mysqli_fetch_array($query)) {
                    $no++
                ?>
                <tbody>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $result['id_laporan']; ?></td>
                        <td><?= $result['nama_kegiatan']; ?></td>
                        <td><?= $result['tanggal_laporan']; ?></td>
                        <td><?= $result['keterangan']; ?></td>
                        <td><?= $result['id_kegiatan']; ?></td>
                        
                        <td>
                        <a href="index.php?page=laporan_kegiatan&action=hapus&id=<?= $result['id_laporan'] ?>">
                            <span class="badge badge-danger">Hapus</span>
                        </a>

                        <a href="index.php?page=edit_laporan&id=<?= $result['id_laporan'] ?>">
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