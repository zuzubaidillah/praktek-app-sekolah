<?php
require_once "../koneksi.php";
require_once "Helper/function.php";
$pesan = '';
if (isset($_GET['message'])) {
    $pesan = '<div class="alert alert-' . ($_GET['warna'] ?? "secondary") . ' alert-dismissible" role="alert">
    ' . $_GET['message'] . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
$head_title = "Tambah Sekolah";
$nav_label = "Proses Insert/Create/menambahkan/tambah data Sekolah";
$mnPage = "mnsekolah";
require_once "../part/header.php";
?>
<div class="container mt-5  pt-5">
    <?= $pesan; ?>
    <div class="d-flex justify-content-between pt-2">
        <h2 class="header-title">Isi Form</h2>
        <a class="nav-link" href="/sekolah/index.php">lihat data</a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="" action="/sekolah/proses_add.php" method="post">
                <div class="row">
                    <div class=" mb-3 col-md-6">
                        <label for="txtid" class="form-label">Id</label>
                        <input type="text" class="form-control" id="txtid" readonly name="txtid" placeholder="ID dibuat oleh sistem">
                        <div id="txtid" class="form-text">Diisi Oleh Sistem</div>
                    </div>
                    <div class=" mb-3 col-md-6">
                        <label for="txtnama" class="form-label">Nama Sekolah</label>
                        <input required type="text" class="form-control" id="txtnama" name="txtnama" placeholder="Masukan Nama">
                        <div id="txtnama" class="form-text">Harus diisi</div>
                    </div>
                    <div class=" mb-3 col-md-6">
                        <label for="txttelpon" class="form-label">Telpon</label>
                        <input required type="text" class="form-control" id="txttelpon" name="txttelpon" placeholder="Masukan Nomor Telpon">
                        <div id="txttelpon" class="form-text">Harus diisi</div>
                    </div>
                    <div class="mb-3 form-check col-md-4 d-flex align-items-center">
                        <input type="checkbox" class="form-check-input" id="is_delete">
                        <label class="form-check-label" for="is_delete">hilangkan data?</label>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="txtalamat" class="form-label">Alamat</label>
                        <textarea required type="date" class="form-control" id="txtalamat" name="txtalamat"></textarea>
                        <div id="txtalamat" class="form-text">Harus diisi</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?php
require_once "../part/footer.php";
?>