<?php
require_once "koneksi.php";
require_once "Helper/function.php";

// ----versi 1
$id = htmlspecialchars($_GET['id'], ENT_QUOTES);

$resUpdate = deleteSiswa($id,'tarik');
// ----versi 1
$urlShowDelete = (isset($_GET['showDelete']) ? "&showDelete=on" : "");
if ($resUpdate['hasil'] == 1) {
    header("Location: index.php?message=berhasil-di-tarik$urlShowDelete");
    exit();
}
header("Location: index.php?message=gagal-di-tarik$urlShowDelete");
exit();