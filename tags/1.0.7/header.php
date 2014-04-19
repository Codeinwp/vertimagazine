<?php
/**
 * The Header for our theme.
 *
 *
 * @package vertiMagazine theme
 */
 global $vertimagazine_options;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>

<?php wp_title(); ?>

</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<div id="fb-root"></div>
	<!-- top menu -->
  <div id="topnav">
	<nav>
    
	
	</nav>
			 <div class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-th-list"></span>
						</a>
						
						<div class="nav-collapse collapse">
							<ul class="nav">
								<?php $menuParameters = array(
									'container'	   => false,
									'echo'			=> false,
									'items_wrap'	  => '%3$s',
									'depth'		   => 2,
									'theme_location'=>'top_menu',);

									if ( has_nav_menu('top_menu') ) { echo wp_nav_menu( $menuParameters ); } ?>  
								
							</ul>
								   
						</div>
						<div id="socialmedia">
							<ul class="nav2 pull-right">
								<li> <a href="<?php $fb = $vertimagazine_options["facebook"]; echo esc_attr($fb); ?>" target="_blank"><img src="<?php $path = get_template_directory_uri(); echo $path; ?>/images/facebook.png" alt="facebook"></a> </li>
								<li> <a style="display: block; margin-top: 1px;" href="<?php $tw = $vertimagazine_options["twitter"]; echo esc_attr($tw); ?>" target="_blank"><img src="<?php $path = get_template_directory_uri(); echo $path; ?>/images/twitter.png" alt="twitter"></a> </li>
								<li> <a href="<?php $yt = $vertimagazine_options["youtube"]; echo esc_attr($yt); ?>" target="_blank"><img src="<?php $path = get_template_directory_uri(); echo $path; ?>/images/youtube.png" alt="youtube"></a> </li>
							</ul>
							</div>
					</div>
				</div>
			</div>
	</div> 

	<span class="clear"></span>
	<header>
		<div id="logo">
			<a href="<?php echo esc_html(home_url()); ?>">
            <?php // $password = (isset($_POST['password']) ? $_POST['password'] : ''); ?>
            
				<img src="<?php
                    $default_logo = get_template_directory_uri() . "/img/logo-default.png";
                    $tl = (($vertimagazine_options["logo_sus"] != '') ? $vertimagazine_options["logo_sus"] : $default_logo ); 
                    echo $tl; 
                ?>" alt="<?php bloginfo('description'); ?>"/>
			</a>
		</div><!--/logo-->
		<!--/responsive social media-->
			<div id="respon_socialmedia">
				<a href="<?php $fb = $vertimagazine_options["facebook"]; echo esc_attr($fb); ?>"  target="_blank"><img src="<?php $path = get_template_directory_uri(); echo $path; ?>/images/r_facebook.png" alt="facebook"></a>
				<a href="<?php $tw = $vertimagazine_options["twitter"]; echo esc_attr($tw); ?>"  target="_blank"><img src="<?php $path = get_template_directory_uri(); echo $path; ?>/images/r_twitter.png" alt="twitter"></a>
				<a href="<?php $yt = $vertimagazine_options["youtube"]; echo esc_attr($yt); ?>"  target="_blank"><img src="<?php $path = get_template_directory_uri(); echo $path; ?>/images/r_youtube.png" alt="youtube"></a>
			</div><!--/socialmedia-->
		<!--/responsive social media-->
		<div id="search">
			<form method="get" id="searchform" action="<?php echo esc_html(home_url()); ?>/">
				<input class="search" type="text" value="type the keyword here" name="s" id="s" onfocus="this.value=''" />
				<input class="searchbutton" type="submit" id="searchsubmit" value="search" />
			</form>
		</div><!--/search-->
	</header>
	<div id="headernav">
		<?php 
				$menuParameters = array(
				  'container'	   => false,
				  'echo'			=> false,
				  'items_wrap'	  => '%3$s',
				  'depth'		   => 1,
				  'theme_location'=>'header_menu',
				);
				if ( has_nav_menu('header_menu') ) {
					echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' ); 
				}
			?>
	</div><!--/headernav-->