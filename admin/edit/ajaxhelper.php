<?php
	require_once("../../config.php");
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
?>