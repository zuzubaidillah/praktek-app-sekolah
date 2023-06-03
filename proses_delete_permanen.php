<?php
require_once "koneksi.php";
require_once "Helper/function.php";

// ----versi 1
$id = htmlspecialchars($_GET['id'], ENT_QUOTES);

$resUpdate = deletePermanenSiswa($id);
$urlShowDelete = (isset($_GET['showDelete']) ? "&showDelete=on" : "");
// ----versi 1
if ($resUpdate['hasil'] == 1) {
    header("Location: index.php?message=berhasil-di-hapus$urlShowDelete");
    exit();
}
header("Location: index.php?message=gagal-di-hapus$urlShowDelete");
exit();