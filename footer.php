<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package vertiMagazine theme
 */
 global $vertimagazine_options;
?>

<footer>
		<div id="footer_center">
			<div class="footer_item">
				<div class="footer_logo">
                    <img src="<?php $default_logo = get_template_directory_uri() . "/img/logo-default.png";
                    $tl = (($vertimagazine_options["logo_jos"] != '') ? $vertimagazine_options["logo_jos"] : $default_logo ); 
                    echo esc_attr($tl); ?>" alt="<?php bloginfo('description'); ?>"/>
                </div>
				<div class="footer_contact">
					<div class="call"><span>Call us</span><br /><?php $n = ($vertimagazine_options["phone"] != '' ? $vertimagazine_options["phone"] : "+1 234 567 890" ); echo esc_attr($n); ?></div>
					<div class="email"><span>Email us</span><br /><?php $e = ($vertimagazine_options["email"]!= '' ? $vertimagazine_options["email"] : "supportatcodeinwp.com" ); echo esc_attr($e); ?></div>
				</div><!--/footer_contact-->
				<div class="copyright">
                	<?php  $cr = $vertimagazine_options["copyright"]; echo esc_attr($cr);  _e("Powered by <a href='http://wordpress.org'>WordPress</a>, designed by <a rel='nofollow' href='http://themes.codeinwp.com/themes/vertimagazine/'>CodeinWP</a>.","VertiMagazine theme");  ?>
				</div>
			</div><!--/footer_item-->
            <div class="footer_item">
			<?php if ( is_active_sidebar( 'Footer One' ) ) : ?>
			<?php dynamic_sidebar( 'Footer One' ); ?>
	<?php endif; ?>
            </div>
            <div class="footer_item">
						<?php if ( is_active_sidebar( 'Footer Two' ) ) : ?>
			<?php dynamic_sidebar( 'Footer Two' ); ?>
	<?php endif; ?>
            </div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>