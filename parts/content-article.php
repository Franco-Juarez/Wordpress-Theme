<div>
    <div class="gallery d-flex gap-4">
      <div class="col">
      <?php 
        $thumbnail_id = get_post_thumbnail_id();
        $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
        echo wp_get_attachment_image( $thumbnail_id, 'large', false, ['class' => 'card-img-top img-fluid', 'alt' => $thumbnail_alt] );
      ?>
      </div>
      <div class="d-none d-md-block w-50">
        <div class="row gap-2">
          <div class="col">
            <?php 
              $thumbnail_id = get_post_thumbnail_id();
              $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
              echo wp_get_attachment_image( $thumbnail_id, 'large', false, ['class' => 'card-img-top img-fluid', 'alt' => $thumbnail_alt] );
            ?>
          </div>
          <div class="col">
          <?php 
              $thumbnail_id = get_post_thumbnail_id();
              $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
              echo wp_get_attachment_image( $thumbnail_id, 'large', false, ['class' => 'card-img-top img-fluid', 'alt' => $thumbnail_alt] );
            ?>
          </div>
          <div class="w-100"></div>
          <div class="col">
          <?php 
              $thumbnail_id = get_post_thumbnail_id();
              $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
              echo wp_get_attachment_image( $thumbnail_id, 'large', false, ['class' => 'card-img-top img-fluid', 'alt' => $thumbnail_alt] );
            ?>
          </div>
          <div class="col">
          <?php 
              $thumbnail_id = get_post_thumbnail_id();
              $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
              echo wp_get_attachment_image( $thumbnail_id, 'large', false, ['class' => 'card-img-top img-fluid', 'alt' => $thumbnail_alt] );
            ?>
          </div>
        </div>
      </div>
    </div>
    <section class="d-flex gap-4 p-5 flex-column flex-md-row">
      <?php
        $operation_type = get_post_meta(get_the_ID(), 'wporg_field', true);
        $price = get_post_meta(get_the_ID(), 'price', true);
        $address = get_post_meta(get_the_ID(), 'address', true);
        $neighborhood = get_post_meta(get_the_ID(), 'neighborhood', true);
        $city = get_post_meta(get_the_ID(), 'city', true);
        $map_url = get_post_meta($post->ID, 'map_url', true);
        $bedrooms = get_post_meta(get_the_ID(), 'bedrooms', true);
        $bathrooms = get_post_meta(get_the_ID(), 'bathrooms', true);
        $surface_area = get_post_meta(get_the_ID(), 'surface_area', true);
      ?>
      <div class="w-100 w-md-75">
        <span class="d-flex gap-2">
          <p class="text-capitalize"><?php echo esc_html($operation_type); ?> |</p>
          Publicado el
          <?php 
            echo get_the_date('d/m/Y'); 
          ?>
        </span>
        <h4 class="text-capitalize"><?php echo esc_html($operation_type); ?> · USD <?php echo esc_html($price); ?></h4>
        <p class="text-capitalize">
          <?php echo esc_html($address); ?>
        </p>
        <div class="iframe-container">
          <iframe class="pb-2" src="<?php echo esc_html($map_url); ?>" height="450" style="border:0; width:100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="border-top border-bottom d-flex gap-4 py-2 icon-container">
          <span class="d-flex align-items-center gap-1 flex-column">
            <i class="bi bi-alarm" style="color: #1E2640; font-size: 1.2rem"></i>
              <?php echo esc_html($bedrooms); ?> dorm.
          </span>
          <span class="d-flex align-items-center gap-1 flex-column">
            <i class="bi bi-droplet-fill" style="color: #1E2640; font-size: 1.2rem"></i>
              2
          </span>
          <span class="d-flex align-items-center gap-1 flex-column">
            <i class="bi bi-arrows-fullscreen" style="color: #1E2640; font-size: 1.2rem"></i>
              150m²
          </span>
        </div>
        <div class="border-bottom d-flex py-2 flex-column property-content">
          <h2>
            <?php
              the_title()
            ?>
          </h2>
          <?php
            the_content();
          ?>
        </div>
      </div>
      <div class="w-100 w-md-25 bg-light p-4 rounded">
        <form>
          <h4 class="h4 mb-4">Contactá al anunciante</h4>
          <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Teléfono">
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Mensaje</label>
            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Escribe tu mensaje"></textarea>
          </div>
          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="terminos" name="scales">
            <label class="form-check-label" for="terminos">Acepto los términos y condiciones</label>
          </div>
          <button class="btn btn-primary mb-3 w-100" type="submit">Enviar y consultar por mail</button>
          <p class="text-center">0</p>
          <a href="#" class="btn btn-success w-100">Contactanos por Whatsapp</a>
        </form>
      </div>
    </section>
  </div>
  <section class="d-flex gap-4 px-4 py-4 flex-column align-items-center">
    <h3 class="h3">Similares a tu búsqueda</h3>
    <div class="properties-grid">
      <?php
      $categories = get_the_category();
      $first_category = $categories[0];
      $category_name = $first_category->name; 
    
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'tax_query' => array(
          array(
          'taxonomy' => 'category',
          'field' => 'slug',
          'terms' => sanitize_title_with_dashes($category_name),
          ),
        ),
      );
      $query = new WP_Query($args);

      if ($query->have_posts()) {
        while ($query->have_posts()) {
          $query->the_post();

        // Recuperar los valores de los custom fields
        $operation_type = get_post_meta(get_the_ID(), 'wporg_field', true);
        $price = get_post_meta(get_the_ID(), 'price', true);
        $address = get_post_meta(get_the_ID(), 'address', true);
        $neighborhood = get_post_meta(get_the_ID(), 'neighborhood', true);
        $city = get_post_meta(get_the_ID(), 'city', true);
        $bedrooms = get_post_meta(get_the_ID(), 'bedrooms', true);
        $bathrooms = get_post_meta(get_the_ID(), 'bathrooms', true);
        $surface_area = get_post_meta(get_the_ID(), 'surface_area', true);

        get_template_part('parts/card', null, array(
          'operation_type' => $operation_type,
          'price' => $price,
          'address' => $address,
          'neighborhood' => $neighborhood,
          'city' => $city,
          'bedrooms' => $bedrooms,
          'bathrooms' => $bathrooms,
          'surface_area' => $surface_area,
        ));
        } 
        wp_reset_postdata();
      } else {
        echo 'No hay artículos para mostrar.';
      }
      ?>
    </div>
    <?php
      $blog_page_url = get_permalink(get_option('page_for_posts'));
    ?>
    <a href="<?php echo $blog_page_url ?>" class="btn btn-primary">Ver catálogo completo</a>
  </section>