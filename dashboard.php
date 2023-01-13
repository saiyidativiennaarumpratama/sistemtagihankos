<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  include ('tampilan/header.php');
  include ('tampilan/sidebar.php');
  include ('tampilan/footer.php');

  $sql="SELECT * from penghuni";
  $hasil = mysqli_query($koneksi, $sql);
  if ($row=mysqli_num_rows($hasil)) {
    // code...
  }
?>
 <!-- Main Content -->
      <div class="main-content bg-primary">
        <h1 style="color: white;">WELCOME TO MY KOST</h1>
        <section class="section">
          Anda Login Sebagai  : <b style="color: black;"> <?php echo $_SESSION['username']; 

          $sql="SELECT * from penghuni";
          $hasil = mysqli_query($koneksi, $sql);
          if ($row=mysqli_num_rows($hasil)) {
            // code...
          }
          ?>
          
          <br> <br>
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Penghuni : </div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">Ada <?php echo $row; ?> Data Penghuni</div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-comments fa-2x text-gray-300"></i>
                              <span class="badge badge-danger badge-counter"><?php echo $row; ?></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
        <?php
          $sql="SELECT * from admin where level='admin'";
          $hasil = mysqli_query($koneksi, $sql);
          if ($row=mysqli_num_rows($hasil)) {
            // code...
          }
          ?>
          <br> <br>
                  
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-right-primary shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Admin : </div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">Ada <?php echo $row; ?> Data Admin</div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-comments fa-2x text-gray-300"></i>
                              <span class="badge badge-danger badge-counter"><?php echo $row; ?></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

        <?php
          $sql="SELECT * from pembayaran";
          $hasil = mysqli_query($koneksi, $sql);
          if ($row=mysqli_num_rows($hasil)) {
            // code...
          }
          ?>
          <br> <br>
                  
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-right-primary shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Pembayaran : </div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">Ada <?php echo $row; ?> Data Pembayaran</div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-comments fa-2x text-gray-300"></i>
                              <span class="badge badge-danger badge-counter"><?php echo $row; ?></span>
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
