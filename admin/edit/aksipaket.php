<?php include '../../config.php' ?>
<?php
try{
    $db=config::getInstance();
    $add='INSERT INTO `paket`(`nama`, `harga`, `elemen`) VALUES (:nama,:harga,:elemen)';
	$edit='UPDATE `paket` SET `nama`=:nama, `harga`=:harga, `elemen`=:elemen WHERE id_paket=:id';
	$delete='DELETE FROM `paket` WHERE id_paket=:id';
	
    if(isset($_POST['action'])){
		if($_POST['action']=='add'){
            $stmt=$db->prepare($add);
			$stmt->bindParam(':nama',$_POST['nama']);
			$stmt->bindParam(':harga',$_POST['harga']);
			$stmt->bindParam(':elemen',$_POST['element']);
			$stmt->execute();
			$stmt->closeCursor();
			
            $message="Data Inserted";
            echo '<script>window.alert("'.$message.'")</script>';
            header('refresh: 0; url=../package.php');
        }
		else if($_POST['action']=='edit'){
            $id_paket = $_POST['id'];
			$stmt=$db->prepare($edit);
			$stmt->bindParam(':nama',$_POST['nama']);
			$stmt->bindParam(':harga',$_POST['harga']);
			$stmt->bindParam(':elemen',$_POST['element']);
			$stmt->bindParam(':id',$id_paket);
			$stmt->execute();
			$stmt->closeCursor();
			
            $message="Data Updated";
            echo '<script>window.alert("'.$message.'")</script>';
			header('refresh: 0; url=../package.php');
        }
    }
	
	if(isset($_GET['act']))
	{
		if($_GET['act']=='delete'){
			$id_gallery = $_GET['id'];
			$stmt=$db->prepare($delete);
			$stmt->bindParam(':id',$id_gallery);
			$stmt->execute();
			$stmt->closeCursor();
			
			$message="Data Deleted";
			echo '<script>window.alert("'.$message.'")</script>';
			header('refresh: 0; url=../package.php');
		}
	}
    $db=NULL;


}catch(Exception $e){
    echo $e->getMessage();
}
?>

