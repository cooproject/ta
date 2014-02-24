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
		<script>
			jQuery(document).ready(function ($) {

			  $('#checkbox').change(function(){
				setInterval(function () {
					moveRight();
				}, 3000);
			  });
			  
				var slideCount = $('#slider ul li').length;
				var slideWidth = $('#slider ul li').width();
				var slideHeight = $('#slider ul li').height();
				var sliderUlWidth = slideCount * slideWidth;
				
				$('#slider').css({ width: slideWidth, height: slideHeight });
				
				$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
				
				$('#slider ul li:last-child').prependTo('#slider ul');

				function moveLeft() {
					$('#slider ul').animate({
						left: + slideWidth
					}, 200, function () {
						$('#slider ul li:last-child').prependTo('#slider ul');
						$('#slider ul').css('left', '');
					});
				};

				function moveRight() {
					$('#slider ul').animate({
						left: - slideWidth
					}, 200, function () {
						$('#slider ul li:first-child').appendTo('#slider ul');
						$('#slider ul').css('left', '');
					});
				};

				$('a.control_prev').click(function () {
					moveLeft();
				});

				$('a.control_next').click(function () {
					moveRight();
				});

			});    

		</script>
		
		<style>
			@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,300,600);	

			#slider {
			  position: relative;
			  overflow: hidden;
			  margin: 20px auto 0 auto;
			  border-radius: 4px;
			}

			#slider ul {
			  position: relative;
			  margin: 0;
			  padding: 0;
			  height: 200px;
			  list-style: none;
			}

			#slider ul li {
			  position: relative;
			  display: block;
			  float: left;
			  margin: 0;
			  padding: 0;
			  width: 500px;
			  height: 300px;
			  background: #ccc;
			  text-align: center;
			  line-height: 300px;
			}

			a.control_prev, a.control_next {
			  position: absolute;
			  top: 40%;
			  z-index: 999;
			  display: block;
			  padding: 4% 3%;
			  width: auto;
			  height: auto;
			  background: #2a2a2a;
			  color: #fff;
			  text-decoration: none;
			  font-weight: 600;
			  font-size: 18px;
			  opacity: 0.8;
			  cursor: pointer;
			}

			a.control_prev:hover, a.control_next:hover {
			  opacity: 1;
			  -webkit-transition: all 0.2s ease;
			}

			a.control_prev {
			  border-radius: 0 2px 2px 0;
			}

			a.control_next {
			  right: 0;
			  border-radius: 2px 0 0 2px;
			}

			.slider_option {
			  position: relative;
			  margin: 10px auto;
			  width: 160px;
			  font-size: 18px;
			}

		</style>
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
                            <li><a href="#registry">REGISTER</a></li>
                            <li><a href="" target="_blank">BLOG</a></li>
                            <li><a href="login/login.php">LOGIN</a> </li>
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
					<link rel="stylesheet" href="css/galleriffic-2.css" type="text/css" />
					<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
					<script type="text/javascript" src="js/jquery.galleriffic.js"></script>
					<script type="text/javascript" src="js/jquery.opacityrollover.js"></script>
					<!-- We only want the thunbnails to display when javascript is disabled -->
					<script type="text/javascript">
						document.write('<style>.noscript { display: none; }</style>');
					</script>
                    <section id="brideandgroom" class="clearfix">
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
						<li>
							<a class="thumb" name="leaf" href="http://farm4.static.flickr.com/3261/2538183196_8baf9a8015.jpg" title="Title #0">
								<img src="http://farm4.static.flickr.com/3261/2538183196_8baf9a8015_s.jpg" alt="Title #0" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm4.static.flickr.com/3261/2538183196_8baf9a8015_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #0</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" name="drop" href="http://farm3.static.flickr.com/2404/2538171134_2f77bc00d9.jpg" title="Title #1">
								<img src="http://farm3.static.flickr.com/2404/2538171134_2f77bc00d9_s.jpg" alt="Title #1" />
							</a>
							<div class="caption">
								Any html can be placed here ...
							</div>
						</li>

						<li>
							<a class="thumb" name="bigleaf" href="http://farm3.static.flickr.com/2093/2538168854_f75e408156.jpg" title="Title #2">
								<img src="http://farm3.static.flickr.com/2093/2538168854_f75e408156_s.jpg" alt="Title #2" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm3.static.flickr.com/2093/2538168854_f75e408156_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #2</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" name="lizard" href="http://farm4.static.flickr.com/3153/2538167690_c812461b7b.jpg" title="Title #3">
								<img src="http://farm4.static.flickr.com/3153/2538167690_c812461b7b_s.jpg" alt="Title #3" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm4.static.flickr.com/3153/2538167690_c812461b7b_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #3</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm4.static.flickr.com/3150/2538167224_0a6075dd18.jpg" title="Title #4">
								<img src="http://farm4.static.flickr.com/3150/2538167224_0a6075dd18_s.jpg" alt="Title #4" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm4.static.flickr.com/3150/2538167224_0a6075dd18_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #4</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm4.static.flickr.com/3204/2537348699_bfd38bd9fd.jpg" title="Title #5">
								<img src="http://farm4.static.flickr.com/3204/2537348699_bfd38bd9fd_s.jpg" alt="Title #5" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm4.static.flickr.com/3204/2537348699_bfd38bd9fd_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #5</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm4.static.flickr.com/3124/2538164582_b9d18f9d1b.jpg" title="Title #6">
								<img src="http://farm4.static.flickr.com/3124/2538164582_b9d18f9d1b_s.jpg" alt="Title #6" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm4.static.flickr.com/3124/2538164582_b9d18f9d1b_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #6</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm4.static.flickr.com/3205/2538164270_4369bbdd23.jpg" title="Title #7">
								<img src="http://farm4.static.flickr.com/3205/2538164270_4369bbdd23_s.jpg" alt="Title #7" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm4.static.flickr.com/3205/2538164270_c7d1646ecf_o.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #7</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm4.static.flickr.com/3211/2538163540_c2026243d2.jpg" title="Title #8">
								<img src="http://farm4.static.flickr.com/3211/2538163540_c2026243d2_s.jpg" alt="Title #8" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm4.static.flickr.com/3211/2538163540_c2026243d2_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #8</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm3.static.flickr.com/2315/2537343449_f933be8036.jpg" title="Title #9">
								<img src="http://farm3.static.flickr.com/2315/2537343449_f933be8036_s.jpg" alt="Title #9" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm3.static.flickr.com/2315/2537343449_f933be8036_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #9</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm3.static.flickr.com/2167/2082738157_436d1eb280.jpg" title="Title #10">
								<img src="http://farm3.static.flickr.com/2167/2082738157_436d1eb280_s.jpg" alt="Title #10" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm3.static.flickr.com/2167/2082738157_436d1eb280_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #10</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm3.static.flickr.com/2342/2083508720_fa906f685e.jpg" title="Title #11">
								<img src="http://farm3.static.flickr.com/2342/2083508720_fa906f685e_s.jpg" alt="Title #11" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm3.static.flickr.com/2342/2083508720_fa906f685e_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #11</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm3.static.flickr.com/2132/2082721339_4b06f6abba.jpg" title="Title #12">
								<img src="http://farm3.static.flickr.com/2132/2082721339_4b06f6abba_s.jpg" alt="Title #12" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm3.static.flickr.com/2132/2082721339_4b06f6abba_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #12</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm3.static.flickr.com/2139/2083503622_5b17f16a60.jpg" title="Title #13">
								<img src="http://farm3.static.flickr.com/2139/2083503622_5b17f16a60_s.jpg" alt="Title #13" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm3.static.flickr.com/2139/2083503622_5b17f16a60_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #13</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm3.static.flickr.com/2041/2083498578_114e117aab.jpg" title="Title #14">
								<img src="http://farm3.static.flickr.com/2041/2083498578_114e117aab_s.jpg" alt="Title #14" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm3.static.flickr.com/2041/2083498578_114e117aab_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #14</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm3.static.flickr.com/2149/2082705341_afcdda0663.jpg" title="Title #15">
								<img src="http://farm3.static.flickr.com/2149/2082705341_afcdda0663_s.jpg" alt="Title #15" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm3.static.flickr.com/2149/2082705341_afcdda0663_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #15</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm3.static.flickr.com/2014/2083478274_26775114dc.jpg" title="Title #16">
								<img src="http://farm3.static.flickr.com/2014/2083478274_26775114dc_s.jpg" alt="Title #16" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm3.static.flickr.com/2014/2083478274_26775114dc_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #16</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm3.static.flickr.com/2194/2083464534_122e849241.jpg" title="Title #17">
								<img src="http://farm3.static.flickr.com/2194/2083464534_122e849241_s.jpg" alt="Title #17" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm3.static.flickr.com/2194/2083464534_122e849241_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #17</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm4.static.flickr.com/3127/2538173236_b704e7622e.jpg" title="Title #18">
								<img src="http://farm4.static.flickr.com/3127/2538173236_b704e7622e_s.jpg" alt="Title #18" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm4.static.flickr.com/3127/2538173236_b704e7622e_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #18</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm3.static.flickr.com/2375/2538172432_3343a47341.jpg" title="Title #19">
								<img src="http://farm3.static.flickr.com/2375/2538172432_3343a47341_s.jpg" alt="Title #19" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm3.static.flickr.com/2375/2538172432_3343a47341_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #19</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm3.static.flickr.com/2353/2083476642_d00372b96f.jpg" title="Title #20">
								<img src="http://farm3.static.flickr.com/2353/2083476642_d00372b96f_s.jpg" alt="Title #20" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm3.static.flickr.com/2353/2083476642_d00372b96f_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #20</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm3.static.flickr.com/2201/1502907190_7b4a2a0e34.jpg" title="Title #21">
								<img src="http://farm3.static.flickr.com/2201/1502907190_7b4a2a0e34_s.jpg" alt="Title #21" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm3.static.flickr.com/2201/1502907190_7b4a2a0e34_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #21</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm2.static.flickr.com/1116/1380178473_fc640e097a.jpg" title="Title #22">
								<img src="http://farm2.static.flickr.com/1116/1380178473_fc640e097a_s.jpg" alt="Title #22" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm2.static.flickr.com/1116/1380178473_fc640e097a_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #22</div>
								<div class="image-desc">Description</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="http://farm2.static.flickr.com/1260/930424599_e75865c0d6.jpg" title="Title #23">
								<img src="http://farm2.static.flickr.com/1260/930424599_e75865c0d6_s.jpg" alt="Title #23" />
							</a>
							<div class="caption">
								<div class="download">
									<a href="http://farm2.static.flickr.com/1260/930424599_e75865c0d6_b.jpg">Download Original</a>
								</div>
								<div class="image-title">Title #23</div>
								<div class="image-desc">Description</div>
							</div>
						</li>
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
