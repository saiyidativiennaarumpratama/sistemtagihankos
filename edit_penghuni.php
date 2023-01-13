<?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM penghuni,kamar where penghuni.id_penghuni='$id' AND penghuni.id_kamar=kamar.id_kamar";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='penghuni.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='penghuni.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>EDIT PENGHUNI</title>
    <link href="logo.png" rel="icon">
   
  </head>
<body>
 
  <?php
  
  include ('tampilan/header.php');
  include ('tampilan/sidebar.php');
  include ('tampilan/footer.php');
?>

<div class="main-content bg-primary">
        <section class="section">
          <div class="section-header">
            <h1>EDIT PENGHUNI</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="penghuni.php.php">Data Penghuni</a></div>
              <div class="breadcrumb-item text-primary">Edit Penghuni</div>
            </div>
          </div>
          <div class="row">
              <div class="col-12">
                <div class="card">
                  </div>
                  <div class="card-body bg-primary">
                    <div class="row mt-4">
                      <div class="col-12 col-lg-8 offset-lg-2">
                        <div class="wizard-steps">
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-users"></i>
                            </div>
                            <div class="wizard-step-label">
                              Formulir Edit Penghuni
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <form class="wizard-content mt-2" method="post" action="proses_editpenghuni.php">
                      <div class="wizard-pane">
                        <input name="id" value="<?php echo $data['id_penghuni']; ?>" hidden />
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">ID PENGHUNI</label>
                          <div class="col-lg-4 col-md-6">
                            <input name="id_penghuni" value="<?php echo $data['id_penghuni']; ?>"  disabled="" />
                          </div>
                        </div> 
                         <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">USERNAME</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>">
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">PASSWORD</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="text" name="password" class="form-control" value="<?php echo $data['password']; ?>">
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">NAMA</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required=""/>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">ID KAMAR</label>
                          <div class="col-lg-4 col-md-6">
                            <select name="id_kamar">
                                    
                                    <?php
                                    $idbarangyangdipilih=$data['id_kamar']; 
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
                              <option value="<?php echo $row['id_kamar']; ?>" <?php if($row['id_kamar']=="$idbarangyangdipilih"){?> selected="selected" <?php } ?>><?php echo $row['id_kamar']; ?></option>
                               <?php
                                      $no++; //untuk nomor urut terus bertambah 1
                                    }
                                    ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">ALAMAT</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" required=""/>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">NO TELP</label>
                          <div class="col-lg-4 col-md-6">
                              <input type="text" name="no_telp" value="<?php echo $data['no_telp']; ?>" required=""/>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">TANGGAL REGISTRASI</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="date" name="tgl_registrasi" value="<?php echo $data['tgl_registrasi']; ?>" disabled="disabled"/>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">STATUS</label>
                          <div class="col-lg-4 col-md-6">
                            <!-- <input type="text" name="status" value="<?php echo $data['status']; ?>"/> -->
                            <select name="status">
                              <option value="belumbayar">Belum Bayar</option>
                              <option value="sudahbayar">Sudah Bayar</option>
                            </select> 
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">ID TAGIHAN</label>
                          <div class="col-lg-4 col-md-6">
                            <select name="id_tagihan">
                            <?php
                            $query = "SELECT * FROM tagihan";
                            $result = mysqli_query($koneksi, $query);
                            while($row = mysqli_fetch_assoc($result)) :
                            ?> 
                              <option value="<?= $row['id_tagihan'] ?>"><?= $row['tahun'] ?></option>
                          <?php endwhile ?>
                          </select> 
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <div class="col-md-4"></div>
                          <div class="col-lg-4 col-md-6 text-right">
                            <button type="submit" class="btn btn-icon icon-right btn-primary">UBAH PENGHUNI<i class="fas fa-arrow-right"></i></button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      
    </div>
    </div>