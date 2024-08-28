<div class="d-flex flex-wrap justify-content-between gap-2">
  <div class="card" style="width: 18rem;">
    <?php 
      the_post_thumbnail('thumbnail', ['class' => 'card-img-top img-fluid ']); 
    ?>
    <div class="card-body">
      <h5 class="card-title">
        <?php
        the_title();
      ?>
      </h5>
      <p class="card-text">
        <?php
        the_excerpt();
        ?>
      </p>
      <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read now</a>
    </div>
  </div>
</div>
