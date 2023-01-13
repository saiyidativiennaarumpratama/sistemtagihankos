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

            <div class="form-group cols-sm-8">
            <a href="tagihan.php" class="btn btn-secondary btn-icon-split">
              <!-- <span class="icon text-white-100">
                <i class="fas fa-arrow-left"></i>
              </span> -->
              <span class="text" style="color: black; font-weight: bold;">Kembali</span>
            </a>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>LIST DATA</h4>
                    <div class="card-header-form">
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                       <thead>
                          <tr>
                          <th>NO</th>
                          <th>ID ADMIN</th>
                          <th>ID PENGHUNI</th>
                          <th>NAMA</th>
                          <th>ID TAGIHAN</th>
                          <th>ID KAMAR</th>
                          <th>NOMINAL</th>
                          <!-- <th>STATUS</th> -->
                          <th>ACTION</th>
                        </tr>
                        </thead>
                         <tbody>
                          
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
                        <tr>  
                          <!-- NO -->
                          <td><?php echo $no; ?></td>
                          <!-- ID KAMAR -->
                          <td><?php echo $_SESSION['id_admin']?></td>
                          <td><?php echo $data['id_penghuni']; ?></td>
                          <td><?php echo $data['nama']; ?></td>
                          <td><?php echo $data['id_tagihan']; ?></td>
                          <!-- KAPASITAS -->
                          <td><?php echo $data['id_kamar']; ?></td>
                          <!-- HARGA -->
                          <td><?php echo substr($data['nominal'], 0, 20); ?></td>  
                          
                          <td>
                            
                            <br>
                              <a href="verifikasi_tagihan.php?id=<?php echo $data['id_penghuni']; ?>" class="btn btn-success btn-lg" onClick="return confirm('Apakah Penghuni Sudah Membayar Kos?')">
                                <i class="fas fa-check"></i>
                                
                              </a>
                            </p>
                          </td>
                        </tr>
                         <?php
                           $no++; //untuk nomor urut terus bertambah 1
                           }
                         ?>
                         </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>
      
    </div>
  </div>
</body>
</html>