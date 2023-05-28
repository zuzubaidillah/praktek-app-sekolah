<?php
require_once "koneksi.php";
require_once "Helper/function.php";

$id = htmlspecialchars($_POST['txtid'], ENT_QUOTES);
$txtnama = htmlspecialchars($_POST['txtnama'], ENT_QUOTES);
$txttelpon = htmlspecialchars($_POST['txttelpon'], ENT_QUOTES);
$txtalamat = htmlspecialchars($_POST['txtalamat'], ENT_QUOTES);

$resUpdate = updateSekolah($txtnama, $txttelpon, $txtalamat, $id);

if ($resUpdate['hasil'] == 1) {
    header("Location: index.php?message=berhasil-di-update");
    exit();
}
header("Location: update.php?id=$id&message=".$resUpdate['message']);
exit();