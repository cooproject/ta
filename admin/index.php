<?php
session_start();
if(!isset($_SESSION['namauser']))
{
    echo "cannot bypass access";
    header('location:../login.php');
}
else
{
$username=$_SESSION['namauser'];

require_once("../config.php");
    include "tampilan.php";
?>
<h1>Selamat datang <?php echo "$_SESSION[namauser]"; ?> </h1>
<?php
include "footer.php";
}
?>
