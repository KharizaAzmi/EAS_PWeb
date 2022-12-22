<?php
    include "data_connect.php";
    $sql = $connect->prepare("SELECT * FROM users");
    $sql->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="card mt-5 mx-4">
            <div class="card-body">
            <div class="container">
            <div class="row mb-1">ini foto</div>
            </div>
            </div>
            </div>  
        </div>
        <div class="col">
        <div class="card mt-5 mx-4">
  <h5 class="card-header">Profil Pendaftar</h5>
  <div class="card-body">
    <!-- <h5 class="card-title mt-1">Profil Pendaftar</h5> -->
    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
    <div class="container">
    <div class="row mb-1">
        <!-- <div class="col"> -->
        Nama Lengkap : <?php while($result = $sql->fetch(PDO::FETCH_BOTH)){
            $nama_lengkap = $result['nama_lengkap'];
            echo $nama_lengkap . '</br>';
        }?>
        <!-- </div> -->
        <!-- <div class="col">
        Column ini coba-coba
        </div> -->
    </div>
    <div class="row mb-1">
        Tempat Lahir : <?php while($result = $sql->fetch(PDO::FETCH_BOTH)){
            $tempat_lahir = $result['tempat_lahir'];
            echo $tempat_lahir . '</br>';
        }?>
    </div> 
    <div class="row mb-1">
        Tanggal Lahir : <?php while($result = $sql->fetch(PDO::FETCH_BOTH)){
            $tanggal_lahir = $result['tanggal_lahir'];
            echo $tanggal_lahir . '</br>';
        }?>
    </div> 
    <div class="row mb-1">
        Jenis Kelamin : <?php while($result = $sql->fetch(PDO::FETCH_BOTH)){
            $jenis_kelamin = $result['jenis_kelamin'];
            echo $jenis_kelamin . '</br>';
        }?>
    </div> 
    <div class="row mb-1">
        Alamat : <?php while($result = $sql->fetch(PDO::FETCH_BOTH)){
            $alamat_lengkap = $result['alamat_lengkap'];
            echo $alamat_lengkap . '</br>';
        }?>
    </div> 
    <div class="row mb-1">
        Nomor Telepon : <?php while($result = $sql->fetch(PDO::FETCH_BOTH)){
            $nomor_telepon = $result['nomor_telepon'];
            echo $nomor_telepon . '</br>';
        }?>
    </div> 
    <div class="row mb-1">
        Email : <?php while($result = $sql->fetch(PDO::FETCH_BOTH)){
            $email = $result['email'];
            echo $email . '</br>';
        }?>
    </div> 
    <div class="row mb-4">
        NIK : <?php while($result = $sql->fetch(PDO::FETCH_BOTH)){
            $NIK = $result['NIK'];
            echo $NIK . '</br>';
        }?>
    </div> 
    <a href="#" class="btn btn-primary">Cetak Kartu PDF</a>
  </div>
</div>
        </div>
    </div>
</div>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>