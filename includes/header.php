<?php
/**
 * header.php — Site-wide navigation header
 * Keep N Kleen | Page One Insights
 *
 * Outputs: skip-to-content link, <header>, glassmorphism navbar,
 *          desktop + mobile nav, then opens <main id="main-content">.
 *
 * Requires config.php and functions.php to already be loaded (head.php handles this).
 */

// Convenience: resolve active page once
$_activePage = isset($currentPage) ? $currentPage : '';
?>
<a href="#main-content" class="skip-link">Skip to main content</a>

<header class="site-header" data-header>
  <div class="header-inner container">

    <!-- Logo -->
    <a href="/" class="site-logo" aria-label="<?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?> — Home">
      <img src="<?php echo htmlspecialchars($logoUrl, ENT_QUOTES, 'UTF-8'); ?>"
           alt="<?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?> logo"
           width="40" height="40" loading="eager">
      <span>
        <span class="logo-name">
          <span class="logo-mark">Keep</span> N Kleen
        </span>
        <span class="logo-tagline"><?php echo htmlspecialchars($tagline, ENT_QUOTES, 'UTF-8'); ?></span>
      </span>
    </a>

    <!-- Desktop + Mobile Nav -->
    <nav aria-label="Main navigation">
      <ul class="nav-links" id="main-nav" role="list">

        <!-- Home -->
        <li>
          <a href="/"
             <?php if ($_activePage === 'home'): ?>aria-current="page"<?php endif; ?>>
            Home
          </a>
        </li>

        <!-- Services (dropdown on desktop, expandable on mobile) -->
        <li class="nav-dropdown">
          <a href="/services"
             id="services-nav-toggle"
             aria-haspopup="true"
             aria-expanded="false"
             <?php if ($_activePage === 'services'): ?>aria-current="page"<?php endif; ?>>
            Services
          </a>
          <ul class="nav-dropdown-menu" role="menu" aria-labelledby="services-nav-toggle">
            <?php foreach ($services as $svc): ?>
            <li role="none">
              <a href="/services/<?php echo htmlspecialchars($svc['slug'], ENT_QUOTES, 'UTF-8'); ?>"
                 role="menuitem"
                 <?php if ($_activePage === $svc['slug']): ?>aria-current="page"<?php endif; ?>>
                <?php echo htmlspecialchars($svc['name'], ENT_QUOTES, 'UTF-8'); ?>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </li>

        <!-- Service Area -->
        <li>
          <a href="/service-area"
             <?php if ($_activePage === 'service-area'): ?>aria-current="page"<?php endif; ?>>
            Service Area
          </a>
        </li>

        <!-- About -->
        <li>
          <a href="/about"
             <?php if ($_activePage === 'about'): ?>aria-current="page"<?php endif; ?>>
            About
          </a>
        </li>

        <!-- Contact -->
        <li>
          <a href="/contact"
             <?php if ($_activePage === 'contact'): ?>aria-current="page"<?php endif; ?>>
            Contact
          </a>
        </li>

        <!-- ─── Mobile-only items ──────────────────────────────────── -->
        <?php if ($phone): ?>
        <li class="nav-mobile-only" style="margin-top: 1rem; text-align: center;">
          <a href="tel:<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>"
             class="btn btn-outline-white btn-lg"
             style="width: 260px; justify-content: center; font-size: 1.1rem;">
            <i data-lucide="phone" aria-hidden="true" style="width:18px;height:18px;margin-right:6px;"></i>
            <?php echo htmlspecialchars($phoneFormatted ?: formatPhone($phone), ENT_QUOTES, 'UTF-8'); ?>
          </a>
        </li>
        <?php endif; ?>
        <li class="nav-mobile-only" style="text-align: center;">
          <a href="/contact" class="btn btn-accent btn-lg" style="width: 260px; justify-content: center;">
            Free Estimate
          </a>
        </li>

      </ul>
    </nav>

    <!-- Desktop CTA -->
    <div class="header-cta" style="display: flex; align-items: center; gap: var(--space-3);">
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>"
         style="display: flex; align-items: center; gap: var(--space-1); color: rgba(255,255,255,0.9); font-size: var(--font-size-sm); font-family: var(--font-heading); font-weight: 600; transition: color var(--transition-fast);"
         onmouseover="this.style.color='var(--color-accent)'" onmouseout="this.style.color='rgba(255,255,255,0.9)'">
        <i data-lucide="phone" aria-hidden="true" style="width:15px;height:15px;"></i>
        <?php echo htmlspecialchars($phoneFormatted ?: formatPhone($phone), ENT_QUOTES, 'UTF-8'); ?>
      </a>
      <?php endif; ?>
      <a href="/contact" class="btn btn-accent btn-sm">Free Estimate</a>
    </div>

    <!-- Hamburger (mobile) -->
    <button class="hamburger"
            id="hamburger-btn"
            aria-expanded="false"
            aria-controls="main-nav"
            aria-label="Toggle navigation menu">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </button>

  </div>
</header>

<main id="main-content">
