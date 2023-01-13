<?php
    include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>
<head>
    <title>PEMBAYARAN</title>
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
            <h1>PEMBAYARAN</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="pembayaran.php">Pembayaran</a></div>
            </div>
        </div>
         <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">

                   <form action="verifikasi_tagihan" method="post">
                    <h2>DATA PEMBAYARAN</h2>
                     <div class="table-responsive">
                      <table class="table table-striped">
                    <thead>
                      <tr>
                          <th>NO</th>
                          <th>ID PEMBAYARAN</th>
                          <th>ID ADMIN</th>
                          <th>NAMA</th>
                          <th>ID TAGIHAN</th>
                          <th>ID KAMAR</th>
                          <th>NOMINAL</th>     
                          <th>ACTION</th>
                      </tr>
                    </thead>

                      <tbody>
                        <?php
                              // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                              $query = "SELECT * FROM `pembayaran`";
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
                              while($row = mysqli_fetch_assoc($result))
                              {
                              ?>
                      
                      <tr>  
                          <!-- NO -->
                          
                          <!-- ID KAMAR -->
                          <td><?php echo $no; ?></td>
                          <!-- ID KAMAR -->
                          <td><?php echo $row['id_pembayaran']; ?></td>
                          <td><?php echo $_SESSION['id_admin']?></td>
                           <td><?php echo $row['nama']; ?></td>
                           <td><?php echo $row['id_tagihan']; ?></td>
                          <!-- KAPASITAS -->
                          <td><?php echo $row['id_kamar']; ?></td>
                          <!-- HARGA -->
                          <td><?php echo substr($row['nominal'], 0, 20); ?></td>  
                          
                          
                          <td>
                            <a href="cetak.php?id=<?php echo $row['id_pembayaran']; ?>" class="btn btn-success btn-lg" onClick="return confirm('Apakah Ingin Mencetak Struk?')"><i class="fa fa-print" aria-hidden="true"></i>
                                <!-- <i class="fas fa-check"></i> -->
                                Cetak Struk
                              </a>
                          </td>
                        </tr>
                        <?php
                           $no++; //untuk nomor urut terus bertambah 1
                           }
                         ?>

                      </tbody>
                      </table>
                  </div>
              </form>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </div>
</body>
</html>
<?php

?>