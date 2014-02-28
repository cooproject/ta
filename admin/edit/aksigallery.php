<?php include '../../config.php' ?>
<?php
try{
    $db=config::getInstance();
    $add='INSERT INTO `gallery`(`title`, `desc`, `link`) VALUES (:judul,:desc,:link)';
	$edit='UPDATE `gallery` SET `title`=:judul, `desc`=:desc, `link`=:link WHERE id_gallery=:id';
	$delete='DELETE FROM `gallery` WHERE id_gallery=:id';
	
    if(isset($_POST['action'])){
		if($_POST['action']=='add'){
            $stmt=$db->prepare($add);
			if($_POST['source']=="link"){
			$stmt->bindParam(':judul',$_POST['judul']);
			$stmt->bindParam(':desc',$_POST['deskripsi']);
			$stmt->bindParam(':link',$_POST['link']);
			$stmt->execute();
			$stmt->closeCursor();
			}
			else{			
				$id_gallery = 0;
				try{		
					$query='SELECT MAX(id_gallery) as ID_GAL FROM gallery';
					$stmt=$db->prepare($query);
					$stmt->execute();
					while($row=$stmt->fetch()){
						$id_gallery = (int)$row['ID_GAL']+1;
					}
				}catch (Exception $e){
					$e->getMessage();
				}
			
				$tmpFile = "";
				$file_name = $id_gallery.'_gallery';
				$file_size =$_FILES['upload']['size'];
				$file_tmp =$_FILES['upload']['tmp_name'];
				$file_type=$_FILES['upload']['type'];   
				$info = new SplFileInfo($_FILES['upload']['name']);
				$file_ext=$info->getExtension();
				$tmpFile = $file_name.'.'.$file_ext;
			
				$stmt=$db->prepare($add);
				$stmt->bindParam(':judul',$_POST['judul']);
				$stmt->bindParam(':desc',$_POST['deskripsi']);
				$stmt->bindParam(':link',$tmpFile);
				$stmt->execute();
				$stmt->closeCursor();
				
				move_uploaded_file($_FILES['upload']['tmp_name'], '../../gallery/'.$tmpFile);
			}
			
            $message="Data Inserted";
            echo '<script>window.alert("'.$message.'")</script>';
            header('refresh: 0; url=../gallery.php');
        }
		else if($_POST['action']=='edit'){
            $id_gallery = $_POST['id'];
			$stmt=$db->prepare($edit);
			if($_POST['source']=="link"){
			$stmt->bindParam(':judul',$_POST['judul']);
			$stmt->bindParam(':desc',$_POST['deskripsi']);
			$stmt->bindParam(':link',$_POST['link']);
			$stmt->bindParam(':id',$id_gallery);
			$stmt->execute();
			$stmt->closeCursor();
			}
			else{			
				$tmpFile = "";
				$file_name = $id_gallery.'_gallery';
				$file_size =$_FILES['upload']['size'];
				$file_tmp =$_FILES['upload']['tmp_name'];
				$file_type=$_FILES['upload']['type'];   
				$info = new SplFileInfo($_FILES['upload']['name']);
				$file_ext=$info->getExtension();
				$tmpFile = $file_name.'.'.$file_ext;
			
				$stmt=$db->prepare($edit);
				$stmt->bindParam(':judul',$_POST['judul']);
				$stmt->bindParam(':desc',$_POST['deskripsi']);
				$stmt->bindParam(':link',$tmpFile);
				$stmt->bindParam(':id',$id_gallery);
				$stmt->execute();
				$stmt->closeCursor();
				
				move_uploaded_file($_FILES['upload']['tmp_name'], '../../gallery/'.$tmpFile);
			}
			
            $message="Data Updated";
            echo '<script>window.alert("'.$message.'")</script>';
			header('refresh: 0; url=../gallery.php');
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
			header('refresh: 0; url=../gallery.php');
		}
	}
    $db=NULL;


}catch(Exception $e){
    echo $e->getMessage();
}
?>

