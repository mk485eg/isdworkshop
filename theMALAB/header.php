<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="MA LAB — Premium Digital Agency. We design & build high-performing websites, e-commerce stores, and digital systems for restaurants, cafes, and growing businesses.">
  <meta property="og:title" content="MA LAB | Premium Digital Agency">
  <meta property="og:description" content="We design & build digital experiences that drive real growth.">
  <meta property="og:type" content="website">
  <meta name="theme-color" content="#0e141d">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header" role="banner">
  <div class="nav-inner">

    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo" aria-label="MA LAB Home">
      MA<em class="chevron">&gt;</em>LAB
    </a>

    <?php
    // Section anchors (#services, #contact, ...) only exist on the
    // homepage. A bare "#services" href does nothing on any other page
    // (nothing on that page matches the fragment) — always point through
    // home_url() so these links work from anywhere on the site.
    $home = home_url('/');
    ?>
    <nav class="nav-links" id="primary-nav" aria-label="Primary navigation">
      <a href="<?php echo esc_url($home . '#services'); ?>">Services</a>
      <a href="<?php echo esc_url(home_url('/portfolio/')); ?>">Portfolio</a>
      <a href="<?php echo esc_url($home . '#how-it-works'); ?>">How It Works</a>
      <a href="<?php echo esc_url($home . '#results'); ?>">Results</a>
      <a href="<?php echo esc_url($home . '#testimonials'); ?>">Clients</a>
      <a href="<?php echo esc_url($home . '#contact'); ?>">Contact</a>
    </nav>

    <a href="<?php echo esc_url(home_url('/booking/')); ?>" class="btn btn-primary nav-cta">
      Book Now <span class="chevron">&rsaquo;</span>
    </a>

    <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation" aria-expanded="false">
      <span></span>
      <span></span>
      <span></span>
    </button>

  </div>
</header>
