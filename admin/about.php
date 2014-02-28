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
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
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
<h1>TENTANG KAMI</h1>
<style>
	.form_settings input[type="text"], input[type="email"], input[type="tel"] {
		width: 90%;
	}
	td{
		background-color: transparent;
		color: white;
	}
	td, th {
		border: none;
		padding: 1px 2px 1px 2px;
	}
</style>
<?php
	try{
		$db=config::getInstance();
		$query="SELECT * FROM config";
		$stmt=$db->prepare($query);
		$stmt->execute();
	}catch (Exception $e){
		$e->getMessage();
	}
	while($row=$stmt->fetch()){
		$data[$row['config_name']] = $row['content'];
	}
?>
<div align="center" style="margin-top: 30px">
	<form action="edit/aksiconfig.php" method="post"  enctype="multipart/form-data" >
		<div class="form_settings">
			<table>
				<input type="hidden" name="name" value="about_us" />
				<input type="hidden" name="action" value="edit" />
				<tr>
					<td width="150">Title</td>
					<td width="400"><input type="text" name="title" value="<?php echo $data['about_us_title']; ?>" required="required" /></td>
				</tr>
				<tr>
					<td width="150">Tagline</td>
					<td><input type="text" name="tagline" value="<?php echo $data['about_us_tagline']; ?>" required="required" /></td>
				</tr>
				<tr>
					<td colspan="2" align="center">Content</td>
				</tr>
			</table>
		</div>
	<div style="width: 550px"><textarea name="content" id="content" ><?php echo $data['about_us_content']; ?></textarea></div>
	<div align="center" class="form_settings"><input class="submit" type="submit" value="Simpan" style="margin:0" /></div>
	<script language="javascript">
		CKEDITOR.replace( 'content' );    
	</script>
	</form>
</div>
<?php
include "footer.php";
}
?>
