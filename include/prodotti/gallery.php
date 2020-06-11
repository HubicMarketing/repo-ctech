<?php $gallery = 'gallery';
if( have_rows($gallery) ): ?>
<div class="galleria_prodotti">
<div class="row">
<?php  while( have_rows($gallery) ): the_row();
$immagine_id = get_sub_field('immagine');
$immagine_src = wp_get_attachment_image_src( $immagine_id, 'full' );
$immagine_alt = get_post_meta( $immagine_id, '_wp_attachment_image_alt', true); ?>
<div class="col-lg-4 col-md-4 col-sm-4 col-12">
  <div class="img_wrapper">
    <img class="trans translated" alt="<?php echo $immagine_alt; ?>" src="<?php echo $immagine_src[0]; ?>" />
  </div><!--img_wrapper-->
  </div>
<?php endwhile; ?>
</div><!--row-->
</div><!--galleria_prodotti-->
<?php endif; ?>
