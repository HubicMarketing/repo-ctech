<section id="soluzioni">
  <?php if(is_front_page()) { ?>
  <div class="heading_wrapper">
    <h2>Scopri le nostre soluzioni di noleggio e vendita</h2>
    <a href="#form" class="cta">Contattaci per <br> maggiori <strong>informazioni</strong></a>
  </div>
  <?php } ?>
<div class="brand_container row">
 <?php
 $args = array(
    'taxonomy' => 'product_cat',
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => true
 );
   $terms = get_terms($args);
   $count = 1;
   foreach($terms as $term) { //loop starts here
    $count++;
   $taxonomy = $term->taxonomy;
   $term_id = $term->term_taxonomy_id;
   $term_link = get_term_link( $term );
   $term_name = $term->name;
   $term_slug = $term->slug;
   $term_image_id = get_term_meta( $term_id, 'thumbnail_id', true );
   $term_image = wp_get_attachment_url( $term_image_id );
   ?>
<?php
if(!my_wp_is_mobile()) {

 if( $count % 2 == 0 ) { ?>
<div id="<?php echo $term_slug; ?>" class="collection_wrapper col-lg-12 col-md-12 col-sm-12 col-12">
  <a href="<?php echo $term_link ?>" title="Vai alla sezione <?php echo $term_name ?>">
        <div class="media">
        <div class="media-body align-self-center text-center animated wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.5s">
        <h3 class="trans"><?php echo $term_name ?></h3>
        <button class="btn btn-lg cta trans">Scopri</button>
        </div><!--media-body-->
      <div class="img_wrapper animated wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.8s">
      <img class="img-fluid translated trans" alt="<?php echo $term_name ?>" src="<?php echo $term_image ?>" />
      </div><!--img_wrapper-->
    </div><!--media-->
    </a>
</div><!--brand_wrapper-->
<?php } else { ?>
  <div id="<?php echo $term_slug; ?>" class="collection_wrapper inverted col-lg-12 col-md-12 col-sm-12 col-12">
    <a href="<?php echo $term_link ?>" title="Vai alla sezione <?php echo $term_name ?>">
          <div class="media">
        <div class="img_wrapper animated wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.5s">
        <img class="img-fluid translated trans" alt="<?php echo $term_name ?>" src="<?php echo $term_image ?>" />
        </div><!--img_wrapper-->
        <div class="media-body align-self-center text-center animated wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.8s">
          <h3 class="trans"><?php echo $term_name ?></h3>
          <button class="btn btn-lg cta trans">Scopri</button>
        </div><!--media-body-->
      </div><!--media-->
      </a>
  </div><!--brand_wrapper-->
<?php }

} else { ?>
  <div id="<?php echo $term_slug; ?>" class="collection_wrapper col-lg-12 col-md-12 col-sm-12 col-12">
    <a href="<?php echo $term_link ?>" title="Vai alla sezione <?php echo $term_name ?>">
      <figure class="figure img_wrapper">
        <img alt="<?php echo $term_name ?>" class="translated" src="<?php echo $term_image ?>" />
        <div class="cover"></div>
        <figcaption class="figure-caption translated">
          <h3 class="trans"><?php echo $term_name ?></h3>
          <button class="btn btn-lg cta">Scopri</button>
        </figcaption>
      </figure><!--media-->
      </a>
  </div><!--collection_wrapper-->
<?php } ?>

<?php } ?>
</div><!--brand_container-->

</section><!--marchi-->
