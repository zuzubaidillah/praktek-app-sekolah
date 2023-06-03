<?php
require_once "../koneksi.php";
require_once "Helper/function.php";
require_once "../Helper/function.php";

// ----versi 1
$id = htmlspecialchars($_GET['id'], ENT_QUOTES);
// validasi dengan data siswa
$dtSiswa = showSiswaWhereId($id);
if ($dtSiswa['total'] >= 1) {
    $message = "sekolah masih memiliki siswa";
    $resultMessage = str_replace(" ", "-", $message);
    header("Location: /sekolah/index.php?showDelete=on&message=$resultMessage");
    exit();
}
$resUpdate = deletePermanenSekolah($id);
// ----versi 1

if ($resUpdate['hasil'] == 1) {
    header("Location: /sekolah/index.php?showDelete=on&message=berhasil-di-hapus");
    exit();
}
header("Location: /sekolah/index.php?showDelete=on&message=gagal-di-hapus");
exit();