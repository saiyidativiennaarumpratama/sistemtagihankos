<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $id = $_POST['id'];

  $id_kamar      = $_POST['id_kamar'];
  $kapasitas     = $_POST['kapasitas'];
  $nominal     = $_POST['nominal']; 
  //cek dulu jika merubah gambar produk jalankan coding ini
  
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                    $query  = "UPDATE kamar SET id_kamar = '$id_kamar' WHERE id_kamar = '$id'";
                    $result = mysqli_query($koneksi, $query);
                    $query  = "UPDATE kamar SET kapasitas = '$kapasitas' WHERE id_kamar = '$id'";
                    $result = mysqli_query($koneksi, $query);
                    $query  = "UPDATE kamar SET nominal = '$nominal' WHERE id_kamar = '$id'";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='kamar.php';</script>";
                    }
              
			  
			  ?>
