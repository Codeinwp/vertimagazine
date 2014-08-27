<?php
/**
 * The Header for our theme.
 *
 *
 * @package vertiMagazine theme
 */
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
						<?php
							$facebook = cwp('facebook');
							$twitter = cwp('twitter');
							$youtube = cwp('youtube');
							if((isset($facebook) && $facebook != '') || (isset($twitter) && $twitter != '') || (isset($youtube) && $youtube != '')):
								echo '<div id="socialmedia">';
									echo '<ul class="nav2 pull-right">';
										if(isset($facebook) && $facebook != ''):
											echo '<li> <a href="'.$facebook.'" target="_blank"><img src="'.get_template_directory_uri().'/images/facebook.png" alt="facebook"></a> </li>';
										endif;
										if(isset($twitter) && $twitter != ''):
											echo '<li> <a style="display: block; margin-top: 1px;" href="'.$twitter.'" target="_blank"><img src="'.get_template_directory_uri().'/images/twitter.png" alt="twitter"></a> </li>';
										endif;
										if(isset($youtube) && $youtube != ''):
											echo '<li> <a href="'.$youtube.'" target="_blank"><img src="'.get_template_directory_uri().'/images/youtube.png" alt="youtube"></a> </li>';
										endif;
									echo '</ul>';
								echo '</div>';	
							endif;
						?>
					</div>
				</div>
			</div>
	</div> 

	<span class="clear"></span>
	<header>
		<?php 
			$logo_sus = cwp('logo_sus');
			if(isset($logo_sus) && $logo_sus != ""):
				?>
				<div id="logo">
					<a href="<?php echo esc_html(home_url()); ?>">
						<img src="<?php echo $logo_sus; ?>" alt="<?php bloginfo('description'); ?>"/>
					</a>
				</div>	
				<?php
			else:
				echo '<div class="no-logo">';
				echo '<h1 class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'name' ).'</a></h1>';

				echo '<h2 class="site-description"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'description' ).'</a></h2>';
				echo '</div>';
			endif;
		?>
		<!--/responsive social media-->
			<?php
				$facebook = cwp('facebook');
				$twitter = cwp('twitter');
				$youtube = cwp('youtube');
				
				if((isset($facebook) && $facebook != '') || (isset($twitter) && $twitter != '') || (isset($youtube) && $youtube != '')):
					echo '<div id="respon_socialmedia">';
				
					if(isset($facebook) && $facebook != ''):
						echo '<a href="'.$facebook.'"  target="_blank"><img src="'.get_template_directory_uri().'/images/r_facebook.png" alt="facebook"></a>';
					endif;
					if(isset($twitter) && $twitter != ''):
						echo '<a href="'.$twitter.'"  target="_blank"><img src="'.get_template_directory_uri().'/images/r_twitter.png" alt="twitter"></a>';
					endif;
					if(isset($youtube) && $youtube != ''):
						echo '<a href="'.$youtube.'"  target="_blank"><img src="'.get_template_directory_uri().'/images/r_youtube.png" alt="youtube"></a>';
					endif;
				
					echo '</div>';
				endif;
			?>	
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