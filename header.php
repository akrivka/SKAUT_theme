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
			<!-- <img src="<?php echo get_template_directory_uri(); ?>/img/89oddil_horizontalni_logo.png" alt="Logo" class="logo-img""> -->
			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('logo')) ?>
		</a>
		</div>
		<a href="javascript:void(0);" class="navmenu icon" onclick="roll_out()">
			<i class="fa fa-bars"></i>
		</a>
		<?php wp_nav_menu(array(
			'theme_location'  => 'header-menu',
			'container_id'    => 'navigation',
			'menu_class'      => 'navmenu',
			'menu_id'         => 'navmenu',
			'fallback_cb'     => 'wp_page_menu'
			));?>

	</div>
	<script>
		var prev_offset = 100000;
		var hidden = true;
		var responsive = false;

		respond_to_wrap();

		$(window).resize(function() {
			// protoze se prvni offset rovna 100000, odeberem to prvne vsemu responsive classy a pak zkusi, jestli by se to wrapovalo
			respond_to_wrap();
		});

		function roll_out(){
			hidden = !hidden;
			document.getElementById("navmenu").classList.toggle('navmenu_hidden');
		}

		function respond_to_wrap(){
			/* pri kazdem resizu okna to projede vsechny elementy navmenu,
			a jestli ma nejakej vetsi offset od vrchu nez ten predchozi
			(tedy wrapuje se to), tak to zapne alternativni menu */
			$('ul.navmenu li').each(function(i, elem) {
				var offset = $(elem).offset().top + $('ul.navmenu').offset().top;

				if(offset > prev_offset) {
					console.log("wrapping!");
					document.getElementById("navbar").classList.add('navbar_responsive');
					document.getElementById("navmenu").classList.add('navmenu_responsive');

					responsive = true;

					return false; // skoncit
				} else {
					console.log("not wrapping!");
					document.getElementById("navbar").classList.remove('navbar_responsive');
					document.getElementById("navmenu").classList.remove('navmenu_responsive');
					document.getElementById("navmenu").classList.remove('navmenu_hidden');

					responsive = false;

					if (offset > 0)
						prev_offset = offset;
					else
						prev_offset = 10000;
				}
			});
			if (responsive) {
				if (hidden)
					document.getElementById("navmenu").classList.add('navmenu_hidden');
				else
					document.getElementById("navmenu").classList.remove('navmenu_hidden');
			}
		}
	</script>
	<!-- /nav -->

	<!-- banner slideshow -->
	<div>
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('slideshow')) ?>
	</div>

	<script>
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
