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
            <h1>HISTORY</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="biodata.php">Biodata</a></div>
              <div class="breadcrumb-item active"><a href="history2.php">History</a></div>
            </div>
          </div>
           

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>LIST DATA</h4>
                    <div class="card-header-form">
<!--                       <form>
                          <div class="input-group-btn">
                            <a href="tambah_kamar.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        </div>
                      </form> -->
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                       <thead>
                          <tr>
                          <th>NO</th>
                          <th>ID PENGHUNI</th>
                          <th>ID PEMBAYARAN</th>
                          <th>ID ADMIN</th>
                          
                          <th>NAMA</th>
                          <th>ID TAGIHAN</th>
                          <th>ID KAMAR</th>
                          <th>NOMINAL</th>     
                         
                          <!-- <th>STATUS</th> -->
                          <!-- <th>ACTION</th> -->
                        </tr>
                        </thead>
                         <tbody>
                          
                           <?php
                              // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                              $query = " SELECT penghuni.id_penghuni, pembayaran.id_pembayaran, pembayaran.id_admin, pembayaran.nama, pembayaran.id_tagihan, pembayaran.id_kamar, pembayaran.nominal FROM penghuni INNER JOIN tagihan ON penghuni.id_tagihan=tagihan.id_tagihan INNER JOIN pembayaran ON tagihan.id_tagihan=pembayaran.id_tagihan
                                WHERE id_penghuni='$_SESSION[id_penghuni]' ";
                              $result = mysqli_query($koneksi, $query);
                              //mengecek apakah ada error ketika menjalankan query
                              if(!$result){
                                die ("Query Error: ".mysqli_errno($koneksi).
                                   " - ".mysqli_error($koneksi));
                              }

                              //buat perulangan untuk element tabel dari data mahasiswa
                              $no = 1; //variabel untuk membuat nomor urut
                              // hasil query akan disimpan dalam variabel $data dalam bentuk array
                              // kemudian dicetak dengan perulangan while
                              // while($row = mysqli_fetch_assoc($result))
                              while($data = mysqli_fetch_array($result))
                              {
                              ?>
                        <tr>  
                          <!-- NO -->
                          <td><?php echo $no; ?></td>
                          <!-- ID KAMAR -->
                          <td><?php echo $_SESSION['id_penghuni']?></td>
                          <td><?php echo $data['id_pembayaran']; ?></td>
                          <td><?php echo $data['id_admin']?></td>
                          
                           <td><?php echo $_SESSION['username']; ?></td>
                           <td><?php echo $data['id_tagihan']; ?></td>
                          <!-- KAPASITAS -->
                          <td><?php echo $data['id_kamar']; ?></td>
                          <!-- HARGA -->
                          <td><?php echo substr($data['nominal'], 0, 20); ?></td>  
                          
                          
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