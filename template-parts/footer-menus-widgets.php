<?php
/**
 * Displays the menus and widgets at the end of the main element.
 * Visually, this output is presented as part of the footer element.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

$has_footer_menu = has_nav_menu( 'footer' );
$has_social_menu = has_nav_menu( 'social' );

$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
$has_sidebar_2 = is_active_sidebar( 'sidebar-2' );

if(is_page('azienda')) { 
	if (!my_wp_is_mobile()) {
		include( get_stylesheet_directory() . '/include/economia_circolare.php'); 
	}
}
	include( get_stylesheet_directory() . '/include/home/punti_di_forza.php');
if(!is_page(array('contatti','assistenza')) && !is_product()) { include( get_stylesheet_directory() . '/include/form.php'); }
if(is_page('assistenza')) { include( get_stylesheet_directory() . '/include/form_assistenza.php'); }

//if(is_product()) { include( get_stylesheet_directory() . '/include/form_prodotto.php'); }

// Only output the container if there are elements to display.
if ( $has_footer_menu || $has_social_menu || $has_sidebar_1 || $has_sidebar_2 ) {
	?>




	<div class="footer-nav-widgets-wrapper header-footer-group">

		<div class="footer-inner section-inner">

			<?php

			$footer_top_classes = '';

			$footer_top_classes .= $has_footer_menu ? ' has-footer-menu' : '';
			$footer_top_classes .= $has_social_menu ? ' has-social-menu' : '';

			if ( $has_footer_menu || $has_social_menu ) {
				?>
				<div class="footer-top<?php echo $footer_top_classes; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>">
					<?php if ( $has_footer_menu ) { ?>

						<nav aria-label="<?php esc_attr_e( 'Footer', 'twentytwenty' ); ?>" role="navigation" class="footer-menu-wrapper">

							<ul class="footer-menu reset-list-style">
								<?php
								wp_nav_menu(
									array(
										'container'      => '',
										'depth'          => 1,
										'items_wrap'     => '%3$s',
										'theme_location' => 'footer',
									)
								);
								?>
							</ul>

						</nav><!-- .site-nav -->

					<?php } ?>
					<?php if ( $has_social_menu ) { ?>

						<nav aria-label="<?php esc_attr_e( 'Social links', 'twentytwenty' ); ?>" class="footer-social-wrapper">

							<ul class="social-menu footer-social reset-list-style social-icons fill-children-current-color">

								<?php
								wp_nav_menu(
									array(
										'theme_location'  => 'social',
										'container'       => '',
										'container_class' => '',
										'items_wrap'      => '%3$s',
										'menu_id'         => '',
										'menu_class'      => '',
										'depth'           => 1,
										'link_before'     => '<span class="screen-reader-text">',
										'link_after'      => '</span>',
										'fallback_cb'     => '',
									)
								);
								?>

							</ul><!-- .footer-social -->

						</nav><!-- .footer-social-wrapper -->

					<?php } ?>
				</div><!-- .footer-top -->

			<?php } ?>

			<?php if ( $has_sidebar_1 || $has_sidebar_2 ) { ?>

				<aside class="footer-widgets-outer-wrapper" role="complementary">

					<div class="container">
						<div class="row">
						<?php if ( $has_sidebar_1 ) { ?>
							<div class="col-lg-3 col-md-3 col-sm-3 col-6 widget-content">
								<?php dynamic_sidebar( 'sidebar-1' ); ?>
								</div>
						<?php } ?>

						<?php if ( $has_sidebar_2 ) { ?>
							<div class="col-lg-3 col-md-3 col-sm-3 col-6 widget-content">
								<?php dynamic_sidebar( 'sidebar-2' ); ?>
							</div>
						<?php } ?>

						<?php if ( is_active_sidebar( 'third-sidebar' ) ) : ?>
					    <?php dynamic_sidebar( 'third-sidebar' ); ?>
						<?php endif; ?>

					<?php if ( is_active_sidebar( 'fourth-sidebar' ) ) : ?>
						<?php dynamic_sidebar( 'fourth-sidebar' ); ?>
					<?php endif; ?>


					</div><!--row-->
				</div><!-- .container -->

				</aside><!-- .footer-widgets-outer-wrapper -->

			<?php } ?>

		</div><!-- .footer-inner -->

	</div><!-- .footer-nav-widgets-wrapper -->

<?php } ?>
