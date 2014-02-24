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
<h1>Detail Laporan Pemasukkan <?php $print = ""; if(isset($_GET['tipe'])) { if($_GET['tipe']=='tahun') { $tahun = $_GET['tahun']; echo "tahun ".$tahun; $print='tipe=tahun&tahun='.$tahun; } else if($_GET['tipe']=='bulan') { $tahun = $_GET['tahun']; $bulan = $_GET['bulan']; echo "tahun ".$_GET['tahun']." bulan ".date("F", mktime(0, 0, 0, $bulan, 10)); $print='tipe=bulan&tahun='.$tahun.'&bulan='.$bulan; } else if($_GET['tipe']=='hari') { $tahun = $_GET['tahun']; $bulan = $_GET['bulan']; $hari = $_GET['hari']; echo "tahun ".$tahun." bulan ".date("F", mktime(0, 0, 0, $bulan, 10))." tanggal ".$hari; $print='tipe=hari&tahun='.$tahun.'&bulan='.$bulan.'&hari='.$hari; } } ?></h1>
<div align="center" class="form_settings"><input class="submit" type="button" onclick="javascript:window.location='print_laporan.php?print=yes&<?php echo $print; ?>';" value="Cetak Data" style="margin:0" /></div>
<form action="aksi/konsumen.php" method="post">
	<?php $kondisi = ""; 
		if(isset($_GET['tipe'])) { 
			if($_GET['tipe']=='tahun') 
			{ 
				$tahun = $_GET['tahun']; 
				$kondisi = "AND YEAR(tanggal_pesan) = ".$tahun;
			} 
			else if($_GET['tipe']=='bulan') 
			{ 
				$tahun = $_GET['tahun']; 
				$bulan = $_GET['bulan']; 
				$kondisi = "AND YEAR(tanggal_pesan) = ".$tahun." AND MONTH(tanggal_pesan) = ".$bulan;
			} 
			else if($_GET['tipe']=='hari') 
			{ 
				$tahun = $_GET['tahun']; 
				$bulan = $_GET['bulan']; 
				$hari = $_GET['hari']; 
				$kondisi = "AND YEAR(tanggal_pesan) = ".$tahun." AND MONTH(tanggal_pesan) = ".$bulan." AND DAY(tanggal_pesan) = ".$hari;
			}
		} ?>
    <div class="form_settings" style="overflow: auto">
        <table class="customTable">
            <thead>
            <tr>
                <th>Paket wedding</th>
				<th>Yang telah dibayar</th>
                <th>Tanggal Acara</th>
                <th>Konsep Pelanggan</th>
				<th>Status Verifikasi</th>
            </tr>
            </thead>
            <tbody>
            <?php
                try{
                    $db=config::getInstance();
                    $query="SELECT w.nama_paket as NAMA_PAKET, w.harga  as HARGA_PAKET, p.tanggal_acara as TANGGAL_ACARA, p.konsep_acara as KONSEP_ACARA, p.id_pemesanan as ID_PEMESANAN, p.status_verifikasi as STATUS_VERIFIKASI FROM pemesanan p, wedding w WHERE p.kode_paket=w.kode_paket ".$kondisi;
                    $stmt=$db->prepare($query);
                    $stmt->execute();
                }catch (Exception $e){
                    $e->getMessage();
                }
                ?>
            <?php $total = 0; while($row=$stmt->fetch()){ ?>
                <tr>
                    <td><?php echo $row['NAMA_PAKET']; ?></td>
					<td><?php echo $row['HARGA_PAKET']; $total+=$row['HARGA_PAKET']; ?></td>
                    <td><?php echo $row['TANGGAL_ACARA']; ?></td>
					<td><?php echo $row['KONSEP_ACARA']; ?></td>
                    <?php if($row['STATUS_VERIFIKASI']=="1") { 
							echo '<td style="color:#FFF; background-color:#2EFF00; ">Terverifikasi</td>'; 
						} else { 
							echo '<td style="color:#FFF; background-color:#FF0000;">Belum terverifikasi</td>'; 
						}
					?>
                </tr>
            <?php } ?>
			<tr>
                <th>Total</th>
				<th><? echo $total; ?></th>
                <th colspan="3">&nbsp;</th>
            </tr>
            </tbody>
        </table>
    </div>
</form>
<?php
    include "footer.php";
}
?>