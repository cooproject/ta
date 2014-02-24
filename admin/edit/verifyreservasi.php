<?php include '../../config.php' ?>
<?php
try{
    $db=config::getInstance();
    $verifyReservasi='UPDATE pemesanan SET status_verifikasi=1 WHERE id_pemesanan=:id_pemesanan';
	$unverifyReservasi='UPDATE pemesanan SET status_verifikasi=0 WHERE id_pemesanan=:id_pemesanan';
	
    if(isset($_GET['action'])){
        if($_GET['action']=='verify'){
            $stmt=$db->prepare($verifyReservasi);
			$stmt->bindParam(':id_pemesanan',$_GET['id']);
			$stmt->execute();
			$stmt->closeCursor();
			
            $message="Transaksi telah diverifikasi";
            echo '<script>window.alert("'.$message.'")</script>';
            header('refresh: 0; url=../reservasi.php');
        }
		else if($_GET['action']=='unverify'){
            $stmt=$db->prepare($unverifyReservasi);
			$stmt->bindParam(':id_pemesanan',$_GET['id']);
			$stmt->execute();
			$stmt->closeCursor();
			
            $message="Transaksi telah dibatalkan verifikasi";
            echo '<script>window.alert("'.$message.'")</script>';
            header('refresh: 0; url=../reservasi.php');
        }
    }
    $db=NULL;


}catch(Exception $e){
    echo $e->getMessage();
}
?>

