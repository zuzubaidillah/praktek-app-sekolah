<?php
require_once "koneksi.php";
require_once "Helper/function.php";
$getSiswa = showSiswa(1);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tambah Data</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                Proses tambah Data di tabel siswa
            </a>
        </div>
    </nav>
    <div class="container mt-5  pt-5">

        <div class="d-flex justify-content-between pt-2">
            <h2 class="header-title">Isi Form</h2>
            <a class="nav-link" href="/index.php">lihat data</a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form class="">
                    <div class="row">
                        <div class=" mb-3 col-md-6">
                            <label for="txtsekolah" class="form-label">Pilih Sekolah</label>
                            <select type="text" class="form-control" id="txtsekolah" name="txtsekolah" required>
                                <option value="">--pilih sekolah--</option>
                                <option value="3">SMA 01 Malang</option>
                                <option value="4">SMP 01 Jombang</option>
                            </select>
                            <div id="txtsekolah" class="form-text">Harus diisi</div>
                        </div>
                        <div class=" mb-3 col-md-6">
                            <label for="txtnama" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" id="txtnama" name="txtnama" placeholder="Masukan Nama Siswa">
                            <div id="txtnama" class="form-text">Harus diisi</div>
                        </div>
                        <div class=" mb-3 col-md-12">
                            <label for="txtnis" class="form-label">NIS</label>
                            <input type="text" class="form-control" id="txtnis" name="txtnis" placeholder="Masukan NIS">
                            <div id="txtnis" class="form-text">Harus diisi</div>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="txttanggal" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="txttanggal" name="txttanggal">
                            <div id="txttanggal" class="form-text">Harus diisi</div>
                        </div>
                        <div class="mb-3 form-check col-md-4 d-flex align-items-center">
                            <input type="checkbox" class="form-check-input" id="is_delete">
                            <label class="form-check-label" for="is_delete">hilangkan data?</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>