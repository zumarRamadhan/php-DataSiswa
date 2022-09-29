<?php
// echo "Hello World!";
// function Salam($nama)
// {
//     return "Halo $nama";
// }

// $datasiswa = [
//     [
//         "nama" => "Dika",
//         "umur" => "16",
//         "alamat" => "Kudus",
//         "foto" => "spongebob.jpg"
//     ],
//     [
//         "nama" => "Fano",
//         "umur" => "15",
//         "alamat" => "Semarang",
//         "foto" => "plankton.png"
//     ],
//     [
//         "nama" => "Rehan",
//         "umur" => "16",
//         "alamat" => "Surabaya",
//         "foto" => "patrickstar.jfif"
//     ]
// ];

    require "function.php";

    $datasiswa = mysqli_query($conn, "SELECT * FROM tb_murid");

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
            font-family: sans-serif;
        }

        .btn{
            box-shadow: none;
        }

        .btn:hover{
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.382);
            transform: translateY(-3px);
        }

        img{
            border-radius: 10%;
        }
        h2 {
            margin-top: 40px;
            font-weight: bold;
        }


        .btn{
            margin-bottom: 15px;
        }
        

        
    </style>

</head>
<body>

        <?php
        include "navbar.php";
        ?>

    <div class="container">
        <h2 align="center">Data Siswa</h2>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                    <table class=" table-xl table table-hover" style="text-align: center; vertical-align: middle; font-weight: bold; font-size: 20px;">
                    <a type="button" class="btn btn-primary w-20 float-end" href="tambah.php">Input Data Baru</a>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                            $no=1;
                            foreach($datasiswa as $siswa) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $siswa["nama"]; ?></td>
                                    <td> <?= $siswa["umur"]; ?></td>
                                    <td><?= $siswa["alamat"]; ?></td>
                                    <td>
                                        <a type="button" class="btn btn-info"  href="" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $siswa['id']; ?>">Detail</a>
                                        <a type="button" class="btn btn-warning" href="ubah.php?id=<?=$siswa['id']; ?>" onclick="return confirm('Yakin Deck?');" >Ubah</a>
                                        <a type="button" class="btn btn-danger float-md-none"  href="delete.php?id=<?=$siswa['id'];?>" onclick="return confirm('Yakin Deck?');">Hapus</a>
                                        <!-- <img src=img/<?= $siswa["foto"]; ?> alt="<?= $siswa["nama"]; ?>" width="100" height="100"> -->
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?= $siswa['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Data Siswa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                            <label>Nama</label>
                                            <input required type="text" name="nama" id="nama" class="form-control mb-3" value="<?= $siswa['nama'] ?>" readonly>
                                            <label>Umur</label>
                                            <input required type="number" name="umur" id="umur" placeholder="Masukkan umur"   class="form-control mb-3" value="<?= $siswa['umur'] ?>" readonly>
                                            <label>Alamat</label>
                                            <input required type="text" name="alamat" id="alamat" placeholder="Masukkan alamat"  class="form-control mb-3"value="<?= $siswa['alamat'] ?>" readonly>
                                            <label>Tanggal</label>
                                            <input required type="date" name="tanggal" id="tanggal" placeholder="Masukkan tanggal"  class="form-control mb-3"value="<?= $siswa['tanggal'] ?>" readonly>
                                            <label>Foto</label> <br>
                                            <img src="img/<?=$siswa['foto']; ?>" alt="" width="150" height="150"> 
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a type="button" class="btn btn-warning" href="ubah.php?id=<?=$siswa['id']?>"onclick="return confirm('Yakin Ingin Mengubah Data?');">Ubah</a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--link js bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>