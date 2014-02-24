<?php
	require_once("config.php");
	if(isset($_POST['id_prov']))
	{
		try{
			$db=config::getInstance();
			$query="SELECT * FROM kota WHERE id_provinsi=".$_POST['id_prov'];
			$stmt=$db->prepare($query);
			$stmt->execute();
		}catch (Exception $e){
			$e->getMessage();
		}
		while($row=$stmt->fetch()){ 
			echo '<option value="'.$row['id_kota'].'">'.$row['nama_kota'].'</option>';
		}
	}
	if(isset($_POST['kode_paket']))
	{
		try{
			$db=config::getInstance();
			$query="SELECT * FROM wedding WHERE kode_paket=".$_POST['kode_paket'];
			$stmt=$db->prepare($query);
			$stmt->execute();
		}catch (Exception $e){
			$e->getMessage();
		}
		while($row=$stmt->fetch()){ 
			echo '<b><i>Nama Paket:</i></b> '.$row['NAMA_PAKET'].'<br/>
				  <b><i>Uang DP:</i></b> '.((int)$row['HARGA']/10).'<br/>
				  <b><i>Harga Paket:</i></b> '.$row['HARGA'].'<br/>
				  <b><i>Deskripsi Paket:</i></b> '.$row['RINCIAN'];
		}
	}
	if(isset($_POST['nameval']))
	{
		//echo '<script>alert("'.$_POST['nameval'].'");</script>';
		try{
			$db=config::getInstance();
			$query='SELECT * FROM konsumen WHERE nama_konsumen LIKE "%'.$_POST['nameval'].'%"';
			$stmt=$db->prepare($query);
			$stmt->execute();
		}catch (Exception $e){
			$e->getMessage();
		}
		while($row=$stmt->fetch()){ 
			echo '<option>'.$row['NAMA_KONSUMEN'].', '.$row['EMAIL'].'</option>';
		}
	}
?>