<?php
/**
 * Template Name: Portfolio
 * Template Post Type: page
 */
defined('ABSPATH') || exit;
get_header();

$items      = malab_portfolio_items();
$categories = [];
foreach ($items as $item) {
    $categories[$item['category']] = true;
}
$categories = array_keys($categories);
?>

<section class="portfolio-hero">
  <div class="container">
    <p class="section-label">Our Work</p>
    <h1 class="section-title">
      Client Projects Across<br>
      Every <span class="accent">Industry</span>
    </h1>
    <p class="section-subtitle">
      A showcase of websites MA LAB has designed and built for local trades,
      fitness coaches, creative studios, and service businesses.
    </p>

    <div class="portfolio-filter-bar" id="portfolio-filter-bar" role="tablist" aria-label="Filter portfolio by category">
      <button type="button" class="portfolio-filter-btn active" data-filter="all" role="tab" aria-selected="true">All Work</button>
      <?php foreach ($categories as $cat) : ?>
        <button type="button" class="portfolio-filter-btn" data-filter="<?php echo esc_attr(sanitize_title(wp_strip_all_tags($cat))); ?>" role="tab" aria-selected="false">
          <?php echo wp_kses_post($cat); ?>
        </button>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section" style="padding-top:0;">
  <div class="container">
    <div class="portfolio-full-grid" id="portfolio-full-grid">
      <?php foreach ($items as $item) :
        $cat_slug = sanitize_title(wp_strip_all_tags($item['category']));
        $link     = malab_portfolio_link($item);
        $label    = malab_portfolio_link_label($item);
      ?>
        <?php if ($link) : ?>
        <a class="portfolio-card fade-up" href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener" data-category="<?php echo esc_attr($cat_slug); ?>">
        <?php else : ?>
        <div class="portfolio-card portfolio-card-static fade-up" data-category="<?php echo esc_attr($cat_slug); ?>">
        <?php endif; ?>
          <div class="portfolio-card-media<?php echo $item['image'] ? '' : ' no-image'; ?>"
               <?php if (!$item['image']) : ?>style="background:linear-gradient(135deg, <?php echo esc_attr($item['accent']); ?> 0%, var(--color-surface-high) 100%);"<?php endif; ?>>
            <?php if ($item['image']) : ?>
              <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['name']); ?> website preview" loading="lazy">
            <?php else : ?>
              <?php echo esc_html($item['name']); ?>
            <?php endif; ?>
          </div>
          <div class="portfolio-card-body">
            <p class="portfolio-card-tag"><?php echo wp_kses_post($item['category']); ?></p>
            <h3 class="portfolio-card-title"><?php echo esc_html($item['name']); ?></h3>
            <p class="portfolio-card-desc"><?php echo wp_kses_post($item['desc']); ?></p>
            <span class="portfolio-card-link"><?php echo esc_html($label); ?><?php if ($link) : ?> <span class="chevron">&rsaquo;</span><?php endif; ?></span>
          </div>
        <?php if ($link) : ?></a><?php else : ?></div><?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section contact" id="contact" aria-labelledby="portfolio-contact-title" style="padding-top:0;">
  <div class="container" style="text-align:center;">
    <p class="section-label" style="justify-content:center;">Like What You See?</p>
    <h2 class="section-title" id="portfolio-contact-title">
      Let's Build <span class="accent">Yours Next</span>
    </h2>
    <div class="portfolio-cta-row">
      <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="btn btn-primary">
        Start a Project <span class="chevron">&rsaquo;</span>
      </a>
    </div>
  </div>
</section>

<script>
(function () {
  var bar   = document.getElementById('portfolio-filter-bar');
  var grid  = document.getElementById('portfolio-full-grid');
  if (!bar || !grid) return;

  var cards = grid.querySelectorAll('.portfolio-card');

  bar.addEventListener('click', function (e) {
    var btn = e.target.closest('.portfolio-filter-btn');
    if (!btn) return;

    bar.querySelectorAll('.portfolio-filter-btn').forEach(function (b) {
      b.classList.remove('active');
      b.setAttribute('aria-selected', 'false');
    });
    btn.classList.add('active');
    btn.setAttribute('aria-selected', 'true');

    var filter = btn.getAttribute('data-filter');
    cards.forEach(function (card) {
      var show = filter === 'all' || card.getAttribute('data-category') === filter;
      card.classList.toggle('is-hidden', !show);
    });
  });
})();
</script>

<?php get_footer(); ?>
