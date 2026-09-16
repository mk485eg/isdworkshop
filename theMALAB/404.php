<?php get_header(); ?>

<main id="main" role="main" style="min-height:80vh; display:flex; align-items:center; padding-top:100px;">
  <div class="container" style="text-align:center; padding-block: var(--space-section);">
    <p class="section-label" style="justify-content:center;">404 Error</p>
    <h1 class="hero-title" style="max-width:600px; margin-inline:auto; margin-bottom:24px;">
      Page Not <span class="accent">Found</span>
    </h1>
    <p class="section-subtitle" style="margin-inline:auto; text-align:center; margin-bottom:40px;">
      The page you're looking for doesn't exist or has been moved.
    </p>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
      &larr; Back to Home
    </a>
  </div>
</main>

<?php get_footer(); ?>
