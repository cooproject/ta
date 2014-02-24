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


include "../config.php";
include "tampilan.php";
try {
    $db = Config::getInstance();
    $query = "SELECT * FROM users LEFT JOIN levels ON users.ID_LEVELS=levels.ID_LEVELS WHERE USERNAME=:USERNAME";
    $stmt= $db->prepare($query);
    $stmt->bindParam(':USERNAME',$_GET['username']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $row=$stmt->fetch();
} catch (Exception $e) {
    echo $e->getMessage();
}
}?>

<h1>Form Update Data User</h1>
<form action="pdo.php" method="post">
    <div class="form_settings">
        <p><span>Username</span><input type="text" name="username" value="<?php echo $row['USERNAME']?>" readonly="" />
            <input type="hidden" name="primary" value="<?php echo $row['USERNAME']?>"  />
        </p
        <p><span>Password</span><input type="text" name="password" value="<?php echo $row['PASSWORD']?>"required="" /></p>
        <p><span>Level </span><select name="levels" >
                <option value="111" <?php ($row['ID_LEVELS']=="111") ? print("selected=\"selected\"") : print("") ?>>Mahasiswa</option>
                <option value="118" <?php ($row['ID_LEVELS']=="118") ? print("selected=\"selected\"") : print("") ?>>Account Manager</option>

            </select></p>

        <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="name" value="update" /></p>
    </div>
</form>