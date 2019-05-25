<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

	<link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/img/banner.jpg" rel="apple-touch-icon-precomposed">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php wp_head(); ?>
	<script>
    // conditionizr.com
    // configure environment tests
    conditionizr.config({
        assets: '<?php echo get_template_directory_uri(); ?>',
        tests: {}
    });
    </script>

</head>
<body <?php body_class(); ?>>

<!-- wrapper -->
<div class="wrapper">

<!-- header -->
<header class="header clear" role="banner">

	<!-- nav -->
	<div id="navbar" class="navbar">
		<div class="navlogo">
		<a href="<?php echo home_url(); ?>">
			<img src="<?php echo get_template_directory_uri(); ?>/img/89oddil_horizontalni_logo.svg" alt="Logo" class="logo-img" style="margin:0 auto;">
		</a>
		</div>

			<?php wp_nav_menu(array(
				'theme_location'  => 'header-menu',
				'container_id'    => 'navigation',
				'menu_class'      => 'navmenu',
				'menu_id'         => 'navmenu',
				'fallback_cb'     => 'wp_page_menu'
				));?>
			<a href="javascript:void(0);" class="navmenu icon" onclick="roll_out()">
				<i class="fa fa-bars"></i>
			</a>
			<script>
				function roll_out(){
					$("#navmenu").toggle();
					document.getElementById("navmenu").classList.toggle('navmenu_responsive');
					if($("#navmenu:hidden"))
						$("ul.navmenu_responsive li").style.display = 'list-item';
					else
						document.getElementById("navmenu").style.display = 'none';
				}
			</script>

	</div>

	<script>
		var prev_offset = 100000;

		respond_to_wrap();

		$(window).resize(function() {
			prev_offset = 100000;
			respond_to_wrap();
		});

		function respond_to_wrap(){
			$('ul.navmenu li').each(function(i, elem) {
				var offset = $(elem).offset().top + $('ul.navmenu').offset().top;

				if(offset > prev_offset) {
					console.log("wrapping!");
					document.getElementById("navbar").classList.add('navbar_responsive');
					$("#navmenu").hide();

					prev_offset = offset;
					return false;
				} else {
					console.log("not wrapping!");
					document.getElementById("navbar").classList.remove('navbar_responsive');
					$("#navmenu").show();
					if (offset > 0)
						prev_offset = offset;
					else
						prev_offset = 10000;
				}
			});
		}

	</script>
	<!-- /nav -->

	<!-- banner slideshow -->
	<div class="banner">
		<a href="<?php echo home_url(); ?>">
			<img src="<?php echo get_template_directory_uri(); ?>/img/banner1.jpg" class="slideshow" style="width:100%">
			<img src="<?php echo get_template_directory_uri(); ?>/img/banner2.jpg" class="slideshow" style="width:100%">
		</a>
	</div>

	<script>
	document.write("ahoj2");
	var myIndex = 0;
	carousel();

	function carousel() {
	  var i;
	  var x = document.getElementsByClassName("slideshow");
	  for (i = 0; i < x.length; i++) {
	    x[i].style.display = "none";  
	  }
	  myIndex++;
	  if (myIndex > x.length) {myIndex = 1}    
	  x[myIndex-1].style.display = "block";  
	  setTimeout(carousel, 4000); // Change image every 2 seconds
	}
	</script>
	<!-- /banner slideshow -->

</header>
<!-- /header -->
