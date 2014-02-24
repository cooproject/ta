<?php
include '../config.php';
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
	require_once('../calendar/classes/tc_calendar.php');
    include "tampilan.php";
    ?>
<h1>Pemesanan On The Spot</h1>
	<style>
		.form_settings input[type="text"], input[type="email"], input[type="tel"] {
			width: 80%;
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
					$("#kota_box").show();
					$("#kota_select").html("<option value='#'>- Pilih nama kota -</option>");
					$("#kota_select").append(result);
				 }
			   });
			}
			
			function getDetailPaket(val)
			{
				if(val=='#') return;
				else  if(val=='0'){
					$("#isi_paket").show();
					$("#detail_paket").hide();
					return;
				}
				else {
				var dataString = 'kode_paket=' + val;
				$.ajax({
				 type: "POST",
				 url: "ajaxhelper.php",
				 data: dataString, 
				 cache: false,
				 success: function(result){
					$("#isi_paket").hide();
					$("#detail_paket").show();
					$("#detail_paket").html(result);
				 }
			   });
			   }
			} 
			
			function getName(val)
			{
				if(val=='#') return;
				var dataString = 'nameval=' + val;
				$.ajax({
				 type: "POST",
				 url: "ajaxhelper.php",
				 data: dataString, 
				 cache: false,
				 success: function(result){
					$("#nameList").html(result);
				 }
			   });
			}
		</script>
	<div align="center" style="margin-top: 30px">
        <form action="../aksi/reservasi.php" method="post"  enctype="multipart/form-data" >
			<div class="form_settings">
				<?php if(isset($_GET['finish'])) { ?>
				<h3>Anda ingin mencetak invoice / nota transaksi?</h3>
				<a href="../invoice.php?print=yes&id=<?php echo $_GET['finish']; ?>" target="_blank"><input class="submit" type="button" value="Cetak" style="margin:0" /></a>
				<input class="submit" type="button" onclick="javascript:window.location='onthespot.php';" value="Kembali" style="margin:0" />
				<?php } else { ?>
				<table>
					<input type="hidden" name="action" value="insertNew" />
					<input type="hidden" name="validation" value="1" />
					<tr>
						<td width="150">Nama</td>
						<td><input type="text" name="nama" value="" required="required" /></td>
					</tr>
					
					<tr>
						<td>Jenis Kelamin</td>
						<td><input type="radio" name=jeniskelamin id="jeniskelamin" class="" value="1" required="required" />Laki-Laki<input type="radio" name=jeniskelamin id="jeniskelamin" class="" value="0" required="required" />Perempuan</td>
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
									while($row=$stmt->fetch()){ ?>
									<option value="<?php echo $row['id_provinsi']; ?>"><?php echo $row['nama_provinsi']; ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					
					<tr id="kota_box" style="display:none">
						<td>Kota</td>
						<td>
							<select name="kota" id="kota_select" required="required" style="margin-left:10px">
							</select>
						</td>
					</tr>
					
					<tr>
						<td>Alamat</td>
						<td><textarea rows="8" cols="50" name="alamat" required="required" ></textarea></td>
					</tr>
					
					<tr>
						<td>Kode Pos</td>
						<td><input type="text" name="kodepos" value="" required="required" /><a href="http://kodepos.posindonesia.co.id/kodeposalamatindonesialist.php" target="_blank">cek</a></td>
					</tr>
					
					<tr>
						<td>No Tlp</td>
						<td><input type="tel" name="tlp" value="" required="required" /></td>
					</tr>
					
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" value="" required="required" /></td>
					</tr>
					
					<tr>
						<td>Paket Wedding</td>
						<td>
							<div id="detail_paket" style="position: absolute; margin-left: 350px; margin-top: -70px; max-width: 400px;overflow-wrap: break-word;overflow: auto; display:none;">
							</div>
							<div id="isi_paket" style="position: absolute; margin-left: 350px; margin-top: -70px; max-width: 400px;overflow-wrap: break-word;overflow: auto; display:none;">
							<div style="margin-left:20px">Masukkan isi paket sesuai keinginan Anda</div>
							<textarea style="height: 297px" name="element"></textarea>
							</div>
							<select name="paket" id="paket_select" required="required" style="margin-left:10px" onchange="getDetailPaket(this.value);">
								<option value='#'>- Pilih nama paket -</option>
								<?php
									try{
										$db=config::getInstance();
										$query="SELECT * FROM wedding";
										$stmt=$db->prepare($query);
										$stmt->execute();
									}catch (Exception $e){
										$e->getMessage();
									}
									while($row=$stmt->fetch()){ ?>
									<option value="<?php echo $row['KODE_PAKET']; ?>"><?php echo $row['NAMA_PAKET']; ?></option>
								<?php } ?>
								<option value="0">- lainnya -</option>
							</select>
						</td>
					</tr>
						
					<tr>
						<td>Tanggal Acara</td>
						<td>
							<div class="myCalendar" style="margin-left:10px"><?php
								  $myCalendar = new tc_calendar("tanggal_acara", true, false);
								  $myCalendar->setIcon("../calendar/images/iconCalendar.gif");
								  //$myCalendar->setDate(date('d'), date('m'), date('Y'));
								  $myCalendar->setPath("../calendar/");
								  $myCalendar->setYearInterval(date("Y"), 2015);
								  $tomorrow = mktime(0,0,0,date("m"),date("d")+1,date("Y"));
								  $myCalendar->dateAllow(date("Y-m-d", $tomorrow), '2015-03-01');
								  $myCalendar->setDateFormat('j F Y');
								  $myCalendar->setAlignment('left', 'bottom');
								  try{
										$db=config::getInstance();
										$query="SELECT * FROM pemesanan";
										$stmt=$db->prepare($query);
										$stmt->execute();
									}catch (Exception $e){
										$e->getMessage();
									}
								  $i = 0;
								  $existDate = false;
								  while($row=$stmt->fetch()){
									$reservedDate[$i] = $row['TANGGAL_ACARA'];
									$existDate = true;
									$i++;
								  }
								  if($existDate) $myCalendar->setSpecificDate($reservedDate, 0, '');
								  $myCalendar->writeScript();
							?></div>
						</td>
					</tr>
					
					<tr>
						<td>Konsep</td>
						<td><textarea rows="8" cols="50" name="konsep" required="required" ></textarea></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input class="submit" type="submit" name="name" value="submit" /></td>
					</tr>
				</table><?php } ?>
			</div>
		</form>
	</div>
<?php
    include "footer.php";
}
?>