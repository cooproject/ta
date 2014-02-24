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
        $query="SELECT * FROM levels ";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);



    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>
    <h1>Tambah User Baru</h1>
    <form action="pdo.php" method="post">
        <div class="form_settings">
            <p><span>Username </span><input type="text" name="username" value="" required="" /></p>
            <p><span>Password </span><input type="password" name="password" value=""required="" /></p>
            <p><span>Level </span><select name="levels" >
                <?php while($row = $stmt->fetch()){?>
                    <option value="<?php echo $row['ID_LEVELS'];?>"><?php echo $row['LEVELS'];?></option>
                <?php } ?>
            </select>

            <p style="padding-top: 15px"><span style="margin-left: 100px;margin-right: -100px"><input  class="submit" type="reset" name="login" value="Reset" /></span><input class="submit" type="submit" name="input" value="Tambah" /></p>
        </div>
    </form>



    <?php
    include "footer.php";}
?>
