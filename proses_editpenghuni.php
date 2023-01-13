<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

  // membuat variabel untuk menampung data dari form
  $id = $_POST['id'];

  $username       = $_POST['username'];
  $password       = $_POST['password'];
  $nama           = $_POST['nama'];
  $id_kamar       = $_POST['id_kamar'];
  $alamat         = $_POST['alamat'];
  $no_telp        = $_POST['no_telp'];
  $id_tagihan     = $_POST['id_tagihan'];
  $status         = $_POST['status'];



  //cek dulu jika merubah gambar produk jalankan coding ini
  
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE penghuni SET username = '$username', password = '$password', nama = '$nama', id_kamar = '$id_kamar', alamat = '$alamat',no_telp = '$no_telp', id_tagihan = '$id_tagihan', status='$status' WHERE id_penghuni = '$id'";
                    // periska query apakah ada error
                    $result = mysqli_query($koneksi, $query);
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='penghuni.php';</script>";
                    }
              
        
        ?>
