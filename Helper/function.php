<?php

function showSiswa($isDelete): array
{
    global $conn;
    $sql = "SELECT
        siswa.*, sekolah.nama AS namaSekolah
    FROM siswa
        INNER JOIN sekolah 
        ON siswa.id_sekolah=sekolah.id 
    WHERE siswa.is_delete='$isDelete' ORDER BY siswa.nama DESC";

    $query = mysqli_query($conn, $sql);
    $dtSiswa = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $jmlData = mysqli_num_rows($query);

    return [
        "siswa" => $dtSiswa,
        "total" => $jmlData,
    ];
}

function addSiswa($sekolah, $nama, $nis, $tanggal, $isDelete=0): array
{
    global $conn;
    $idSiswa = mt_rand(1, 1000);
    $sql = "INSERT INTO siswa (id, id_sekolah, nama, nis, tgl_lahir, is_delete)
    VALUES('$idSiswa', '$sekolah', '$nama', '$nis', '$tanggal', '$isDelete')";

    mysqli_query($conn, $sql);
    $hasil = mysqli_affected_rows($conn);

    return [
        "hasil" => $hasil,
    ];
}

function showSiswaSesuaiId($id): array
{
    global $conn;
    $sql = "SELECT * FROM siswa WHERE id='$id' AND is_delete='0'";

    $query = mysqli_query($conn, $sql);
    // $dtSiswa = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $dtSiswa = mysqli_fetch_assoc($query);
    // $jmlData = sizeof($dtSiswa);
    $jmlData = mysqli_num_rows($query);

    return [
        "siswa" => $dtSiswa,
        "total" => $jmlData,
    ];
}

function updateSiswa($sekolah, $nama, $nis, $tanggal, $id): array
{
    global $conn;

    $sql = "UPDATE siswa 
    SET id_sekolah='$sekolah', nama='$nama', nis='$nis', tgl_lahir='$tanggal'
    WHERE id='$id'";

    mysqli_query($conn, $sql);
    $hasil = mysqli_affected_rows($conn);

    return [
        "hasil" => $hasil,
    ];
}

function deleteSiswa($idSiswa, $jenis): array
{
    global $conn;
    if($jenis == 'tarik'){
        $hasilIsDelete = 0;
    }else{
        $hasilIsDelete = 1;
    }
    $sql = "UPDATE siswa SET is_delete='$hasilIsDelete' WHERE id='$idSiswa'";
    mysqli_query($conn, $sql);
    $hasil = mysqli_affected_rows($conn);
    return ["hasil" => $hasil];
}

function deletePermanenSiswa($idSiswa): array
{
    global $conn;
    $sql = "DELETE FROM siswa WHERE id='$idSiswa'";
    mysqli_query($conn, $sql);
    $hasil = mysqli_affected_rows($conn);
    return ["hasil" => $hasil];
}