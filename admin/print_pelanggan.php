<?php if(isset($_GET['print']) && $_GET['print']=="yes") 
	{
		include '../config.php';
		session_start();
		require('../fpdf16/fpdf.php');

		class PDF extends FPDF
		{
		
		function PrintInvoice()
		{
			$id = $_GET['id'];
			$this->SetFillColor(224,235,255);
			$this->SetTextColor(0);
			$this->SetLineWidth(.0);
			$this->SetFont('');
			$this->SetDrawColor(128,0,0);
			$this->SetFont('Arial','',12);
			$this->Cell(700,10,'Laporan Data Pelanggan',0);
			$this->Ln(15);
			$w=array(30,22,18,20,18,15,22,20);
			$this->SetFont('Arial','',9);
			$this->Cell($w[0],6,'Nama','0',0,'C',true);
			$this->Cell($w[1],6,'Jenis Kelamin','0',0,'C',true);
			$this->Cell($w[2],6,'Alamat','0',0,'C',true);
			$this->Cell($w[3],6,'Kota','0',0,'C',true);
			$this->Cell($w[4],6,'Provinsi','0',0,'C',true);
			$this->Cell($w[5],6,'Kode Pos','0',0,'C',true);
			$this->Cell($w[6],6,'No Telp','0',0,'C',true);
			$this->Cell($w[7],6,'Email','0',0,'C',true);
			
			try{
				$db=config::getInstance();
				$query="SELECT k.*, ko.nama_kota as NAMA_KOTA, p.nama_provinsi as NAMA_PROV FROM konsumen k ,kota ko, provinsi p WHERE ko.id_kota = k.kota AND k.prop = p.id_provinsi AND ko.id_provinsi = p.id_provinsi";
				$stmt=$db->prepare($query);
				$stmt->execute();
			}catch (Exception $e){
				$e->getMessage();
			}
			$this->Ln();
			while($row=$stmt->fetch()){
				$this->Cell($w[0],6,$row['NAMA_KONSUMEN'],'0',0,'L',false);
				$this->Cell($w[1],6,$row['JENIS_KELAMIN'],'0',0,'C',false);
				$this->Cell($w[2],6,$row['ALAMAT'],'0',0,'L',false);
				$this->Cell($w[3],6,$row['NAMA_KOTA'],'0',0,'L',false);
				$this->Cell($w[4],6,$row['NAMA_PROV'],'0',0,'L',false);
				$this->Cell($w[5],6,$row['KODE_POS'],'0',0,'L',false);
				$this->Cell($w[6],6,$row['NO_TELP'],'0',0,'L',false);
				$this->Cell($w[7],6,$row['EMAIL'],'0',0,'L',false);
				$this->Ln();
			}
		}
		}

		$pdf=new PDF();
		$pdf->AddPage();
		$pdf->PrintInvoice();
		$pdf->Output();
	}
?>