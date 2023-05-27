<?php
require_once "koneksi.php";
require_once "Helper/function.php";

// kita ambil ID yang dikirim
$id = htmlspecialchars($_GET["id"], ENT_QUOTES);
// mengambil data sesuai ID dengan melalui function yang memiliki arguments 1 yaitu $id, ini seperti kita mengirimkan ID ke blok function tersebut
$getSiswa = showSiswaSesuaiId($id);
if ($getSiswa['total'] == 0) {
    header('Location: index.php');
    exit();
}
$idSekolah = $getSiswa['siswa']['id'];
$namaSiswa = $getSiswa['siswa']['nama'];
$nis = $getSiswa['siswa']['nis'];
$tgl = $getSiswa['siswa']['tgl_lahir'];
$dtSekolah = [
    [
        "id" => 3,
        "nama" => "SMA 01 Malang",
    ],
    [
        "id" => 4,
        "nama" => "SMP 01 Jombang",
    ],
];
$hasilSekolah = '';
foreach ($dtSekolah as $value) {
    $selId = $value['id'];
    $selNama = $value['nama'];
    $selected = 'selected';
    if ($idSekolah == $selId) {
        $selected = 'selected';
    }

    $hasilSekolah .= "<option $selected value=\"$selId\">$selNama</option>";
}
$head_title = "Update Siswa - APP Pendidikan";
$nav_label = "Proses Update/merubah data siswa";
require_once "part/header.php";
?>

<div class="container mt-5  pt-5">

    <div class="d-flex justify-content-between pt-2">
        <h2 class="header-title">Isi Form</h2>
        <a class="nav-link" href="/index.php">lihat data</a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="" action="/proses_update.php?id=<?= $id; ?>" method="post">
                <div class="mb-3">
                    <label for="txtsekolah" class="form-label">Pilih Sekolah</label>
                    <select type="text" class="form-control" id="txtsekolah" name="txtsekolah" required>
                        <option value="">--pilih sekolah--</option>
                        <?= $hasilSekolah; ?>
                    </select>
                    <div class="form-text">Harus diisi</div>
                </div>
                <div class="mb-3">
                    <label for="txtnama" class="form-label">Nama Siswa</label>
                    <input value="<?= $namaSiswa; ?>" type="text" class="form-control" id="txtnama" name="txtnama" placeholder="Masukan Nama Siswa" required>
                    <div class="form-text">Harus diisi</div>
                </div>
                <div class="mb-3">
                    <label for="txtnis" class="form-label">NIS</label>
                    <input value="<?= $nis; ?>" type="text" class="form-control" id="txtnis" name="txtnis" placeholder="Masukan NIS" required>
                    <div class="form-text">Harus diisi</div>
                </div>
                <div class="mb-3">
                    <label for="txttanggal" class="form-label">Tanggal Lahir</label>
                    <input value="<?= $tgl; ?>" type="date" class="form-control" id="txttanggal" name="txttanggal" required>
                    <div class="form-text">Harus diisi</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
require_once "part/footer.php";
?>