<?php
    include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>
<head>
    <title>PROFIL</title>
    <link href="logo.png" rel="icon">

</head>
<body>

    <?php
    include ('tampilan/header.php');
    include ('tampilan/footer.php');
    include ('tampilan/sidebar.php');

    $tampilPenghuni=mysqli_query($koneksi, "SELECT penghuni.id_penghuni, penghuni.username, penghuni.password, penghuni.nama, penghuni.id_kamar, penghuni.alamat, penghuni.no_telp, penghuni.tgl_registrasi FROM penghuni WHERE id_penghuni='$_SESSION[id_penghuni]'");
    $penghuni=mysqli_fetch_array($tampilPenghuni);

    ?>

    <!-- main content -->
    <div class="main-content bg-primary">
        <section class="section">
          <div class="section-header">
            <h1>PROFIL</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="biodata.php">Biodata</a></div>
                <div class="breadcrumb-item active"><a href="history2.php">History</a></div>
            </div>
        </div>
        <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h2 style="color:black;">Profil Penghuni Kos</h2>
                    <div class="card-header-form">
                    </div>
                  </div>
                <table class="table table-bordered " style="font-size:20px; font-weight: bold; color: black;">          
                  <thead>
                    <tr>
                      <td>Id Penghuni</td>
                      <td>:<?=$penghuni['id_penghuni']?></td>
                
                    </tr>
                    <tr>
                      <td>Username</td>
                      <td>:<?=$penghuni['username']?></td>

                    </tr>
                    <tr>
                      <td>Password</td>
                      <td>:<?=$penghuni['password']?></td>

                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td>:<?=$penghuni['nama']?></td>
                    </tr>
                    <tr>
                      <td>Id Kamar</td>
                      <td>:<?=$penghuni['id_kamar']?></td>

                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>:<?=$penghuni['alamat']?></td>

                    </tr>
                    <tr>
                      <td>No HP</td>
                      <td>:<?=$penghuni['no_telp']?></td>

                    </tr>
                    <tr>
                      <td>Registrasi</td>
                      <td>:<?=$penghuni['tgl_registrasi']?></td>

                    </tr>
                  </thead>
                </table>        
        </div>
  </body>
</html>