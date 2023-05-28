<?php
require_once "koneksi.php";
require_once "Helper/function.php";

// ----versi 1
$id = htmlspecialchars($_GET['id'], ENT_QUOTES);

$resUpdate = deleteSekolah($id,'tarik');
// ----versi 1

if ($resUpdate['hasil'] == 1) {
    header("Location: index.php?message=berhasil-di-tarik");
    exit();
}
header("Location: index.php?message=gagal-di-tarik");
exit();