<?php
session_start();
if(!isset($_SESSION['level']))
{
    echo"cannot bypass access";
    header('location:../login.php');
}
elseif($_SESSION['level']!='accountmanager'){
    echo "unauthorized access";
    header('location:../login.php');

}
else
{
    $username=$_SESSION['namauser'];


    include "../config.php";
include "tampilan2.php";

try{
    $db = Config::getInstance();
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $stmt = $db->prepare("DELETE FROM users WHERE USERNAME=:username");
        $stmt->bindParam(':username',$username);
        $username = $_GET['username'];
        $message='Data berhasil dihapus';
    }else{
        if(!isset($_POST['primary'])){
            $stmt = $db->prepare("INSERT INTO users (USERNAME,PASSWORD,ID_LEVELS)
								VALUES(:username,:password,:levels)");
            $message='Data berhasil disimpan';
        }else{
            $stmt = $db->prepare("UPDATE users SET USERNAME=:username, PASSWORD=:password, ID_LEVELS=:levels WHERE USERNAME=:username");
            $message='Data berhasil diperbarui';
        }

        $stmt->bindParam(':username',$_POST['username']);
        $stmt->bindParam(':password',$_POST['password']);
        $stmt->bindParam(':levels',$_POST['levels']);

    }

    $stmt->execute();
    $stmt->closeCursor();
    $db = null;
    echo '<div class="alert alert-success">'.$message.'</div>';
    header("Refresh:2; url=daftaruser.php");
}catch(Exception $e){
    echo '<div class="alert alert-error">'.$e.'</div>';
}
include "footer.php";
}
?>