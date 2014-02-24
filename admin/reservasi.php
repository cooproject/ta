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
<script>
	function showDetailPaket(val)
	{
		var dataString = 'id_pesan=' + val;
		$.ajax({
		 type: "POST",
		 url: "ajaxhelper.php",
		 data: dataString, 
		 cache: false,
		 success: function(result){
			$("#detail_"+val).show();
			$("#divdetail_"+val).html(result);
		 }
	   });
	}
	function hideDetailPaket(val)
	{
		$("#detail_"+val).hide();
	}
</script>
<h1>Data Pemesanan</h1>
<form action="aksi/konsumen.php" method="post">
    <div class="form_settings" style="overflow: auto">
        <table class="customTable">
            <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>No Tlp</th>
                <th>Paket wedding</th>
				<th>Bukti Bayar</th>
                <th>Tanggal Acara</th>
                <th>Konsep Pelanggan</th>
				<th>Status Verifikasi</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
                try{
                    $db=config::getInstance();
                    $query="SELECT k.*, ko.nama_kota as NAMA_KOTA, w.nama_paket as NAMA_PAKET, p.tanggal_acara as TANGGAL_ACARA, p.bukti_pembayaran as BUKTI_BAYAR, p.konsep_acara as KONSEP_ACARA, p.id_pemesanan as ID_PEMESANAN, p.status_verifikasi as STATUS_VERIFIKASI FROM konsumen k , wedding w, pemesanan p, kota ko WHERE k.id_konsumen = p.id_konsumen AND p.kode_paket=w.kode_paket AND ko.id_kota = k.kota";
                    $stmt=$db->prepare($query);
                    $stmt->execute();
                }catch (Exception $e){
                    $e->getMessage();
                }
                ?>
            <?php while($row=$stmt->fetch()){ ?>
                <tr>
                    <td><?php echo $row['NAMA_KONSUMEN'] ?></td>
                    <td><?php echo $row['ALAMAT'] ?></td>
                    <td><?php echo $row['NAMA_KOTA'] ?></td>
                    <td><?php echo $row['NO_TELP'] ?></td>
                    <td><?php echo $row['NAMA_PAKET']; if($row['NAMA_PAKET']=="lain") { ?> <a href="javascript:showDetailPaket(<?php echo $row['ID_PEMESANAN']; ?>)">[lihat detail]</a><?php } ?></td>
					<td><a href="../dokumen/<?php echo $row['BUKTI_BAYAR'] ?>" target="_blank"><img src="../dokumen/<?php echo $row['BUKTI_BAYAR'] ?>" width="40px" /></a></td>
                    <td><?php echo $row['TANGGAL_ACARA'] ?></td>
					<td><?php echo $row['KONSEP_ACARA'] ?></td>
                    <?php if($row['STATUS_VERIFIKASI']=="1") { 
							echo '<td style="color:#FFF; background-color:#2EFF00; ">Terverifikasi</td>'; 
						} else { 
							echo '<td style="color:#FFF; background-color:#FF0000;">Belum terverifikasi</td>'; 
						}
					?>
                    <td>
					<?php if($row['STATUS_VERIFIKASI']=="0") { ?>
                        <a href="edit/verifyreservasi.php?action=verify&id=<?php echo $row['ID_PEMESANAN'] ?>"><img src="../img/verify.png" width="30px" title="verify" /></a>
					<?php } else { ?>
					    <a href="edit/verifyreservasi.php?action=unverify&id=<?php echo $row['ID_PEMESANAN'] ?>"><img src="../img/unverify.png" width="30px" title="unverify" /></a>
					<?php } ?>
                    </td>
                </tr>
				<tr id="detail_<?php echo $row['ID_PEMESANAN']; ?>" style="display:none">
					<th colspan="8" ><div id="divdetail_<?php echo $row['ID_PEMESANAN']; ?>" ></div></th>
					<th colspan="2"><a href="javascript:hideDetailPaket(<?php echo $row['ID_PEMESANAN']; ?>)">[sembunyikan]</a></th>
				</tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</form>
<?php
    include "footer.php";
}
?>