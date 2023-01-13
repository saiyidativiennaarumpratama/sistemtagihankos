<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DATA KAMAR</title>
    <link href="logo.png" rel="icon">

    
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
            <h1>DATA KAMAR</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="kamar.php">Data Kamar</a></div>
            </div>
          </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>LIST DATA</h4>
                    <div class="card-header-form">
                      <form>
                          <div class="input-group-btn">
                            <a href="tambah_kamar.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                          <th>NAMA KAMAR</th>
                          <th>KAPASITAS</th>
                          <th>HARGA</th>
                          <th>ACTION</th>
                        </tr>
                        </thead>
                         <tbody>
                           <?php
                              // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                              $query = "SELECT * FROM kamar ORDER BY id_kamar ASC";
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
                          <td><?php echo $no; ?></td>
                          <!-- ID KAMAR -->
                          <td><?php echo $row['id_kamar']; ?></td>
                          <!-- KAPASITAS -->
                          <td><?php echo $row['kapasitas']; ?></td>
                          <!-- HARGA -->
                          <td><?php echo substr($row['nominal'], 0, 20); ?></td>   
                          <td>
                          <a href="edit_kamar.php?id=<?php echo $row['id_kamar']; ?>"class="btn btn-success"><i class="fas fa-edit"></i></a>
                          <a href="proses_hapuskamar.php?id=<?php echo $row['id_kamar']; ?>" class="btn btn-danger" onClick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fas fa-trash"></i></a>
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