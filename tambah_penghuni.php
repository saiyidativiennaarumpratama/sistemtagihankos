<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>TAMBAH PENGHUNI</title>
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
            <h1>TAMBAH PENGHUNI</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
              <div class="breadcrumb-item text-primary"><a href="penghuni.php">Data Penghuni</a></div>
              <div class="breadcrumb-item text-primary">Tambah Penghuni</div>
            </div>
          </div>
          <div class="row">
              <div class="col-12">
                <div class="card bg-primary">
                  </div>
                  <div class="card-body bg-primary">
                    <div class="row mt-4">
                      <div class="col-12 col-lg-8 offset-lg-2">
                        <div class="wizard-steps">
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-school"></i>
                            </div>
                            <div class="wizard-step-label">
                              Formulir Penghuni
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <form class="wizard-content mt-2" method="post" action="proses_tambahpenghuni.php">
                      <div class="wizard-pane">
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">ID PENGHUNI</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="text" name="id_penghuni" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">USERNAME</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="text" name="username" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">PASSWORD</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="text" name="password" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">NAMA</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="text" name="nama" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">ID KAMAR</label>
                          <div class="col-lg-4 col-md-6">
                            <select  class="form-control" name="id_kamar">
                            <option value="not_option"> silahkan pilih kamar</option>
                              <?php
                                  $query = "SELECT * FROM kamar ORDER BY id_kamar ASC";
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
                                  <option value="<?php echo $row['id_kamar']; ?>"><?php echo $row['id_kamar']; ?></option>
                                   <?php
                                    $no++; //untuk nomor urut terus bertambah 1
                                  }
                                  ?>
                            </select>                                  
                          </div>
                      </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">ALAMAT</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="text" name="alamat" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">NO TELP</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="text" name="no_telp" class="form-control">
                          </div>
                        </div>
                        <!-- <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">TANGGAL REGISTRASI</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="date" name="tgl_registrasi" class="form-control">
                          </div>
                        </div> -->
                        
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">LEVEL</label>
                          <div class="col-lg-4 col-md-6">
                            <select type="text" name="level" class="form-control">
                            <option value="not_option"> silahkan pilih level</option>
                            <?php
                                  // jalankan query untuk menampilkan semua data diurutkan berdasarkan
                                  $query = "SELECT * FROM penghuni ORDER BY level ASC";
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
                            <option value="<?php echo $row['level']; ?>"><?php echo $row['level']; ?></option>
                            <?php
                                    $no++; //untuk nomor urut terus bertambah 1
                                  }
                                  ?>
                                </select>
                          </div>

                        </div>
                       <!--  <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">ID TAGIHAN</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="text" name="id_tagihan" class="form-control">
                          </div>
                        </div> -->

                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">ID TAGIHAN</label>
                          <div class="col-lg-4 col-md-6">
                            <select  class="form-control" name="id_tagihan">
                            <option value="not_option">Masukkan Id Tagihan</option>
                              <?php
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
                                  <option value="<?php echo $row['id_tagihan']; ?>"><?php echo $row['id_tagihan']; ?></option>
                                   <?php
                                    $no++; //untuk nomor urut terus bertambah 1
                                  }
                                  ?>
                            </select>                                  
                          </div>
                      </div> 

                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">STATUS</label>
                          <div class="col-lg-4 col-md-6">
                            <!-- <input type="text" name="status" class="form-control"> -->
                            <select name="status" class="form-control">
                              <option value="belumbayar">Belum Bayar</option>
                              <option value="sudahbayar">Sudah Bayar</option>
                            </select> 

                          </div>
                        </div>                        
                        <div class="form-group row">
                          <div class="col-md-4"></div>
                          <div class="col-lg-4 col-md-6 text-right">
                            <button type="submit" class="btn btn-icon icon-right btn-primary">TAMBAH PENGHUNI<i class="fas fa-arrow-right"></i></button>
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