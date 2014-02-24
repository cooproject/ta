<?php
session_start();
if(isset($_SESSION['namauser']))
{
	header("location:../admin/index.php");
}
include "tampilan.php";
?>
		<div id="bg-image">
            <img src="../img/bg-pic.jpg" alt="bg" />
        </div>

        <div id="bg-container">
            <div class="main-container">
                <div class="main wrapper">

                    <header style="margin-bottom:-200px; margin-top:-10px; height: 400px">
                        <div id="introtext" align="center">
							<span class="head-sarah">Mutiara</span>
							<span class="head-brad">&nbsp;
                                <span class="amp"></span>
                                Organizer
                            </span>
							<h1>Form Login</h1>
							<form action="ceklogin.php" method="post">
								<div class="form_settings">
									<table>
										<tr>
											<td>Username :</td>
											<td><input type="text" name="name" value="" required="" placeholder="masukkan username anda !" style="width:200px"/></td>
										</tr>
										<tr>
												<td>Password :</td>
												<td><input type="password" name="password" value="" required="" placeholder="masukkan password anda  !" style="width:200px" /></td>
										</tr>
										<tr>
											<td>&nbsp;</td>
											<td align="center"><input style="margin-left:5px" class="submit" type="reset" name="login" value="Reset" /><input class="submit" type="submit" style="margin-left:5px" name="login" value="Login" /></td>
										</tr>
									</table>
								</div>
							</form>
                        </div>
                    </header>
					
				</div>
			</div>
		</div>