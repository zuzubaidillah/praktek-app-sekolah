
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title><?= $head_title ?? "title default"; ?></title>
    <style>
        .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .show>.nav-link {
            color: rgb(14 110 253);
        }
    </style>
</head>

<body>
    <!--<nav class="navbar navbar-light bg-light fixed-top">-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">

        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                <?= $nav_label ?? "default label"; ?>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a id="mnsiswa" class="nav-link" aria-current="page" href="/">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a id="mnsekolah" class="nav-link" href="/sekolah/index.php">Sekolah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        let mn = document.getElementById('<?=$mnPage??"mnsiswa"?>');
        mn.classList.add('active');
    </script>