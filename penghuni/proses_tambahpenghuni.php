<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

  // membuat variabel untuk menampung data dari form
  $id_penghuni    = $_POST['id_penghuni'];
  $username       = $_POST['username'];
  $password       = $_POST['password'];
  $nama           = $_POST['nama'];
  $id_kamar       = $_POST['id_kamar'];
  $alamat         = $_POST['alamat'];
  $no_telp        = $_POST['no_telp'];
  $tgl_registrasi = $_POST['tgl_registrasi'];
  $level          = $_POST['level'];
  $id_tagihan     = $_POST['id_tagihan'];
  // $status         = $_POST['status'];
  $status='belumbayar';
 



        $query = "INSERT INTO penghuni(id_penghuni, username, password, nama, id_kamar, alamat, no_telp, tgl_registrasi, level, id_tagihan, status) VALUES ('$id_penghuni','$username', '$password','$nama', '$id_kamar', '$alamat', '$no_telp', '$tgl_registrasi', '$level', '$id_tagihan', '$status')";
        $result = mysqli_query($koneksi, $query); 
        // periska query apakah ada error
        if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='penghuni.php';</script>";
                  }

            ?>
