<?php if(isset($_GET['print']) && $_GET['print']=="yes") 
	{
		include '../config.php';
		session_start();
		require('../fpdf16/fpdf.php');

		class PDF extends FPDF
		{
		
		function PrintReport()
		{
			$head = ""; 
			if(isset($_GET['tipe'])) { 
				if($_GET['tipe']=='tahun') 
				{ 
					$tahun = $_GET['tahun']; 
					$head = "tahun ".$tahun; 
				} 
				else if($_GET['tipe']=='bulan') 
				{ 
					$tahun = $_GET['tahun']; 
					$bulan = $_GET['bulan']; 
					$head =  "tahun ".$_GET['tahun']." bulan ".date("F", mktime(0, 0, 0, $bulan, 10)); 
				} 
				else if($_GET['tipe']=='hari') 
				{ 
					$tahun = $_GET['tahun']; 
					$bulan = $_GET['bulan']; 
					$hari = $_GET['hari']; 
					$head = "tahun ".$tahun." bulan ".date("F", mktime(0, 0, 0, $bulan, 10))." tanggal ".$hari; 
				} 
			}
			$this->SetFillColor(224,235,255);
			$this->SetTextColor(0);
			$this->SetLineWidth(.0);
			$this->SetFont('');
			$this->SetDrawColor(128,0,0);
			$this->SetFont('Arial','B',16);
			$this->Cell(700,10,'Laporan Data Pemesanan '.$head,0);
			$this->Ln(15);
			$w=array(10,35,30,25,90);
			$this->SetFont('Arial','',9);
			$this->Cell($w[0],6,'No','0',0,'C',true);
			$this->Cell($w[1],6,'Paket Wedding','0',0,'C',true);
			$this->Cell($w[2],6,'Yang telah dibayar','0',0,'C',true);
			$this->Cell($w[3],6,'Tanggal acara','0',0,'C',true);
			$this->Cell($w[4],6,'Konsep Pelanggan','0',0,'C',true);
			$kondisi = ""; 
			if(isset($_GET['tipe'])) { 
				if($_GET['tipe']=='tahun') 
				{ 
					$tahun = $_GET['tahun']; 
					$kondisi = "AND YEAR(tanggal_pesan) = ".$tahun;
				} 
				else if($_GET['tipe']=='bulan') 
				{ 
					$tahun = $_GET['tahun']; 
					$bulan = $_GET['bulan']; 
					$kondisi = "AND YEAR(tanggal_pesan) = ".$tahun." AND MONTH(tanggal_pesan) = ".$bulan;
				} 
				else if($_GET['tipe']=='hari') 
				{ 
					$tahun = $_GET['tahun']; 
					$bulan = $_GET['bulan']; 
					$hari = $_GET['hari']; 
					$kondisi = "AND YEAR(tanggal_pesan) = ".$tahun." AND MONTH(tanggal_pesan) = ".$bulan." AND DAY(tanggal_pesan) = ".$hari;
				}
			} 
			try{
				$db=config::getInstance();
				$query="SELECT w.nama_paket as NAMA_PAKET, w.harga  as HARGA_PAKET, p.tanggal_acara as TANGGAL_ACARA, p.konsep_acara as KONSEP_ACARA, p.id_pemesanan as ID_PEMESANAN, p.status_verifikasi as STATUS_VERIFIKASI FROM pemesanan p, wedding w WHERE p.kode_paket=w.kode_paket ".$kondisi;
				$stmt=$db->prepare($query);
				$stmt->execute();
			}catch (Exception $e){
				$e->getMessage();
			}
			$this->Ln();
			$i = 1;
			$total = 0;
			while($row=$stmt->fetch()){
				$this->Cell($w[0],6,$i++,'0',0,'C',false);
				$this->Cell($w[1],6,$row['NAMA_PAKET'],'0',0,'C',false);
				$this->Cell($w[2],6,$row['HARGA_PAKET'],'0',0,'C',false);
				$total += $row['HARGA_PAKET'];
				$this->Cell($w[3],6,$row['TANGGAL_ACARA'],'0',0,'C',false);
				$this->Cell($w[4],6,$row['KONSEP_ACARA'],'0',0,'C',false);
				$this->Ln();
			}
			$this->Cell($w[0],6,'','0',0,'C',true);
			$this->Cell($w[1],6,'','0',0,'C',true);
			$this->Cell($w[2],6,$total,'0',0,'C',true);
			$this->Cell($w[3],6,'','0',0,'C',true);
			$this->Cell($w[4],6,'','0',0,'C',true);
		}
		}

		$pdf=new PDF();
		$pdf->AddPage();
		$pdf->PrintReport();
		$pdf->Output();
	}
?>