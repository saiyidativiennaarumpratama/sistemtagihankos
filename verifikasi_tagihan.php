<?php
require 'koneksi.php';

// untuk pembayaran
// $id_pembayaran=$_POST['id_pembayaran'];
$id_admin=$_POST['id_admin'];
$id_penghuni=$_POST['id_penghuni'];
$nama=$_POST['nama'];
$id_tagihan=$_POST['id_tagihan'];
$id_kamar=$_POST['id_kamar'];
$nominal=$_POST['nominal'];
$status='sudahbayar';


$sql="INSERT into pembayaran(id_admin, nama, id_tagihan, id_kamar, nominal) VALUES ('$id_admin', '$nama', '$id_tagihan', '$id_kamar', '$nominal')";
$hasil = mysqli_query($koneksi, $sql);


$update_status="UPDATE penghuni set status='sudahbayar' where id_penghuni='$id_penghuni' ";
// $sql="UPDATE tagihan set status='lunas' where id_pengaduan='$_GET[id_tagihan]'";
$hasil_update=mysqli_query($koneksi, $update_status);
if ($hasil_update) {
	header ('location:pembayaran.php');
}


// $row=mysql_fetch_array(mysql_query("select * from kamar"));
// $sql=mysql_query("select * from tagihan");
// while($data=mysql_fetch_array($sql)){
//    if ($data['id_tagihan']>=$row['nominal']){ 
//       $status = 'lunas'; 
//    }else{ 
//       $status = 'belumlunas'; 
//    }
// }
?>