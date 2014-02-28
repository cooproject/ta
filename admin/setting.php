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
<div id="menuSetting" class="header-container"  style="position: relative; padding-top: 5px; padding-bottom: 15px;">
	<div id="heading" class="wrapper" style="height:30px;">
		<nav id="nav">
			<ul>
				<li><a href="about.php">TENTANG KAMI</a></li>
				<li><a href="service.php">PELAYANAN</a></li>
				<li><a href="package.php">PAKET</a></li>
				<li><a href="map.php">MAP</a></li>
				<li><a href="gallery.php">GALERI</a></li>
			</ul>

		</nav>
	</div>
</div>
<h1>Selamat datang <?php echo "$_SESSION[namauser]"; ?>, silahkan pilih menu diatas untuk di-<i>setting</i></h1>
<?php
include "footer.php";
}
?>
