<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$rent_price = get_field('prezzo_di_noleggio');
?>
	<?php if($product->get_price_html()) { ?>
		<h5>Prezzo di vendita </h5>
		<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) );?>">
	<?php echo $product->get_price_html(); ?></p><?php } ?>

		<?php $noleggio = 'noleggio';
		if( have_rows($noleggio) ): ?>
		<div class="rent_price">
		<h5>Prezzo di noleggio</h5>
		<?php while( have_rows($noleggio) ): the_row();
		$durata = get_sub_field('durata'); ?>
			<p class="rent"><?php echo $durata; ?></p>
			<p class="oppure">oppure</p>
		<?php endwhile; ?></div><?php endif; ?>
