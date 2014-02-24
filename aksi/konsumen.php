<?php include '../config.php' ?>
<?php
try{
    $db=config::getInstance();
    $insert="INSERT INTO konsumen(ID_KONSUMEN,NAMA_KONSUMEN,JENIS_KELAMIN,ALAMAT,KOTA,PROP,KODE_POS,NO_TELP,EMAIL,PAKET_WEDDING,TGL_ACARA,KONSEP) VALUES (:id_konsumen,:nama_konsumen,:jenis_kelamin,:alamat,:kota,:prop,:kode_pos,:no_tlp,:email,:paket,:tanggal,:konsep)";
    $update="UPDATE konsumen SET NAMA_KONSUMEN=:nama_konsumen, JENIS_KELAMIN=:jenis_kelamin, ALAMAT=:alamat, KOTA=:kota, PROP=:prop, KODE_POS=:kode_pos, NO_TELP=:no_tlp, EMAIL=:email WHERE ID_KONSUMEN=:id_konsumen";
    $delete="DELETE FROM konsumen WHERE ID_KONSUMEN=:id_konsumen";
    if(isset($_GET['action']) && $_GET['action']=='delete'){
        $stmt=$db->prepare($delete);
        $stmt->bindParam(':id_konsumen',$kolom);
        $kolom=$_GET['id'];
		$stmt->execute();
		$stmt->closeCursor();
        $message="Data Deleted!";
        echo '<script>window.alert("'.$message.'")</script>';
        header('location:../admin/pelanggan.php');

    }else if(isset($_GET['action']) && $_GET['action']=='edit'){        
		$stmt=$db->prepare($update);
        $stmt->bindParam(':id_konsumen',$_POST['id_konsumen']);
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
		$message="Data Updated";
		echo '<script>window.alert("'.$message.'")</script>';
		header('location:../admin/pelanggan.php');
    }
    $db=NULL;
	echo "haha";

}catch(Exception $e){
    echo $e->getMessage();
}
?>

