<?php
/**
 * services/maid-services.php — Maid Services
 * Keep N Kleen | Page One Insights
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$pageTitle       = 'Maid Services Hayes, VA | Keep N Kleen';
$pageDescription = 'Professional maid services in Hayes, VA. Keep N Kleen delivers thorough residential cleaning — kitchens, baths, bedrooms & more. Trained crews, eco-friendly options. Free estimates.';
$canonicalUrl    = $canonicalBase . '/services/maid-services';
$ogImage         = $clientImages[9]['url'];
$currentPage     = 'maid-services';
$heroImagePreload = $clientImages[9]['url'];

$pageFaqs = [
    [
        'q' => 'What does a maid service visit include?',
        'a' => 'Every visit covers kitchens (countertops, sink, exterior appliances, stovetop), all bathrooms (toilet, tub/shower, vanity, mirrors), bedrooms (dusting, vacuuming, surfaces), living areas (vacuuming, mopping, dusting), and baseboards throughout. We follow a consistent checklist so nothing gets skipped.',
    ],
    [
        'q' => 'Do I need to be home during the cleaning?',
        'a' => 'No — most of our regular clients provide access and leave for the day. We\'re background-checked and fully insured. If you prefer to be present for the first visit to walk us through your priorities, that works too.',
    ],
    [
        'q' => 'Can I customize which rooms get priority?',
        'a' => 'Absolutely. Before your first visit, we discuss your home\'s layout, your must-clean zones, and any areas to skip or approach carefully. We document your preferences so every recurring visit follows the same priorities.',
    ],
    [
        'q' => 'How is maid service different from a deep clean?',
        'a' => 'Maid service covers your home\'s regular maintenance — the surfaces, floors, and fixtures that need attention each visit. A deep clean goes further: inside appliances, behind furniture, inside cabinets, and detail-level scrubbing. Many clients start with a deep clean and then continue with regular maid service.',
    ],
];

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'           => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $canonicalBase],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $canonicalBase . '/services'],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Maid Services', 'item' => $canonicalBase . '/services/maid-services'],
            ],
        ],
        [
            '@type'       => 'Service',
            'name'        => 'Maid Services',
            'description' => 'Professional residential maid services in Hayes, VA. Thorough home cleaning including kitchens, bathrooms, bedrooms, and living areas. Trained crews with eco-friendly options.',
            'serviceType' => 'Maid Services',
            'url'         => $canonicalBase . '/services/maid-services',
            'provider'    => ['@type' => 'LocalBusiness', 'name' => $siteName, 'url' => $canonicalBase],
            'areaServed'  => ['@type' => 'City', 'name' => 'Hayes, Virginia'],
        ],
        [
            '@type'       => 'AggregateRating',
            'itemReviewed'=> ['@type' => 'LocalBusiness', 'name' => $siteName],
            'ratingValue' => '5.0',
            'reviewCount' => '24',
            'bestRating'  => '5',
        ],
        [
            '@type' => 'HowTo',
            'name'  => 'How Our Maid Service Works',
            'step'  => [
                ['@type' => 'HowToStep', 'position' => 1, 'name' => 'Book Online or Call', 'text' => 'Tell us about your home size, preferred schedule, and any specific cleaning priorities.'],
                ['@type' => 'HowToStep', 'position' => 2, 'name' => 'We Confirm & Customize', 'text' => 'We review your home profile, confirm your checklist preferences, and schedule your crew.'],
                ['@type' => 'HowToStep', 'position' => 3, 'name' => 'Thorough Clean', 'text' => 'Your crew arrives on time, follows your customized checklist, and cleans every room to standard.'],
                ['@type' => 'HowToStep', 'position' => 4, 'name' => 'Walk-Through & Done', 'text' => 'Before leaving, we verify the result meets our quality standard — and yours.'],
            ],
        ],
        generateFAQSchema($pageFaqs),
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ── Page Hero (service pages) ───────────────────────────────────────────── */
.page-hero {
  position: relative;
  min-height: 62vh;
  display: grid;
  grid-template-columns: 1fr 1fr;
  align-items: center;
  overflow: hidden;
  padding-top: 80px;
}
.page-hero-content {
  position: relative; z-index: 2;
  padding: var(--space-16) 0 var(--space-16) 5%;
  max-width: 640px;
}
.page-hero-bg {
  position: absolute; inset: 0;
  background: var(--color-primary);
}
.page-hero-bg::after {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(90deg, rgba(26,43,60,0.97) 40%, rgba(26,43,60,0.6) 100%);
  z-index: 1;
}
.page-hero-image-side {
  position: absolute;
  right: 0; top: 0; bottom: 0;
  width: 55%;
  background-size: cover;
  background-position: center;
}
.page-hero h1 {
  color: var(--color-white);
  font-size: clamp(2rem, 4.5vw, 3.4rem);
  letter-spacing: -0.02em;
  line-height: 1.12;
  margin-bottom: var(--space-5);
}
.page-hero-sub {
  color: rgba(255,255,255,0.85);
  font-size: var(--font-size-base);
  line-height: 1.65;
  margin-bottom: var(--space-8);
  max-width: 50ch;
}
.page-hero-eyebrow {
  display: inline-flex; align-items: center; gap: var(--space-2);
  font-family: var(--font-heading); font-size: var(--font-size-xs);
  font-weight: 600; text-transform: uppercase; letter-spacing: 3px;
  color: var(--color-accent); margin-bottom: var(--space-5);
  padding: var(--space-1) var(--space-3);
  border: 1px solid rgba(255,255,255,0.2);
  border-radius: var(--radius-full);
}
.page-hero-actions { display: flex; gap: var(--space-3); flex-wrap: wrap; }

/* Breadcrumb */
.breadcrumb {
  background: var(--color-light); padding: var(--space-3) 0;
  border-bottom: 1px solid var(--color-gray-light);
}
.breadcrumb ol { display: flex; align-items: center; gap: var(--space-2); list-style: none; }
.breadcrumb li { display: flex; align-items: center; gap: var(--space-2); }
.breadcrumb a { color: var(--color-gray); font-size: var(--font-size-sm); }
.breadcrumb a:hover { color: var(--color-primary); }
.breadcrumb li:last-child span { color: var(--color-primary); font-size: var(--font-size-sm); font-weight: 600; }
.breadcrumb-sep { color: var(--color-gray-light); font-size: var(--font-size-xs); }

/* ── Service Detail Section ───────────────────────────────────────────────── */
.service-detail-split {
  display: grid;
  grid-template-columns: 5fr 4fr;
  gap: var(--space-12);
  align-items: start;
}
.service-detail-content h2 {
  font-size: clamp(1.8rem, 3.5vw, 2.5rem);
  letter-spacing: -0.02em;
  margin-bottom: var(--space-5);
}
.service-detail-content p { color: var(--color-gray); line-height: 1.75; margin-bottom: var(--space-4); max-width: 62ch; }
.last-updated {
  font-size: var(--font-size-xs);
  color: var(--color-gray);
  font-style: italic;
  margin-top: var(--space-6);
}

/* Checklist columns */
.checklist-2col {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3) var(--space-6);
  margin-top: var(--space-6);
}
.checklist-item {
  display: flex; align-items: flex-start; gap: var(--space-2);
  font-size: var(--font-size-sm); color: var(--color-gray-dark); line-height: 1.5;
}
.checklist-item i { color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }

/* Signature photo with overlapping stat card */
.service-photo-wrap {
  position: relative;
  padding-top: var(--space-6);
}
.service-photo-frame {
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  aspect-ratio: 4/5;
}
.service-photo-frame img { width: 100%; height: 100%; object-fit: cover; }
.service-stat-card {
  position: absolute;
  bottom: -20px;
  right: -16px;
  background: var(--color-accent);
  color: white;
  border-radius: var(--radius-lg);
  padding: var(--space-5) var(--space-6);
  box-shadow: var(--shadow-xl);
  text-align: center;
  min-width: 140px;
  z-index: 2;
}
.service-stat-card .sc-num {
  font-family: var(--font-heading);
  font-size: var(--font-size-4xl);
  font-weight: 800;
  line-height: 1;
}
.service-stat-card .sc-label {
  font-size: var(--font-size-xs);
  text-transform: uppercase;
  letter-spacing: 0.08em;
  margin-top: var(--space-1);
  opacity: 0.92;
}
.service-photo-accent {
  position: absolute;
  top: 0; left: -12px;
  width: 80px; height: 80px;
  background: var(--color-primary);
  border-radius: var(--radius-xl);
  z-index: 0;
  opacity: 0.12;
}

/* ── Why Choose section ─────────────────────────────────────────────────── */
.why-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--space-6);
}
.why-card {
  background: var(--color-white);
  border-radius: var(--radius-lg);
  padding: var(--space-8);
  box-shadow: var(--shadow-card);
  border-left: 4px solid var(--color-accent);
  display: flex; gap: var(--space-5); align-items: flex-start;
  transition: box-shadow var(--transition-base);
}
.why-card:hover { box-shadow: var(--shadow-lg); }
.why-icon {
  flex-shrink: 0;
  width: 52px; height: 52px;
  border-radius: var(--radius-md);
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  display: flex; align-items: center; justify-content: center;
  color: var(--color-accent);
}
.why-card h3 { font-size: var(--font-size-base); margin-bottom: var(--space-2); }
.why-card p { color: var(--color-gray); font-size: var(--font-size-sm); margin: 0; line-height: 1.6; }

/* ── Process steps ──────────────────────────────────────────────────────── */
.process-horizontal {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-6);
  position: relative;
}
.process-horizontal::before {
  content: '';
  position: absolute;
  top: 28px; left: 10%; right: 10%;
  height: 2px;
  background: linear-gradient(90deg, var(--color-accent), var(--color-primary));
  z-index: 0;
}
.process-step-v {
  text-align: center;
  position: relative; z-index: 1;
}
.process-num-circle {
  width: 56px; height: 56px;
  border-radius: var(--radius-full);
  background: var(--color-primary);
  color: var(--color-white);
  font-family: var(--font-heading);
  font-size: var(--font-size-xl);
  font-weight: 800;
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-4);
  border: 3px solid var(--color-accent);
}
.process-step-v h3 { font-size: var(--font-size-base); margin-bottom: var(--space-2); }
.process-step-v p { font-size: var(--font-size-sm); color: var(--color-gray); line-height: 1.6; margin: 0; }

/* ── CTA banner (mid-page) ──────────────────────────────────────────────── */
.mid-cta-phone {
  display: inline-flex; align-items: center; gap: var(--space-2);
  font-family: var(--font-heading);
  font-size: clamp(1.4rem, 2.8vw, 1.9rem);
  font-weight: 800; color: white; margin-bottom: var(--space-5);
}
.mid-cta-phone:hover { color: var(--color-accent); }
.mid-cta-eyebrow {
  display: block;
  font-family: var(--font-heading); font-size: var(--font-size-xs);
  font-weight: 600; text-transform: uppercase; letter-spacing: 3px;
  color: rgba(255,255,255,0.65); margin-bottom: var(--space-4);
}

/* ── Closing CTA ──────────────────────────────────────────────────────────*/
.closing-cta {
  background: linear-gradient(135deg, var(--color-primary) 0%, #243d52 100%);
  position: relative; overflow: hidden; padding: var(--space-16) 0;
}
.closing-cta::before {
  content: '';
  position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.35;
}
.closing-cta .container { position: relative; z-index: 1; text-align: center; }
.closing-cta h2 { color: white; font-size: clamp(1.8rem,4vw,2.8rem); letter-spacing: -0.02em; margin-bottom: var(--space-4); }
.closing-cta p { color: rgba(255,255,255,0.83); max-width: 52ch; margin: 0 auto var(--space-8); }
.closing-cta-eyebrow {
  display: inline-block;
  font-family: var(--font-heading); font-size: var(--font-size-xs);
  font-weight: 600; text-transform: uppercase; letter-spacing: 3px;
  color: var(--color-accent); margin-bottom: var(--space-4);
}

/* Responsive */
@media (max-width: 1023px) {
  .page-hero { grid-template-columns: 1fr; min-height: auto; }
  .page-hero-image-side { display: none; }
  .page-hero-content { padding: var(--space-12) 5%; max-width: 100%; }
  .service-detail-split { grid-template-columns: 1fr; }
  .service-photo-wrap { padding-top: 0; margin-top: var(--space-8); }
  .service-stat-card { right: var(--space-4); bottom: var(--space-4); }
  .process-horizontal { grid-template-columns: 1fr 1fr; }
  .process-horizontal::before { display: none; }
}
@media (max-width: 767px) {
  .why-grid { grid-template-columns: 1fr; }
  .checklist-2col { grid-template-columns: 1fr; }
  .process-horizontal { grid-template-columns: 1fr; }
  .service-stat-card { position: static; display: inline-block; margin-top: var(--space-4); }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ── BREADCRUMB ────────────────────────────────────────────────────────── -->
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><span class="breadcrumb-sep" aria-hidden="true">›</span></li>
      <li><a href="/services">Services</a></li>
      <li><span class="breadcrumb-sep" aria-hidden="true">›</span></li>
      <li><span aria-current="page">Maid Services</span></li>
    </ol>
  </div>
</nav>

<!-- ── PAGE HERO (CTA #1) ────────────────────────────────────────────────── -->
<section class="page-hero" aria-label="Maid Services in Hayes, VA">
  <div class="page-hero-bg" aria-hidden="true">
    <div class="page-hero-image-side"
         style="background-image: url('<?php echo htmlspecialchars($clientImages[9]['url'], ENT_QUOTES, 'UTF-8'); ?>');"
         aria-hidden="true"></div>
  </div>

  <div class="page-hero-content">
    <div class="page-hero-eyebrow">
      <i data-lucide="sparkles" aria-hidden="true" style="width:13px;height:13px;"></i>
      Maid Services · Hayes, VA
    </div>

    <h1>Spotless Rooms.<br>Consistent Results.</h1>

    <p class="page-hero-sub">
      Every visit, your home gets the same thorough attention — trained crew, proper products,
      a room-by-room checklist. No cutting corners, no guesswork.
    </p>

    <div class="page-hero-actions">
      <a href="/contact" class="btn btn-accent btn-lg">
        <i data-lucide="calendar" aria-hidden="true" style="width:18px;height:18px;"></i>
        Get a Free Estimate
      </a>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-white">
        <i data-lucide="phone" aria-hidden="true" style="width:16px;height:16px;"></i>
        Call Now
      </a>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ── TICKER ────────────────────────────────────────────────────────────── -->
<div class="ticker-strip" aria-hidden="true" role="presentation">
  <div class="ticker-track">
    <?php
    $items = [
        ['icon' => 'sparkles',      'text' => 'Residential Maid Services'],
        ['icon' => 'shield-check',  'text' => 'Licensed &amp; Insured'],
        ['icon' => 'leaf',          'text' => 'Eco-Friendly Options'],
        ['icon' => 'clock',         'text' => 'Consistent Scheduling'],
        ['icon' => 'home',          'text' => 'Hayes, VA &amp; Surrounding Areas'],
        ['icon' => 'check-circle-2','text' => 'Customized Checklists'],
        ['icon' => 'star',          'text' => '5.0 Google Rating'],
        ['icon' => 'repeat',        'text' => 'Weekly · Bi-Weekly · Monthly'],
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
<div aria-hidden="true" style="height:48px;background:var(--color-light);
     clip-path:polygon(0 30%,100% 0,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── SERVICE DETAIL SECTION ────────────────────────────────────────────── -->
<section style="background:var(--color-light);padding:var(--space-16) 0;">
  <div class="container">
    <div class="service-detail-split">

      <!-- Left: content + checklist -->
      <div class="service-detail-content" data-animate="fade-up">
        <span class="eyebrow" style="color:var(--color-primary);">What We Do</span>
        <h2>Real Cleaning — Not Just a Quick Pass</h2>

        <p>When you hire Keep N Kleen for maid services in Hayes, VA, you're not getting a crew that skims surfaces and calls it done. We work through every room with a structured checklist that covers what actually needs attention — the grime ring behind the toilet, the grease buildup on the stovetop, the dust gathering on ceiling fans and baseboards.</p>

        <p>Our residential maid service is designed for homeowners and renters who want a clean home without spending their evenings or weekends making it happen. Whether you have a 900 sq ft apartment in Gloucester Point or a five-bedroom house near Yorktown, we adapt our approach to your home's actual layout and your family's priorities.</p>

        <p>Every member of our cleaning crew is trained on our in-house standards, background-checked, and supplied with properly diluted, effective cleaning products. If you have pets, young children, or product sensitivities, we have eco-friendly alternatives ready — just let us know before your first visit.</p>

        <p>After five years serving homes across Virginia, our clients keep booking because the result is predictable. Same standard, every visit — whether it's your first clean or your fiftieth.</p>

        <h3 style="font-size:var(--font-size-xl);margin:var(--space-8) 0 var(--space-4);">What's Included in Every Visit</h3>
        <div class="checklist-2col">
          <?php
          $checks = [
              'Kitchen countertops & sink',
              'Stovetop & exterior appliances',
              'All bathrooms top to bottom',
              'Toilet, tub/shower, vanity',
              'Bedroom surfaces & dusting',
              'Living area vacuuming',
              'Hard floor mopping',
              'Baseboards throughout',
              'Mirrors & glass surfaces',
              'Trash removal & relining',
          ];
          foreach ($checks as $c):
          ?>
          <div class="checklist-item">
            <i data-lucide="check-circle-2" aria-hidden="true" style="width:16px;height:16px;"></i>
            <?php echo htmlspecialchars($c, ENT_QUOTES, 'UTF-8'); ?>
          </div>
          <?php endforeach; ?>
        </div>

        <p class="last-updated">Last Updated: April 2026</p>
      </div>

      <!-- Right: photo with overlapping stat (signature element) -->
      <div class="service-photo-wrap" data-animate="fade-up">
        <div class="service-photo-accent" aria-hidden="true"></div>
        <div class="service-photo-frame img-reveal">
          <picture>
            <source srcset="<?php echo htmlspecialchars($clientImages[9]['url'], ENT_QUOTES, 'UTF-8'); ?>" type="image/jpeg">
            <img src="<?php echo htmlspecialchars($clientImages[9]['url'], ENT_QUOTES, 'UTF-8'); ?>"
                 alt="Professional maid service in Hayes VA — Keep N Kleen cleaning team"
                 width="600" height="750"
                 loading="lazy">
          </picture>
        </div>
        <div class="service-stat-card">
          <div class="sc-num">5+</div>
          <div class="sc-label">Years of Spotless Service</div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-white);
     clip-path:polygon(0 0,100% 60%,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── WHY CHOOSE US ──────────────────────────────────────────────────────── -->
<section style="background:var(--color-white);padding:var(--space-16) 0;">
  <div class="container">
    <div class="section-header" data-animate="fade-up">
      <span class="eyebrow">Why Keep N Kleen</span>
      <h2>What Makes Our Maid Service Different</h2>
      <p>Plenty of services will come to your home. Fewer will do it consistently well, communicate clearly, and actually learn your space.</p>
    </div>

    <div class="why-grid">

      <div class="why-card card" data-animate="fade-up">
        <div class="why-icon">
          <i data-lucide="clipboard-list" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <div>
          <h3>Your Checklist, Documented</h3>
          <p>We record your home's layout, priorities, and any rooms or items to handle carefully. That profile travels with your crew so preferences carry forward — you don't have to re-explain every visit.</p>
        </div>
      </div>

      <div class="why-card card" data-animate="fade-up" style="animation-delay:100ms;">
        <div class="why-icon">
          <i data-lucide="users" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <div>
          <h3>Consistent Crews You Recognize</h3>
          <p>Where possible, we send the same team each visit. Familiar crews work more efficiently, remember your home's particulars, and earn your trust naturally — not just on paper.</p>
        </div>
      </div>

      <div class="why-card card" data-animate="fade-up" style="animation-delay:100ms;">
        <div class="why-icon">
          <i data-lucide="leaf" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <div>
          <h3>Safe Products, Smart Choices</h3>
          <p>We use properly diluted, surface-appropriate products and offer eco-friendly alternatives for homes with pets, children, or sensitivities. Effective cleaning doesn't require harsh chemicals.</p>
        </div>
      </div>

      <div class="why-card card" data-animate="fade-up" style="animation-delay:200ms;">
        <div class="why-icon">
          <i data-lucide="calendar-check" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <div>
          <h3>Scheduling That Holds</h3>
          <p>We show up when we say we will. If something changes on our end, you'll hear from us ahead of time — not with a missed appointment and silence. Reliability is the baseline, not the exception.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-primary);
     clip-path:polygon(0 0,100% 65%,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── MID-PAGE CTA BANNER (CTA #2) ──────────────────────────────────────── -->
<div class="cta-banner" role="complementary" aria-label="Book a maid service">
  <div class="container" data-animate="fade-up">
    <span class="mid-cta-eyebrow">Ready to Book?</span>
    <h2 style="color:white;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);">
      Free Estimates · Most Clients Booked Within 3–5 Days
    </h2>
    <p style="color:rgba(255,255,255,0.85);max-width:52ch;margin:0 auto var(--space-5);">
      Tell us about your home and what you need. We'll confirm availability and get you on the schedule
      without any obligation or pressure.
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
      Get My Free Estimate
      <i data-lucide="arrow-right" aria-hidden="true" style="width:18px;height:18px;"></i>
    </a>
  </div>
</div>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-light);
     clip-path:polygon(0 0,100% 0,100% 100%,0 70%);margin-top:-2px;"></div>

<!-- ── HOW IT WORKS ───────────────────────────────────────────────────────── -->
<section style="background:var(--color-light);padding:var(--space-16) 0;">
  <div class="container">
    <div class="section-header" data-animate="fade-up">
      <span class="eyebrow">Our Process</span>
      <h2>How Your Maid Service Works</h2>
      <p>Four straightforward steps from your first inquiry to a home you can walk into and exhale.</p>
    </div>

    <div class="process-horizontal" data-animate="fade-up">

      <div class="process-step-v">
        <div class="process-num-circle">01</div>
        <h3>Book Your Clean</h3>
        <p>Contact us online or by phone. Share your home's size, layout, and any specific priorities. We'll get back to you quickly with availability.</p>
      </div>

      <div class="process-step-v">
        <div class="process-num-circle">02</div>
        <h3>Confirm & Customize</h3>
        <p>We document your home profile — priority rooms, surfaces to treat carefully, product preferences, and access instructions for your crew.</p>
      </div>

      <div class="process-step-v">
        <div class="process-num-circle">03</div>
        <h3>Thorough Clean</h3>
        <p>Your crew arrives on time, follows your checklist, and works through every room systematically. No shortcuts, no skipped zones.</p>
      </div>

      <div class="process-step-v">
        <div class="process-num-circle">04</div>
        <h3>Walk-Through & Done</h3>
        <p>Before leaving we verify the result meets our standard. If anything's off, we address it — not on your next visit, right then.</p>
      </div>

    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-white);
     clip-path:polygon(0 35%,100% 0,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── FAQ SECTION ────────────────────────────────────────────────────────── -->
<section style="background:var(--color-white);padding:var(--space-16) 0;">
  <div class="container">
    <div class="section-header" data-animate="fade-up">
      <span class="eyebrow">Common Questions</span>
      <h2>Maid Service FAQs</h2>
      <p>What Hayes-area homeowners typically ask before booking their first visit.</p>
    </div>

    <div class="faq-grid" data-animate="fade-up">
      <?php foreach ($pageFaqs as $faq): ?>
      <div class="faq-item">
        <div class="faq-icon">
          <i data-lucide="help-circle" style="width:18px;height:18px;"></i>
        </div>
        <div>
          <h3><?php echo htmlspecialchars($faq['q'], ENT_QUOTES, 'UTF-8'); ?></h3>
          <p><?php echo htmlspecialchars($faq['a'], ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div style="text-align:center;margin-top:var(--space-10);" data-animate="fade-up">
      <p style="color:var(--color-gray);margin-bottom:var(--space-4);">Have a specific question about your home?</p>
      <a href="/contact" class="btn btn-primary">
        Ask Us Anything
        <i data-lucide="message-circle" aria-hidden="true" style="width:16px;height:16px;"></i>
      </a>
    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-primary);
     clip-path:polygon(0 60%,100% 0,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── CLOSING CTA (CTA #3) ───────────────────────────────────────────────── -->
<section class="closing-cta" aria-label="Get started with maid services">
  <div class="container" data-animate="fade-up">
    <span class="closing-cta-eyebrow">Get Started Today</span>
    <h2>Your Home Could Be Cleaner by This Time Next Week</h2>
    <p>Keep N Kleen serves Hayes, Gloucester, Yorktown, Newport News, and communities across Virginia.
       Free estimates, no commitment required — just tell us about your home.</p>

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
        Get My Free Maid Service Estimate
        <i data-lucide="arrow-right" aria-hidden="true" style="width:18px;height:18px;"></i>
      </a>
      <a href="/services" class="btn btn-outline-white btn-lg">
        View All Services
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
