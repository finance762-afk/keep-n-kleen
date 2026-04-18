<?php
/**
 * services/index.php — Services Listing
 * Keep N Kleen | Page One Insights
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$pageTitle       = 'Cleaning Services Hayes, VA | Keep N Kleen';
$pageDescription = 'Professional cleaning services in Hayes, VA — maid services, move-in/move-out cleaning, regular home cleaning, and post-construction cleanup. Keep N Kleen serves Virginia since 2021.';
$canonicalUrl    = $canonicalBase . '/services';
$ogImage         = $clientImages[0]['url'];
$currentPage     = 'services';

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'           => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $canonicalBase],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $canonicalBase . '/services'],
            ],
        ],
        [
            '@type'       => 'OfferCatalog',
            'name'        => 'Keep N Kleen Cleaning Services',
            'description' => 'Professional residential and commercial cleaning services in Hayes, VA.',
            'url'         => $canonicalBase . '/services',
            'provider'    => ['@type' => 'LocalBusiness', 'name' => $siteName, 'url' => $canonicalBase],
            'itemListElement' => array_map(function (array $svc) use ($canonicalBase): array {
                return [
                    '@type' => 'Offer',
                    'url'   => $canonicalBase . '/services/' . $svc['slug'],
                    'itemOffered' => [
                        '@type'       => 'Service',
                        'name'        => $svc['name'],
                        'description' => $svc['description'],
                    ],
                ];
            }, $services),
        ],
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ── Services page hero ──────────────────────────────────────────────────── */
.services-page-hero {
  position: relative;
  min-height: 55vh;
  display: flex; align-items: center; justify-content: center;
  text-align: center;
  overflow: hidden;
  padding-top: 80px;
  background-size: cover;
  background-position: center;
}
.services-page-hero::before {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(135deg, rgba(26,43,60,0.92) 0%, rgba(77,94,111,0.82) 100%);
  z-index: 1;
}
.services-page-hero .hero-inner {
  position: relative; z-index: 2;
  max-width: 720px; padding: var(--space-12) var(--space-8);
}
.services-page-hero h1 {
  color: var(--color-white);
  font-size: clamp(2rem, 4.5vw, 3.4rem);
  letter-spacing: -0.02em; line-height: 1.1;
  margin-bottom: var(--space-5);
}
.hero-eyebrow-pill {
  display: inline-flex; align-items: center; gap: var(--space-2);
  font-family: var(--font-heading); font-size: var(--font-size-xs);
  font-weight: 600; text-transform: uppercase; letter-spacing: 3px;
  color: var(--color-accent); margin-bottom: var(--space-5);
  padding: var(--space-1) var(--space-4);
  border: 1px solid rgba(255,255,255,0.2);
  border-radius: var(--radius-full);
}
.hero-sub { color: rgba(255,255,255,0.88); font-size: var(--font-size-lg); line-height: 1.65; margin-bottom: var(--space-8); }
.hero-actions { display: flex; gap: var(--space-4); justify-content: center; flex-wrap: wrap; }

/* Breadcrumb */
.breadcrumb {
  background: var(--color-light); padding: var(--space-3) 0;
  border-bottom: 1px solid var(--color-gray-light);
}
.breadcrumb ol { display: flex; align-items: center; gap: var(--space-2); list-style: none; }
.breadcrumb a { color: var(--color-gray); font-size: var(--font-size-sm); }
.breadcrumb a:hover { color: var(--color-primary); }
.breadcrumb li:last-child span { color: var(--color-primary); font-size: var(--font-size-sm); font-weight: 600; }
.breadcrumb-sep { color: var(--color-gray-light); font-size: var(--font-size-xs); }

/* ── Service cards: large format ─────────────────────────────────────────── */
.service-list { display: flex; flex-direction: column; gap: var(--space-10); }

.service-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  transition: box-shadow var(--transition-base);
  min-height: 380px;
}
.service-row:hover { box-shadow: 0 24px 60px rgba(0,0,0,0.2); }
.service-row.reverse { direction: rtl; }
.service-row.reverse > * { direction: ltr; }

.service-row-image {
  position: relative;
  overflow: hidden;
}
.service-row-image img {
  width: 100%; height: 100%;
  object-fit: cover;
  transition: transform 0.6s ease;
}
.service-row:hover .service-row-image img { transform: scale(1.04); }
.service-row-image-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(135deg, rgba(26,43,60,0.3), rgba(6,182,212,0.15));
}

.service-row-content {
  background: var(--color-white);
  padding: var(--space-10) var(--space-10);
  display: flex; flex-direction: column; justify-content: center;
}
.service-row-eyebrow {
  display: inline-flex; align-items: center; gap: var(--space-2);
  font-family: var(--font-heading); font-size: var(--font-size-xs);
  font-weight: 600; text-transform: uppercase; letter-spacing: 2px;
  color: var(--color-accent); margin-bottom: var(--space-4);
}
.service-row-content h2 {
  font-size: clamp(1.4rem, 2.5vw, 2rem);
  letter-spacing: -0.02em;
  margin-bottom: var(--space-4);
}
.service-row-content p { color: var(--color-gray); line-height: 1.75; margin-bottom: var(--space-4); font-size: var(--font-size-sm); }
.service-row-tags { display: flex; flex-wrap: wrap; gap: var(--space-2); margin-bottom: var(--space-6); }
.service-tag {
  display: inline-flex; align-items: center; gap: 4px;
  background: var(--color-light);
  color: var(--color-gray-dark);
  font-size: var(--font-size-xs);
  font-weight: 600;
  padding: var(--space-1) var(--space-3);
  border-radius: var(--radius-full);
}
.service-tag i { color: var(--color-accent); }

/* ── Additional services grid ────────────────────────────────────────────── */
.extra-services {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-6);
}

/* ── CTA / closing ────────────────────────────────────────────────────────── */
.closing-cta {
  background: linear-gradient(135deg, var(--color-primary) 0%, #243d52 100%);
  position: relative; overflow: hidden; padding: var(--space-16) 0;
}
.closing-cta::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E"); opacity: 0.35;
}
.closing-cta .container { position: relative; z-index: 1; text-align: center; }
.closing-cta h2 { color: white; font-size: clamp(1.8rem,4vw,2.8rem); letter-spacing: -0.02em; margin-bottom: var(--space-4); }
.closing-cta p { color: rgba(255,255,255,0.83); max-width: 52ch; margin: 0 auto var(--space-8); }
.closing-cta-eyebrow {
  display: inline-block; font-family: var(--font-heading); font-size: var(--font-size-xs);
  font-weight: 600; text-transform: uppercase; letter-spacing: 3px;
  color: var(--color-accent); margin-bottom: var(--space-4);
}
.mid-cta-phone {
  display: inline-flex; align-items: center; gap: var(--space-2);
  font-family: var(--font-heading); font-size: clamp(1.4rem,2.8vw,1.9rem);
  font-weight: 800; color: white; margin-bottom: var(--space-5);
}
.mid-cta-phone:hover { color: var(--color-accent); }
.mid-cta-eyebrow {
  display: block; font-family: var(--font-heading); font-size: var(--font-size-xs);
  font-weight: 600; text-transform: uppercase; letter-spacing: 3px;
  color: rgba(255,255,255,0.65); margin-bottom: var(--space-4);
}

/* Responsive */
@media (max-width: 1023px) {
  .service-row { grid-template-columns: 1fr; min-height: auto; }
  .service-row.reverse { direction: ltr; }
  .service-row-image { min-height: 260px; }
  .extra-services { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 767px) {
  .extra-services { grid-template-columns: 1fr; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ── BREADCRUMB ────────────────────────────────────────────────────────── -->
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><span class="breadcrumb-sep" aria-hidden="true">›</span></li>
      <li><span aria-current="page">Services</span></li>
    </ol>
  </div>
</nav>

<!-- ── PAGE HERO (CTA #1) ────────────────────────────────────────────────── -->
<section class="services-page-hero"
         style="background-image: url('<?php echo htmlspecialchars($clientImages[0]['url'], ENT_QUOTES, 'UTF-8'); ?>');"
         aria-label="Keep N Kleen Cleaning Services">

  <div class="hero-inner">
    <div class="hero-eyebrow-pill">
      <i data-lucide="sparkles" aria-hidden="true" style="width:13px;height:13px;"></i>
      Cleaning Services · Hayes, VA
    </div>

    <h1>Every Service You Need to Keep Your Space Spotless</h1>

    <p class="hero-sub">
      From weekly maid service and move-out cleans to post-construction debris removal —
      Keep N Kleen handles residential and commercial cleaning across Virginia.
    </p>

    <div class="hero-actions">
      <a href="/contact" class="btn btn-accent btn-lg">
        <i data-lucide="calendar" aria-hidden="true" style="width:18px;height:18px;"></i>
        Get a Free Estimate
      </a>
      <a href="#services-list" class="btn btn-outline-white">
        Browse Services
        <i data-lucide="arrow-down" aria-hidden="true" style="width:16px;height:16px;"></i>
      </a>
    </div>
  </div>
</section>

<!-- ── TICKER ────────────────────────────────────────────────────────────── -->
<div class="ticker-strip" aria-hidden="true" role="presentation">
  <div class="ticker-track">
    <?php
    $items = [
        ['icon' => 'sparkles',      'text' => 'Maid Services Hayes VA'],
        ['icon' => 'truck',         'text' => 'Move-Out Cleaning'],
        ['icon' => 'repeat',        'text' => 'Regular Home Cleaning'],
        ['icon' => 'hard-hat',      'text' => 'Post-Construction Cleanup'],
        ['icon' => 'shield-check',  'text' => 'Licensed &amp; Insured'],
        ['icon' => 'leaf',          'text' => 'Eco-Friendly Options'],
        ['icon' => 'star',          'text' => '5.0 Google Rating'],
        ['icon' => 'map-pin',       'text' => 'Serving Virginia Since 2021'],
    ];
    $all = array_merge($items, $items);
    foreach ($all as $t):
    ?>
    <span style="display:inline-flex;align-items:center;gap:6px;white-space:nowrap;">
      <i data-lucide="<?php echo $t['icon']; ?>" style="width:13px;height:13px;flex-shrink:0;"></i>
      <?php echo $t['text']; ?>
    </span>
    <span style="color:rgba(255,255,255,0.45);margin:0 var(--space-2);" aria-hidden="true">✦</span>
    <?php endforeach; ?>
  </div>
</div>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-white);
     clip-path:polygon(0 30%,100% 0,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── INTRO (editorial / constrained) ───────────────────────────────────── -->
<section style="background:var(--color-white);padding:var(--space-12) 0 var(--space-6);">
  <div class="container-narrow" data-animate="fade-up">
    <span class="eyebrow" style="color:var(--color-primary);">What We Offer</span>
    <h2 style="font-size:clamp(1.8rem,3.5vw,2.5rem);letter-spacing:-0.02em;margin-bottom:var(--space-5);">
      Cleaning Services Built for Real Life in Hayes, VA
    </h2>
    <p style="color:var(--color-gray);line-height:1.75;">
      Whether you need reliable weekly maintenance, a one-time deep clean before a showing,
      a thorough move-out to recover your deposit, or final-stage construction cleanup for
      a renovation project — Keep N Kleen has served Virginia homes and businesses since
      <?php echo $yearEstablished; ?> with the same standard: thorough, reliable, and accountable.
    </p>
    <p style="color:var(--color-gray);line-height:1.75;">
      Browse our services below. Each one links to a dedicated page with full details,
      what's included, our process, and answers to common questions.
    </p>
  </div>
</section>

<!-- ── SERVICES LIST ─────────────────────────────────────────────────────── -->
<section id="services-list" style="background:var(--color-white);padding:var(--space-6) 0 var(--space-16);">
  <div class="container">
    <div class="service-list">

      <?php
      // Service-specific config for the listing page
      $serviceListData = [
          'maid-services' => [
              'icon'    => 'sparkles',
              'image'   => $clientImages[9]['url'],
              'alt'     => 'Professional maid services Hayes VA',
              'tags'    => ['Residential', 'Weekly · Bi-Weekly', 'Eco-Friendly', 'Trained Crew'],
              'blurb'   => 'Our signature residential service. Every room, every visit — kitchens, bathrooms, bedrooms, living areas — cleaned to a consistent standard. We document your preferences after the first visit so the crew knows your home, not just your address.',
              'cta'     => 'Explore Maid Services',
          ],
          'move-in-move-out-cleaning' => [
              'icon'    => 'truck',
              'image'   => $clientImages[7]['url'],
              'alt'     => 'Move-out cleaning services Hayes VA',
              'tags'    => ['Move-Out', 'Move-In', 'Deposit Recovery', 'Appliance Interiors'],
              'blurb'   => 'A move-out clean that covers the zones that matter to landlords — inside appliances, cabinet interiors, baseboards, window tracks, and all floor surfaces. Thorough enough to help recover your full security deposit. Move-in cleans prep the space so you arrive to a genuinely fresh start.',
              'cta'     => 'Explore Move Cleaning',
          ],
          'regular-home-cleaning' => [
              'icon'    => 'repeat',
              'image'   => $clientImages[6]['url'],
              'alt'     => 'Weekly bi-weekly home cleaning Hayes VA',
              'tags'    => ['Weekly', 'Bi-Weekly', 'Monthly', 'Same Crew'],
              'blurb'   => 'Weekly, bi-weekly, or monthly recurring cleaning that keeps your home consistently maintained. Same crew, same checklist, same standard — every visit. Our bi-weekly plan is our most popular and suits the majority of Virginia homes.',
              'cta'     => 'Explore Regular Cleaning',
          ],
          'post-construction-cleaning' => [
              'icon'    => 'hard-hat',
              'image'   => $clientImages[8]['url'],
              'alt'     => 'Post-construction cleaning Hayes VA renovation',
              'tags'    => ['New Builds', 'Renovation', 'Commercial', 'HEPA Equipment'],
              'blurb'   => 'Construction dust, debris, and residue require a different approach. We use commercial-grade equipment and trained protocols to remove drywall dust, adhesive residue, paint overspray, and all construction mess — leaving your space ready for occupancy or client walkthrough.',
              'cta'     => 'Explore Post-Construction',
          ],
      ];
      $reversed = false;
      foreach ($services as $i => $svc):
          $extra = $serviceListData[$svc['slug']] ?? [];
          $imgUrl = $extra['image'] ?? $clientImages[$i % count($clientImages)]['url'];
          $imgAlt = $extra['alt']   ?? 'Keep N Kleen ' . $svc['name'] . ' Hayes VA';
      ?>

      <div class="service-row <?php echo $reversed ? 'reverse' : ''; ?>" data-animate="fade-up">

        <div class="service-row-image">
          <picture>
            <source srcset="<?php echo htmlspecialchars($imgUrl, ENT_QUOTES, 'UTF-8'); ?>" type="image/jpeg">
            <img src="<?php echo htmlspecialchars($imgUrl, ENT_QUOTES, 'UTF-8'); ?>"
                 alt="<?php echo htmlspecialchars($imgAlt, ENT_QUOTES, 'UTF-8'); ?>"
                 width="600" height="400"
                 loading="lazy">
          </picture>
          <div class="service-row-image-overlay" aria-hidden="true"></div>
        </div>

        <div class="service-row-content">
          <div class="service-row-eyebrow">
            <i data-lucide="<?php echo ($extra['icon'] ?? 'sparkles'); ?>"
               aria-hidden="true" style="width:14px;height:14px;"></i>
            <?php echo htmlspecialchars($svc['name'], ENT_QUOTES, 'UTF-8'); ?>
          </div>

          <h2><?php echo htmlspecialchars($svc['name'], ENT_QUOTES, 'UTF-8'); ?></h2>

          <p><?php echo htmlspecialchars($extra['blurb'] ?? $svc['description'], ENT_QUOTES, 'UTF-8'); ?></p>

          <?php if (!empty($extra['tags'])): ?>
          <div class="service-row-tags">
            <?php foreach ($extra['tags'] as $tag): ?>
            <span class="service-tag">
              <i data-lucide="check" aria-hidden="true" style="width:11px;height:11px;"></i>
              <?php echo htmlspecialchars($tag, ENT_QUOTES, 'UTF-8'); ?>
            </span>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>

          <a href="/services/<?php echo htmlspecialchars($svc['slug'], ENT_QUOTES, 'UTF-8'); ?>"
             class="btn btn-primary">
            <?php echo htmlspecialchars($extra['cta'] ?? 'Learn More', ENT_QUOTES, 'UTF-8'); ?>
            <i data-lucide="arrow-right" aria-hidden="true" style="width:16px;height:16px;"></i>
          </a>
        </div>

      </div>

      <?php $reversed = !$reversed; endforeach; ?>
    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-primary);
     clip-path:polygon(0 0,100% 65%,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── MID-PAGE CTA (CTA #2) ─────────────────────────────────────────────── -->
<div class="cta-banner" role="complementary" aria-label="Get a free estimate">
  <div class="container" data-animate="fade-up">
    <span class="mid-cta-eyebrow">Not Sure Which Service Fits?</span>
    <h2 style="color:white;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);">
      Tell Us About Your Space — We'll Recommend the Right Plan
    </h2>
    <p style="color:rgba(255,255,255,0.85);max-width:52ch;margin:0 auto var(--space-5);">
      Every home and situation is different. Contact us and we'll walk through your options —
      free estimate, no commitment.
    </p>
    <?php if ($phone): ?>
    <div>
      <a href="tel:<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>" class="mid-cta-phone">
        <i data-lucide="phone" aria-hidden="true" style="width:24px;height:24px;"></i>
        <?php echo htmlspecialchars($phoneFormatted ?: formatPhone($phone), ENT_QUOTES, 'UTF-8'); ?>
      </a>
    </div>
    <?php endif; ?>
    <a href="/contact" class="btn btn-outline-white btn-lg">
      Get a Free Estimate
      <i data-lucide="arrow-right" aria-hidden="true" style="width:18px;height:18px;"></i>
    </a>
  </div>
</div>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-light);
     clip-path:polygon(0 0,100% 0,100% 100%,0 70%);margin-top:-2px;"></div>

<!-- ── TRUST STRIP ────────────────────────────────────────────────────────── -->
<section style="background:var(--color-light);padding:var(--space-12) 0;">
  <div class="container">
    <div class="section-header" data-animate="fade-up" style="margin-bottom:var(--space-8);">
      <span class="eyebrow">Why Keep N Kleen</span>
      <h2>Every Service, the Same Standard</h2>
    </div>

    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:var(--space-6);" data-animate="fade-up">

      <div style="text-align:center;padding:var(--space-8);background:var(--color-white);border-radius:var(--radius-lg);box-shadow:var(--shadow-card);">
        <div style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,var(--color-primary),var(--color-secondary));display:flex;align-items:center;justify-content:center;margin:0 auto var(--space-4);color:var(--color-accent);">
          <i data-lucide="shield-check" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3 style="font-size:var(--font-size-base);margin-bottom:var(--space-2);">Licensed &amp; Insured</h3>
        <p style="font-size:var(--font-size-sm);color:var(--color-gray);margin:0;">Every job, every crew member, every visit. You're covered.</p>
      </div>

      <div style="text-align:center;padding:var(--space-8);background:var(--color-white);border-radius:var(--radius-lg);box-shadow:var(--shadow-card);">
        <div style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,var(--color-primary),var(--color-secondary));display:flex;align-items:center;justify-content:center;margin:0 auto var(--space-4);color:var(--color-accent);">
          <i data-lucide="leaf" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3 style="font-size:var(--font-size-base);margin-bottom:var(--space-2);">Eco-Friendly Options</h3>
        <p style="font-size:var(--font-size-sm);color:var(--color-gray);margin:0;">Safe, effective products — with eco alternatives for sensitive homes.</p>
      </div>

      <div style="text-align:center;padding:var(--space-8);background:var(--color-white);border-radius:var(--radius-lg);box-shadow:var(--shadow-card);">
        <div style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,var(--color-primary),var(--color-secondary));display:flex;align-items:center;justify-content:center;margin:0 auto var(--space-4);color:var(--color-accent);">
          <i data-lucide="calendar-check" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3 style="font-size:var(--font-size-base);margin-bottom:var(--space-2);">Serving VA Since <?php echo $yearEstablished; ?></h3>
        <p style="font-size:var(--font-size-sm);color:var(--color-gray);margin:0;"><?php echo $yearsInBusiness; ?>+ years of consistent, reliable service across Virginia.</p>
      </div>

    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-primary);
     clip-path:polygon(0 60%,100% 0,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── CLOSING CTA (CTA #3) ───────────────────────────────────────────────── -->
<section class="closing-cta" aria-label="Get started with Keep N Kleen">
  <div class="container" data-animate="fade-up">
    <span class="closing-cta-eyebrow">Ready to Book?</span>
    <h2>Free Estimates · No Commitment · Same-Week Availability</h2>
    <p>Keep N Kleen serves Hayes and communities across Virginia. Tell us what you need —
       we'll find the right service and get you on the schedule.</p>

    <?php if ($phone): ?>
    <div style="margin-bottom:var(--space-6);">
      <a href="tel:<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>"
         style="display:inline-flex;align-items:center;gap:var(--space-2);
                font-family:var(--font-heading);
                font-size:clamp(1.25rem,2.5vw,1.75rem);
                font-weight:800;color:var(--color-accent);"
         onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--color-accent)'">
        <i data-lucide="phone" aria-hidden="true" style="width:22px;height:22px;"></i>
        <?php echo htmlspecialchars($phoneFormatted ?: formatPhone($phone), ENT_QUOTES, 'UTF-8'); ?>
      </a>
    </div>
    <?php endif; ?>

    <div style="display:flex;gap:var(--space-4);justify-content:center;flex-wrap:wrap;">
      <a href="/contact" class="btn btn-accent btn-lg">
        Get My Free Estimate
        <i data-lucide="arrow-right" aria-hidden="true" style="width:18px;height:18px;"></i>
      </a>
      <a href="/about" class="btn btn-outline-white btn-lg">
        About Keep N Kleen
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
