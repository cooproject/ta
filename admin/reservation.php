<?php
	require_once("config.php");
	require_once('calendar/classes/tc_calendar.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Mutiara Wedding</title>
        <meta name="description" content="Welcome to the wedding website for Sarah and Brad's Big Day!">

        <meta name="viewport" content="width=device-width,initial-scale=1.0" />

        <!-- For iPhone 4 with high-resolution Retina display: -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114-precomposed.png">
        <!-- For first-generation iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72-precomposed.png">
        <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
        <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">

        <link rel="shortcut icon" href="favicon.ico?v=1">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main-1.6.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		
		<!-- penambahan calendar !-->
		<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
		<script language="javascript" src="calendar/calendar.js"></script>
		
		<!-- fungsi ajax untuk retrieve data "kota" !-->
		<script type="text/javascript">
			function getKota(val)
			{
				if(val=='#') return;
				var dataString = 'id_prov=' + val;
				$.ajax({
				 type: "POST",
				 url: "ajaxhelper.php",
				 data: dataString, 
				 cache: false,
				 success: function(result){
					$("#kota_box").show();
					$("#kota_select").html("<option value='#'>- Pilih nama kota -</option>");
					$("#kota_select").append(result);
				 }
			   });
			}
			
			function getDetailPaket(val)
			{
				if(val=='#') return;
				var dataString = 'kode_paket=' + val;
				$.ajax({
				 type: "POST",
				 url: "ajaxhelper.php",
				 data: dataString, 
				 cache: false,
				 success: function(result){
					$("#detail_paket").show();
					$("#detail_paket").html(result);
				 }
			   });
			}
			
			function getName(val)
			{
				if(val=='#') return;
				var dataString = 'nameval=' + val;
				$.ajax({
				 type: "POST",
				 url: "ajaxhelper.php",
				 data: dataString, 
				 cache: false,
				 success: function(result){
					$("#nameList").html(result);
				 }
			   });
			}
		</script>
		
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->


        <div id="bg-image">
            <img src="img/bg-pic.jpg" alt="bg" />
        </div>

        <div id="bg-container">

            <div class="header-container">
                <div id="heading" class="wrapper clearfix">
                    <nav id="nav">
                        <ul>
							<li><a href="/ta">HOME</a></li>
                            <li><a href="#reservation">RESERVATION</a></li> <!-- halaman pemesanan !-->
                        </ul>

                    </nav>
                </div>
            </div>

            <div class="main-container">
                <div class="main wrapper clearfix">

                    <header>
                        <div id="introtext">
                            <span class="head-sarah">Mutiara</span>
                            <span class="head-brad">&nbsp;
                                <span class="amp"></span>
                                Organizer
                            </span>
                            <div class="date">SEPTEMBER 6<sup>th</sup>, 2012</div>

                        </div>
                    </header>

                    <div class="clearfix"></div>
					
					<section id="reservation" class="clearfix">

                        <h1>Reservation</h1>
						
						<div align="center" class="form_settings">
							<?php if(!isset($_GET['opt']) && !isset($_GET['finish'])) { ?>
							<h3>Anda sudah pernah terdaftar?</h3>
							<input class="submit" type="button" onclick="javascript:window.location='reservation.php?opt=yes';" value="Ya" style="margin:0" />
							<input class="submit" type="button" onclick="javascript:window.location='reservation.php?opt=no';" value="Belum" style="margin:0" />
							<?php } else if(isset($_GET['finish'])) { ?>
							<h3>Anda ingin mencetak invoice / nota Anda?</h3>
							<a href="invoice.php?print=yes&id=<?php echo $_GET['finish']; ?>" target="_blank"><input class="submit" type="button" value="Cetak" style="margin:0" /></a>
							<input class="submit" type="button" onclick="javascript:window.location='reservation.php';" value="Kembali" style="margin:0" />
							<?php } else { ?>
							<h3><a href="reservation.php">Klik untuk kembali ke menu pilihan</a></h3>
							<?php } ?>
						</div>
						
						<?php if(isset($_GET['opt']) && $_GET['opt']=="yes") { ?>
						<div class="column full">
                            <form action="aksi/reservasi.php" method="post"  enctype="multipart/form-data" >
								<input type="hidden" name="action" value="insertExist" />
                                <div class="form_settings">
									<table>
										<tr>
											<td width="150">Cari Nama</td>
											<td>
												<select name="id_konsumen" required="required" style="margin-left:10px" >
													<option value='#'>- Pilih nama Anda -</option>
													<?php
														try{
															$db=config::getInstance();
															$query="SELECT * FROM konsumen";
															$stmt=$db->prepare($query);
															$stmt->execute();
														}catch (Exception $e){
															$e->getMessage();
														}
														while($row=$stmt->fetch()){ ?>
														<option value="<?php echo $row['ID_KONSUMEN']; ?>"><?php echo $row['NAMA_KONSUMEN']; ?> email: <?php echo $row['EMAIL']; ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										
										<tr>
											<td>Paket Wedding</td>
											<td>
												<div id="detail_paket" style="position: absolute; margin-left: 370px; margin-top: -20px; max-width: 400px;overflow-wrap: break-word;overflow: auto; display:none;">
												</div>
												<select name="paket" id="paket_select" required="required" style="margin-left:10px" onchange="getDetailPaket(this.value);">
													<option value='#'>- Pilih nama paket -</option>
													<?php
														try{
															$db=config::getInstance();
															$query="SELECT * FROM wedding";
															$stmt=$db->prepare($query);
															$stmt->execute();
														}catch (Exception $e){
															$e->getMessage();
														}
														while($row=$stmt->fetch()){ ?>
														<option value="<?php echo $row['KODE_PAKET']; ?>"><?php echo $row['NAMA_PAKET']; ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
											
										<tr>
											<td>Tanggal Acara</td>
											<td>
												<div class="myCalendar" style="margin-left:10px"><?php
													  $myCalendar = new tc_calendar("tanggal_acara", true, false);
													  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
													  //$myCalendar->setDate(date('d'), date('m'), date('Y'));
													  $myCalendar->setPath("calendar/");
													  $myCalendar->setYearInterval(date("Y"), 2015);
													  $tomorrow = mktime(0,0,0,date("m"),date("d")+1,date("Y"));
													  $myCalendar->dateAllow(date("Y-m-d", $tomorrow), '2015-03-01');
													  $myCalendar->setDateFormat('j F Y');
													  $myCalendar->setAlignment('left', 'bottom');
													  try{
															$db=config::getInstance();
															$query="SELECT * FROM pemesanan";
															$stmt=$db->prepare($query);
															$stmt->execute();
														}catch (Exception $e){
															$e->getMessage();
														}
													  $i = 0;
													  $existDate = false;
													  while($row=$stmt->fetch()){
														$reservedDate[$i] = $row['TANGGAL_ACARA'];
														$existDate = true;
														$i++;
													  }
													  if($existDate) $myCalendar->setSpecificDate($reservedDate, 0, '');
													  $myCalendar->writeScript();
												?></div>
											</td>
										</tr>
										
										<tr>
											<td>Konsep</td>
											<td><textarea rows="8" cols="50" name="konsep" required="required" ></textarea></td>
										</tr>

										<tr>
											<td>Bukti Pembayaran (uang DP)</td>
											<td><input type="file" name="buktibayar" id="buktibayar" required="required" /></td>
										</tr>
											
										<tr>
											<td>&nbsp;</td>
											<td><input class="submit" type="submit" name="name" value="submit" /></td>
										</tr>

                                </div>
                            </form>
                            <!--end colom-->


                                <!-- ################################################################################################ -->
                            </div>
						<?php } if(isset($_GET['opt']) && $_GET['opt']=="no") { ?>
                        <div class="column full">
                            <form action="aksi/reservasi.php" method="post"  enctype="multipart/form-data" >
								<input type="hidden" name="action" value="insertNew" />
                                <div class="form_settings">
									<table>
										<tr>
											<td width="150">Nama</td>
											<td><input type="text" name="nama" value="" required="required" /></td>
										</tr>
										
										<tr>
											<td>Jenis Kelamin</td>
											<td><input type="radio" name=jeniskelamin id="jeniskelamin" class="" value="1" required="required" />Laki-Laki<input type="radio" name=jeniskelamin id="jeniskelamin" class="" value="0" required="required" />Perempuan</td>
										</tr>	
										
										<tr>
											<td>Provinsi</td>
											<td>
												<select name="provinsi" id="provinsi_select" required="required" style="margin-left:10px" onchange="getKota(this.value);">
													<option value='#'>- Pilih nama provinsi -</option>
													<?php
														try{
															$db=config::getInstance();
															$query="SELECT * FROM provinsi";
															$stmt=$db->prepare($query);
															$stmt->execute();
														}catch (Exception $e){
															$e->getMessage();
														}
														while($row=$stmt->fetch()){ ?>
														<option value="<?php echo $row['id_provinsi']; ?>"><?php echo $row['nama_provinsi']; ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										
										<tr id="kota_box" style="display:none">
											<td>Kota</td>
											<td>
												<select name="kota" id="kota_select" required="required" style="margin-left:10px">
												</select>
											</td>
										</tr>
										
										<tr>
											<td>Alamat</td>
											<td><textarea rows="8" cols="50" name="alamat" required="required" ></textarea></td>
										</tr>
										
										<tr>
											<td>Kode Pos</td>
											<td><input type="text" name="kodepos" value="" required="required" /><a href="http://kodepos.posindonesia.co.id/kodeposalamatindonesialist.php" target="_blank">cek</a></td>
										</tr>
										
										<tr>
											<td>No Tlp</td>
											<td><input type="tel" name="tlp" value="" required="required" /></td>
										</tr>
										
										<tr>
											<td>Email</td>
											<td><input type="email" name="email" value="" required="required" /></td>
										</tr>
										
										<tr>
											<td>Paket Wedding</td>
											<td>
												<div id="detail_paket" style="position: absolute; margin-left: 370px; margin-top: -20px; max-width: 400px;overflow-wrap: break-word;overflow: auto; display:none;">
												</div>
												<select name="paket" id="paket_select" required="required" style="margin-left:10px" onchange="getDetailPaket(this.value);">
													<option value='#'>- Pilih nama paket -</option>
													<?php
														try{
															$db=config::getInstance();
															$query="SELECT * FROM wedding";
															$stmt=$db->prepare($query);
															$stmt->execute();
														}catch (Exception $e){
															$e->getMessage();
														}
														while($row=$stmt->fetch()){ ?>
														<option value="<?php echo $row['KODE_PAKET']; ?>"><?php echo $row['NAMA_PAKET']; ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
											
										<tr>
											<td>Tanggal Acara</td>
											<td>
												<div class="myCalendar" style="margin-left:10px"><?php
													  $myCalendar = new tc_calendar("tanggal_acara", true, false);
													  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
													  //$myCalendar->setDate(date('d'), date('m'), date('Y'));
													  $myCalendar->setPath("calendar/");
													  $myCalendar->setYearInterval(date("Y"), 2015);
													  $tomorrow = mktime(0,0,0,date("m"),date("d")+1,date("Y"));
													  $myCalendar->dateAllow(date("Y-m-d", $tomorrow), '2015-03-01');
													  $myCalendar->setDateFormat('j F Y');
													  $myCalendar->setAlignment('left', 'bottom');
													  try{
															$db=config::getInstance();
															$query="SELECT * FROM pemesanan";
															$stmt=$db->prepare($query);
															$stmt->execute();
														}catch (Exception $e){
															$e->getMessage();
														}
													  $i = 0;
													  $existDate = false;
													  while($row=$stmt->fetch()){
														$reservedDate[$i] = $row['TANGGAL_ACARA'];
														$existDate = true;
														$i++;
													  }
													  if($existDate) $myCalendar->setSpecificDate($reservedDate, 0, '');
													  $myCalendar->writeScript();
												?></div>
											</td>
										</tr>
										
										<tr>
											<td>Konsep</td>
											<td><textarea rows="8" cols="50" name="konsep" required="required" ></textarea></td>
										</tr>

										<tr>
											<td>Bukti Pembayaran (uang DP)</td>
											<td><input type="file" name="buktibayar" id="buktibayar" required="required" /></td>
										</tr>
											
										<tr>
											<td>&nbsp;</td>
											<td><input class="submit" type="submit" name="name" value="submit" /></td>
										</tr>
									</table>
                                </div>
                            </form>
                            <!--end colom-->


                                <!-- ################################################################################################ -->
                            </div>
						<?php } ?>

                        </div>

                <!-- ################################################################################################ -->
                <div class="clear"></div>
            </div>

        </div>
                            
                        </div><!--end column-->
               
                    </section>

                </div> <!-- #main -->
            </div> <!-- #main-container -->
        </div> <!-- #bg-container -->

        <script src="js/main-1.6.js"></script>

        <script>
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-1975046-12']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        </script>
    </body>
</html>
