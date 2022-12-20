<?php

include "data_connect.php";

if(!empty($_POST['nama_lengkap']) && !empty($_POST['tempat_lahir']) && !empty($_POST['tanggal_lahir']) && !empty($_POST['jenis_kelamin']) && !empty($_POST['alamat_lengkap']) && !empty($_POST['email']) && !empty($_POST['nomor_telepon']) && !empty($_POST['NIK']) && !empty($_POST['passwd']) && !empty($_POST['pass_foto'])) {
// ambil data dari formulir
$nama_lengkap = $_POST['nama_lengkap'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat_lengkap = $_POST['alamat_lengkap'];
$email = $_POST['email'];
$nomor_telepon = $_POST['nomor_telepon'];
$NIK = $_POST['NIK'];
$passwd = $_POST['passwd'];
$pass_foto = $_FILES['foto']['name'];
$tmpft = $_FILES['foto']['tmpft_name'];
// $ijazah = $_FILES['foto_ijazah']['name_ijz'];
// $tmpijazah = $_FILES['foto_ijazah']['tmp_ijz_name'];

$fotobaru = date('dmYHis').$pass_foto;
// $fotoijzbr = date('dmYHis').$ijazah;

$path1 = "images/".$fotobaru;
// $path2 = "ijazah/".$fotoijzbr;

// cek apakah tombol daftar sudah diklik atau blum?
if(move_uploaded_file($tmpft, $path1)){

    try{
        $sql = $pdo->prepare("INSERT INTO users(nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat_lengkap, email, nomor_telepon, NIK, passwd, pass_foto) VALUE (:nama,:tempat_lahir,:tanggal_lahir,:jk,:alamat,:email,:nomor',:NIK,:passwd,:foto)");
    $sql->bindParam(':nama', $nama_lengkap);
    $sql->bindParam(':tempat_lahir', $tempat_lahir);
    $sql->bindParam(':tanggal_lahir', $tanggal_lahir);
    $sql->bindParam(':jk', $jenis_kelamin);
    $sql->bindParam(':alamat', $alamat_lengkap);
    $sql->bindParam(':email', $email);
    $sql->bindParam(':nomor', $nomor_telepon);
    $sql->bindParam(':NIK', $NIK);
    $sql->bindParam(':passwd', $passwd);
    $sql->bindParam(':foto', $fotobaru);
    // $sql->bindParam(':ijz', $fotoijzbr);
    $sql->execute(); // Eksekusi query insert
    }catch (PDOException $e){
        print_r($sql->errorInfo());
    }
    // buat query
    // $sql = "INSERT INTO users (nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat_lengkap, email, nomor_telepon, NIK, passwd, pass_foto, foto_ijazah) VALUE ('$nama', '$tempat_lahir','$tanggal_lahir', '$jenis_kelamin', '$alamat', '$email', '$nomor', '$NIK', '$password', '$foto', '$ijazah')";
    // $query = mysqli_query($connect, $sql);
    
    // apakah query simpan berhasil?
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header("location: index.php"); // Redirect ke halaman index.php
      }else{
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
      }

} else {
    die("Akses dilarang...");
}
}
?>