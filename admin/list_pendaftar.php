<?php include("data_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List Pendaftar</title>
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
            src="/assets/logo-kementerian-kelautan-dan-perikanan-kkp-indonesia-png-1080p-filevector69-1-dux.png"
            alt="Logo"
            width="41"
            height="45"
            class="d-inline-block align-text-top"
          />
          Portal pendaftaran CASN KKP Jatim
        </a>
        <div class="d-flex justify-content-end ms-auto">
          <div class="p-2"><a href="home">Home</a></div>
          <div class="p-2"><button type="button" class="btn btn-primary">Login</button></div>
        </div>
      </div>
    </nav>
    <div class="position-relative mb-2 mt-3">
      <h3 class="position-absolute top-0 start-50 translate-middle">List Pendaftar</h3>
    </div>
    <table class="table mt-5">
      <thead>
        <tr>
          <th scope="col">Nomor</th>
          <th scope="col">Pass Foto</th>
          <th scope="col">Nama</th>
          <th scope="col">Nomor Telepon</th>
          <th scope="col">Kelulusan</th>
        </tr>
      </thead>
      <tbody>
          <?php
            $sql = "SELECT id, pass_foto, nama_lengkap, nomor_telepon  FROM user";
            $query = mysqli_query($connect, $sql);

            while($user = mysqli_fetch_array($query)) {
              echo "<tr>";

              echo "<td>".$user['id_users']."</td>";
              echo "<td>".$user['pass_foto']."</td>";
              echo "<td>".$user['nama_lengkap']."</td>";
              echo "<td>".$user['nomor_telepon']."</td>";
              echo "<td>".'ceklis'."</td>";

              echo "</tr>";
            }
          ?>
        <!-- <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td colspan="2">Larry the Bird</td>
          <td>@twitter</td>
          <td>@mdo</td>
        </tr> -->
      </tbody>
    </table>
    <p>Total: <?php echo mysqli_num_rows($query) ?></p>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
