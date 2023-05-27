<?php
require_once "koneksi.php";
require_once "Helper/function.php";
$id = htmlspecialchars($_GET['id'], ENT_QUOTES);
$txtsekolah = htmlspecialchars($_POST['txtsekolah'], ENT_QUOTES);
$txtnama = htmlspecialchars($_POST['txtnama'], ENT_QUOTES);
$txtnis = htmlspecialchars($_POST['txtnis'], ENT_QUOTES);
$txttanggal = htmlspecialchars($_POST['txttanggal'], ENT_QUOTES);

$resUpdate = updateSiswa($txtsekolah, $txtnama, $txtnis, $txttanggal, $id);

if ($resUpdate['hasil'] == 1) {
    header("Location: index.php?message=berhasil-di-update");
    exit();
}
header("Location: update.php?id=$id&message=gagal-di-update");
exit();