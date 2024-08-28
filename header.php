<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Site Template">
    <meta name="author" content="Franco Juárez">    
	<?php
    wp_head();
  ?>
</head> 
<body>
  <header id="header" class="position-absolute d-flex w-100 flex-column border-bottom border-white">
    <nav class="navbar navbar-expand-lg navbar-light">
      <?php
      if(function_exists('the_custom_logo')) {

      $custom_logo_id = get_theme_mod('custom_logo');
      $logo = wp_get_attachment_image_src($custom_logo_id);

      }
      ?>
        <a class="navbar-brand" href="/">
          <img src="<?php echo $logo[0] ?>" />
        </a>
        <button class="navbar-toggler border-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="bi bi-list" style="color: #FFF"></i>
        </button>
      <div class="collapse navbar-collapse justify-content-end pt-4 pt-md-0" id="navbarSupportedContent">
      <?php
        wp_nav_menu(
          array(
            'menu'        => 'primary',
            'theme_location' => 'primary',
            'container'     => false,
            'items_wrap'   => '<ul class="navbar-nav mb-2 mb-lg-0 d-flex gap-4 d-flex">%3$s</ul>',
          )
        );
      ?>
      </div>
    </nav>
	</header>