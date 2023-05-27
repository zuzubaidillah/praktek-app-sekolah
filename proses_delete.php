<?php
require_once "koneksi.php";
require_once "Helper/function.php";

// ----versi 1
$id = htmlspecialchars($_GET['id'], ENT_QUOTES);

$resUpdate = deleteSiswa($id,'hapus sementara');
// ----versi 1

if ($resUpdate['hasil'] == 1) {
    header("Location: index.php?message=berhasil-di-hapus");
    exit();
}
header("Location: index.php?message=gagal-di-hapus");
exit();