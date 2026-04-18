<?php
/**
 * footer.php — Site-wide footer
 * Keep N Kleen | Page One Insights
 *
 * Closes </main>, outputs full footer, entity block, scripts, closes </body></html>.
 */
?>

</main><!-- /#main-content -->

<footer class="site-footer" aria-label="Site footer">

  <!-- ── Footer Top: 4-column grid ───────────────────────────────────────── -->
  <div class="footer-top" style="padding-top: var(--space-16);">
    <div class="container">
      <div class="footer-grid">

        <!-- Col 1: Brand + trust badges -->
        <div class="footer-col">
          <a href="/" aria-label="<?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?> — Home"
             style="text-decoration: none; display: inline-block; margin-bottom: var(--space-4);">
            <img src="<?php echo htmlspecialchars($logoUrl, ENT_QUOTES, 'UTF-8'); ?>"
                 alt="<?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?> logo"
                 width="50" height="50"
                 loading="lazy"
                 style="border-radius: var(--radius-sm); margin-bottom: var(--space-2);">
            <span class="footer-logo-name">
              <span class="footer-logo-mark">Keep</span> N Kleen
            </span>
            <span class="footer-tagline"><?php echo htmlspecialchars($tagline, ENT_QUOTES, 'UTF-8'); ?></span>
          </a>

          <p class="footer-desc">
            <?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?> has delivered spotless homes
            and businesses across Virginia since <?php echo $yearEstablished; ?>. Reliable scheduling,
            trained teams, and eco-friendly options for every space.
          </p>

          <div class="footer-trust">
            <span class="trust-badge">
              <i data-lucide="shield-check" aria-hidden="true" style="width:13px;height:13px;"></i>
              Licensed &amp; Insured
            </span>
            <span class="trust-badge">
              <i data-lucide="calendar-check" aria-hidden="true" style="width:13px;height:13px;"></i>
              Since <?php echo $yearEstablished; ?>
            </span>
            <span class="trust-badge">
              <i data-lucide="tag" aria-hidden="true" style="width:13px;height:13px;"></i>
              Free Estimates
            </span>
          </div>
        </div>

        <!-- Col 2: Core services -->
        <div class="footer-col">
          <h4>Our Services</h4>
          <ul>
            <?php foreach (array_slice($services, 0, 4) as $svc): ?>
            <li>
              <a href="/services/<?php echo htmlspecialchars($svc['slug'], ENT_QUOTES, 'UTF-8'); ?>">
                <?php echo htmlspecialchars($svc['name'], ENT_QUOTES, 'UTF-8'); ?>
              </a>
            </li>
            <?php endforeach; ?>
            <li><a href="/services">All Services</a></li>
          </ul>
        </div>

        <!-- Col 3: Service area + quick links -->
        <div class="footer-col">
          <h4>Service Areas</h4>
          <ul>
            <?php foreach ($serviceAreas as $area): ?>
            <li>
              <a href="/service-area<?php echo isset($area['slug']) ? '/' . htmlspecialchars($area['slug'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                <?php echo htmlspecialchars($area['city'] . ', ' . $area['state'], ENT_QUOTES, 'UTF-8'); ?>
              </a>
            </li>
            <?php endforeach; ?>
            <li><a href="/service-area">View All Areas</a></li>
          </ul>

          <h4 style="margin-top: var(--space-6);">Quick Links</h4>
          <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/contact">Contact</a></li>
          </ul>
        </div>

        <!-- Col 4: Contact info -->
        <div class="footer-col">
          <h4>Get in Touch</h4>

          <?php if ($phone): ?>
          <div class="contact-item">
            <i data-lucide="phone" aria-hidden="true" style="width:15px;height:15px;flex-shrink:0;color:var(--color-accent);"></i>
            <a href="tel:<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>"
               style="color: rgba(255,255,255,0.8);">
              <?php echo htmlspecialchars($phoneFormatted ?: formatPhone($phone), ENT_QUOTES, 'UTF-8'); ?>
            </a>
          </div>
          <?php endif; ?>

          <?php if ($email): ?>
          <div class="contact-item">
            <i data-lucide="mail" aria-hidden="true" style="width:15px;height:15px;flex-shrink:0;color:var(--color-accent);"></i>
            <a href="mailto:<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>"
               style="color: rgba(255,255,255,0.8);">
              <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>
            </a>
          </div>
          <?php endif; ?>

          <div class="contact-item">
            <i data-lucide="map-pin" aria-hidden="true" style="width:15px;height:15px;flex-shrink:0;color:var(--color-accent);"></i>
            <span>
              <?php echo htmlspecialchars($address['city'] . ', ' . $address['state'] . ' ' . $address['zip'], ENT_QUOTES, 'UTF-8'); ?>
            </span>
          </div>

          <div class="contact-item">
            <i data-lucide="clock" aria-hidden="true" style="width:15px;height:15px;flex-shrink:0;color:var(--color-accent);"></i>
            <span>Mon–Fri 8am–6pm &bull; Sat 9am–4pm</span>
          </div>

          <a href="/contact"
             class="btn btn-accent"
             style="margin-top: var(--space-4); width: 100%; justify-content: center;">
            Get a Free Estimate
          </a>

          <!-- Social links -->
          <?php if (array_filter([$socialLinks['facebook'], $socialLinks['instagram'], $socialLinks['google']])): ?>
          <div style="display: flex; gap: var(--space-3); margin-top: var(--space-4);">
            <?php if ($socialLinks['facebook']): ?>
            <a href="<?php echo htmlspecialchars($socialLinks['facebook'], ENT_QUOTES, 'UTF-8'); ?>"
               target="_blank" rel="noopener noreferrer" aria-label="Keep N Kleen on Facebook"
               style="color: rgba(255,255,255,0.6); transition: color var(--transition-fast);"
               onmouseover="this.style.color='var(--color-accent)'" onmouseout="this.style.color='rgba(255,255,255,0.6)'">
              <i data-lucide="facebook" aria-hidden="true" style="width:20px;height:20px;"></i>
            </a>
            <?php endif; ?>
            <?php if ($socialLinks['instagram']): ?>
            <a href="<?php echo htmlspecialchars($socialLinks['instagram'], ENT_QUOTES, 'UTF-8'); ?>"
               target="_blank" rel="noopener noreferrer" aria-label="Keep N Kleen on Instagram"
               style="color: rgba(255,255,255,0.6); transition: color var(--transition-fast);"
               onmouseover="this.style.color='var(--color-accent)'" onmouseout="this.style.color='rgba(255,255,255,0.6)'">
              <i data-lucide="instagram" aria-hidden="true" style="width:20px;height:20px;"></i>
            </a>
            <?php endif; ?>
            <?php if ($socialLinks['google']): ?>
            <a href="<?php echo htmlspecialchars($socialLinks['google'], ENT_QUOTES, 'UTF-8'); ?>"
               target="_blank" rel="noopener noreferrer" aria-label="Keep N Kleen on Google"
               style="color: rgba(255,255,255,0.6); transition: color var(--transition-fast);"
               onmouseover="this.style.color='var(--color-accent)'" onmouseout="this.style.color='rgba(255,255,255,0.6)'">
              <i data-lucide="map" aria-hidden="true" style="width:20px;height:20px;"></i>
            </a>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>

      </div><!-- /.footer-grid -->
    </div><!-- /.container -->
  </div><!-- /.footer-top -->

  <!-- ── AEO Entity Block ─────────────────────────────────────────────────── -->
  <div class="container">
    <div class="footer-entity"
         itemscope
         itemtype="https://schema.org/LocalBusiness">
      <meta itemprop="name"      content="<?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?>">
      <meta itemprop="url"       content="<?php echo htmlspecialchars($canonicalBase, ENT_QUOTES, 'UTF-8'); ?>">
      <?php if ($phone): ?>
      <meta itemprop="telephone" content="<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>">
      <?php endif; ?>
      <h5>About <?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?></h5>
      <p itemprop="description">
        <?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?> is a professional cleaning company
        based in <?php echo htmlspecialchars($address['city'] . ', ' . $address['state'], ENT_QUOTES, 'UTF-8'); ?>,
        serving communities across Virginia and North Carolina. Founded in <?php echo $yearEstablished; ?> with
        <?php echo $yearsInBusiness; ?> years in business,
        <?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?> specializes in maid services, regular
        home cleaning, move-in/move-out cleaning, and post-construction cleanup.
        <?php if ($phone): ?>Contact: <a href="tel:<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>" itemprop="telephone"><?php echo htmlspecialchars($phoneFormatted ?: formatPhone($phone), ENT_QUOTES, 'UTF-8'); ?></a><?php endif; ?>
        <?php if ($email): ?> | <a href="mailto:<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>" itemprop="email"><?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></a><?php endif; ?>
        | <a href="<?php echo htmlspecialchars($canonicalBase, ENT_QUOTES, 'UTF-8'); ?>" itemprop="url"><?php echo htmlspecialchars($domain, ENT_QUOTES, 'UTF-8'); ?></a>.
        Licensed and insured.
      </p>
    </div>
  </div>

  <!-- ── Footer Bottom Bar ───────────────────────────────────────────────── -->
  <div class="footer-bottom container">
    <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?>. All rights reserved.</p>
    <p class="footer-credit">
      <a href="https://pageoneinsights.com" rel="dofollow noopener noreferrer" target="_blank">
        Web Design &amp; Hosting by Page One Insights, LLC
      </a>
    </p>
  </div>

</footer><!-- /.site-footer -->

<!-- Back to Top -->
<button class="back-to-top" id="back-to-top" aria-label="Scroll back to top">
  <i data-lucide="arrow-up" aria-hidden="true" style="width:18px;height:18px;"></i>
</button>

<!-- Floating Mobile CTA Bar -->
<div class="mobile-cta-bar" role="complementary" aria-label="Quick contact">
  <?php if ($phone): ?>
  <a href="tel:<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-accent">
    <i data-lucide="phone" aria-hidden="true" style="width:16px;height:16px;margin-right:4px;"></i>
    Call Now
  </a>
  <?php endif; ?>
  <a href="/contact" class="btn btn-primary">
    Free Estimate
  </a>
</div>

<!-- Scripts: core, animations, effects -->
<script src="/assets/js/main.js" defer></script>
<script src="/assets/js/animations.js" defer></script>
<script src="/assets/js/effects.js" defer></script>

<!-- Swiper (conditional) -->
<?php if (isset($useSwiper) && $useSwiper): ?>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
<?php endif; ?>

<!-- VanillaTilt -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js" defer></script>

<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>

<script>
(function () {
  'use strict';

  // ── Lucide icon init ──────────────────────────────────────────────────────
  if (typeof lucide !== 'undefined') {
    lucide.createIcons();
  }

  // ── Back-to-top visibility (supplements main.js) ──────────────────────────
  var btt = document.getElementById('back-to-top');
  if (btt) {
    window.addEventListener('scroll', function () {
      btt.classList.toggle('visible', window.scrollY > 300);
    }, { passive: true });
    btt.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // ── Close mobile menu on overlay tap ─────────────────────────────────────
  var navList   = document.getElementById('main-nav');
  var hamburger = document.getElementById('hamburger-btn');
  if (navList && hamburger) {
    navList.addEventListener('click', function (e) {
      // Only close if the click landed directly on the overlay (not a child)
      if (e.target === navList) {
        navList.classList.remove('active');
        hamburger.classList.remove('active');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }
    });
  }

  // ── Mobile services dropdown toggle ──────────────────────────────────────
  var serviceToggle = document.getElementById('services-nav-toggle');
  if (serviceToggle) {
    serviceToggle.addEventListener('click', function (e) {
      if (window.innerWidth <= 768) {
        e.preventDefault();
        var menu = this.nextElementSibling;
        if (menu) {
          var isOpen = menu.classList.toggle('mobile-open');
          this.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        }
      }
    });
  }

  // ── VanillaTilt on cards ──────────────────────────────────────────────────
  if (typeof VanillaTilt !== 'undefined') {
    VanillaTilt.init(document.querySelectorAll('.card, .service-card'), {
      max:       8,
      speed:     400,
      glare:     true,
      'max-glare': 0.15,
    });
  }

})();
</script>

</body>
</html>
