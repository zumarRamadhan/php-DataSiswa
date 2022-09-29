<?php
require "function.php";

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP Dasar</title>
    <!--link bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            width: 100%;
            height: 100vh;
            background-color: #E5E8E8;
        }

        img{
            border-radius: 10%;
        }
        h2 {
            margin-top: 40px;
        }

        .container {
            cursor: pointer;
        }

        
    </style>

</head>
<body>

    <?php
    include "navbar.php";
    ?>

    <div class="container">
        <h2 align="center">Tambah Data Siswa</h2>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post" enctype="multipart/form-data">
                            <fieldset >
                            <div class="mb-3">
                            <label  id="nama" class="form-label">Nama</label>
                            <input name="nama" type="text"  class="form-control mb-3" required>
                            <label  id="umur" class="form-label">Umur</label>
                            <input name="umur" type="number"  class="form-control mb-3" >
                            <label  id="alamat" class="form-label">Alamat</label required>
                            <input name="alamat" type="text"  class="form-control mb-3">
                            <label  id="tanggal" class="form-label">Tanggal</label required>
                            <input name="tanggal" type="date"  class="form-control mb-3">
                            <label class="form-label">Foto</label>
                            <input id="foto" name="foto" type="file" class="form-control mb-3">
                            </div>
                            <div class="mb-3">

                            </fieldset>
                            <button type="submit" name="submit" class="btn btn-success float-end">Save</button>
                        </form>
                    </div>
                </div>
                <!-- <a type="button" class="btn btn-primary w-100" href="">Tambah Data Baru</a> -->
            </div>
        </div>
    </div>

    <!--link js bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>