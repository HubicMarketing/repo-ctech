<div class="contattaci trans">
  <div class="container">
    <?php if(!my_wp_is_mobile()) { ?>
        <span class="top_cta"><a href="#form">Contattaci per informazioni o assistenza</a></span> / <?php } ?>
        <a title="Chiama <?php bloginfo('name'); ?>" href="tel:+39-329-4438436">
          <?php if(!my_wp_is_mobile()) { ?><img alt="Chiama <?php bloginfo('name'); ?>" src="<?php bloginfo('wpurl'); ?>/images/phone.png" class="contatti_icon" /><?php } ?>
          +39 329 4438436</a> /
        <a title="Scrivi un'email a  <?php bloginfo('name'); ?>" href="mailto:info@circulartech.it">
          <?php if(!my_wp_is_mobile()) { ?><img alt="Scrivi un'email a <?php bloginfo('name'); ?>" src="<?php bloginfo('wpurl'); ?>/images/email.png" class="contatti_icon" /><?php } ?>
          info@circulartech.it</a>
    </div><!--container-->
</div><!--contattaci-->
