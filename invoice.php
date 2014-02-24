<?php if(isset($_GET['print']) && $_GET['print']=="yes") 
	{
		include 'config.php';
		session_start();
		require('fpdf16/fpdf.php');

		class PDF extends FPDF
		{
		
		function PrintInvoice()
		{
			$id = $_GET['id'];
			try{
				$db=config::getInstance();
				$query="SELECT k.*, ko.nama_kota as NAMA_KOTA, w.nama_paket as NAMA_PAKET, w.harga as HARGA_PAKET, p.tanggal_acara as TANGGAL_ACARA, p.bukti_pembayaran as BUKTI_BAYAR, p.konsep_acara as KONSEP_ACARA, p.id_pemesanan as ID_PEMESANAN, p.status_verifikasi as STATUS_VERIFIKASI FROM konsumen k , wedding w, pemesanan p, kota ko WHERE k.id_konsumen = p.id_konsumen AND p.kode_paket=w.kode_paket AND ko.id_kota = k.kota AND p.id_pemesanan = ".$id;
				$stmt=$db->prepare($query);
				$stmt->execute();
			}catch (Exception $e){
				$e->getMessage();
			}
			$row=$stmt->fetch();
			$this->SetFillColor(224,235,255);
			$this->SetTextColor(0);
			$this->SetLineWidth(.0);
			$this->SetFont('');
			$this->SetDrawColor(128,0,0);
			$this->SetFont('Arial','',20);
			$this->Image('img/mutiara.png',10,10,45);
			$this->Cell(150,6,'INVOICE','',0,'R',false);
			$this->Ln();
			$this->SetFont('Arial','',12); 
			$this->Cell(150,6,date( "d/m/Y", time() ),'',0,'R',false);
			$this->Ln();
			$this->Cell(150,6,'Nota #'.$id,'',0,'R',false);
			$this->Ln();
			$this->Cell(150,6,'PEMBAYARAN UANG DP','',0,'R',false);
			$this->Ln(15);
			$this->SetFont('Arial','B',12); 
			$this->Cell(150,6,'Telah terima dari','B',0,'L',false);
			$this->Ln();
			$w=array(70,80);
			$this->SetFont('Arial','',12);
			$this->Cell($w[0],6,'Nama Konsumen','0',0,'L',true);
			$this->Cell($w[1],6,': '.$row['NAMA_KONSUMEN'],'0',0,'L',true);
			$this->Ln();
			$this->Cell($w[0],6,'Alamat Konsumen','0',0,'L',false);
			$this->Cell($w[1],6,': '.$row['ALAMAT'],'0',0,'L',false);
			$this->Ln();
			$this->Cell($w[0],6,'No telp','0',0,'L',true);
			$this->Cell($w[1],6,': '.$row['NO_TELP'],'0',0,'L',true);
			$this->Ln(10);
			$this->SetFont('Arial','B',12);
			$this->Cell(150,6,'Untuk pemesanan','B',0,'L',false);
			$this->Ln();
			$this->SetFont('Arial','',12);
			$this->Cell($w[0],6,'Nama Paket','0',0,'L',false);
			$this->Cell($w[1],6,': '.$row['NAMA_PAKET'],'0',0,'L',false);
			$this->Ln();
			$this->Cell($w[0],6,'Harga Paket','0',0,'L',true);
			$this->Cell($w[1],6,': Rp '.$row['HARGA_PAKET'],'0',0,'L',true);
			$this->Ln();
			$this->Cell($w[0],6,'Tanggal Acara','0',0,'L',false);
			$this->Cell($w[1],6,': '.$row['TANGGAL_ACARA'],'0',0,'L',false);
			$this->Ln();
			$this->Cell($w[0],6,'Konsep Acara','0',0,'L',true);
			$this->Cell($w[1],6,': '.$row['KONSEP_ACARA'],'0',0,'L',true);
			$this->Ln(10);
			$this->SetFont('Arial','B',14); 
			$dp = (int)$row['HARGA_PAKET']/10;
			$this->Cell(150,6,'Telah dibayar sebesar Rp '.$dp,'T',0,'C',false);
			$this->Ln();
			$this->SetFont('Arial','BI',12); 
			$this->Cell(150,6,'sebagai uang muka','B',0,'C',false);
			$this->Ln(10);
			$this->SetFont('Arial','I',14); 
			$this->Cell(150,6,'Terima kasih atas kepercayaan Anda kepada kami','',0,'C',false);
			$this->Ln(20);
			$this->SetFont('Arial','I',12); 
			$this->Cell(150,6,'*) nota ini dapat digunakan sebagai bukti yang sah','',0,'L',false);
			$this->Ln();
		}
		}

		$pdf=new PDF();
		$pdf->AddPage();
		$pdf->PrintInvoice();
		$pdf->Output();
	}
?>