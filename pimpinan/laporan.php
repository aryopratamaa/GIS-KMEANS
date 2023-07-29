<?php
include '../assets/conn/config.php';
require('../assets/pdff/fpdf.php');
$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../assets/img/logo.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'MTS PERSIAPAN NEGERI 4 MEDAN',0,'L');
$pdf->SetX(4);
$pdf->SetFont('Times','',10);
$pdf->MultiCell(19.5,0.5,'Telepon/Fax : 0852-7632-5051',0,'L');    
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl. Jala Raya, Besar, Kec. Medan Labuhan, Kota Medan, Sumatera Utara 20251',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Website : https://mtspersiapannegeri4medan.business.site',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Times','B',14);
$pdf->Cell(25.5,0.7,"LAPORAN HASIL ANALISA METODE MOORA",0,10,'C');
$pdf->ln(1);

$pdf->SetFont('Times','B',10);
$pdf->SetFont('Times','B',10);
$pdf->Cell(5, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(8, 0.8, 'Nama Alternatif', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Nilai Akhir', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Rangking', 1, 1, 'C');
$pdf->SetFont('Times','',10);
$no=1;
$query=mysql_query("SELECT * FROM tbl_alternatif order by nilai_akhir desc");
while($lihat=mysql_fetch_array($query)){
	
	$pdf->Cell(5, 0.8, $no, 1, 0,'C');
	$pdf->Cell(8, 0.8, $lihat['nama_alternatif'], 1, 0,'L');
	$pdf->Cell(6, 0.8, number_format($lihat['nilai_akhir'],4), 1, 0,'C');
	$pdf->Cell(6, 0.8, $lihat['rangking'] , 1, 1, 'C');
	$no++;
}


$pdf->SetFont('Times','',12);
$pdf->SetX(2); 
$pdf->Cell(0,3,'Dikeluar di  		   : Medan',0,0,'L');
$pdf->SetX(2); 
$pdf->Cell(0,4,"Pada Tanggal 		: ".date("D-d/m/Y"),0,0,'L');
$pdf->SetFont('Times','B',10);
$pdf->SetX(2); 
$pdf->Cell(0,5,'YAYASAN',0,0,'L');
$pdf->SetX(2); 
$pdf->Cell(0,10,'...................................................',0,0,'L');


$pdf->Output("laporan_buku.pdf","I");

?>

