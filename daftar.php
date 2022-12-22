<?php
include "data_connect.php";
   
if(isset($_POST['submit'])) {
  
    // Count total files
    $countfiles = count($_FILES['files']['name']);
   
    // Prepared statement
    $query = "INSERT INTO users (nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat_lengkap, email, nomor_telepon, NIK, passwd, pass_foto) VALUES(?,?,?,?,?,?,?,?,?,?)";
  
    $statement = $connnect->prepare($query);
  
    // Loop all files
    for($i = 0; $i < $countfiles; $i++) {
  
        // File name
        $filename = $_FILES['files']['name'][$i];
      
        // Location
        $target_file = 'images/'.$filename;
      
        // file extension
        $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
             
        $file_extension = strtolower($file_extension);
      
        // Valid image extension
        $valid_extension = array("png","jpeg","jpg");
      
        if(in_array($file_extension, $valid_extension)) {
  
            // Upload file
            if(move_uploaded_file(
                $_FILES['files']['tmp_name'][$i],
                $target_file)
            ) {
                // Execute query
                $statement->execute(
                    array($filename,$target_file));
            }
        }
    }
     
    echo "File upload successfully";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <nav class="navbar bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img
            src="assets/logo-kementerian-kelautan-dan-perikanan-kkp-indonesia-png-1080p-filevector69-1-dux.png"
            alt="Logo"
            width="41"
            height="45"
            class="d-inline-block align-text-top"
          />
          Portal pendaftaran CASN KKP Jatim
        </a>
        <div class="d-flex justify-content-end ms-auto">
          <div class="p-2"><a href="index.html">Home</a></div>
          <div class="p-2"><button type="button" class="btn btn-primary">Login</button></div>
        </div>
      </div>
    </nav>
    <div class="position-relative mb-2 mt-3">
      <h3 class="position-absolute top-0 start-50 translate-middle">
        Form Pendaftaran Calon Peserta Ujian
      </h3>
    </div>
    <form method="post" action= 'view_user.php' enctype="multipart/form-data">
      <fieldset>
      <div class="mt-5 mb-3 px-4">
        <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
        <input
          type="text"
          name="nama_lengkap"
          class="form-control"
          id="exampleFormControlInput1"
          placeholder="Nama Lengkap"
        />
      </div>
      <div class="mb-3 px-4">
        <label for="exampleFormControlInput1" class="form-label">Tempat Lahir</label>
        <input
          type="text"
          name="tempat_lahir"
          class="form-control"
          id="exampleFormControlInput1"
          placeholder="Tempat Lahir"
        />
      </div>
      <div class="mb-3 px-4">
        <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
        <input
          type="datetime"
          name="tanggal_lahir"
          class="form-control"
          id="exampleFormControlInput1"
          placeholder="DD/MM/YYYY"
        />
      </div>
      <div class="mb-3 px-4">
        <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
        <input
          type="text"
          name="jenis_kelamin"
          class="form-control"
          id="exampleFormControlInput1"
          placeholder="Jenis Kelamin"
        />
      </div>
      <div class="mb-3 px-4">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input
          type="email"
          name="email"
          class="form-control"
          id="exampleFormControlInput1"
          placeholder="example12@gmail.com"
        />
      </div>
      <div class="mb-3 px-4">
        <label for="exampleFormControlInput1" class="form-label">Nomor Telepon</label>
        <input
          type="number"
          name="nomor_telepon"
          class="form-control"
          id="exampleFormControlInput1"
          placeholder="081xxxxxxxxx"
        />
      </div>
      <div class="mb-3 px-4">
        <label for="exampleFormControlInput1" class="form-label">NIK</label>
        <input
          type="number"
          name="NIK"
          class="form-control"
          id="exampleFormControlInput1"
          placeholder="3504xxxxxxxxxxxx"
        />
      </div>
      <div class="mb-3 px-4">
        <label for="exampleFormControlInput1" class="form-label">Password</label>
        <input
          type="password"
          name="passwd"
          class="form-control"
          id="exampleFormControlInput1"
          placeholder="xxxxxxxx"
        />
      </div>
      <div class="mb-3 px-4">
        <label for="exampleFormControlTextarea1" class="form-label">Alamat Lengkap</label>
        <textarea class="form-control" name="alamat_lengkap" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
    <div class="mb-3 px-4">
      <label for="formFile" class="form-label">Upload Foto (jpg/png)</label>
      <input class="form-control" type="file" name='files[]' multiple id="formFile" />
    </div>
    <!-- <div class="mb-3 px-4 mt-3">
      <label for="formFile" class="form-label">Upload Ijazah (jpg/png)</label>
      <input class="form-control" type="file" id="formFile" />
    </div> -->
    <div class="position-absolute top-150 start-50 translate-middle">
      <!-- <button type="button" class="btn btn-primary mt-5">Submit</button> -->
      <input type="submit" value="Daftar" name="daftar" />
    </div>
      </fieldset>
    </form>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
