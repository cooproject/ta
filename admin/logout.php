<?php
session_start();
unset($_SESSION['username']);
include "tampilan.php";
session_destroy();
?>

<h2>anda telah berhasil logout</h2>

<?php
header("Refresh:2; url=../index.php");
include "footer.php";
?>
