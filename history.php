<?php
    include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>
<head>
    <title>TRANSAKSI</title>
    <link href="logo.png" rel="icon">

</head>
<body>

    <?php

    include ('tampilan/header.php');
    include ('tampilan/footer.php');
    include ('tampilan/sidebar.php');
?>

    <!-- main content -->
    <div class="main-content bg-primary">
        <section class="section">
          <div class="section-header">
            <h1>HISTORY</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="history.php">History</a></div>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>History Pembayaran</h4>
                    <div class="card-header-form">
                    </div>
                  </div>
        <form action="" method="get">
                      <table class="table">
                      <tr>
                      <td>Id penghuni</td>
                      <td>:</td>
                      <td>
                      <input class="form-control" type="text" name="id_penghuni" placeholder="--Masukan ID penghuni--">
                      </td>
                      <td>
                      <button class="btn btn-success" type="submit" name="cari">Cari</button>
                      </td>
                      </tr>

                      </table>
                      </form>
                <?php 
                if (isset($_GET['id_penghuni']) && $_GET['id_penghuni']!='') {
                  $query = mysqli_query($koneksi, "SELECT * FROM penghuni WHERE id_penghuni='$_GET[id_penghuni]'");
                  $data = mysqli_fetch_array($query);
                  $id_penghuni = $data['id_penghuni'];
                
                ?>

                <h2>DATA PENGHUNI</h2>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Id Penghuni</th>
                      <th scope="col">NAMA PENGHUNI</th>
                      <th scope="col">ID KAMAR</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <td><?php echo $data['id_penghuni']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['id_kamar']; ?></td>
                  </tbody>
                </table>

                <h2>DATA TAGIHAN PENGHUNI</h2>
              <table class="table table-striped">
                <thead> 
                  <tr>
                    <!-- <th scope="col">Id Pembayaran</th> -->
                <th scope="col">Id Admin</th>
               <th scope="col">Id Penghuni</th>
                <th scope="col">Tgl Bayar</th>
                <th scope="col">Bulan Bayar</th>
                <th scope="col">Tahun Bayar</th>
                <th scope="col">Id Tagihan</th>
                <th scope="col">Jumlah</th>
                
                  </tr>
                </thead>

                <tbody>
                  <?php 
                  $query = mysqli_query($koneksi,"SELECT * FROM pembayaran WHERE id_penghuni='$data[id_penghuni]' ORDER BY bulan_dibayar ASC");
                

                  while ($data=mysqli_fetch_array($query)) {
                    echo" <tr>
                          
                          <td>$data[id_admin]</td>
                          <td>$data[id_penghuni]</td>
                          <td>$data[tgl_bayar]</td>
                          <td>$data[bulan_dibayar]</td>
                          <td>$data[tahun_dibayar]</td>
                          <td>$data[id_tagihan]</td>
                          <td>$data[jumlah_bayar]</td>

                        </tr>";
                  }

                   ?>

                </tbody>

              </table>  
                
    <?php 
    }
    ?>      
        
        </div>
  </body>
</html>