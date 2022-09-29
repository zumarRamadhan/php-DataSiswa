<?php
require "function.php";
$id = $_GET ["id"];

$datasiswa = query("SELECT * FROM tb_murid WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Di Ubah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Di Ubah');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        img {
            border-radius: 10%;
            margin-bottom: 20px;
        }
    </style>


</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php 
include "navbar.php";
?>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h1 align="center">UBAH DATA SISWA</h1>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $datasiswa["id"]?>">
                            <input type="text" name="foto_lama" value="<?= $datasiswa["foto"]?>">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama " required value="<?= $datasiswa["nama"]?>">
                            </div><br>
                            <div class="form-group">
                                <label for="">Umur</label>
                                <input type="number" class="form-control" name="umur" id="umur" placeholder="Masukkan Umur " required value="<?= $datasiswa["umur"]?>">
                            </div><br>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat " required value="<?= $datasiswa["alamat"]?>">
                            </div><br>
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Masukkan Tanggal " required value="<?= $datasiswa["tanggal"]?>">
                            </div><br>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <br>
                                <img src="img/<?= $datasiswa["foto"]?>" width="150" alt="">
                                <input type="file" class="form-control" name="foto" id="foto" placeholder="Masukkan File Foto " value="<?= $datasiswa["foto"]?>">
                            </div><br>
                            <button type="submit" class="btn btn-primary float-end" name="submit">Ubah Data</button>
                        </form>          
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>