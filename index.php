<?php
	require_once("config.php");
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
		
		<link rel="stylesheet" href="css/galleriffic-2.css" type="text/css" />
		<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
		<script type="text/javascript" src="js/jquery.gmaps.js"></script>
		<script type="text/javascript" src="js/jquery.galleriffic.js"></script>
		<script type="text/javascript" src="js/jquery.opacityrollover.js"></script>
		<!-- We only want the thunbnails to display when javascript is disabled -->
		<script type="text/javascript">
			document.write('<style>.noscript { display: none; }</style>');
		</script>

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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
                            <li><a href="#brideandgroom">HOME</a></li>
                            <li><a href="#wedding">WEDDINGS</a></li>
                            <li><a href="#accomodations">SERVICES</a></li>
                            <li><a href="/ta/reservation.php">REGISTER</a></li>
                            <li><a href="#gallery" target="_blank">GALLERY</a></li>
                            <li><a href="login/login.php">LOGIN</a> </li>
                        </ul>

                    </nav>
                </div>
            </div>
			
			<?php
				try{
					$db=config::getInstance();
					$query="SELECT * FROM config";
					$stmt=$db->prepare($query);
					$stmt->execute();
				}catch (Exception $e){
					$e->getMessage();
				}
				while($row=$stmt->fetch()){
					$data[$row['config_name']] = $row['content'];
				}
			?>
            <div class="main-container">
                <div class="main wrapper clearfix">

                    <header>
                        <div id="introtext">
                            <span class="head-sarah">Mutiara</span>
                            <span class="head-brad">&nbsp;
                                <span class="amp"></span>
                                Organizer
                            </span>
                            <div class="date"><?php echo date( "F d, Y", time() ); ?></div>

                        </div>
                    </header>

                    <div class="clearfix"></div>

                    <section id="brideandgroom" class="clearfix">

                        <h1><?php echo $data['about_us_title']; ?></h1>
                                
                        <div class="column left">
                            <h2><p>
                                <?php echo $data['about_us_tagline']; ?>
                            </h2></p>

                        </div><!--end column-->
                        <div class="column right">

                            <h2></h2>
                            <?php echo $data['about_us_content']; ?>




                        </div><!--end column-->

                        <div class="clearfix"></div>

                        <div class="column full">
                            <div class="hr-t"></div>
                            <div class="hr-b"></div>
                        </div>

                        <div class="column full">


                        </div><!--end column-->

                    </section>

                    <section id="wedding" class="clearfix">

                        <h1>Wedding packages</h1>

						<?php
							try{
								$db=config::getInstance();
								$query="SELECT * FROM paket";
								$stmt=$db->prepare($query);
								$stmt->execute();
							}catch (Exception $e){ 
								$e->getMessage();
							}
							$exist = false;
							$i = 0;
							while($row=$stmt->fetch()){
								if($i%2==0)
								{	?>
									<div class="column left">
									<h2><?php echo $row['nama']; ?></h2>
									<h2><?php echo $row['harga']; ?></h2>
									<?php echo $row['elemen']; ?>
									</div>
						<?php	} else { ?>
									<div class="column right">
									<h2><?php echo $row['nama']; ?></h2>
									<h2><?php echo $row['harga']; ?></h2>
									<?php echo $row['elemen']; ?>
									</div>
						<?php	$i++;
							}}
						?>
                        
                        <div class="clearfix"></div>

                        <div class="column full">
                            <div class="hr-t"></div>
                            <div class="hr-b"></div>
                        </div>

                        <h2>BRIDAL PARTY</h2>

                        <div class="column left bp">
                            
                            <h2>Bridesmaids </h2>
                            <div class="column left">
                                <p>
                                Coming Soon!<br />
                                </p>
                            </div>
                            <div class="column right">
                                <p>
                                </p>
                            </div>

                        </div><!--end column--> 

                    </section>

                    <section id="accomodations" class="clearfix">

                        <h1><?php echo $data['service_title']; ?></h1>

                        <div class="column left">
                            <?php echo $data['service_content']; ?>
                        </div><!--end column-->

                        <div class="column right">
                            <img src="img/planning.jpg" class="thumb1" alt="Sarah" />

                            
                        </div><!--end column-->

                        <div class="clearfix"></div>

                        <div class="column full">
                            <div class="hr-t"></div>
                            <div class="hr-b"></div>
                        </div>

						<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
					<script type="text/javascript">
					<?php
						try{
								$db=config::getInstance();
								$query="SELECT * FROM map";
								$stmt=$db->prepare($query);
								$stmt->execute();
							}catch (Exception $e){ 
								$e->getMessage();
							}
							$exist = false;
							$i = 0;
							while($row=$stmt->fetch()){
								$map[$i][0] = $row['title'];
								$map[$i][1] = (double)$row['latitude'];
								$map[$i][2] = (double)$row['longitude'];
								$i++;
							}
					?>
					var markers = <?php echo json_encode($map); ?>;
					function initializeMaps() {
						var myOptions = {
							mapTypeId: google.maps.MapTypeId.ROADMAP,
							mapTypeControl: false
						};
						var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
						var infowindow = new google.maps.InfoWindow(); 
						var marker, i;
						var bounds = new google.maps.LatLngBounds();

						for (i = 0; i < markers.length; i++) { 
							var pos = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(pos);
							marker = new google.maps.Marker({
								position: pos,
								map: map
							});
							google.maps.event.addListener(marker, 'click', (function(marker, i) {
								return function() {
									infowindow.setContent(markers[i][0]);
									infowindow.open(map, marker);
								}
							})(marker, i));
						}
						map.fitBounds(bounds);
					}
					$(document).ready(function() {
						initializeMaps();
						});
					</script>
				   <div style="height: 250px; margin-bottom: 30px; display: none">                        
						<div id="google-map" class="gmap"></div>
							<script type="text/javascript">
								
									jQuery('#google-map').gMap({
										
															  latitude: ,
										 longitude: ,
															 maptype: 'ROADMAP',
										 zoom: 14,
										 scrollwheel: false,
										 markers:[
											{
																			 latitude: ,
												 longitude: ,
																			 html: ''
											}
										 ],
										 doubleclickzoom: false,
										 controls: {
											 panControl: false,
											 zoomControl: false,
											 mapTypeControl: false,
											 scaleControl: false,
											 streetViewControl: false,
											 overviewMapControl: false                     }
									
									});
								
							</script>                        
					</div>
                        <div class="column full">

                            <h2>VICINITY MAP</h2>
                            <div id="gmap">
                                <div style="width: 100%; height: 350px; color: #000" id="map_canvas"></div>
								<small><a href="https://www.google.com/maps?t=m&amp;geocode=FYpykP8duuq4Bimvkmjy8_rXLTEybIMxEZLZCA%3BFUEakP8d1we5Bikvhm9MuPrXLTHxnLpaSUpLgg%3BFSQEkP8dB964Bg&amp;saddr=Stikom,+Jalan+Semampir+Tengah+VI+Surabaya,+Indonesia&amp;daddr=UPN+%22Veteran%22+Jawa+Timur,+Jl.+Raya+Rungkut+Madya,+Gunung+Anyar,+East+Java+60294,+Indonesia+to:-7.3389719,112.7787591&amp;dirflg=d&amp;ie=UTF8&amp;ll=-7.323479,112.77998&amp;spn=0.059591,0.072784&amp;z=13&amp;source=embed" style="color:#0000FF;text-align:left">Lihat Peta Lebih Besar</a></small>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="column full">
                            <div class="hr-t"></div>
                            <div class="hr-b"></div>
                        </div>

                       <!--end column-->

                    </section>

                    <section id="gallery" class="clearfix">

                        <div id="page">
			<div id="container">
				<h1>Gallery</a></h1>

				<!-- Start Advanced Gallery Html Containers -->
				<div id="gallery" class="content">
					<div id="controls" class="controls"></div>
					<div class="slideshow-container">
						<div id="loading" class="loader"></div>
						<div id="slideshow" class="slideshow"></div>
					</div>
					<div id="caption" class="caption-container"></div>
				</div>
				<div id="thumbs" class="navigation">
					<ul class="thumbs noscript">
						<?php
							try{
								$db=config::getInstance();
								$query="SELECT * FROM gallery";
								$stmt=$db->prepare($query);
								$stmt->execute();
							}catch (Exception $e){
								$e->getMessage();
							}
							while($row=$stmt->fetch()){ ?>
							<li>
							<a class="thumb" href="<?php if(substr($row['link'],0,4)!="http") echo "gallery/".$row['link']; else echo $row['link']; ?>" title="<?php echo $row['title']; ?>">
								<img src="<?php if(substr($row['link'],0,4)!="http") echo "gallery/".$row['link']; else echo $row['link']; ?>" alt="<?php echo $row['title']; ?>" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="<?php if(substr($row['link'],0,4)!="http") echo "gallery/".$row['link']; else echo $row['link']; ?>">Download Original</a>
								</div>
								<div class="image-title"><?php echo $row['title']; ?></div>
								<div class="image-desc"><?php echo $row['desc']; ?></div>
							</div>
							</li>
						<?php } ?>                       
					</ul>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.navigation').css({'width' : '300px', 'float' : 'left'});
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 15,
					preloadAhead:              10,
					enableTopPager:            true,
					enableBottomPager:         true,
					maxPagesToShow:            7,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             false,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					}
				});
			});
		</script>
                    </section>

                    <div style="height: 300px"></div>

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
