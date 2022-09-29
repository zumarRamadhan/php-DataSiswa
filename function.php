<?php
$conn = mysqli_connect("localhost", "root", "", "db_sekolah");
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows; 
}

function tambah($data){
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $umur = htmlspecialchars($data["umur"]); 
    $alamat = htmlspecialchars($data["alamat"]);
    // $foto = htmlspecialchars($data["foto"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $foto = upload_foto();
    if(!$foto){
        return false;
    }

    $query = "INSERT INTO tb_murid VALUES ('','$nama','$umur','$alamat','$foto', '$tanggal')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM tb_murid WHERE id=$id");
    return mysqli_affected_rows($conn);


}

function ubah($data) { 
    global $conn;
    $id = $_GET['id'];
    $nama = htmlspecialchars ($data["nama"]);
    $umur = htmlspecialchars ($data["umur"]);
    $alamat = htmlspecialchars ($data["alamat"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    // $foto  = $data["foto"];

    $foto_lama = $data["foto_lama"]; //kolom data foto lama
    $noUploadFoto = $_FILES['foto']['error']; //kondisi ketika tidak upload foto baru

    if ($noUploadFoto === 4){ //jika tidak upload foto
        $foto = $foto_lama;
    } else { //jika upload foto
        $foto = upload_foto();
    }

    $query = "UPDATE tb_murid SET nama = '$nama', umur = $umur , alamat = '$alamat' , foto='$foto', tanggal='$tanggal'   WHERE id=$id";

    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}


//function untuk menerima foto
function upload_foto(){
    $namaFoto = $_FILES['foto']['name']; //menerima nama foto
    $ukuranFoto = $_FILES['foto']['size']; //menerima size foto
    $errorFoto = $_FILES['foto']['error']; //mengetahui eror foto
    $tempFoto = $_FILES['foto']['tmp_name']; //menaruh foto sementara

    //cek upload foto
    if ($error === 4) {
        echo "<script>
            alert('Mohon Upload Foto Terlebih Dahulu !');
            </Script>";
        return false;
    }

    //cek ekstensi file
    $ekstensiFotoValid = ['jpg', 'jpeg', 'png', 'gif'];
    $ekstensiFoto = explode('.', $namaFoto);
    $ekstensiFoto = strtolower(end($ekstensiFoto));

    //cek gambar atau bukan
    if (!in_array($ekstensiFoto, $ekstensiFotoValid)) {
        echo "<script>
                alert('File Yang Anda Upload Bukan Gambar !');
            </script>";
        return false;
    }

    //cek ukuran maksimal foto
    if ($ukuranFoto == 1000000) {
        echo "<script>
                alert('Ukuran terlalu besar !');
            </script>";
        return false;
    }


    //jika sudah melewati beberapa validasi, maka file akann disimpan ke storage
    $date = date('YmdHis') ;
    move_uploaded_file($tempFoto, 'img/' . $date . $namaFoto);
    return $date . $namaFoto;
}

?>