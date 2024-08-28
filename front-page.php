<?php
get_header();
?>

<main>
  <section class="bg-image min-vh-100 px-4 py-5 text-center d-flex justify-content-center align-items-center flex-column">
    <h1 class="display-5 fw-bold text-white">
      <?php
      the_title();
      ?>
    </h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4 text-white">
        Propiedades en venta y alquiler. Un lugar para cada etapa de tu vida
      </p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <?php
          $blog_page_url = get_permalink(get_option('page_for_posts'));
        ?>
        <a href="<?php echo $blog_page_url ?>" type="button" class="btn btn-primary btn-lg px-4 gap-3">Ver catálogo</a>
      </div>
    </div>
  </section>
  <section class="py-20 bg-light-blue d-flex flex-column align-items-center px-4 gap-4">
    <h2>
      Te acompañamos en cada paso
    </h2>  
    <div class="d-flex gap-4 flex-wrap justify-content-center">
      <article class="card pt-3" style="width: 18rem;">
          <i class="bi bi-search px-3" style="color: #1E2640; font-size: 2rem"></i>
          <div class="card-body d-flex flex-column justify-content-between align-items-start">
            <h5 class="card-title">
              Búsqueda clara y rápida
            </h5>
            <p class="card-text">  
              Pensamos nuestros filtros, mapas y comparadores de avisos para simplificarte la experiencia.
            </p>
            <a href="#" class="btn btn-primary">Leer más</a>
          </div>
        </article>
        <article class="card pt-3" style="width: 18rem;">
          <i class="bi bi-graph-up-arrow px-3" style="color: #1E2640; font-size: 2rem"></i>
          <div class="card-body d-flex flex-column justify-content-between align-items-start">
            <h5 class="card-title">
              Tenés tu propia sección  
            </h5>
            <p class="card-text">  
              Desde tu cuenta podés acceder de forma segura a los avisos contactados, favoritos, las notas que creaste y más.
            </p>
            <a href="#" class="btn btn-primary">Leer más</a>
          </div>
        </article>
        <article class="card pt-3" style="width: 18rem;">
          <i class="bi bi-clipboard-data px-3" style="color: #1E2640; font-size: 2rem"></i>
          <div class="card-body d-flex flex-column justify-content-between align-items-start">
            <h5 class="card-title">
              Variedad de anunciantes  
            </h5>
            <p class="card-text">  
              Inmobiliarias y dueños directos de todo el país ofrecen las mejores opciones de propiedades para vos.
            </p>
            <a href="#" class="btn btn-primary">Leer más</a>
          </div>
        </article>
        <article class="card pt-3" style="width: 18rem;">
          <i class="bi bi-buildings px-3" style="color: #1E2640; font-size: 2rem"></i>
          <div class="card-body d-flex flex-column justify-content-between align-items-start">
          <h5 class="card-title">
            ¡Somos 
            <?php
            echo get_bloginfo('name');
            ?>
            !
          </h5>
            <p class="card-text">  
              14 años en el mercado y 15.5 millones de avisos publicados nos respaldan en la búsqueda de tu hogar.
            </p>
            <a href="#" class="btn btn-primary">Leer más</a>
          </div>
        </article>
    </div>
  </section>
  <section class="d-flex gap-4 px-4 py-20 flex-column align-items-center">
    <h2>Búsquedas destacadas</h2>
    <div class="properties-grid">
      <?php 
        $args = array(
          'post_type'      => 'post',
          'posts_per_page' => -1,
          'order'          => 'DESC',
      );
      
      $query = new WP_Query($args);
      
      if ($query->have_posts()) {
          while ($query->have_posts()) {
            $query->the_post();
    
            $operation_type = get_post_meta(get_the_ID(), 'wporg_field_id', true);
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
          echo 'No posts found';
      } 
      ?>
    </div>
    <a href="<?php echo $blog_page_url ?>" class="btn btn-primary">Ver catálogo completo</a>
  </section>
  <section class="cta-section bg-image-cta d-flex flex-column align-items-center justify-content-center p-4 p-md-0">
    <h2 class="h2 text-white">
      Suscribite a nuestro newsletter
    </h2>
    <p class="text-white text-center text-md-left">
      Recibí información sobre nuestras ofertas y promociones
    </p>
    <form class="d-flex align-items-center gap-2 flex-column flex-md-row">
      <div class="form-group text-white">
        <label for="email">Correo electrónico</label>
        <input placeholder="email@gmail.com" type="email pt-2" class="form-control" id="email" aria-describedby="emailHelp" required>
        <small id="emailHelp" class="form-text text-white">No compartiremos tu correo con nadie más.</small>
      </div>
      <button type="submit" class="btn btn-primary">Suscribirme</button>
    </form>
  </section>
</main>

<?php
get_footer();
?>