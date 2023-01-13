<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DATA TAGIHAN</title>
    <link href="logo.png" rel="icon">
    
  </head>
<body>

  <?php

  include ('tampilan/header.php');
  include ('tampilan/sidebar.php');
  include ('tampilan/footer.php');
?>
      
   <!-- Main Content -->
      <div class="main-content bg-primary">
        <section class="section">
          <div class="section-header">
            <h1>DATA TAGIHAN</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="tagihan.php">Tagihan</a></div>
            </div>
          </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>DAFTAR TAGIHAN</h4>
                    <div class="card-header-form">
                      <form>
                          <div class="input-group-btn">
                            <a href="tambah_tagihan.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                       <thead>
                          <tr>
                          <th>NO</th>
                          <th>TAHUN</th>
                          <!-- <th>NOMINAL</th> -->
                          <th>ACTION</th>
                        </tr>
                        </thead>
                         <tbody>
                           <?php
                              // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                              $query = "SELECT * FROM tagihan ORDER BY id_tagihan ASC";
                              $result = mysqli_query($koneksi, $query);
                              //mengecek apakah ada error ketika menjalankan query
                              if(!$result){
                                die ("Query Error: ".mysqli_errno($koneksi).
                                   " - ".mysqli_error($koneksi));
                              }
                              $no = 1; //variabel untuk membuat nomor urut
                              while($row = mysqli_fetch_assoc($result))
                              {
                              ?>
                        <tr>  
                          <td><?php echo $no; ?></td>
                          <td><?php echo $row['tahun']; ?></td>                           
                          <td>
                            <!-- detail data tagihan per tahun -->
                          <a href="detail_datatagihan.php?id=<?php echo $row['id_tagihan']; ?>"class="btn btn-primary"><!-- <i class="fas fa-edit"> -->Detail Data Tagihan</i></a>
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