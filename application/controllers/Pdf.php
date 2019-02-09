<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {

	public function cetak($id_invetaris)
	{
		$this->load->model('m_inventaris');
		$this->load->model('m_barang');
		$this->load->library('pdf/fpdf');

		$pdf = new FPDF("p","cm","A4");

		$pdf->SetMargins(0.7,1,1);
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times','B',11);
		$pdf->MultiCell(19.5,0.5,'',0,'P');
		$pdf->SetFont('Arial','B',14);
		$pdf->SetX(2);
		$pdf->Cell(17,0.7,"Laporan Data Stok Opname",0,10,'C');
		$pdf->ln(0.8);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(5,0.7,"       Di cetak pada : ".date("D-d/m/Y"),0,1,'C');
		foreach ($this->m_inventaris->ambil_inventaris_byid($id_invetaris) as $key => $value) {
			$pdf->SetX(0);
			$pdf->Cell(5,0.7,"Nama Toko : ".$value['nama_pengguna'],0,0,'C');
		}
		$no = 1;
		foreach ($this->m_barang->ambil_kategori_barang() as $key => $value) {
			$pdf->ln(0.5);
			$pdf->SetFont('Arial','B',10);
			$pdf->SetFillColor(25, 25, 112);
			$pdf->Cell(17,0.7,'                       '.$value['nama_kategori'],0,10,'C');
			$pdf->SetFont('Arial','B',8);
			$pdf->SetFillColor(25, 25, 112);
			$pdf->Cell(1, 1, 'NO', 1, 0, 'C');
			$pdf->Cell(2.3, 1,'Nama Barang', 1, 0, 'C');
			$pdf->Cell(1.5, 1, 'Merk', 1, 0, 'C');
			$pdf->Cell(1.5, 1, 'Satuan', 1, 0, 'C');
			$pdf->Cell(2.3, 1, 'Harga', 1, 0, 'C');
			$pdf->Cell(2.2, 1, 'Kuantitas Toko', 1, 0, 'C');
			$pdf->Cell(2.8, 1, 'Kuantitas Pengawas', 1, 0, 'C');
			$pdf->Cell(2, 1, 'Status Baik', 1, 0, 'C');
			$pdf->Cell(2, 1, 'Status Rusak', 1, 0, 'C');
			$pdf->Cell(2, 1, 'Keterangan', 1, 1, 'C');
			$pdf->SetFont('Arial','',8);
			foreach ($this->m_inventaris->ambil_barang_inventaris($id_invetaris) as $key1 => $value1) {
				if($value['id_kategori'] == $value1['id_kategori']) {
					$pdf->Cell(1, 0.5, $no++ , 1, 0, 'C');
					$pdf->Cell(2.3, 0.5, $value1['nama_barang'], 1, 0,'C');
					$pdf->Cell(1.5, 0.5, $value1['merk'],1, 0, 'C');
					$pdf->Cell(1.5, 0.5, $value1['satuan'],1, 0, 'C');
					$pdf->Cell(2.3, 0.5, 'Rp. '.number_format($value1['harga'], 2, ',', '.'), 1, 0,'C');
					$pdf->Cell(2.2, 0.5, $value1['kuantitas_toko'], 1, 0,'C');
					$pdf->Cell(2.8, 0.5, $value1['kuantitas_pengawas'], 1, 0,'C');
					$pdf->Cell(2, 0.5, $value1['status_baik'], 1, 0,'C');
					$pdf->Cell(2, 0.5, $value1['status_rusak'], 1, 0,'C');
					$pdf->Cell(2, 0.5, $value1['keterangan'], 1, 1,'C');
				}
			}
		}

		$pdf->SetFont('arial','',9.5);
		$pdf->SetLineWidth(.1);
		$pdf->Ln(1);
		$pdf->SetX(14.5);
		$pdf->Cell(8,1,'Palembang, '.date("d/m/Y"),0,1,'L');
		$pdf->Ln(0.2);

		$pdf->SetX(2);
		$pdf->Cell(8,1,'Dibuat Oleh, ',0,0,'L');
		$pdf->SetX(8);
		$pdf->Cell(8,1,'Mengetahui, ',0,0,'L');
		$pdf->SetX(14.5);
		$pdf->Cell(8,1,'Menyetujui, ',0,1,'L');
		$pdf->Ln(1.2);
		$pdf->SetX(2);
		$pdf->Cell(8,1,'(...........................)',0,0,'L');
		$pdf->SetX(8);
		$pdf->Cell(8,1,'(...........................)',0,0,'L');
		$pdf->SetX(14.5);
		$pdf->Cell(8,1,'(...........................)',0,0,'L');
		$pdf->SetX(2);
		$pdf->SetFont('arial','',7);
		$pdf->Cell(8,2,'No. NRA : SAT/FRM/GA/028',0,0,'L');
		$pdf->Output("laporan_stok_opname.pdf","I");
	}
}
