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
    include "tampilan.php";
    ?>
<h1>Data Pelanggan </h1>
<form action="aksi/bukutamuaksi" method="post">
    <div class="form_settings">
        <table class="customTable">
            <thead>
            <tr>
                <th>ID Tamu</th>
                <th>ID Konsumen</th>
                <th>Komentar</th>

            </tr>
            </thead>
            <tbody>
                <?php
                try{
                    $db=config::getInstance();
                    $query="SELECT * FROM buku_tamu";
                    $stmt=$db->prepare($query);
                    $stmt->execute();
                }catch (Exception $e){
                    $e->getMessage();
                }
                ?>
                <?php while($row=$stmt->fetch()){ ?>
            <tr>
                <td><?php echo $row['ID_TAMU'] ?></td>
                <td><?php echo $row['ID_KONSUMEN'] ?></td>
                <td><?php echo $row['ISI'] ?></td>
                <td>

                    <a href="../aksi/bukutamuaksi.php?action=delete&id=<?php echo $row['ID_TAMU'] ?>">Delete</a>
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