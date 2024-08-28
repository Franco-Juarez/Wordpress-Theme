<?php
  
  $operation_type = isset($args['operation_type']) ? $args['operation_type'] : '';
  $price = isset($args['price']) ? $args['price'] : '';
  $address = isset($args['address']) ? $args['address'] : '';
  $neighborhood = isset($args['neighborhood']) ? $args['neighborhood'] : '';
  $city = isset($args['city']) ? $args['city'] : '';
  $bedrooms = isset($args['bedrooms']) ? $args['bedrooms'] : '';
  $bathrooms = isset($args['bathrooms']) ? $args['bathrooms'] : '';
  $surface_area = isset($args['surface_area']) ? $args['surface_area'] : '';
?>

    <article class="card" style="width: 18rem;">
      <button class="position-absolute top-0 end-0 mt-2 mx-2 bg-light border-0 rounded"><i class="bi bi-heart" style="color: #1E2640; font-size: 1rem"></i></button>
    <?php 
      $thumbnail_id = get_post_thumbnail_id();
      $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
      echo wp_get_attachment_image( $thumbnail_id, 'large', false, ['class' => 'card-img-top img-fluid', 'alt' => $thumbnail_alt] );
    ?>
      <div class="card-body">
      <p class="text-secondary text-capitalize"><?php echo esc_html($operation_type); ?></p>
      <h5 class="card-title">
        $<?php echo esc_html($price); ?>
      </h5>
        <p class="card-text m-0">  
          <?php echo esc_html($address); ?>
        </p>
        <p class="card-text text-secondary text-semibold">  
          <?php echo esc_html($neighborhood); ?> -  <?php echo esc_html($city); ?>
        </p>
        <div class="pb-2 d-flex gap-2">
          <span class="d-flex gap-1"><i class="bi bi-alarm" style="color: #1E2640; font-size: 1rem"></i><?php echo esc_html($bedrooms); ?></span>
          <span class="d-flex gap-1"><i class="bi bi-droplet-fill" style="color: #1E2640; font-size: 1rem"></i><?php echo esc_html($bathrooms); ?></span>
          <span class="d-flex gap-1"><i class="bi bi-arrows-fullscreen" style="color: #1E2640; font-size: 1rem"></i><?php echo esc_html($surface_area); ?>m²</span>
        </div>
        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Ver propiedad</a>
      </div>
    </article>
  