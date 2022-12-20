<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "kkp";
    // $connect = mysqli_connect($host, $user, $pass, $db);
    // if(!$connect){
    //     die("Koneksi gagal". mysqli_connect_error());
    // }

    $pdo = new PDO('mysql:host='.$host.';db'.$db, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    //sql create table
    // $user = "CREATE TABLE user (
    //     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    //     nama_lengkap VARCHAR(25),
    //     tempat_lahir VARCHAR(40),
    //     tanggal_lahir DATETIME,
    //     jenis_kelamin CHAR(10),
    //     alamat_lengkap TEXT,
    //     email CHAR(40),
    //     nomor_telepon CHAR(20),
    //     NIK CHAR(16),
    //     passwd VARCHAR(40),
    //     pass_foto VARCHAR(300),
    //     foto_ijazah VARCHAR(300),
    // )";

    // $ujian = "CREATE TABLE jadwal_ujian (
    //     nomor_ujian CHAR(16) PRIMARY KEY NOT NULL,
    //     tempat_ujian VARCHAR(50),
    //     waktu_ujian DATETIME,
    // )";

    // $admin = "CREATE TABLE admin (
    //     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    //     username VARCHAR(10),
    //     passwd_admin VARCHAR(20), 
    // )";

    // if(mysqli_query($conn, $user, $ujian, $admin)) {
    //     echo "Tabel sukses dibuat";
    // } else {
    //     "Error". mysqli_error($connect);
    // }

    // mysqli_close($connect);
?>