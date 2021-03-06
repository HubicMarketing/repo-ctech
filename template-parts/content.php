<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<article <?php post_class('trans'); ?> id="post-<?php the_ID(); ?>">

	<?php

	get_template_part( 'template-parts/entry-header' );

	// if ( ! is_search() ) {
	// 	get_template_part( 'template-parts/featured-image' );
	// }

	?>

	<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

		<div class="entry-content">
			
			<?php if ( is_search()) { 				
				global $product;
				if($product) {
					$product_name = $product->get_name();
					$product_img = $product->get_image();
					$product_link = get_permalink( $product->get_id() ); ?>
					<figure>
					<a title="Vai a <?php echo $product_name; ?>" href="<?php echo $product_link; ?>"><?php echo $product_img; ?></a>
						<figcaption>
							<a class="button" title="Vai a <?php echo $product_name; ?>" href="<?php echo $product_link; ?>">Vedi prodotto</a>
						</figcaption>
					</figure>
				<?php } 
			} ?>

			<?php
			if ( ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				if(is_page('contatti')){
					$sedi = 'sedi';
					if( have_rows($sedi) ): ?>
					<div class="row lista_sedi">
					<?php while( have_rows($sedi) ): the_row();
					$tipologia_sede = get_sub_field('tipologia_sede');
					$indirizzo_sede = get_sub_field('indirizzo_sede');
					$immagine_id = get_sub_field('icona');
					$immagine_src = wp_get_attachment_image_src( $immagine_id, 'full' );
					$immagine_alt = get_post_meta( $immagine_id, '_wp_attachment_image_alt', true); ?>
					<div class="col-lg-6 col-md-8 col-12">
						<figure>
							<h5><?php echo $tipologia_sede; ?></h5>
							<img class="img-fluid" alt="<?php echo $immagine_alt; ?>" src="<?php echo $immagine_src[0]; ?>" />
							<div>
								<?php echo $indirizzo_sede; ?>
							</div>
						</figure>
					</div>
					<?php endwhile; ?>
					</div><!--row-->
				<?php endif;
				}
				the_content( __( 'Continue reading', 'twentytwenty' ) );
			}
			?>

		</div><!-- .entry-content -->

		<?php if(is_page('soluzioni-di-noleggio-e-vendita')) { include( get_stylesheet_directory() . '/include/home/sezioni.php'); } ?>

	</div><!-- .post-inner -->

	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		edit_post_link();

		// Single bottom post meta.
		twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );

		if ( is_single() ) {

			get_template_part( 'template-parts/entry-author-bio' );

		}
		?>

	</div><!-- .section-inner -->

	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}

	/**
	 *  Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 * */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

		<div class="comments-wrapper section-inner">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	}
	?>

</article><!-- .post -->
