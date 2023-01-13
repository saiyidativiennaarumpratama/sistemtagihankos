<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $id = $_POST['id'];

 $username              = $_POST['username'];
  $password              = $_POST['password'];
  $nama                  = $_POST['nama'];
  // $level                 = $_POST['level'];
  //cek dulu jika merubah gambar produk jalankan coding ini
  
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                    $query  = "UPDATE admin SET username = '$username' WHERE id_admin = '$id'";
                    $result = mysqli_query($koneksi, $query);
                     $query  = "UPDATE admin SET password = '$password' WHERE id_admin = '$id'";
                    $result = mysqli_query($koneksi, $query);
                     $query  = "UPDATE admin SET nama = '$nama' WHERE id_admin = '$id'";
                    $result = mysqli_query($koneksi, $query);
                    //  $query  = "UPDATE admin SET level = '$level' WHERE id_admin = '$id'";
                    // $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='akunpengguna.php';</script>";
                    }
              
			  
			  ?>