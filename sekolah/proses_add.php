<?php
require_once "koneksi.php";
require_once "Helper/function.php";

// ----versi 1
$txttelpon = htmlspecialchars($_POST['txttelpon'], ENT_QUOTES);
$txtnama = htmlspecialchars($_POST['txtnama'], ENT_QUOTES);
$txtalamat = htmlspecialchars($_POST['txtalamat'], ENT_QUOTES);

$txtisdelete = 0;
if (isset($_POST['txtis_delete'])) {
    $txtisdelete = 1;
}
// ----versi 1
$resAdd = addSekolah($txtnama, $txttelpon, $txtalamat, $txtisdelete);

if ($resAdd['hasil'] == 1) {
    header("Location: /sekolah/index.php?message=$resAdd[message]&warna=success");
    exit();
}
header("Location: /sekolah/add.php?message=$resAdd[message]&warna=danger");
exit();