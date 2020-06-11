<?php $vantaggi = 'vantaggi';
if( have_rows($vantaggi) ): ?>
<div class="vantaggi_prodotti">
<div class="row justify-content-center">
<?php  while( have_rows($vantaggi) ): the_row();
$immagine_id = get_sub_field('icona');
$immagine_src = wp_get_attachment_image_src( $immagine_id, 'full' );
$immagine_alt = get_post_meta( $immagine_id, '_wp_attachment_image_alt', true);
$descrizione = get_sub_field('descrizione'); ?>
<div class="col-lg-4 col-12">
  <figure>
    <img class="img-fluid" alt="<?php echo $immagine_alt; ?>" src="<?php echo $immagine_src[0]; ?>" />
  <figcaption>
    <?php echo $descrizione; ?>
  </figcaption>
  </figure>
  </div>
<?php endwhile; ?>
</div><!--row-->
</div><!--galleria_prodotti-->
<?php endif; ?>
