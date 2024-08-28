<?php
  get_header();
?>

  <main>
    <section class="bg-page d-flex flex-column align-items-center justify-content-center">
      <h1 class="text-white text-center">
        <?php
          the_title();
        ?>
      </h1>
    </section>
    <section>
    <?php
        if( have_posts() ){
          while( have_posts() ){
            the_post();
            get_template_part( 'parts/content', 'page' );
          }
        }
      ?>
    </section>
  </main>    

<?php
  get_footer();
?>