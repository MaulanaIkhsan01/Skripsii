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
$pdf->Cell(25.5,0.7,"Laporan Data Project",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("d/m/Y | H:i"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Project', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Deskripsi', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Kategori', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Case', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Assignee', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Priority', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Status', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$conn = mysqli_connect('localhost', 'root', '', 'skripsi_ikhsan');
                    $query = "SELECT * FROM project
                              INNER JOIN kategori ON project.id_kategori = kategori.id_kategori 
                              INNER JOIN project_case ON project.id_case = project_case.id_case 
                              INNER JOIN tb_tracking ON project.id_tracking = tb_tracking.id_tracking 
                              INNER JOIN pegawai ON project.id_pegawai = pegawai.id_pegawai 
                              INNER JOIN tb_priority On project.id_priority = tb_priority.id_priority
                              ORDER BY id_project
                    ";
                    $query_run = mysqli_query($conn, $query);
                    $no = 1;
                    if ($query_run) {
                       foreach ($query_run as $d) {

	$pdf->Cell(1, 0.8, $no++ , 1, 0, 'C');
    $pdf->Cell(4, 0.8, $d['nama_project'], 1, 0,'C');
	$pdf->Cell(5, 0.8, $d['deskripsii'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $d['nama_kategori'],1, 0, 'C');
    $pdf->Cell(3, 0.8, $d['nama_case'],1, 0, 'C');
    $pdf->Cell(5, 0.8, $d['nama_pegawai'],1, 0, 'C');
    $pdf->Cell(2, 0.8, $d['nama_priority'],1, 0, 'C');
	$pdf->Cell(2, 0.8, $d['nama_tracking'],1, 1, 'C');
	
	$no++;
}
} else {
  echo "No record Found";
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


$pdf->Output("LAPORAN_PROJECT.pdf","I");

?>

