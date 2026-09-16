<?php get_header(); ?>

<main id="main" role="main" style="padding-top: 100px; min-height: 60vh;">
  <div class="container section">
    <?php while (have_posts()) : the_post(); ?>
      <h1 class="section-title"><?php the_title(); ?></h1>
      <div class="section-subtitle" style="max-width:none; margin-top: 24px;">
        <?php the_content(); ?>
      </div>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>
