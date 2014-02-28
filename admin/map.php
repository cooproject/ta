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
<script type="text/javascript" src="../js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="../js/jquery.gmaps.js"></script>
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
<h1>MAP</h1>
<?php if(isset($_GET['act']) && $_GET['act']=="add") { ?>
<div align="center" class="form_settings"><input class="submit" type="button" onclick="javascript:window.location='map.php';" value="Batal" style="margin:0" /></div>
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
	<form action="edit/aksimap.php" method="post"  enctype="multipart/form-data" >
		<div class="form_settings">
			<table>
				<input type="hidden" name="action" value="add" />
				<tr>
					<td width="150">Judul</td>
					<td><input type="text" name="judul" value="" required="required" /></td>
				</tr>
				<tr>
					<td width="150">Latitude</td>
					<td><input type="text" name="lat" value="" required="required" /></td>
				</tr>
				<tr>
					<td width="150">Longitude</td>
					<td><input type="text" name="long" value="" required="required" /></td>
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
        $query="SELECT * FROM map WHERE id_map='$id'";
        $stmt=$db->prepare($query);
        $stmt->execute();
        $row=$stmt->fetch();
    }catch (Exception $e){
        $e->getMessage();
    }
    ?>
<div align="center" class="form_settings"><input class="submit" type="button" onclick="javascript:window.location='map.php';" value="Batal" style="margin:0" /></div>
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
	<form action="edit/aksimap.php" method="post"  enctype="multipart/form-data" >
		<div class="form_settings">
			<table>
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<input type="hidden" name="action" value="edit" />
				<tr>
					<td width="150">Judul</td>
					<td><input type="text" name="judul" value="<?php echo $row['title']; ?>" required="required" /></td>
				</tr>
				<tr>
					<td width="150">Latitude</td>
					<td><input type="text" name="lat" value="<?php echo $row['latitude']; ?>" required="required" /></td>
				</tr>
				<tr>
					<td width="150">Longitude</td>
					<td><input type="text" name="long" value="<?php echo $row['longitude']; ?>" required="required" /></td>
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
<div align="center" class="form_settings"><input class="submit" type="button" onclick="javascript:window.location='map.php?act=add';" value="Tambah" style="margin:0" /></div>
<div class="form_settings">
        <table class="customTable">
            <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th>Judul</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
                try{
                    $db=config::getInstance();
                    $query="SELECT * FROM map";
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
                    <td><?php echo $row['latitude'] ?></td>
					<td><?php echo $row['longitude'] ?></td>
                    <td>
						<a href="map.php?act=edit&id=<?php echo $row['id_map'] ?>"><img src="../img/edit.png" width="20px" title="edit" /></a>
                        <a href="edit/aksimap.php?act=delete&id=<?php echo $row['id_map'] ?>"><img src="../img/delete.png" width="20px" title="delete" /></a>
					</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">
	<?php
		try{
				$db=config::getInstance();
				$query="SELECT * FROM map";
				$stmt=$db->prepare($query);
				$stmt->execute();
			}catch (Exception $e){ 
				$e->getMessage();
			}
			$exist = false;
			$i = 0;
			while($row=$stmt->fetch()){
				$map[$i][0] = $row['title'];
				$map[$i][1] = (double)$row['latitude'];
				$map[$i][2] = (double)$row['longitude'];
				$i++;
			}
	?>
	var markers = <?php echo json_encode($map); ?>;
	function initializeMaps() {
		var myOptions = {
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			mapTypeControl: false
		};
		var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
		var infowindow = new google.maps.InfoWindow(); 
		var marker, i;
		var bounds = new google.maps.LatLngBounds();

		for (i = 0; i < markers.length; i++) { 
			var pos = new google.maps.LatLng(markers[i][1], markers[i][2]);
			bounds.extend(pos);
			marker = new google.maps.Marker({
				position: pos,
				map: map
			});
			google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
					infowindow.setContent(markers[i][0]);
					infowindow.open(map, marker);
				}
			})(marker, i));
		}
		map.fitBounds(bounds);
	}
	$(document).ready(function() {
		initializeMaps();
		});
	</script>
   <div style="height: 250px; margin-bottom: 30px; display: none">                        
		<div id="google-map" class="gmap"></div>
			<script type="text/javascript">
				
					jQuery('#google-map').gMap({
						
											  latitude: ,
						 longitude: ,
											 maptype: 'ROADMAP',
						 zoom: 14,
						 scrollwheel: false,
						 markers:[
							{
															 latitude: ,
								 longitude: ,
															 html: ''
							}
						 ],
						 doubleclickzoom: false,
						 controls: {
							 panControl: false,
							 zoomControl: false,
							 mapTypeControl: false,
							 scaleControl: false,
							 streetViewControl: false,
							 overviewMapControl: false                     }
					
					});
				
			</script>                        
	</div>
	<div id="gmap">
		<div style="width: 100%; height: 350px; color: #000" id="map_canvas"></div>
	</div>
<?php } ?>
<?php
include "footer.php";
}
?>
