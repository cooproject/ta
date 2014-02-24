<?php
session_start();
if(!isset($_SESSION['level']))
{
    echo"cannot bypass access";
    header('location:../login.php');
}
elseif($_SESSION['level']!='accountmanager'){
    echo "unauthorized access";
    header('location:../login.php');

}
else
{
    $username=$_SESSION['namauser'];

require_once("../config.php");
include "tampilan2.php";
    try {
        $db = Config::getInstance();
        $query="SELECT * FROM users LEFT JOIN levels ON users.id_levels = levels.id_levels ";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);



    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>
    <div id="content"> <h2>Daftar User</h2>
    <p>Berikut adalah daftar user</p>

    <table style="width:70%; border-spacing:0;border-width:1 ">
        <tr><th>Username</th><th>Password</th><th>ID Level</th><th >Level</th><th colspan="2">Aksi</th></tr>
        <?php while ($row = $stmt->fetch()) { ?>
        <tr><td><?php echo $row['USERNAME'] ?></td>
            <td><?php echo $row['PASSWORD'] ?></td>
            <td><?php echo $row['ID_LEVELS'] ?></td>
            <td><?php echo $row['LEVELS'] ?></td>
            <td>
            <a href="edit.php?username=<?php echo $row['USERNAME'] ?>">
                ubah
            </a>
                </td>
            <td>
            <a href="pdo.php?action=delete&username=<?php echo $row['USERNAME'] ?>">
                hapus
            </a>
            </td>
        </tr>
    </div>


<?php
}
 ?>
    </table>
<?php
include "footer.php";}
?>
