<!DOCTYPE HTML>
<html>

<head>
    <link rel="shorcut icon" href="../style/poltekom.png">
    <title>Cuti Akademik</title>
    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <link rel="stylesheet" type="text/css" href="../style/style.css" title="style" />
</head>

<body>
<div id="main">
    <div id="header">
        <div id="logo">
            <div id="logo_text">
                <!-- class="logo_colour", allows you to change the colour of the text -->
                <h1><img src="../style/poltekom.png" height="70" width="70"> <span class="logo_colour">POLTEKOM</span></br><a href="index.php">Sistem Informasi Cuti Akademik Mahasiswa </a></h1>
                <h2>Politeknik Kota Malang</h2>
            </div>
        </div>
        <div id="menubar">
            <ul id="menu">
                <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
                <li><a href="../ac/index.php">Beranda</a></li>
                <li><a href="../ac/daftaruser.php">Data User</a></li>
                <li><a href="../ac/inputuser.php">Tambah User</a></li>
                <li><a href="../ac/logout.php">Logout</a></li>
                <div id="nama"><li><a href="../ac/index.php"><?php echo "$_SESSION[namauser]"; ?></a></li></div>


            </ul>
        </div>
    </div>
    <div id="site_content">



