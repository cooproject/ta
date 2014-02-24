<?php

require_once("../config.php");

$username = $_POST['name'];
$password = $_POST['password'];
try {
    $db = Config::getInstance();
    $query="SELECT * FROM admin
             WHERE USERNAME_ADMIN='$username' AND PASSWORD='$password'";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $row = $stmt->fetch();


} catch (Exception $e) {
    echo $e->getMessage();
}
if( $row>0)
{
		session_start();
        $_SESSION['namauser']=$row['USERNAME_ADMIN'];

        header("location:../admin/index.php");

}

else
{
    echo "password atau username salah !";
   header("Refresh:1; url=login.php");

}








?>