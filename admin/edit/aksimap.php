<?php include '../../config.php' ?>
<?php
try{
    $db=config::getInstance();
    $add='INSERT INTO `map`(`title`, `latitude`, `longitude`) VALUES(:judul,:lat,:long)';
	$edit='UPDATE `map` SET `title`=:judul, `latitude`=:lat, `longitude`=:long WHERE id_map=:id';
	$delete='DELETE FROM `map` WHERE id_map=:id';
	
    if(isset($_POST['action'])){
		if($_POST['action']=='add'){
            $stmt=$db->prepare($add);
			$stmt->bindParam(':judul',$_POST['judul']);
			$stmt->bindParam(':lat',$_POST['lat']);
			$stmt->bindParam(':long',$_POST['long']);
			$stmt->execute();
			$stmt->closeCursor();
			
            $message="Data Inserted";
            echo '<script>window.alert("'.$message.'")</script>';
            header('refresh: 0; url=../map.php');
        }
		else if($_POST['action']=='edit'){
            $id_map = $_POST['id'];
			$stmt=$db->prepare($edit);
			$stmt->bindParam(':judul',$_POST['judul']);
			$stmt->bindParam(':lat',$_POST['lat']);
			$stmt->bindParam(':long',$_POST['long']);
			$stmt->bindParam(':id',$id_map);
			$stmt->execute();
			$stmt->closeCursor();
			
            $message="Data Updated";
            echo '<script>window.alert("'.$message.'")</script>';
			header('refresh: 0; url=../map.php');
        }
    }
	if(isset($_GET['act']))
	{
		if($_GET['act']=='delete'){
			$id_map = $_GET['id'];
			$stmt=$db->prepare($delete);
			$stmt->bindParam(':id',$id_map);
			$stmt->execute();
			$stmt->closeCursor();
			
			$message="Data Deleted";
			echo '<script>window.alert("'.$message.'")</script>';
			header('refresh: 0; url=../map.php');
		}
	}
    $db=NULL;


}catch(Exception $e){
    echo $e->getMessage();
}
?>

