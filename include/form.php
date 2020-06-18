<section id="form">
  <?php if(!is_page('assistenza')) { ?>
  <div class="row form_title_wrapper">
    <div class="col-lg-12">
      <div class="img_wrapper">
        <img class="trans translated" alt="Richiesta informazioni" src="<?php bloginfo('wpurl') ?>/images/richiesta_info.jpg" />
        <div class="cover"></div>
        <h2 class="translated">Desideri richiedere un <strong>preventivo</strong> o una <strong>consulenza gratuita</strong>? Hai 2 semplici maniere per farlo</h2>
      </div><!--img_wrapper-->
    </div><!--form_title_wrapper-->
  </div><!--row-->
<?php } ?>
  <div class="container">
    <div class="row">
    <div class="col-lg-7 col-md-12 col-sm-12 col-12 animated wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
      <img class="arrow" src="<?php bloginfo('wpurl'); ?>/images/down-arrow.png" />
      <h3>Contattaci compilando il form</h3>
      <span class="mandatory">I campi contrassegnati da * sono obbligatori</span>
    <?php echo do_shortcode('[contact-form-7 id="6" title="Form Contatti"]'); ?>
    </div>
    <div class="col-lg-5 col-md-12 col-sm-12 col-12 animated wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.7s">
      <img class="arrow" src="<?php bloginfo('wpurl'); ?>/images/down-arrow.png" />
      <h3>Usa i nostri riferimenti</h3>
          <figure>
            <h4>Telefonaci</h4>
            <figcaption>
              <img width="50" class="mr-3" src="<?php bloginfo('wpurl'); ?>/images/telefono_circular_tech.png" alt="Chiama <?php bloginfo('name'); ?>">
              <a href="tel:+39-329-4438436" title="Chiama <?php bloginfo('name'); ?>">+39 329 4438436</a>
            </figcaption>
          </figure>
          <figure>
            <h4>Scrivici un'email</h4>
            <figcaption>
              <img width="50" class="mr-3" src="<?php bloginfo('wpurl'); ?>/images/email_circular_tech.png" alt="Scrivi un'email a <?php bloginfo('name'); ?>">
              <a href="mailto:info@circulartech.it" title="Scrivi un'email a <?php bloginfo('name'); ?>">info@circulartech.it</a>
            </figcaption>
          </figure>
        </ul>
    </div>
    </div><!--row-->
  </div><!--container-->
</section>
