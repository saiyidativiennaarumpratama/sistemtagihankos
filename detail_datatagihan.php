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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    
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
                          <th>STATUS</th>
                          <th>ACTION</th>
                        </tr>
                        </thead>
                         <tbody>
                          
                           <?php
                              $id_t = $_GET['id'];
                              // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                              $query = "SELECT tagihan.id_tagihan, penghuni.id_penghuni, penghuni.nama, kamar.id_kamar , kamar.nominal, penghuni.status, penghuni.no_telp, (penghuni.tgl_registrasi + INTERVAL 1 YEAR) AS tgl_tagihan
                                FROM tagihan INNER JOIN penghuni ON tagihan.id_tagihan=penghuni.id_tagihan
                                INNER JOIN kamar ON penghuni.id_kamar=kamar.id_kamar
                                WHERE penghuni.id_tagihan=$id_t AND status='belumbayar' ";
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
                          <td><input type="text" name="id_admin" value="<?php echo $_SESSION['id_admin']?>" class="form-control" readonly>
                            </td>
                          <td><input type="text" name="id_penghuni" value="<?php echo $data['id_penghuni']; ?>" class="form-control" readonly></td>
                          <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>" class="form-control" readonly></td>
                          <td><input type="text" name="id_tagihan" value="<?php echo $data['id_tagihan']; ?>" class="form-control" readonly></td>
                          <!-- KAPASITAS -->
                          <td><input type="text" name="id_kamar" value="<?php echo $data['id_kamar']; ?>" class="form-control" readonly></td>
                          <!-- HARGA -->
                          <td><input type="text" name="nominal" value="<?php echo $data['nominal']; ?>" class="form-control" readonly></td>
                          <td><input type="text" name="status" value="<?php echo $data['status']; ?>" class="form-control" readonly></td>  
                          
                          <td>
                            <br>
                              <!-- <i class="fas fa-check"></i> -->
                              <!-- <label><i class="btn btn-success fas fa-check" onClick="return confirm('Apakah Penghuni Sudah Membayar Kos?')" ></i> -->
                             <!--  <input type="submit" class="btn btn-success" value="Kirim Tagihan" name="" onClick="return confirm('Apakah Akan Mengirim Kirim Tagihan?')"> -->
                             <a href="<?= 'https://wa.me/' . $data['no_telp'] . '?text=Tanggal%20Bayar%20' . $data['tgl_tagihan'] ?>"  target="_blank" class="btn btn-danger" value=&#xF618; onClick="return confirm('Apakah Akan Mengirim Tagihan?')">WA
                              <!-- <i class="fa fa-whatsapp"></i> -->
                             </a>

                             <!-- <a href="edit_kamar.php?id=<?php echo $row['id_kamar']; ?>"class="btn btn-success"><i class="fas fa-edit"></i></a>
 -->
                              <input type="submit" class="btn btn-success" value="&#10004;" name="" onClick="return confirm('Apakah Penghuni Sudah Membayar Kos?')">
                                
                              
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
</form>
</body>
</html>
