<?php include '../config.php' ?>
<?php
try{
    $db=config::getInstance();
    $insert="INSERT INTO buku_tamu(ID_TAMU,ID_KONSUMEN,ISI) VALUES (:id_tamu,:id_konsumen,:isi)";
    $delete="DELETE FROM buku_tamu WHERE ID_TAMU=:id_tamu";
    if(isset($_GET['action']) && $_GET['action']=='delete'){
        $stmt=$db->prepare($delete);
        $stmt->bindParam(':id_tamu',$kolom);
        $kolom=$_GET['id'];
        $message="Data Deleted!";
        echo '<script>window.alert("'.$message.'")</script>';
        header('refresh: 0; url=../admin/bukutamu.php');

    }else{
        if(!isset($_POST['ID_TAMU'])){
            $stmt=$db->prepare($insert);
            $message="Data Inserted";
            echo '<script>window.alert("'.$message.'")</script>';
            header('refresh: 0; url=../index.html');

        }else{
            $stmt=$db->prepare($update);
            $message="Data Updated";
            echo '<script>window.alert("'.$message.'")</script>';
            header('refresh: 0; url=../admin/bukutamu.php');
        }
        $stmt->bindParam(':id_konsumen',$_POST['primary']);
        $stmt->bindParam(':nama_konsumen',$_POST['nama']);
        $stmt->bindParam(':jenis_kelamin',$_POST['jeniskelamin']);
        $stmt->bindParam(':alamat',$_POST['alamat']);
        $stmt->bindParam(':kota',$_POST['kota']);
        $stmt->bindParam(':prop',$_POST['provinsi']);
        $stmt->bindParam(':kode_pos',$_POST['kodepos']);
        $stmt->bindParam(':no_tlp',$_POST['tlp']);
        $stmt->bindParam(':email',$_POST['email']);
    }
    $stmt->execute();
    $stmt->closeCursor();
    $db=NULL;


}catch(Exception $e){
    echo $e->getMessage();
}
?>

