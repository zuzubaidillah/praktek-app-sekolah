<?php
require_once "koneksi.php";
require_once "Helper/function.php";

// ----versi 1
$txtsekolah = htmlspecialchars($_POST['txtsekolah'], ENT_QUOTES);
$txtnama = htmlspecialchars($_POST['txtnama'], ENT_QUOTES);
$txtnis = htmlspecialchars($_POST['txtnis'], ENT_QUOTES);
$txttanggal = htmlspecialchars($_POST['txttanggal'], ENT_QUOTES);

$txtisdelete = 0;
if (isset($_POST['txtis_delete'])) {
    $txtisdelete = 1;
}
$resAdd = addSiswa($txtsekolah, $txtnama, $txtnis, $txttanggal, $txtisdelete);
// ----versi 1

// ----versi 2
// $resAdd = addSiswaVersi2();
// ----versi 2

if ($resAdd['hasil'] == 1) {
    header("Location: index.php?message=berhasil-di-simpan");
    exit();
}
header("Location: add.php?message=gagal-di-simpan");
exit();