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
<h1>Data Pelanggan </h1>
<div align="center" class="form_settings"><input class="submit" type="button" onclick="javascript:window.location='print_pelanggan.php?print=yes&id=15';" value="Cetak Data" style="margin:0" /></div>
<form action="aksi/konsumen.php" method="post">
    <div class="form_settings" style="overflow: auto">
        <table class="customTable">
            <thead>
            <tr>
                <!--  <th>ID Konsumen</th>-->
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Provinsi</th>
				<th>Kode Pos</th>
                <th>No Tlp</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
                try{
                    $db=config::getInstance();
                    $query="SELECT k.*, ko.nama_kota as NAMA_KOTA, p.nama_provinsi as NAMA_PROV FROM konsumen k ,kota ko, provinsi p WHERE ko.id_kota = k.kota AND k.prop = p.id_provinsi AND ko.id_provinsi = p.id_provinsi";
                    $stmt=$db->prepare($query);
                    $stmt->execute();
                }catch (Exception $e){
                    $e->getMessage();
                }
                ?>
            <?php while($row=$stmt->fetch()){ ?>
                <tr>
                  <!--  <td><?php echo $row['ID_KONSUMEN'] ?></td>-->
                    <td><?php echo $row['NAMA_KONSUMEN'] ?></td>
                    <td><?php if($row['JENIS_KELAMIN']=="1") echo "L"; else echo "P";?></td>
                    <td><?php echo $row['ALAMAT'] ?></td>
                    <td><?php echo $row['NAMA_KOTA'] ?></td>
					<td><?php echo $row['NAMA_PROV'] ?>
                    <td><?php echo $row['KODE_POS'] ?></td> 
                    <td><?php echo $row['NO_TELP'] ?></td>
                    <td><?php echo $row['EMAIL'] ?></td>
                    <td>
                        <a href="edit/editpelanggan.php?id=<?php echo $row['ID_KONSUMEN'] ?>"><img src="../img/edit.png" width="20px" title="edit" /></a>
                        <a href="../aksi/konsumen.php?action=delete&id=<?php echo $row['ID_KONSUMEN'] ?>"><img src="../img/delete.png" width="20px" title="delete" /></a>
                    </td>
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