<?php
require_once "../koneksi.php";
require_once "Helper/function.php";
$id = htmlspecialchars($_GET['id'], ENT_QUOTES);
$getSekolah = showSekolahSesuaiId($id);
if ($getSekolah['jml'] == 0) {
    header('Location: index.php?message=maaf-id-tidak-di-temukan');
    exit();
}
$getId = $getSekolah['dtSekolah'][0]['id'];
$getNama = $getSekolah['dtSekolah'][0]['nama'];
$getTelpon = $getSekolah['dtSekolah'][0]['telpon'];
$getAlamat = $getSekolah['dtSekolah'][0]['alamat'];

$pesan = '';
if (isset($_GET['message'])) {
    $pesan = '<div class="alert alert-' . ($_GET['warna'] ?? "secondary") . ' alert-dismissible" role="alert">
    ' . $_GET['message'] . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
$head_title = "Update Sekolah";
$nav_label = "Proses Update/merubah data Sekolah";
require_once "../part/header.php";
?>
    <div class="container mt-5  pt-5">
        <?= $pesan; ?>
        <div class="d-flex justify-content-between pt-2">
            <h2 class="header-title">Isi Form</h2>
            <a class="nav-link" href="/index.php">lihat data</a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form class="" action="/sekolah/proses_update.php?id=<?= $id ?>" method="post">
                    <div class="row">
                        <div class=" mb-3 col-md-6">
                            <label for="txtid" class="form-label">Id</label>
                            <input type="text" class="form-control" id="txtid" readonly name="txtid"
                                   placeholder="ID dibuat oleh sistem" value="<?= $getId ?>">
                            <div id="txtid" class="form-text">Diisi Oleh Sistem</div>
                        </div>
                        <div class=" mb-3 col-md-6">
                            <label for="txtnama" class="form-label">Nama Sekolah</label>
                            <input value="<?= $getNama ?>" required type="text" class="form-control" id="txtnama"
                                   name="txtnama" placeholder="Masukan Nama">
                            <div id="txtnama" class="form-text">Harus diisi</div>
                        </div>
                        <div class=" mb-3 col-md-6">
                            <label for="txttelpon" class="form-label">Telpon</label>
                            <input value="<?= $getTelpon ?>" required type="text" class="form-control" id="txttelpon"
                                   name="txttelpon" placeholder="Masukan Nomor Telpon">
                            <div id="txttelpon" class="form-text">Harus diisi</div>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="txtalamat" class="form-label">Alamat</label>
                            <textarea required type="date" class="form-control" id="txtalamat"
                                      name="txtalamat"><?= $getAlamat ?></textarea>
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