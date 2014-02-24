<?php include '../config.php' ?>
<?php
try{
    $db=config::getInstance();
    $insertKonsumen='INSERT INTO konsumen(NAMA_KONSUMEN,JENIS_KELAMIN,ALAMAT,KOTA,PROP,KODE_POS,NO_TELP,EMAIL) VALUES (:nama_konsumen,:jenis_kelamin,:alamat,:kota,:prop,:kode_pos,:no_tlp,:email)';
	$tgl_acara = isset($_REQUEST["tanggal_acara"]) ? $_REQUEST["tanggal_acara"] : "";
	$validasi = "0";
	if(isset($_POST['validation']) && $_POST['validation']=='1')
	{
		$validasi = "1";
	}
	$insertTransaksi='INSERT INTO pemesanan (ID_KONSUMEN,KODE_PAKET,KONSEP_ACARA,BUKTI_PEMBAYARAN,UANG_DP,TANGGAL_PESAN,TANGGAL_ACARA,STATUS_VERIFIKASI) VALUES (:id_konsumen,:kode_paket,:konsep_acara,:bukti_bayar,:uang_dp,now(),:tanggal_acara,'.$validasi.')';
	$insertPaketLain='INSERT INTO `package`(`id_pemesanan_element`, `elements`) VALUES (:id_pemesanan,:element)';
	
    if(isset($_POST['action'])){
		if($_POST['action']=='insertNew'){
            $stmt=$db->prepare($insertKonsumen);
			$stmt->bindParam(':nama_konsumen',$_POST['nama']);
			$stmt->bindParam(':jenis_kelamin',$_POST['jeniskelamin']);
			$stmt->bindParam(':alamat',$_POST['alamat']);
			$stmt->bindParam(':kota',$_POST['kota']);
			$stmt->bindParam(':prop',$_POST['provinsi']);
			$stmt->bindParam(':kode_pos',$_POST['kodepos']);
			$stmt->bindParam(':no_tlp',$_POST['tlp']);
			$stmt->bindParam(':email',$_POST['email']);
			$stmt->execute();
			$stmt->closeCursor();
		
			$id_konsumen = '';
			try{		
				$query='SELECT * FROM konsumen WHERE nama_konsumen="'.$_POST['nama'].'" AND email="'.$_POST['email'].'" ORDER BY id_konsumen DESC';
				$stmt=$db->prepare($query);
				$stmt->execute();
				while($row=$stmt->fetch()){
					$id_konsumen = $row['ID_KONSUMEN'];
				}
			}catch (Exception $e){
				$e->getMessage();
			}
			
			$uang_dp = 0;
			try{		
				$query='SELECT * FROM wedding WHERE kode_paket="'.$_POST['paket'].'"';
				$stmt=$db->prepare($query);
				$stmt->execute();
				while($row=$stmt->fetch()){
					$uang_dp = (int)$row['HARGA']/10;
				}
			}catch (Exception $e){
				$e->getMessage();
			}
			
			$id_pemesanan = 0;
			try{		
				$query='SELECT MAX(id_pemesanan) as ID_PESAN FROM pemesanan';
				$stmt=$db->prepare($query);
				$stmt->execute();
				while($row=$stmt->fetch()){
					$id_pemesanan = (int)$row['ID_PESAN']+1;
				}
			}catch (Exception $e){
				$e->getMessage();
			}
			
			$tmpFile = "";
			if(!isset($_POST['validation']))
			{
				$file_name = $id_pemesanan.'_buktibayar';
				$file_size =$_FILES['buktibayar']['size'];
				$file_tmp =$_FILES['buktibayar']['tmp_name'];
				$file_type=$_FILES['buktibayar']['type'];   
				$info = new SplFileInfo($_FILES['buktibayar']['name']);
				$file_ext=$info->getExtension();
					
				$tmpFile = $file_name.'.'.$file_ext;
			}
			
			$stmt=$db->prepare($insertTransaksi);
			$stmt->bindParam(':id_konsumen',$id_konsumen);
			$stmt->bindParam(':kode_paket',$_POST['paket']);
			$stmt->bindParam(':konsep_acara',$_POST['konsep']);
			$stmt->bindParam(':uang_dp',$uang_dp);
			$stmt->bindParam(':tanggal_acara',$tgl_acara);
			$stmt->bindParam(':bukti_bayar',$tmpFile);
			$stmt->execute();
			$stmt->closeCursor();
			
			if($_POST['paket']=="0"){
				$stmtLain=$db->prepare($insertPaketLain);
				$stmtLain->bindParam(':element',$_POST['element']);
				$stmtLain->bindParam(':id_pemesanan',$id_pemesanan);
				$stmtLain->execute();
				$stmtLain->closeCursor();
			}
			
			if(!isset($_POST['validation']))
			{
				// insert file
				move_uploaded_file($_FILES['buktibayar']['tmp_name'], '../dokumen/'.$tmpFile);
			}
			
            $message="Data Inserted";
            echo '<script>window.alert("'.$message.'")</script>';
            header('refresh: 0; url=../reservation.php?finish='.$id_pemesanan);
        }
		else if($_POST['action']=='insertExist'){
            $id_konsumen = $_POST['id_konsumen'];
			
			$uang_dp = 0;
			try{		
				$query='SELECT * FROM wedding WHERE kode_paket="'.$_POST['paket'].'"';
				$stmt=$db->prepare($query);
				$stmt->execute();
				while($row=$stmt->fetch()){
					$uang_dp = (int)$row['HARGA']/10;
				}
			}catch (Exception $e){
				$e->getMessage();
			}
			
			$id_pemesanan = 0;
			try{		
				$query='SELECT MAX(id_pemesanan) as ID_PESAN FROM pemesanan';
				$stmt=$db->prepare($query);
				$stmt->execute();
				while($row=$stmt->fetch()){
					$id_pemesanan = (int)$row['ID_PESAN']+1;
				}
			}catch (Exception $e){
				$e->getMessage();
			}
			
			$file_name = $id_pemesanan.'_buktibayar';
			$file_size =$_FILES['buktibayar']['size'];
			$file_tmp =$_FILES['buktibayar']['tmp_name'];
			$file_type=$_FILES['buktibayar']['type'];   
			$info = new SplFileInfo($_FILES['buktibayar']['name']);
			$file_ext=$info->getExtension();
				
			$tmpFile = $file_name.'.'.$file_ext;
			
			$stmt=$db->prepare($insertTransaksi);
			$stmt->bindParam(':id_konsumen',$id_konsumen);
			$stmt->bindParam(':kode_paket',$_POST['paket']);
			$stmt->bindParam(':konsep_acara',$_POST['konsep']);
			$stmt->bindParam(':uang_dp',$uang_dp);
			$stmt->bindParam(':tanggal_acara',$tgl_acara);
			$stmt->bindParam(':bukti_bayar',$tmpFile);
			$stmt->execute();
			$stmt->closeCursor();
			
			if($_POST['paket']=="0"){
				$stmtLain=$db->prepare($insertPaketLain);
				$stmtLain->bindParam(':element',$_POST['element']);
				$stmtLain->bindParam(':id_pemesanan',$id_pemesanan);
				$stmtLain->execute();
				$stmtLain->closeCursor();
			}
			
			// insert file
			move_uploaded_file($_FILES['buktibayar']['tmp_name'], '../dokumen/'.$tmpFile);
			
            $message="Data Inserted";
            echo '<script>window.alert("'.$message.'")</script>';
			if(isset($_POST['validation']) && $_POST['validation']=='1')
			{
				header('refresh: 0; url=../admin/onthespot.php?finish='.$id_pemesanan);
			}
			else
				header('refresh: 0; url=../reservation.php?finish='.$id_pemesanan);
        }
    }
    $db=NULL;


}catch(Exception $e){
    echo $e->getMessage();
}
?>

