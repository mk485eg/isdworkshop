<?php get_header(); ?>

<!-- ============================================================
     HERO
     ============================================================ -->
<main id="main" role="main">
<section class="hero" id="home" aria-label="Hero">
  <div class="hero-bg">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-bg.png' ); ?>" alt="" class="hero-bg-image">
    <div class="hero-bg-overlay"></div>
    <div class="hero-glow-1"></div>
    <div class="hero-glow-2"></div>
    <div class="hero-grid-lines"></div>
  </div>

  <div class="container">
    <div class="hero-grid">
      <div class="hero-content">
        <div class="hero-eyebrow hero-stagger" style="--d:0">
          <span class="dot"></span>
          Premium Digital Agency &mdash; Delivering Results Since 2024
        </div>

        <h1 class="hero-title hero-stagger" style="--d:1">
          We Build Digital<br>
          Experiences That<br>
          <span class="accent">Drive Growth</span>
        </h1>

        <p class="hero-desc hero-stagger" style="--d:2">
          MA LAB is a full-service digital agency crafting high-performance websites,
          e-commerce stores, and automated digital systems for restaurants, cafes,
          startups, and growing businesses across the region.
        </p>

        <div class="hero-actions hero-stagger" style="--d:3">
          <a href="<?php echo esc_url(home_url('/booking/')); ?>" class="btn btn-primary">
            Book Now <span class="chevron">&rsaquo;</span>
          </a>
          <a href="#services" class="btn btn-ghost">
            View Our Services
          </a>
        </div>

        <div class="hero-clients hero-stagger" style="--d:4">
          <div class="hero-avatars">
            <div class="hero-avatar">R</div>
            <div class="hero-avatar">S</div>
            <div class="hero-avatar">K</div>
            <div class="hero-avatar">M</div>
          </div>
          <div class="hero-clients-text">
            <strong>50+ Happy Clients</strong>
            Restaurants &bull; Cafes &bull; E-Commerce &bull; Startups
          </div>
        </div>
      </div>

      <div class="hero-visual">
        <div class="hero-visual-frame">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-visual.jpg' ); ?>" alt="MA LAB team designing a digital product" class="hero-visual-img">
        </div>
        <div class="hero-visual-badge hero-visual-badge-1">
          <span class="badge-dot"></span> Site Live
        </div>
        <div class="hero-visual-badge hero-visual-badge-2">
          &uarr; 128% Growth
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     TICKER
     ============================================================ -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <?php
    $items = [
      'Web Design', 'E-Commerce', 'Brand Identity', 'Restaurant Systems',
      'SEO & Growth', 'Social Media', 'Business Automation', 'WordPress',
      'Web Design', 'E-Commerce', 'Brand Identity', 'Restaurant Systems',
      'SEO & Growth', 'Social Media', 'Business Automation', 'WordPress',
    ];
    foreach ($items as $item) :
    ?>
    <div class="ticker-item">
      <span class="dot"></span>
      <?php echo esc_html($item); ?>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- ============================================================
     SERVICES
     ============================================================ -->
<section class="section services" id="services" aria-labelledby="services-title">
  <div class="container">
    <div class="services-header">
      <p class="section-label">What We Build</p>
      <h2 class="section-title" id="services-title">
        Full-Stack Digital Services<br>
        For <span class="accent">Modern Businesses</span>
      </h2>
      <p class="section-subtitle">
        From stunning websites to full e-commerce systems and restaurant digital tools —
        we handle every layer of your digital presence.
      </p>
    </div>

    <div class="services-grid">

      <article class="service-card fade-up">
        <div class="service-icon">🌐</div>
        <h3 class="service-title">Web Design &amp; Development</h3>
        <p class="service-desc">
          Custom WordPress websites engineered for performance, conversion, and growth.
          Pixel-perfect design meets rock-solid code — built to impress and built to last.
        </p>
      </article>

      <article class="service-card fade-up">
        <div class="service-icon">🛒</div>
        <h3 class="service-title">E-Commerce Solutions</h3>
        <p class="service-desc">
          WooCommerce stores with seamless checkout flows, product management, payment
          gateway integration, and inventory systems that scale with your business.
          Turn visitors into paying customers.
        </p>
      </article>

      <article class="service-card fade-up">
        <div class="service-icon">✦</div>
        <h3 class="service-title">Brand Identity &amp; Logo</h3>
        <p class="service-desc">
          Strategic brand systems: logo design, color palettes, typography,
          and brand guidelines that set you apart from the competition.
        </p>
      </article>

      <article class="service-card fade-up">
        <div class="service-icon">🍽️</div>
        <h3 class="service-title">Restaurant Digital Systems</h3>
        <p class="service-desc">
          Online menus, reservation systems, delivery integrations, and loyalty
          programs tailored to restaurants, cafes, and food businesses.
        </p>
      </article>

      <article class="service-card fade-up">
        <div class="service-icon">📈</div>
        <h3 class="service-title">SEO &amp; Growth Marketing</h3>
        <p class="service-desc">
          Technical SEO, content strategy, local SEO for physical businesses,
          and data-driven campaigns that bring measurable, sustained traffic growth.
        </p>
      </article>

      <article class="service-card fade-up">
        <div class="service-service-content service-content">
          <div class="service-icon">📱</div>
          <div>
            <h3 class="service-title">Social Media Management</h3>
            <p class="service-desc">
              Content creation, scheduling, community management, and paid ad campaigns
              across Instagram, Facebook, TikTok, and LinkedIn — fully managed for you.
            </p>
          </div>
          <a href="#contact" class="btn btn-primary">Get Started &rsaquo;</a>
        </div>
      </article>

    </div>
  </div>
</section>

<!-- ============================================================
     STATS
     ============================================================ -->
<section class="stats" id="results" aria-label="Results">
  <div class="container">
    <div class="stats-grid">
      <div class="stat-item fade-up">
        <div class="stat-number" data-count="50">50+</div>
        <div class="stat-label">Projects Delivered</div>
      </div>
      <div class="stat-item fade-up">
        <div class="stat-number" data-count="98">98%</div>
        <div class="stat-label">Client Satisfaction</div>
      </div>
      <div class="stat-item fade-up">
        <div class="stat-number" data-count="3">3×</div>
        <div class="stat-label">Average ROI Increase</div>
      </div>
      <div class="stat-item fade-up">
        <div class="stat-number">5★</div>
        <div class="stat-label">Google Rating</div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     PORTFOLIO PREVIEW
     ============================================================ -->
<section class="section portfolio-preview" id="portfolio" aria-labelledby="portfolio-title">
  <div class="container">
    <div class="services-header">
      <p class="section-label">Our Work</p>
      <h2 class="section-title" id="portfolio-title">
        Real Projects,<br>
        <span class="accent">Real Businesses</span>
      </h2>
      <p class="section-subtitle">
        A look at client sites MA LAB has designed and built — from local trades
        to fitness coaches to creative studios.
      </p>
    </div>

    <div class="portfolio-preview-grid">
      <?php foreach (array_slice(malab_portfolio_items(), 0, 4) as $item) : ?>
        <a class="portfolio-card fade-up" href="<?php echo esc_url($item['url']); ?>" target="_blank" rel="noopener">
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
          </div>
        </a>
      <?php endforeach; ?>
    </div>

    <div class="portfolio-cta-row">
      <a href="<?php echo esc_url(home_url('/portfolio/')); ?>" class="btn btn-ghost">
        View Full Portfolio <span class="chevron">&rsaquo;</span>
      </a>
    </div>
  </div>
</section>

<!-- ============================================================
     HOW IT WORKS — ROADMAP
     ============================================================ -->
<section class="section roadmap" id="how-it-works" aria-labelledby="roadmap-title">
  <div class="container">
    <div class="roadmap-header">
      <p class="section-label">The Process</p>
      <h2 class="section-title" id="roadmap-title">
        From Idea to <span class="accent">Live &amp; Growing</span>
      </h2>
      <p class="section-subtitle">
        A clear 3-phase journey that delivers your new digital presence on time,
        on brand, and ready to convert customers from day one.
      </p>
    </div>

    <div class="roadmap-track">

      <div class="roadmap-step fade-up">
        <div class="step-num-wrap">
          <span class="step-num">01</span>
        </div>
        <div class="step-tag">Week 1 – 2</div>
        <div class="step-card">
          <h3 class="step-title">Discovery &amp; Strategy</h3>
          <p class="step-desc">
            We deep-dive into your business, competitors, and goals to craft
            a tailored strategy before a single pixel is placed.
          </p>
          <ul class="step-list">
            <li>Business &amp; audience analysis</li>
            <li>Competitor research</li>
            <li>Content &amp; sitemap planning</li>
            <li>Design direction alignment</li>
          </ul>
        </div>
      </div>

      <div class="roadmap-step fade-up">
        <div class="step-num-wrap">
          <span class="step-num">02</span>
        </div>
        <div class="step-tag">Week 3 – 6</div>
        <div class="step-card">
          <h3 class="step-title">Design &amp; Build</h3>
          <p class="step-desc">
            Our designers and developers work in sync to deliver a stunning,
            fast, and fully functional site — with your feedback at every stage.
          </p>
          <ul class="step-list">
            <li>UI/UX design in Figma</li>
            <li>WordPress development</li>
            <li>Content &amp; copywriting</li>
            <li>Mobile &amp; speed optimization</li>
          </ul>
        </div>
      </div>

      <div class="roadmap-step fade-up">
        <div class="step-num-wrap">
          <span class="step-num">03</span>
        </div>
        <div class="step-tag">Week 7 &amp; Beyond</div>
        <div class="step-card">
          <h3 class="step-title">Launch &amp; Grow</h3>
          <p class="step-desc">
            We go live, then keep growing — SEO, analytics setup, and ongoing
            support to ensure your site continues driving real business results.
          </p>
          <ul class="step-list">
            <li>Quality assurance &amp; testing</li>
            <li>Domain &amp; hosting setup</li>
            <li>SEO &amp; analytics launch</li>
            <li>30-day post-launch support</li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ============================================================
     TESTIMONIALS
     ============================================================ -->
<section class="section testimonials" id="testimonials" aria-labelledby="testimonials-title">
  <div class="container">
    <div class="testimonials-header">
      <p class="section-label">Client Stories</p>
      <h2 class="section-title" id="testimonials-title">
        Real Results From <span class="accent">Real Clients</span>
      </h2>
      <p class="section-subtitle">
        Don't take our word for it — hear what our clients say after working with MA LAB.
      </p>
    </div>

    <div class="testimonials-grid">

      <article class="testimonial-card fade-up">
        <div class="testimonial-stars">★★★★★</div>
        <p class="testimonial-quote">
          "MA LAB completely transformed our restaurant's online presence. Our online
          reservations went up 3x in the first month after launch. The new website is
          exactly what we envisioned — and more."
        </p>
        <div class="testimonial-author">
          <div class="author-avatar">RK</div>
          <div>
            <div class="author-name">Rami Khalil</div>
            <div class="author-role">Owner, Byblos Restaurant</div>
          </div>
        </div>
      </article>

      <article class="testimonial-card fade-up">
        <div class="testimonial-stars">★★★★★</div>
        <p class="testimonial-quote">
          "Professional, fast, and really understood our brand. Our WooCommerce store
          went live in 5 weeks and sales in the first 30 days exceeded our entire
          previous quarter. Absolutely worth every penny."
        </p>
        <div class="testimonial-author">
          <div class="author-avatar">SA</div>
          <div>
            <div class="author-name">Sara Abou Rjeily</div>
            <div class="author-role">Founder, Bloom Boutique</div>
          </div>
        </div>
      </article>

      <article class="testimonial-card fade-up">
        <div class="testimonial-stars">★★★★★</div>
        <p class="testimonial-quote">
          "The MA LAB team handled everything — design, development, SEO, and our
          Google Business setup. We now rank #1 locally for our keywords.
          Highly recommend to any business serious about growth."
        </p>
        <div class="testimonial-author">
          <div class="author-avatar">KM</div>
          <div>
            <div class="author-name">Karim Mansour</div>
            <div class="author-role">CEO, TechFit Training</div>
          </div>
        </div>
      </article>

    </div>
  </div>
</section>

<!-- ============================================================
     CONTACT
     ============================================================ -->
<section class="section contact" id="contact" aria-labelledby="contact-title">
  <div class="container">
    <div class="contact-wrap">

      <div class="contact-info">
        <p class="section-label">Get In Touch</p>
        <h2 class="section-title" id="contact-title">
          Ready to Start<br>
          Your <span class="accent">Project?</span>
        </h2>
        <p class="section-subtitle">
          Tell us about your business and what you need. We'll get back to you
          within 24 hours with a free consultation.
        </p>

        <div class="contact-details">
          <div class="contact-detail">
            <div class="detail-icon">📧</div>
            <div class="detail-text">
              <strong>Email</strong>
              <span><?php echo esc_html( MALAB_BUSINESS_EMAIL ); ?></span>
            </div>
          </div>
          <div class="contact-detail">
            <div class="detail-icon">📱</div>
            <div class="detail-text">
              <strong>WhatsApp</strong>
              <span><a href="https://wa.me/61426623761" target="_blank" rel="noopener" style="color:inherit">+61 426 623 761</a></span>
            </div>
          </div>
          <div class="contact-detail">
            <div class="detail-icon">⚡</div>
            <div class="detail-text">
              <strong>Response Time</strong>
              <span>Within 24 hours</span>
            </div>
          </div>
        </div>
      </div>

      <div class="contact-form-wrap">
        <form class="contact-form" id="contact-form" novalidate>
          <?php wp_nonce_field('malab_contact', 'malab_nonce'); ?>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="cf-name">Full Name *</label>
              <input
                class="form-input"
                type="text"
                id="cf-name"
                name="name"
                placeholder="Your name"
                required
                autocomplete="name"
              >
            </div>
            <div class="form-group">
              <label class="form-label" for="cf-email">Email Address *</label>
              <input
                class="form-input"
                type="email"
                id="cf-email"
                name="email"
                placeholder="you@example.com"
                required
                autocomplete="email"
              >
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="cf-type">Business Type</label>
            <select class="form-select" id="cf-type" name="business_type">
              <option value="">Select your business type</option>
              <option value="restaurant">Restaurant / Cafe</option>
              <option value="ecommerce">E-Commerce / Retail</option>
              <option value="startup">Startup / Tech</option>
              <option value="service">Service Business</option>
              <option value="other">Other</option>
            </select>
          </div>

          <div class="form-group">
            <label class="form-label" for="cf-message">Your Message *</label>
            <textarea
              class="form-textarea"
              id="cf-message"
              name="message"
              placeholder="Tell us about your project, goals, and timeline..."
              required
              rows="5"
            ></textarea>
          </div>

          <div id="form-status" role="alert" aria-live="polite" style="display:none;"></div>

          <button type="submit" class="btn btn-primary form-submit">
            Send Message <span class="chevron">&rsaquo;</span>
          </button>
        </form>
      </div>

    </div>
  </div>
</section>
</main>

<?php get_footer(); ?>
