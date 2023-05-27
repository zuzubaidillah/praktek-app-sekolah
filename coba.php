<?php
$idDariUrl = 11;
$dtSiswa = [
    [
        'id' => 11,
        'idSekolah' => 3,
    ],
    [
        'id' => 12,
        'idSekolah' => 4,
    ],
];
$idSekolah = 3;
$dt = [
    [
        'id' => 1,
        'nama' => "Data 1",
    ],
    [
        'id' => 2,
        'nama' => "Data 2",
    ],
    [
        'id' => 3,
        'nama' => "Data 3",
    ],
    [
        'id' => 4,
        'nama' => "Data 4",
    ],
    [
        'id' => 5,
        'nama' => "Data 5",
    ],
];
$renderData = '';
foreach ($dt as $value) {
    $id = $value['id'];
    $nama = $value['nama'];
    // percabangan
    if ($id===$idSekolah) {
        $renderSelected = 'selected';
    }else{
        $renderSelected = '';
    }
    $renderData .= "<option $renderSelected value=\"$id\">$nama</option>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="proses_formulir.php" method="post">
        <input type="text" name="txtnd" placeholder="nama depan">
        <input type="text" name="txtnb" placeholder="nama belakang">
        <input type="date" name="txttgl" placeholder="tanggal">
        <input type="text" name="txtu" placeholder="username">
        <input type="password" name="txtp" placeholder="password">
        <button type="submit">Proses</button>
    </form>
</body>

</html>