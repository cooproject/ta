<?php include '../../config.php' ?>
<?php
try{
    $db=config::getInstance();
	$edit='UPDATE `config` SET `content`=:content WHERE config_name=:config';
	
    if(isset($_POST['action'])){
		if($_POST['action']=='edit'){
            $cn_prefix = $_POST['name'];
			if($cn_prefix=="about_us"){
				$stmt=$db->prepare($edit);
				$stmt->bindParam(':content',$_POST['title']);
				$stmt->bindValue(':config',"about_us_title");
				$stmt->execute();
				
				$stmt->bindParam(':content',$_POST['tagline']);
				$stmt->bindValue(':config',"about_us_tagline");
				$stmt->execute();
				
				$stmt->bindParam(':content',$_POST['content']);
				$stmt->bindValue(':config',"about_us_content");
				$stmt->execute();
				$stmt->closeCursor();
				
				$message="Data Updated";
				echo '<script>window.alert("'.$message.'")</script>';
				header('refresh: 0; url=../about.php');
			}
			else if($cn_prefix=="service"){
				$stmt=$db->prepare($edit);
				$stmt->bindParam(':content',$_POST['title']);
				$stmt->bindValue(':config',"service_title");
				$stmt->execute();
				
				$stmt->bindParam(':content',$_POST['content']);
				$stmt->bindValue(':config',"service_content");
				$stmt->execute();
				$stmt->closeCursor();
				
				$message="Data Updated";
				echo '<script>window.alert("'.$message.'")</script>';
				header('refresh: 0; url=../service.php');
			}
        }
    }
    $db=NULL;


}catch(Exception $e){
    echo $e->getMessage();
}
?>

