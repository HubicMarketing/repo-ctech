<?php $punti_di_forza = 'punti_di_forza';
if( have_rows($punti_di_forza) ): ?>
<section id="punti_di_forza">
  <div class="container">
    <hgroup>
    <h2>Perchè scegliere noi</h2>
    </hgroup>
  <div class="row justify-content-center">
<?php $count = 0; $delay_count = 1; while( have_rows($punti_di_forza) ): the_row(); $count++;
$delay_count++; $double_delay_count = $delay_count * 2000;
$immagine_id = get_sub_field('immagine');
$immagine_src = wp_get_attachment_image_src( $immagine_id, 'full' );
$immagine_alt = get_post_meta( $immagine_id, '_wp_attachment_image_alt', true); ?>
<div class="col-lg-3 col-md-3 col-sm-3 col-6 animated wow fadeInUp" data-wow-duration="0.<?php echo $count ?>s" data-wow-delay="0.<?php echo $double_delay_count ?>s">
  <figure>
    <img class="img-fluid" alt="<?php echo $immagine_alt; ?>" src="<?php echo $immagine_src[0]; ?>" />
    <figcaption>
      <h3><?php echo $immagine_alt; ?></h3>
    </figcaption>
  </figure>
</div><!--col-lg-6 col-md-6 col-sm-6 col-12-->
<?php endwhile; ?>
</div><!--row-->
</div><!--container-->
</section>
<?php endif; ?>
