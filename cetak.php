<?php
require 'koneksi.php';

//koneksi ke database
$id_pembayaran=$_GET['id'];

//Memanggil file FPDF dari file yang anda download tadi
require('./fpdf/fpdf.php');

$pdf = new FPDF("P","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,"Struck Pembayaran",0,1,'C');
$pdf->Cell(0,0.5,"",0,1);
$pdf->Line(2,2,18.5,2);
$pdf->SetFont('Arial','',11);
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
//Tidak berpengaruh dengan database hanya sebagai keterangan pada tabel nantinya
$pdf->Cell(1, 0.8, 'no', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'id pembayaran', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'id admin', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'nama', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'id tagihan', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'id kamar', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'nominal', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
//Panggil tblcomplaints dari database cms
    $sql = "SELECT * FROM `pembayaran` WHERE id_pembayaran='$_GET[id]' ";
    $result = mysqli_query($koneksi, $sql);
    while($row = mysqli_fetch_assoc($result)){
//Queri tabel yang ingin ditampilkan
    $pdf->Cell(1, 0.8, $no, 1, 0, 'C');
    $pdf->Cell(3, 0.8, $row['id_pembayaran'], 1, 0,'C');
    $pdf->Cell(2, 0.8, $row['id_admin'],1, 0, 'C');
    $pdf->Cell(3, 0.8, $row['nama'],1, 0, 'C');
    $pdf->Cell(2, 0.8, $row['id_tagihan'],1, 0, 'C');
    $pdf->Cell(3, 0.8, $row['id_kamar'],1, 0, 'C');
    $pdf->Cell(3, 0.8, $row['nominal'],1, 1, 'C');

    $no++;
}
$pdf->ln(1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(27.5,0.5,"Bangkalan, ".date("d/m/Y"),0,1,'C');
$pdf->Cell(27.5,0.5,"Mengetahui",0,1,'C');
$pdf->Cell(27.5,0.5,"Pemilik kos",0,1,'C');

$pdf->ln(1);
$pdf->Cell(27.5,0.1,"_________________________",0,1,'C');

//Nama file ketika di print
$pdf->Output("Struk.pdf","I");

?>
