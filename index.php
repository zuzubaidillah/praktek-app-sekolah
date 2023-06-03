<?php
require_once 'koneksi.php';
require_once 'Helper/function.php';
// $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (isset($_GET['showDelete'])) {
    $isDel = 1;
} else {
    $isDel = 0;
}
$getSiswa = showSiswa($isDel);

$pesan = '';
if (isset($_GET['message'])) {
    $pesan = '<div class="alert alert-secondary alert-dismissible" role="alert">
    ' . $_GET['message'] . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
$head_title = "Data Siswa - APP Pendidikan";
$nav_label = "Proses Read/mengambil data siswa";
$mnPage = "mnsiswa";
require_once "part/header.php";
?>
<div class="container mt-5  pt-5">

    <?= $pesan; ?>

    <div class="d-flex justify-content-between pt-2">
        <h2 class="header-title">Data Siswa</h2>
        <a href="add.php" class="link-header">Tambah Data</a>
        <form action="" class="d-flex form-horizontal " method="get">
            <div class="form-check align-self-center pe-2">
                <input <?= ($isDel == 1 ? "checked" : ""); ?> type="checkbox" class="form-check-input" id="showDelete" name="showDelete">
                <label class="form-check-label" for="showDelete">show data delete</label>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">tampilkan</button>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id</th>
                <th scope="col">Nama dan NIS</th>
                <th scope="col">Tgl Lahir</th>
                <th scope="col">Sekolah</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($getSiswa['total'] >= 1) {
                $noUrut = 0;
                foreach ($getSiswa['siswa'] as $value) {
                    // deklarasi variable
                    $nam = $value['nama'];
                    $nas = $value['namaSekolah'];
                    $id = $value['id'];
                    $nis = $value['nis'];
                    $tgl = $value['tgl_lahir'];
                    $id_sekolah = $value['id_sekolah'];
                    $isDelete = $value['is_delete'];
            ?>
                    <tr>
                        <th scope="row"><?= ++$noUrut; ?></th>
                        <td><?= $id; ?></td>
                        <td><b><?= $nam; ?></b> <br> <?= $nis; ?></td>
                        <td><?= $tgl; ?></td>
                        <td><?= $nas; ?></td>
                        <td>
                            <div class="btn-group btn-sm" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                    Aksi
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <?php if ($isDelete == 0) { ?>
                                        <li><a class="dropdown-item" href="/update.php?id=<?= $id; ?>">Edit</a></li>
                                        <li><a class="dropdown-item" href="/proses_delete.php?id=<?= $id; ?>" onclick="return confirm('Yakin hapus data? data akan mengalami perubahan status saja tanpa menghilangkan data')">Hapus</a></li>
                                    <?php } else { ?>
                                        <li><a class="dropdown-item" href="/proses_tarik.php?id=<?= $id; ?>" onclick="return confirm('Yakin kembalikan data? data akan mengalami perubahan status saja tanpa menghilangkan data')">Kemalikan Data</a></li>
                                        <li><a class="dropdown-item" href="/proses_delete_permanen.php?id=<?= $id; ?>" onclick="return confirm('Yakin hapus permanen? data akan mengalami  hilang pada database')">Hapus Permanen</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </td>
                    </tr>
            <?php
                }
            }else{
                echo "<tr><td colspan='6' class='text-center'><h1>Data Kosong</h1></td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
    <!--<script>
        let mn = document.getElementById('mnsiswa');
        mn.classList.add('active');
    </script>-->

<?php
require_once "part/footer.php";
?>