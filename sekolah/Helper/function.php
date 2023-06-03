<?php

function showSekolah2(): array
{
    global $conn;
    // deteksi request get
    if (isset($_GET['showDelete'])) {
        $sql = "SELECT sek.*, (select count(*) from siswa AS sis where sis.id_sekolah=sek.id) memiliki_siswa FROM sekolah AS sek WHERE sek.is_delete='1' ORDER BY sek.nama ASC";
        $isDelete  = true;
    } else {
        $sql = "SELECT sek.*, (select count(*) from siswa AS sis where sis.id_sekolah=sek.id) memiliki_siswa FROM sekolah AS sek WHERE sek.is_delete='0' ORDER BY sek.nama ASC";
        $isDelete  = false;
    }

    $query = mysqli_query($conn, $sql);
    $dtSekolah = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $jmlData = mysqli_num_rows($query);

    return [
        "sekolah" => $dtSekolah,
        "total" => $jmlData,
        "isDelete" => $isDelete,
    ];
}

function addSekolah($nama, $telpon, $alamat, $isDelete)
{
    try {
        global $conn;
        $idSekolah = mt_rand(1, 1000);
        $sql = "INSERT INTO sekolah (id, nama, telpon, alamat, is_delete)
        VALUES('$idSekolah', '$nama', '$telpon', '$alamat', '$isDelete')";


        mysqli_query($conn, $sql);
        $hasil = mysqli_affected_rows($conn);

        return [
            "hasil" => $hasil,
            "message" => "Berhasil-ditambahkan",
        ];
    } catch (\Throwable $th) {
        return [
            "hasil" => $hasil,
            "message" => mysqli_error($conn),
        ];
    }
}

function showSekolahSesuaiId($id)
{
    try {
        global $conn;
        $sql = "SELECT * FROM sekolah WHERE is_delete='0' AND id='$id' ORDER BY nama ASC";

        $query = mysqli_query($conn, $sql);
        $dtSekolah = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $jmlData = mysqli_num_rows($query);

        return [
            "dtSekolah" => $dtSekolah,
            "jml" => $jmlData,
            "message" => "ditemukan",
        ];
    } catch (\Throwable $th) {
        return [
            "dtSekolah" => [],
            "jml" => 0,
            "message" => mysqli_error($conn),
        ];
    }
}


function updateSekolah($nama, $telpon, $alamat, $id)
{
    try {
        global $conn;
        $sql = "UPDATE sekolah SET nama='$nama', telpon='$telpon', alamat='$alamat' WHERE id='$id'";

        mysqli_query($conn, $sql);
        $hasil = mysqli_affected_rows($conn);

        return [
            "hasil" => $hasil,
            "message" => "Berhasil-diupdate",
        ];
    } catch (\Throwable $th) {
        return [
            "hasil" => $hasil,
            "message" => mysqli_error($conn),
        ];
    }
}

function deleteSekolah($idSekolah, $jenis): array
{
    try {
        global $conn;
        if ($jenis == 'tarik') {
            $hasilIsDelete = 0;
        } else {
            $hasilIsDelete = 1;
        }
        $sql = "UPDATE sekolah SET is_delete='$hasilIsDelete' WHERE id='$idSekolah'";
        mysqli_query($conn, $sql);
        $hasil = mysqli_affected_rows($conn);
        return ["hasil" => $hasil];
    } catch (\Throwable $th) {
        return [
            "hasil" => 0,
            "message" => mysqli_error($conn),
        ];
    }
}

function deletePermanenSekolah($idSekolah): array
{
    try {
        global $conn;
        $sql = "DELETE FROM sekolah WHERE id='$idSekolah'";
        mysqli_query($conn, $sql);
        $hasil = mysqli_affected_rows($conn);
        return ["hasil" => $hasil];
    } catch (\Throwable $th) {
        return [
            "hasil" => 0,
            "message" => mysqli_error($conn),
        ];
    }
}
