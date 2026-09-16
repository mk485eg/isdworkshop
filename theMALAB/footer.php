<footer class="site-footer" role="contentinfo">
  <div class="container">

    <div class="footer-top">

      <!-- Brand -->
      <div class="footer-brand">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo" aria-label="MA LAB">
          MA<em class="chevron">&gt;</em>LAB
        </a>
        <p class="footer-tagline">
          Premium digital agency crafting high-performance websites,
          e-commerce stores, and digital systems for ambitious businesses.
        </p>
        <div class="footer-socials">
          <a href="#" class="social-link" aria-label="Instagram">📸</a>
          <a href="https://www.facebook.com/themalab" target="_blank" rel="noopener" class="social-link" aria-label="Facebook">📘</a>
          <a href="https://www.linkedin.com/company/10615030/" target="_blank" rel="noopener" class="social-link" aria-label="LinkedIn">💼</a>
          <a href="#" class="social-link" aria-label="TikTok">🎵</a>
          <a href="https://wa.me/61426623761" target="_blank" rel="noopener" class="social-link" aria-label="WhatsApp">💬</a>
        </div>
      </div>

      <!-- Services -->
      <div class="footer-col">
        <p class="footer-col-title">Services</p>
        <ul class="footer-links">
          <li><a href="#services">Web Design &amp; Dev</a></li>
          <li><a href="#services">E-Commerce</a></li>
          <li><a href="#services">Brand Identity</a></li>
          <li><a href="#services">Restaurant Systems</a></li>
          <li><a href="#services">SEO &amp; Growth</a></li>
          <li><a href="#services">Social Media</a></li>
        </ul>
      </div>

      <!-- Company -->
      <div class="footer-col">
        <p class="footer-col-title">Company</p>
        <ul class="footer-links">
          <li><a href="#how-it-works">How It Works</a></li>
          <li><a href="#results">Results</a></li>
          <li><a href="#testimonials">Client Stories</a></li>
          <li><a href="#contact">Contact Us</a></li>
          <li><a href="<?php echo esc_url(get_privacy_policy_url()); ?>">Privacy Policy</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="footer-col">
        <p class="footer-col-title">Contact</p>
        <ul class="footer-links">
          <li>
            <span>📧</span>
            <span><?php echo esc_html( MALAB_BUSINESS_EMAIL ); ?></span>
          </li>
          <li>
            <span>📱</span>
            <a href="https://wa.me/61426623761" target="_blank" rel="noopener">+61 426 623 761</a>
          </li>
          <li>
            <span>⏱</span>
            <span>Response within 24h</span>
          </li>
        </ul>
        <div style="margin-top:24px;">
          <a href="#contact" class="btn btn-primary" style="font-size:11px; padding: 12px 20px;">
            Start a Project &rsaquo;
          </a>
        </div>
      </div>

    </div>

    <div class="footer-bottom">
      <p class="footer-copyright">
        &copy; <?php echo date('Y'); ?> MA LAB Digital Solutions. All rights reserved.
        Built with &#10084; by <a href="#" style="color: var(--color-primary);">MA LAB</a>.
      </p>
      <nav class="footer-legal" aria-label="Legal navigation">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
        <a href="#">Cookie Policy</a>
      </nav>
    </div>

  </div>
</footer>

<!-- Call -->
<a href="tel:+61426623761" class="call-float" id="call-float" aria-label="Call MA LAB now">&#128222;</a>

<!-- Scroll to Top -->
<button class="scroll-top" id="scroll-top" aria-label="Scroll to top">&#8679;</button>

<?php wp_footer(); ?>
</body>
</html>
