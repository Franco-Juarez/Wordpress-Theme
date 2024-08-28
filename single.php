<?php
  get_header();
?>

  <main>
    <?php
      if( have_posts() ){
        while( have_posts() ){
          the_post();
          get_template_part( 'parts/content', 'article' );
        }
      }
    ?>
  </main>    

<?php
  get_footer();
?>