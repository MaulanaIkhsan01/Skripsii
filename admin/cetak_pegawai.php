<?php
include '../koneksi.php';
require('../pdf/fpdf.php');
date_default_timezone_set('Asia/Jakarta');
$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('https://ismata.co.id/logo.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'PT ISMATA NUSANTARA ABADI',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 0821-1014-8215',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Kp poncol Bulak Rt02/17 Jakasetia,Bekasi Selatan',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : https://www.ruhmtech.id/ - email : hello@ruhmtech.id',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Pegawai",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("d/m/Y | H:i"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Pegawai', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jabatan', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Tempat Lahir', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal Lahir', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Telepon', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jenis Kelamin', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Email', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;

$query = "SELECT * FROM pegawai
INNER JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan
ORDER BY id_pegawai
";
$sql_pegawai = mysqli_query($conn, $query) or die(mysqli_error($conn));
while ($data = mysqli_fetch_array($sql_pegawai)) {

	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
    $pdf->Cell(4, 0.8, $data['nama_pegawai'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $data['nama_jabatan'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $data['tempatlahir'],1, 0, 'C');
    $pdf->Cell(3, 0.8, $data['tanggallahir'],1, 0, 'C');
    $pdf->Cell(3, 0.8, $data['tel'],1, 0, 'C');
    $pdf->Cell(3, 0.8, $data['jenis_kelamin'],1, 0, 'C');
	$pdf->Cell(5, 0.8, $data['email'],1, 1, 'C');
	
	$no++;
}
$pdf->ln(1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40.5,0.7,"Tanggal: ".date("d/m/Y"),0,0,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40.5,0.7,"Mengetahui",0,10,'C');

$pdf->ln(1);
$pdf->ln(1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40.5,0.7,"Ruhmtech",0,10,'C');


$pdf->Output("LAPORAN_PEGAWAI.pdf","I");

?>

