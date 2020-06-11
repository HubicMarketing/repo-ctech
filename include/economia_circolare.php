<?php $economia_circolare = 'economia_circolare';
if( have_rows($economia_circolare) ): ?>
<section id="economia_circolare" class="animated wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
  <!-- <div class="container"> -->
    <?php $count = 0; $delay_count = 1; while( have_rows($economia_circolare) ): the_row(); $count++;
    $delay_count++; $double_delay_count = $delay_count * 1000;
    $descrizione = get_sub_field('descrizione');
    $immagine_id = get_sub_field('immagine');
    $immagine_src = wp_get_attachment_image_src( $immagine_id, 'full' );
    $immagine_alt = get_post_meta( $immagine_id, '_wp_attachment_image_alt', true); ?>
  <div class="row">
  <?php if( $count % 2 !== 0 ) { ?>
    <div class="col-lg-6 col-12 animated wow fadeInLeft" data-wow-duration="0.<?php echo $double_delay_count; ?>s" data-wow-delay="0.<?php echo $double_delay_count; ?>s">
      <div class="translated">
        <?php echo $descrizione; ?>
      </div><!--translated-->
    </div>
    <div class="col-lg-6 col-12 animated wow fadeInRight" data-wow-duration="0.<?php echo $double_delay_count; ?>s" data-wow-delay="0.<?php echo $double_delay_count; ?>s">
    <div class="img_wrapper">
      <img class="translated" alt="<?php echo $immagine_alt; ?>" src="<?php echo $immagine_src[0]; ?>" />
    </div><!--img_wrapper-->
    </div>
  <?php } else { ?>
    <div class="col-lg-6 col-12 animated wow fadeInLeft" data-wow-duration="0.<?php echo $double_delay_count; ?>s" data-wow-delay="0.<?php echo $double_delay_count; ?>s">
    <div class="img_wrapper">
      <img class="translated" alt="<?php echo $immagine_alt; ?>" src="<?php echo $immagine_src[0]; ?>" />
    </div><!--img_wrapper-->
    </div>
    <div class="col-lg-6 col-12 animated wow fadeInRight" data-wow-duration="0.<?php echo $double_delay_count; ?>s" data-wow-delay="0.<?php echo $double_delay_count; ?>s">
      <div class="translated">
        <?php echo $descrizione; ?>
      </div><!--translated-->
    </div>
  <?php } ?>
  </div><!--row-->
  <?php endwhile; ?>
  <!-- </div> -->
  <!--container-->
  </section>
  <?php endif; ?>
