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
<h1>PAKET</h1>
<?php if(isset($_GET['act']) && $_GET['act']=="add") { ?>
<div align="center" class="form_settings"><input class="submit" type="button" onclick="javascript:window.location='package.php';" value="Batal" style="margin:0" /></div>
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
<div align="center" style="margin-top: 30px">
	<form action="edit/aksipaket.php" method="post"  enctype="multipart/form-data" >
		<div class="form_settings">
			<table>
				<input type="hidden" name="action" value="add" />
				<tr>
					<td width="150">Nama</td>
					<td width="400"><input type="text" name="nama" value="" required="required" /></td>
				</tr>
				<tr>
					<td width="150">Harga</td>
					<td width="400"><input type="text" name="harga" value="Rp. " required="required" /></td>
				</tr>
				<tr>
					<td colspan="2" align="center">Isi Paket</td>
				</tr>
			</table>
		</div>
	<div style="width: 550px"><textarea name="element" id="element" ></textarea></div>
	<div align="center" class="form_settings"><input class="submit" type="submit" value="Simpan" style="margin:0" /></div>
	<script language="javascript">
		CKEDITOR.replace( 'element' );    
	</script>
	</form>
</div>
<?php } else if(isset($_GET['act']) && $_GET['act']=="edit") { 
    $id=$_GET['id'];
    try{
        $db=config::getInstance();
        $query="SELECT * FROM paket WHERE id_paket='$id'";
        $stmt=$db->prepare($query);
        $stmt->execute();
        $row=$stmt->fetch();
    }catch (Exception $e){
        $e->getMessage();
    }
    ?>
<div align="center" class="form_settings"><input class="submit" type="button" onclick="javascript:window.location='package.php';" value="Batal" style="margin:0" /></div>
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
<div align="center" style="margin-top: 30px">
	<form action="edit/aksipaket.php" method="post"  enctype="multipart/form-data" >
		<div class="form_settings">
			<table>
				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
				<input type="hidden" name="action" value="edit" />
				<tr>
					<td width="150">Nama</td>
					<td width="400"><input type="text" name="nama" value="<?php echo $row['nama']; ?>" required="required" /></td>
				</tr>
				<tr>
					<td width="150">Harga</td>
					<td width="400"><input type="text" name="harga" value="<?php echo $row['harga']; ?>" required="required" /></td>
				</tr>
				<tr>
					<td colspan="2" align="center">Isi Paket</td>
				</tr>
			</table>
		</div>
	<div style="width: 550px"><textarea name="element" id="element" ><?php echo $row['elemen']; ?></textarea></div>
	<div align="center" class="form_settings"><input class="submit" type="submit" value="Simpan" style="margin:0" /></div>
	<script language="javascript">
		CKEDITOR.replace( 'element' );    
	</script>
	</form>
</div>
<?php } else if(!isset($_GET['act'])) { ?>
<div align="center" class="form_settings"><input class="submit" type="button" onclick="javascript:window.location='package.php?act=add';" value="Tambah" style="margin:0" /></div>
<div class="form_settings">
        <table class="customTable">
            <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Elemen</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
                try{
                    $db=config::getInstance();
                    $query="SELECT * FROM paket";
                    $stmt=$db->prepare($query);
                    $stmt->execute();
                }catch (Exception $e){
                    $e->getMessage();
                }
                ?>
            <?php $i=1; while($row=$stmt->fetch()){ ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['harga'] ?></td>
					<td><div align="left" style="margin-left: 20px"><?php echo $row['elemen'] ?></div></td>
                    <td>
						<a href="package.php?act=edit&id=<?php echo $row['id_paket'] ?>"><img src="../img/edit.png" width="20px" title="edit" /></a>
                        <a href="edit/aksipaket.php?act=delete&id=<?php echo $row['id_paket'] ?>"><img src="../img/delete.png" width="20px" title="delete" /></a>
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
