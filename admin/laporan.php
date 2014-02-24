<?php
include '../config.php';
session_start();
if(!isset($_SESSION['namauser']))
{
    echo "cannot bypass access";
    header('location:../login/login.php');
}
else
{
    $username=$_SESSION['namauser'];

    require_once("../config.php");
    include "tampilan.php";
    ?>
<h1>Laporan Pemasukkan <?php if(isset($_GET['tipe'])) { if($_GET['tipe']=='tahun') { echo "per Tahun"; } else if($_GET['tipe']=='bulan') { $tahun = $_GET['tahun']; echo "per Bulan tahun ".$tahun; } else if($_GET['tipe']=='hari') { $tahun = $_GET['tahun']; $bulan = $_GET['bulan']; echo "per Hari tahun ".$tahun." bulan ".date("F", mktime(0, 0, 0, $bulan, 10)); } } ?></h1>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="../plugins/jqplot.barRenderer.min.js"></script>
<script type="text/javascript" src="../plugins/jqplot.highlighter.min.js"></script>
<script type="text/javascript" src="../plugins/jqplot.cursor.min.js"></script>
<script type="text/javascript" src="../plugins/jqplot.pointLabels.min.js"></script>
<link rel="stylesheet" type="text/css" hrf="../css/jquery.jqplot.min.css" />
<script>
			$(document).ready(function () {
			<?php if(isset($_GET['tipe'])) { 
					if($_GET['tipe']=='tahun')
					{
						/*try{
							$db=config::getInstance();
							$query="SELECT DISTINCT(YEAR(tanggal_pesan)) as TAHUN FROM pemesanan GROUP BY YEAR(tanggal_pesan)";
							$stmt=$db->prepare($query);
							$stmt->execute();
						}catch (Exception $e){
							$e->getMessage();
						}
						$c_tahun = 0;
						while($row=$stmt->fetch()){
							$tahun[$c_tahun] = (int)$row['TAHUN'];
							$c_tahun++;
						}*/
						$c_tahun = 10;
						$awal_tahun = 2010;
						for($j=0; $j<$c_tahun; $j++)
							$tahun[$j] = $awal_tahun++;
						
						for($i = 0; $i<$c_tahun; $i++)
						{
							try{
								$db=config::getInstance();
								$query="SELECT SUM(uang_dp) as INCOME FROM pemesanan WHERE YEAR(tanggal_pesan) = ".$tahun[$i]." GROUP BY YEAR(tanggal_pesan)";
								$stmt=$db->prepare($query);
								$stmt->execute();
							}catch (Exception $e){ 
								$e->getMessage();
							}
							$exist = false;
							while($row=$stmt->fetch()){
								$s1[$i][0] = $tahun[$i];
								$s1[$i][1] = (int)$row['INCOME'];
								$exist = true;
							}
							if(!$exist)
							{
								$s1[$i][0] = $tahun[$i];
								$s1[$i][1] = 0;
							}
						}
			?>
					var s1 = <?php echo json_encode($s1); ?>;
					var s2 = <?php echo json_encode($s1); ?>;
			<?php } else if($_GET['tipe']=='bulan') { 
						$tahun = $_GET['tahun'];
						$c_bulan = 12;
						$awal_bulan = 1;
						for($j=0; $j<$c_bulan; $j++)
							$bulan[$j] = $awal_bulan++;
						
						for($i = 0; $i<$c_bulan; $i++)
						{
							try{
								$db=config::getInstance();
								$query="SELECT SUM(uang_dp) as INCOME FROM pemesanan WHERE YEAR(tanggal_pesan) = ".$tahun." AND MONTH(tanggal_pesan) = ".$bulan[$i]." GROUP BY MONTH(tanggal_pesan)";
								$stmt=$db->prepare($query);
								$stmt->execute();
							}catch (Exception $e){ 
								$e->getMessage();
							}
							$exist = false;
							while($row=$stmt->fetch()){
								$s1[$i][0] = $bulan[$i];
								$s1[$i][1] = (int)$row['INCOME'];
								$exist = true;
							}
							if(!$exist)
							{
								$s1[$i][0] = $bulan[$i];
								$s1[$i][1] = 0;
							}
						}
			?>
					var s1 = <?php echo json_encode($s1); ?>;
					var s2 = <?php echo json_encode($s1); ?>;
			<?php } else if($_GET['tipe']=='hari') { 
						$tahun = $_GET['tahun'];
						$bulan = $_GET['bulan'];
						$c_hari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
						$awal_hari = 1;
						for($j=0; $j<$c_hari; $j++)
							$hari[$j] = $awal_hari++;
						
						for($i = 0; $i<$c_hari; $i++)
						{
							try{
								$db=config::getInstance();
								$query="SELECT SUM(uang_dp) as INCOME FROM pemesanan WHERE YEAR(tanggal_pesan) = ".$tahun." AND MONTH(tanggal_pesan) = ".$bulan." AND DAY(tanggal_pesan) = ".$hari[$i]." GROUP BY DAY(tanggal_pesan)";
								$stmt=$db->prepare($query);
								$stmt->execute();
							}catch (Exception $e){ 
								$e->getMessage();
							}
							$exist = false;
							while($row=$stmt->fetch()){
								$s1[$i][0] = $hari[$i];
								$s1[$i][1] = (int)$row['INCOME'];
								$exist = true;
							}
							if(!$exist)
							{
								$s1[$i][0] = $hari[$i];
								$s1[$i][1] = 0;
							}
						}
			?>
					var s1 = <?php echo json_encode($s1); ?>;
					var s2 = <?php echo json_encode($s1); ?>;
			<?php } } ?>
		 
			plot1 = $.jqplot("chart1", [s2, s1], {
				// Turns on animatino for all series in this plot.
				animate: true,
				// Will animate plot on calls to plot1.replot({resetAxes:true})
				animateReplot: true,
				cursor: {
					show: true,
					zoom: true,
					looseZoom: true,
					showTooltip: false
				},
				series:[
					{
						pointLabels: {
							show: false
						},
						renderer: $.jqplot.BarRenderer,
						showHighlight: false,
						yaxis: 'y2axis',
						rendererOptions: {
							// Speed up the animation a little bit.
							// This is a number of milliseconds.  
							// Default for bar series is 3000.  
							animation: {
								speed: 2500
							},
							barWidth: 15,
							barPadding: -15,
							barMargin: 0,
							highlightMouseOver: false
						}
					}, 
					{
						rendererOptions: {
							// speed up the animation a little bit.
							// This is a number of milliseconds.
							// Default for a line series is 2500.
							animation: {
								speed: 2000
							}
						}
					}
				],
				axesDefaults: {
					pad: 0
				},
				axes: {
					// These options will set up the x axis like a category axis.
					xaxis: {
						tickInterval: 1,
						drawMajorGridlines: false,
						drawMinorGridlines: true,
						drawMajorTickMarks: false,
						rendererOptions: {
						tickInset: 0.5,
						minorTicks: 1
					}
					},
					yaxis: {
						tickOptions: {
							formatString: "Rp %'d"
						},
						rendererOptions: {
							forceTickAt0: true
						}
					},
					y2axis: {
						tickOptions: {
							formatString: "Rp %'d"
						},
						rendererOptions: {
							// align the ticks on the y2 axis with the y axis.
							alignTicks: true,
							forceTickAt0: true
						}
					}
				},
				highlighter: {
					show: true, 
					showLabel: true, 
					tooltipAxes: 'y',
					sizeAdjust: 7.5 , tooltipLocation : 'ne'
				}
			});
		   
		});
		</script>
    <div align="center">
		<form action="laporan.php" method="get">
			<div class="form_settings" style="overflow: auto">
				<table>
					<tr>
						<th><div align="center">Pilih Tipe: </div></td>
						<th id="bulan_select_header" <?php if(isset($_GET['tipe'])){ if($_GET['tipe']=="tahun") echo 'style="display:none"'; }?> ><div align="center">Tahun: </div></td>
						<th id="hari_select_header" <?php if(isset($_GET['tipe'])){ if($_GET['tipe']!="hari") echo 'style="display:none"'; }?> ><div align="center">Bulan: </div></td>
					</tr>
					<tr>
						<script>
							function changeType(val)
							{
								if(val=="tahun")
								{
									document.getElementById('bulan_select').style.display = "none";
									document.getElementById('bulan_select_header').style.display = "none";
									document.getElementById('hari_select').style.display = "none";
									document.getElementById('hari_select_header').style.display = "none";
									document.getElementById('bulan_select').value = "";
									document.getElementById('hari_select').value = "";
								}
								else if(val=="bulan")
								{
									document.getElementById('bulan_select').style.display = "";
									document.getElementById('bulan_select_header').style.display = "";
									document.getElementById('hari_select').style.display = "none";
									document.getElementById('hari_select_header').style.display = "none";
								}
								else
								{
									document.getElementById('bulan_select').style.display = "";
									document.getElementById('bulan_select_header').style.display = "";
									document.getElementById('hari_select').style.display = "";
									document.getElementById('hari_select_header').style.display = "";
								}
							}
						</script>
						<td>
							<select name="tipe" onchange="changeType(this.value);" >
								<option value="hari" <?php if(isset($_GET['tipe'])){ if($_GET['tipe']=="hari") echo 'selected="selected"';} ?>>Per Hari</option>
								<option value="bulan" <?php if(isset($_GET['tipe'])){ if($_GET['tipe']=="bulan") echo 'selected="selected"';} ?>>Per Bulan</option>
								<option value="tahun" <?php if(isset($_GET['tipe'])){ if($_GET['tipe']=="tahun") echo 'selected="selected"';} ?>>Per Tahun</option>
							</select>
						</td>
						<td id="bulan_select" <?php if(isset($_GET['tipe'])){ if($_GET['tipe']=="tahun") echo 'style="display:none"'; }?> >
							<select name="tahun">
								<?php for($i=2012; $i<=2015; $i++) { ?>
									<option <?php if(isset($_GET['tipe'])){ if($_GET['tahun']==$i) echo 'selected="selected"';} ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
							</select>
						</td>
						<td id="hari_select"  <?php if(isset($_GET['tipe'])){ if($_GET['tipe']!="hari") echo 'style="display:none"'; }?> >
							<select name="bulan">
								<?php for($i=1; $i<=12 ; $i++) { ?>
									<option <?php if(isset($_GET['tipe'])){ if($_GET['bulan']==$i) echo 'selected="selected"';} ?> value="<?php echo $i; ?>"><?php echo date("F", mktime(0, 0, 0, $i, 10)); ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
				</table>
				<div align="center"><input type="submit" value="lihat" class="submit" style="margin:0; margin-top: 10px" /></div>
			</div>
		</form>
		<div id="chart1" style="width:700px; height:300px; margin-top: 30px; margin-bottom: 30px"></div>
		<?php if(isset($_GET['tipe'])) { 
					if($_GET['tipe']=='tahun')
					{
			?>
				<h3>Rekap Per Tahun</h3>
				<table class="customTable">
					<thead>
					<tr>
						<th><div align="center">No: </div></td>
						<th><div align="center">Tahun: </div></td>
						<th><div align="center">Pemasukan: </div></td>
						<th><div align="center">Lihat Detail: </div></td>
						<th><div align="center">Cetak Data: </div></td>
					</tr>
					</thead>
					<tbody>
					<?php for($i = 0; $i<$c_tahun; $i++) { ?>
					<tr>
						<td><div align="center"><?php echo $i+1; ?></div></td>
						<td><div align="center"><?php echo $s1[$i][0]; ?></div></td>
						<td><div align="center">Rp. <?php echo $s1[$i][1]; ?></div></td>
						<td><div align="center"><a href="detaillaporan.php?tipe=tahun&tahun=<?php echo $s1[$i][0]; ?>">lihat detail tahun <?php echo $s1[$i][0]; ?></a></div></td>
						<td><div align="center"><div align="center" class="form_settings"><input class="submit" type="button" onclick="javascript:window.location='print_laporan.php?print=yes&tipe=tahun&tahun=<?php echo $s1[$i][0]; ?>';" value="Cetak Data" style="margin:0" /></div></div></td>
					</tr>
					<?php } ?>
					</tbody>
				</table>
			<?php } else if($_GET['tipe']=='bulan') { ?>
				<h3>Rekap Per Bulan pada Tahun <?php echo $tahun; ?></h3>
				<table class="customTable">
					<thead>
					<tr>
						<th><div align="center">No: </div></td>
						<th><div align="center">Bulan: </div></td>
						<th><div align="center">Pemasukan: </div></td>
						<th><div align="center">Lihat Detail: </div></td>
						<th><div align="center">Cetak Data: </div></td>
					</tr>
					</thead>
					<tbody>
					<?php for($i = 0; $i<$c_bulan; $i++) { ?>
					<tr>
						<td><div align="center"><?php echo $i+1; ?></div></td>
						<td><div align="center"><?php echo $s1[$i][0]; ?></div></td>
						<td><div align="center">Rp. <?php echo $s1[$i][1]; ?></div></td>
						<td><div align="center"><a href="detaillaporan.php?tipe=bulan&tahun=<?php echo $tahun; ?>&bulan=<?php echo $s1[$i][0]; ?>">lihat detail bulan <?php echo date("F", mktime(0, 0, 0, $s1[$i][0], 10)); ?></a></div></td>
						<td><div align="center"><div align="center" class="form_settings"><input class="submit" type="button" onclick="javascript:window.location='print_laporan.php?print=yes&tipe=bulan&tahun=<?php echo $tahun; ?>&bulan=<?php echo $s1[$i][0]; ?>';" value="Cetak Data" style="margin:0" /></div></div></td>
					</tr>
					<?php } ?>
					</tbody>
				</table>
			<?php } else if($_GET['tipe']=='hari') { ?>
				<h3>Rekap Per Hari pada Tahun <?php echo $tahun; ?> Bulan <?php echo date("F", mktime(0, 0, 0, $bulan, 10)); ?></h3>
				<table class="customTable">
					<thead>
					<tr>
						<th><div align="center">No: </div></td>
						<th><div align="center">Hari: </div></td>
						<th><div align="center">Pemasukan: </div></td>
						<th><div align="center">Lihat Detail: </div></td>
						<th><div align="center">Cetak Data: </div></td>
					</tr>
					</thead>
					<tbody>
					<?php for($i = 0; $i<$c_hari; $i++) { ?>
					<tr>
						<td><div align="center"><?php echo $i+1; ?></div></td>
						<td><div align="center"><?php echo $s1[$i][0]; ?></div></td>
						<td><div align="center">Rp. <?php echo $s1[$i][1]; ?></div></td>
						<td><div align="center"><a href="detaillaporan.php?tipe=hari&tahun=<?php echo $tahun; ?>&bulan=<?php echo $bulan; ?>&hari=<?php echo $s1[$i][0]; ?>">lihat detail tanggal <?php echo $s1[$i][0]; ?></a></div></td>
						<td><div align="center"><div align="center" class="form_settings"><input class="submit" type="button" onclick="javascript:window.location='print_laporan.php?print=yes&tipe=hari&tahun=<?php echo $tahun; ?>&bulan=<?php echo $bulan; ?>&hari=<?php echo $s1[$i][0]; ?>';" value="Cetak Data" style="margin:0" /></div></div></td>
					</tr>
					<?php } ?>
					</tbody>
				</table>
			<?php } } ?>
    </div>
<?php
    include "footer.php";
}
?>