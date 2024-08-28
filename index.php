<?php
  get_header();
?>

  <main>
  <section class="bg-blog-image min-vh-100 px-4 text-center d-flex justify-content-center align-items-center flex-column">
    <?php
      if (is_home()) {
          echo '<h1 class="display-5 fw-bold text-white">' . get_the_title(get_option('page_for_posts')) . '</h1>';
      }
    ?>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4 text-white">
        Encontrá un lugar para cada momento de tu vida
      </p>
    </div>
  </section>
  <section class="d-flex gap-4 px-4 py-20 flex-column align-items-center">
    <?php
      $post_count = wp_count_posts();
      $published_posts = $post_count->publish;
    ?>
    <h4 class="text-center"><?php echo $published_posts . ' propiedades publicadas en nuestro catálogo'; ?></h4>
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
  </section>
    <div class="pagination-container">
      <?php
      the_posts_pagination( array(
        'prev_text'          => __( '<' ),
        'next_text'          => __( '>' ),
        'before_page_number' => '',
      ) );
      ?>
    </div>
  </main>    

<?php
  get_footer();
?>