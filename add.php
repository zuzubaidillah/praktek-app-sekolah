<?php
require_once "koneksi.php";
require_once "Helper/function.php";
$head_title = "Add Siswa - APP Pendidikan";
$nav_label = "Proses Create/menambahkan data siswa";
require_once "part/header.php";
$dtSekolah = showSekolah();

$renderOptionSekolah = "";
if ($dtSekolah['total']>=1) {
    foreach ($dtSekolah['sekolah'] as $v) {
        $idSek = $v['id'];
        $naSek = $v['nama'];
        $renderOptionSekolah .= "<option value=\"$idSek\">$naSek</option>";
    }
}
?>

<div class="container mt-5  pt-5">

    <div class="d-flex justify-content-between pt-2">
        <h2 class="header-title">Isi Form</h2>
        <a class="nav-link" href="/index.php">lihat data</a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="" action="/proses_add.php" method="post">
                <div class="mb-3">
                    <label for="txtsekolah" class="form-label">Pilih Sekolah</label>
                    <select type="text" class="form-control" id="txtsekolah" name="txtsekolah" required>
                        <option value="">--pilih sekolah--</option>
                        <?=$renderOptionSekolah?>
                    </select>
                    <div class="form-text">Harus diisi</div>
                </div>
                <div class="mb-3">
                    <label for="txtnama" class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" id="txtnama" name="txtnama" placeholder="Masukan Nama Siswa" required>
                    <div class="form-text">Harus diisi</div>
                </div>
                <div class="mb-3">
                    <label for="txtnis" class="form-label">NIS</label>
                    <input type="text" class="form-control" id="txtnis" name="txtnis" placeholder="Masukan NIS" required>
                    <div class="form-text">Harus diisi</div>
                </div>
                <div class="mb-3">
                    <label for="txttanggal" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="txttanggal" name="txttanggal" required>
                    <div class="form-text">Harus diisi</div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_delete" name="txtis_delete" value="dicentang">
                    <label class="form-check-label" for="is_delete">hilangkan data?</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
require_once "part/footer.php";
?>