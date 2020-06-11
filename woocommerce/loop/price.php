<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$product_id = $product->get_id();
$product_url = get_permalink( $product_id );
?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
	<span class="price">in vendita a <?php echo $price_html; ?> !</span>
<?php endif; ?>

<?php $noleggio = 'noleggio';
if( have_rows($noleggio) ): ?>
<span class="oppure">oppure in noleggio a</span>
<?php while( have_rows($noleggio) ): the_row();
$durata = get_sub_field('durata'); ?>
	<span class="rent"><?php echo $durata; ?></span>
<?php endwhile; ?>
<?php endif; ?>
<a class="button" href="<?php echo $product_url ?>">Vedi prodotto</a>
