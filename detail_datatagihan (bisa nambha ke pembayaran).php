<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DETAIL DATA TAGIHAN</title>
    <link href="logo.png" rel="icon">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

    
  </head>
<!-- <body style=" font-family: Helvetica;">
 -->
	<?php

  include ('tampilan/header.php');
  include ('tampilan/sidebar.php');
  include ('tampilan/footer.php');
?>

     
      
   <!-- Main Content -->
      <div class="main-content bg-primary">
        <section class="section">
          <div class="section-header">
            <h1>DETAIL DATA TAGIHAN</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
              <div class="breadcrumb-item text-primary">DETAIL DATA TAGIHAN</div>
            </div>
          </div>

          <form action="verifikasi_tagihan.php" method="post" class="form-horizontal" enctype="multipart/form-data">
          <?php
                              // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                              $query = "SELECT tagihan.id_tagihan, penghuni.id_penghuni, penghuni.nama, kamar.id_kamar , kamar.nominal, penghuni.status 
                                FROM tagihan INNER JOIN penghuni ON tagihan.id_tagihan=penghuni.id_tagihan
                                INNER JOIN kamar ON penghuni.id_kamar=kamar.id_kamar
                                WHERE status='belumbayar' ";
                              $result = mysqli_query($koneksi, $query);
                              //mengecek apakah ada error ketika menjalankan query
                              if(!$result){
                                die ("Query Error: ".mysqli_errno($koneksi).
                                   " - ".mysqli_error($koneksi));
                              }
                              $no = 1; //variabel untuk membuat nomor urut
                              while($data = mysqli_fetch_array($result))
                              {
                              ?>

          <div class="form-group cols-sm-6">
          <label>ID Admin</label>
          <input type="text" name="id_admin" value="<?php echo $_SESSION['id_admin']?>" class="form-control" readonly>
          </div>

          <div class="form-group cols-sm-6">
          <label>ID Penghuni</label>
          <input type="text" name="id_penghuni" value="<?php echo $data['id_penghuni']; ?>" class="form-control" readonly>
          </div>

          <div class="form-group cols-sm-6">
          <label>Nama</label>
          <input type="text" name="nama" value="<?php echo $data['nama']; ?>" class="form-control" readonly>
          </div>

          <div class="form-group cols-sm-6">
          <label>ID Tagihan</label>
          <input type="text" name="id_tagihan" value="<?php echo $data['id_tagihan']; ?>" class="form-control" readonly>
          </div>

          <div class="form-group cols-sm-6">
          <label>ID Kamar</label>
          <input type="text" name="id_kamar" value="<?php echo $data['id_kamar']; ?>" class="form-control" readonly>
          </div>

          <div class="form-group cols-sm-6">
          <label>Nominal</label>
          <input type="text" name="nominal" value="<?php echo $data['nominal']; ?>" class="form-control" readonly>
          <?php
          }
          ?>

          <input type="submit" class="btn btn-primary btn-user" value="Lunas" name="" onClick="return confirm('Apakah Penghuni Sudah Membayar Kos?')">
          
        </div>

          </div>                                          
        </section>
      </div>   
    </div>
  </div>
</form>
</body>
</html>