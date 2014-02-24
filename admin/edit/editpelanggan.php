<?php
include '../../config.php';
session_start();
if(!isset($_SESSION['namauser']))
{
    echo "cannot bypass access";
    header('location:../../login.php');
}
else
{
    $username=$_SESSION['namauser'];

    require_once("../../config.php");
    include "tampilan.php";
    ?>
<h1>Data Pelanggan </h1>
    <?php
    $id=$_GET['id'];
    try{
        $db=config::getInstance();
        $query="SELECT * FROM konsumen WHERE ID_KONSUMEN='$id'";
        $stmt=$db->prepare($query);
        $stmt->execute();
        $row=$stmt->fetch();
    }catch (Exception $e){
        $e->getMessage();
    }
    ?>
	<style>
		.form_settings input[type="text"], input[type="email"], input[type="tel"] {
			width: 80%;
		}
	</style>
	<script type="text/javascript">
		function getKota(val)
		{
			if(val=='#') return;
			var dataString = 'id_prov=' + val;
			$.ajax({
			 type: "POST",
			 url: "ajaxhelper.php",
			 data: dataString, 
			 cache: false,
			 success: function(result){
				$("#kota_select").html("<option value='#'>- Pilih nama kota -</option>");
				$("#kota_select").append(result);
			 }
		   });
		}
	</script>
	<div align="center" style="margin-top: 30px">
        <form action="../../aksi/konsumen.php?action=edit" method="post">
            <div class="form_settings">
                <input type="hidden" name="id_konsumen" value="<?php echo $row['ID_KONSUMEN'] ?>" />
				<table>
					<tr>
						<td width="150">Nama</td>
						<td><input type="text" name="nama" value="<?php echo $row['NAMA_KONSUMEN']; ?>" required="required" /></td>
					</tr>
					
					<tr>
						<td>Jenis Kelamin</td>
						<td><input <?php if($row['JENIS_KELAMIN']=="1") echo 'checked="checked"'; ?> type="radio" name=jeniskelamin id="jeniskelamin" class="" value="1" required="required" />Laki-Laki<input <?php if($row['JENIS_KELAMIN']=="0") echo 'checked="checked"'; ?> type="radio" name=jeniskelamin id="jeniskelamin" class="" value="0" required="required" />Perempuan</td>
					</tr>	
					
					<tr>
						<td>Provinsi</td>
						<td>
							<select name="provinsi" id="provinsi_select" required="required" style="margin-left:10px" onchange="getKota(this.value);">
								<option value='#'>- Pilih nama provinsi -</option>
								<?php
									try{
										$db=config::getInstance();
										$query="SELECT * FROM provinsi";
										$stmt=$db->prepare($query);
										$stmt->execute();
									}catch (Exception $e){
										$e->getMessage();
									}
									$id_provinsi = "";
									while($row1=$stmt->fetch()){ ?>
									<option <?php if($row['PROP']==$row1['id_provinsi']) { echo 'selected="selected"'; $id_provinsi = $row1['id_provinsi']; } ?> value="<?php echo $row1['id_provinsi']; ?>"><?php echo $row1['nama_provinsi']; ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					
					<tr id="kota_box">
						<td>Kota</td>
						<td>
							<select name="kota" id="kota_select" required="required" style="margin-left:10px">
								<option value='#'>- Pilih nama kota -</option>
								<?php
									try{
										$db=config::getInstance();
										$query="SELECT * FROM kota WHERE id_provinsi=".$id_provinsi;
										$stmt=$db->prepare($query);
										$stmt->execute();
									}catch (Exception $e){
										$e->getMessage();
									}
									while($row1=$stmt->fetch()){ ?>
									<option <?php if($row['KOTA']==$row1['id_kota']) echo 'selected="selected"'; ?> value="<?php echo $row1['id_kota']; ?>"><?php echo $row1['nama_kota']; ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					
					<tr>
						<td>Alamat</td>
						<td><textarea rows="8" cols="50" name="alamat" required="required" ><?php echo $row['ALAMAT']; ?></textarea></td>
					</tr>
					
					<tr>
						<td>Kode Pos</td>
						<td><input type="text" name="kodepos" value="<?php echo $row['KODE_POS']; ?>" required="required" /><a href="http://kodepos.posindonesia.co.id/kodeposalamatindonesialist.php" target="_blank">cek</a></td>
					</tr>
					
					<tr>
						<td>No Tlp</td>
						<td><input type="tel" name="tlp" value="<?php echo $row['NO_TELP']; ?>" required="required" /></td>
					</tr>
					
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" value="<?php echo $row['EMAIL']; ?>" required="required" /></td>
					</tr>
					
					<tr>
						<td>&nbsp;</td>
						<td align="center"><input class="submit" type="submit" name="name" value="simpan" style="margin:10px 0 0 0" /></td>
					</tr>
				</table>
            </div>
        </form>
	</div>
<?php
    include "../footer.php";
}
?>