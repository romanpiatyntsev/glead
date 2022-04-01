<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package start
 */

?>
	</main>
	<footer id="footer" class="site-footer">
		<div class="container">
			<div class="row justify-content-center socials">

					<?php if( $fb = get_field( 'facebook', 'option' ) ) : ?>
						<div class="col-4">
							<a href="<?php echo esc_url( $fb ); ?>" class="social social-facebook">Facebook</a>
						</div>
					<?php endif; ?>

					<?php if( $ln = get_field( 'linkedin', 'option' ) ) : ?>
						<div class="col-4">
							<a href="<?php echo esc_url( $ln ); ?>" class="social social-linkedin">Linkedin</a>
						</div>
					<?php endif; ?>
				
			</div>
			<hr>
			<div class="row text-center text-md-left bottom-footer">
				<div class="col-12 col-sm-4 12 col-lg">
					<?php
					if ( is_active_sidebar( 'footer-address-1' ) ) {
						dynamic_sidebar( 'footer-address-1' );
					}
					?>
				</div>
				<div class="col-12 col-sm-4 col-lg">
					<?php
					if ( is_active_sidebar( 'footer-address-2' ) ) {
						dynamic_sidebar( 'footer-address-2' );
					}
					?>
				</div>
				<div class="col-12 col-sm-4 col-lg">
					<?php
					if ( is_active_sidebar( 'footer-address-3' ) ) {
						dynamic_sidebar( 'footer-address-3' );
					}
					?>
				</div>

				<div class="col-12 col-sm-4 col-lg offset-md-0 offset-lg-2">
					<h3 class="menu-title">
						<?php echo wp_get_nav_menu_name('footer-menu-1'); ?>
					</h3>	
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-menu-1',
							'menu_id'        => 'footer-menu-1',
						)
					);
					?>
				</div>
				<div class="col-12 col-sm-4 col-lg">
					<h3 class="menu-title">
						<?php echo wp_get_nav_menu_name('footer-menu-2'); ?>
					</h3>	
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-menu-2',
							'menu_id'        => 'footer-menu-2',
						)
					);
					?>
				</div>
				<div class="col-12 col-sm-4 col-lg">
					<h3 class="menu-title">
						<?php echo wp_get_nav_menu_name('footer-menu-3'); ?>
					</h3>	
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-menu-3',
							'menu_id'        => 'footer-menu-3',
						)
					);
					?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
