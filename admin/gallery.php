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
<h1>GALERI</h1>
<?php if(isset($_GET['act']) && $_GET['act']=="add") { ?>
<div align="center" class="form_settings"><input class="submit" type="button" onclick="javascript:window.location='gallery.php';" value="Batal" style="margin:0" /></div>
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
<script>
	function changeSource(val)
	{
		if(val=="link")
		{
			document.getElementById('link_box').style.display = "";
			document.getElementById('upload_box').style.display = "none";
		}
		else if(val=="file")
		{
			document.getElementById('link_box').style.display = "none";
			document.getElementById('upload_box').style.display = "";
		}
	}
</script>
<div align="center" style="margin-top: 30px">
	<form action="edit/aksigallery.php" method="post"  enctype="multipart/form-data" >
		<div class="form_settings">
			<table>
				<input type="hidden" name="action" value="add" />
				<tr>
					<td width="150">Judul</td>
					<td><input type="text" name="judul" value="" required="required" /></td>
				</tr>
				<tr>
					<td width="150">Deskripsi</td>
					<td><textarea rows="8" cols="50" name="deskripsi" required="required"></textarea></td>
				</tr>
				<tr>
					<td width="150">Sumber berkas</td>
					<td>
						<select onchange="changeSource(this.value);" name="source">
							<option value="link">Link</option>
							<option value="file">Upload</option>
						</select>
					</td>
				</tr>
				<tr id="link_box">
					<td width="150">Link</td>
					<td><input type="text" name="link" value="http://" /></td>
				</tr>
				<tr style="display: none" id="upload_box">
					<td width="150">Upload</td>
					<td><input type="file" name="upload" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input class="submit" type="submit" name="name" value="Simpan" /></td>
				</tr>
			</table>
		</div>
	</form>
</div>
<?php } else if(isset($_GET['act']) && $_GET['act']=="edit") { 
    $id=$_GET['id'];
    try{
        $db=config::getInstance();
        $query="SELECT * FROM gallery WHERE id_gallery='$id'";
        $stmt=$db->prepare($query);
        $stmt->execute();
        $row=$stmt->fetch();
    }catch (Exception $e){
        $e->getMessage();
    }
    ?>
<div align="center" class="form_settings"><input class="submit" type="button" onclick="javascript:window.location='gallery.php';" value="Batal" style="margin:0" /></div>
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
<script>
	function changeSource(val)
	{
		if(val=="link")
		{
			document.getElementById('link_box').style.display = "";
			document.getElementById('upload_box').style.display = "none";
		}
		else if(val=="file")
		{
			document.getElementById('link_box').style.display = "none";
			document.getElementById('upload_box').style.display = "";
		}
	}
</script>
<div align="center" style="margin-top: 30px">
	<form action="edit/aksigallery.php" method="post"  enctype="multipart/form-data" >
		<div class="form_settings">
			<table>
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<input type="hidden" name="action" value="edit" />
				<tr>
					<td width="150">Judul</td>
					<td><input type="text" name="judul" value="<?php echo $row['title']; ?>" required="required" /></td>
				</tr>
				<tr>
					<td width="150">Deskripsi</td>
					<td><textarea rows="8" cols="50" name="deskripsi" required="required"><?php echo $row['desc']; ?></textarea></td>
				</tr>
				<?php 
					$link = false;
					if(substr($row['link'],0,4)=="http")
					{
						$link = true;
					}
				?>
				<tr>
					<td width="150">Sumber berkas</td>
					<td>
						<select onchange="changeSource(this.value);" name="source">
							<option value="link" <?php if($link) echo 'selected="selected"'; ?>>Link</option>
							<option value="file" <?php if(!$link) echo 'selected="selected"'; ?>>Upload</option>
						</select>
					</td>
				</tr>
				<tr id="link_box">
					<td width="150">Link</td>
					<td><input type="text" name="link" value="<?php echo $row['link']; ?>" /></td>
				</tr>
				<tr style="display: none" id="upload_box">
					<td width="150">Upload</td>
					<td><input type="file" name="upload" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input class="submit" type="submit" name="name" value="Simpan" /></td>
				</tr>
			</table>
		</div>
	</form>
</div>
<?php } else if(!isset($_GET['act'])) { ?>
<div align="center" class="form_settings"><input class="submit" type="button" onclick="javascript:window.location='gallery.php?act=add';" value="Tambah" style="margin:0" /></div>
<div class="form_settings">
        <table class="customTable">
            <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Link</th>
                <th>Preview</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
                try{
                    $db=config::getInstance();
                    $query="SELECT * FROM gallery";
                    $stmt=$db->prepare($query);
                    $stmt->execute();
                }catch (Exception $e){
                    $e->getMessage();
                }
                ?>
            <?php $i=1; while($row=$stmt->fetch()){ ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['desc'] ?></td>
                    <td style="font-size: 12px"><a href="<?php echo $row['link'] ?>"><u>link</u></a></td>
                    <td><a href="<?php echo $row['link']; ?>" target="_blank"><img src="<?php if(substr($row['link'],0,4)!="http") echo "../gallery/".$row['link']; else echo $row['link']; ?>" width="40px" /></a></td>
                    <td>
						<a href="gallery.php?act=edit&id=<?php echo $row['id_gallery'] ?>"><img src="../img/edit.png" width="20px" title="edit" /></a>
                        <a href="edit/aksigallery.php?act=delete&id=<?php echo $row['id_gallery'] ?>"><img src="../img/delete.png" width="20px" title="delete" /></a>
					</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php } ?>
<?php
include "footer.php";
}
?>
