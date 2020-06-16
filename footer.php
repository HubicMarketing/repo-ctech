<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */


?>

<?php if(is_woocommerce() || is_cart() || is_checkout() ) {
	include( get_stylesheet_directory() . '/include/form.php');
	include( get_stylesheet_directory() . '/woocommerce/woo-menu-widgets.php');
} ?>

			<footer id="site-footer" role="contentinfo" class="header-footer-group">

				<div class="section-inner">

					<div class="footer-credits">

						<p class="footer-copyright">&copy;
							<?php
							echo date_i18n(
								/* translators: Copyright date format, see https://secure.php.net/date */
								_x( 'Y', 'copyright date format', 'twentytwenty' )
							);
							?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo bloginfo( 'name' ); ?></a>
						</p><!-- .footer-copyright -->

						<p class="powered-by-wordpress">
							<a title="Visita il sito dell'agenzia Hubic Marketing" target="_blank" href="<?php echo esc_url( __( 'https://hubicmarketing.it/', 'twentytwenty' ) ); ?>">
								<?php _e( 'Sito progettato e realizzato da Hubic Marketing', 'twentytwenty' ); ?>
							</a>
							<?php if(!my_wp_is_mobile()) { ?>/<?php } ?> <a title="Visita la mappa del sito <?php bloginfo('name') ?>" href="<?php bloginfo('wpurl') ?>/mappa-del-sito/" class="sitemap">Mappa del sito</a>
						</p><!-- .powered-by-wordpress -->

					</div><!-- .footer-credits -->

					<a class="to-the-top" href="#site-content">
						<span class="to-the-top-long">
							<?php
							/* translators: %s: HTML character for up arrow */
							printf( __( 'To the top %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
							?>
						</span><!-- .to-the-top-long -->
						<span class="to-the-top-short">
							<?php
							/* translators: %s: HTML character for up arrow */
							printf( __( 'Up %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
							?>
						</span><!-- .to-the-top-short -->
					</a><!-- .to-the-top -->

				</div><!-- .section-inner -->

			</footer><!-- #site-footer -->

		<?php wp_footer(); ?>
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	     <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	     <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
			 <script>
	     new WOW().init();
	     </script>

	 		<?php if(my_wp_is_mobile() || my_wp_is_tablet()) { ?>
	 			<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/tablet_mobile_device.js" defer></script>
	 		<?php } ?>
	</body>
</html>
