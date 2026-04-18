<?php
/**
 * services/move-in-move-out-cleaning.php — Move-In / Move-Out Cleaning
 * Keep N Kleen | Page One Insights
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$pageTitle       = 'Move-In / Move-Out Cleaning Hayes, VA | Keep N Kleen';
$pageDescription = 'Move-in and move-out cleaning services in Hayes, VA. Keep N Kleen handles full property turnover cleaning — appliances, cabinets, baseboards — to help you recover your deposit or hand off a spotless home.';
$canonicalUrl    = $canonicalBase . '/services/move-in-move-out-cleaning';
$ogImage         = $clientImages[7]['url'];
$currentPage     = 'move-in-move-out-cleaning';
$heroImagePreload = $clientImages[7]['url'];

$pageFaqs = [
    [
        'q' => 'What does a move-out clean cover that regular cleaning doesn\'t?',
        'a' => 'A move-out clean goes well beyond maintenance cleaning. We clean inside all appliances (oven, fridge, microwave), inside kitchen and bathroom cabinets, window sills and tracks, baseboards on all surfaces, light fixtures, and all floor surfaces including inside closets. It\'s a top-to-bottom reset of the entire property.',
    ],
    [
        'q' => 'Can a move-out clean help me get my security deposit back?',
        'a' => 'Our move-out cleans are specifically designed to meet landlord and property manager standards. We cover the common inspection points that lead to deposit deductions — appliance interiors, bathrooms, baseboards, and floors. Many clients report full deposit recovery after our clean.',
    ],
    [
        'q' => 'How far in advance should I book a move-out clean?',
        'a' => 'We recommend booking at least 5–7 days before your move-out date to secure your preferred time slot. If you\'re in a tighter timeline, contact us — we do our best to accommodate urgent requests based on current availability.',
    ],
    [
        'q' => 'Do you also clean the property after new tenants or buyers move in?',
        'a' => 'Yes. A move-in clean prepares the space for your arrival — cleaning all surfaces, appliances, and areas that may not have been properly addressed during the previous turnover. Starting fresh in a truly clean home makes the move-in experience significantly better.',
    ],
];

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'           => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $canonicalBase],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $canonicalBase . '/services'],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Move-In / Move-Out Cleaning', 'item' => $canonicalBase . '/services/move-in-move-out-cleaning'],
            ],
        ],
        [
            '@type'       => 'Service',
            'name'        => 'Move-In / Move-Out Cleaning',
            'description' => 'Comprehensive move-in and move-out cleaning in Hayes, VA. Full property turnover including appliance interiors, cabinets, baseboards, and all floor surfaces. Designed to meet landlord inspection standards.',
            'serviceType' => 'Move-In Move-Out Cleaning',
            'url'         => $canonicalBase . '/services/move-in-move-out-cleaning',
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
            'name'  => 'Our Move-Out Cleaning Process',
            'step'  => [
                ['@type' => 'HowToStep', 'position' => 1, 'name' => 'Schedule Before Move-Out', 'text' => 'Book your clean at least 5–7 days ahead. We confirm the property address, square footage, and key handover details.'],
                ['@type' => 'HowToStep', 'position' => 2, 'name' => 'Property Assessment', 'text' => 'On arrival, the crew walks through the space to note any areas requiring extra attention before beginning the full clean.'],
                ['@type' => 'HowToStep', 'position' => 3, 'name' => 'Top-to-Bottom Turnover', 'text' => 'We clean every room, every appliance interior, all cabinet interiors, baseboards, floors, and surfaces — nothing skipped.'],
                ['@type' => 'HowToStep', 'position' => 4, 'name' => 'Final Inspection', 'text' => 'A final walk-through confirms the property is ready for landlord inspection or new occupant arrival.'],
            ],
        ],
        generateFAQSchema($pageFaqs),
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ── Page Hero ────────────────────────────────────────────────────────────── */
.page-hero-centered {
  position: relative;
  min-height: 62vh;
  display: flex; align-items: center; justify-content: center;
  text-align: center;
  overflow: hidden;
  padding-top: 80px;
  background-size: cover;
  background-position: center;
}
.page-hero-centered::before {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(160deg, rgba(26,43,60,0.9) 0%, rgba(6,182,212,0.25) 100%);
  z-index: 1;
}
.page-hero-centered .hero-inner {
  position: relative; z-index: 2;
  max-width: 800px; padding: var(--space-8);
}
.page-hero-centered h1 {
  color: var(--color-white);
  font-size: clamp(2rem, 4.5vw, 3.6rem);
  letter-spacing: -0.02em;
  line-height: 1.1;
  margin-bottom: var(--space-5);
}
.hero-eyebrow-pill {
  display: inline-flex; align-items: center; gap: var(--space-2);
  font-family: var(--font-heading); font-size: var(--font-size-xs);
  font-weight: 600; text-transform: uppercase; letter-spacing: 3px;
  color: var(--color-accent); margin-bottom: var(--space-5);
  padding: var(--space-1) var(--space-4);
  border: 1px solid rgba(255,255,255,0.25);
  border-radius: var(--radius-full);
}
.hero-sub { color: rgba(255,255,255,0.88); font-size: var(--font-size-lg); line-height: 1.65; margin-bottom: var(--space-8); max-width: 58ch; margin-left: auto; margin-right: auto; }
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

/* ── Comparison panels (signature section) ─────────────────────────────── */
.comparison-wrap {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 0;
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
}
.comparison-panel {
  padding: var(--space-10);
  position: relative;
}
.comparison-panel.move-out {
  background: var(--color-primary);
  color: white;
}
.comparison-panel.move-in {
  background: var(--color-light);
  border-left: 4px solid var(--color-accent);
}
.panel-label {
  font-family: var(--font-heading);
  font-size: var(--font-size-xs);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 3px;
  margin-bottom: var(--space-4);
}
.comparison-panel.move-out .panel-label { color: var(--color-accent); }
.comparison-panel.move-in .panel-label { color: var(--color-primary); }
.comparison-panel h3 {
  font-size: clamp(1.3rem, 2vw, 1.6rem);
  margin-bottom: var(--space-3);
  letter-spacing: -0.01em;
}
.comparison-panel.move-out h3 { color: white; }
.comparison-panel.move-in h3 { color: var(--color-dark); }
.comparison-panel > p { font-size: var(--font-size-sm); line-height: 1.7; margin-bottom: var(--space-6); }
.comparison-panel.move-out > p { color: rgba(255,255,255,0.78); }
.comparison-panel.move-in > p { color: var(--color-gray); }
.panel-list { list-style: none; }
.panel-list li {
  display: flex; align-items: flex-start; gap: var(--space-2);
  font-size: var(--font-size-sm); line-height: 1.5;
  margin-bottom: var(--space-2);
}
.comparison-panel.move-out .panel-list li { color: rgba(255,255,255,0.88); }
.comparison-panel.move-in .panel-list li { color: var(--color-gray-dark); }
.panel-list li i { flex-shrink: 0; margin-top: 2px; color: var(--color-accent); }
.panel-divider-badge {
  position: absolute;
  top: 50%; transform: translateY(-50%);
  right: -22px;
  width: 44px; height: 44px;
  background: var(--color-accent);
  border-radius: var(--radius-full);
  display: flex; align-items: center; justify-content: center;
  z-index: 5;
  box-shadow: var(--shadow-md);
}
.panel-divider-badge i { color: white; }

/* ── Why choose ───────────────────────────────────────────────────────── */
.why-strip {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-6);
  text-align: center;
}
.why-strip-item { padding: var(--space-6); }
.why-strip-icon {
  width: 56px; height: 56px;
  border-radius: var(--radius-full);
  background: rgba(6,182,212,0.12);
  border: 2px solid var(--color-accent);
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-4);
  color: var(--color-accent);
}
.why-strip-item h3 { font-size: var(--font-size-base); margin-bottom: var(--space-2); color: white; }
.why-strip-item p { font-size: var(--font-size-sm); color: rgba(255,255,255,0.72); margin: 0; }

/* ── Process ──────────────────────────────────────────────────────────── */
.process-list {
  counter-reset: step;
  max-width: 680px;
  margin: 0 auto;
}
.process-list-item {
  display: flex; gap: var(--space-6);
  padding: var(--space-6) 0;
  border-bottom: 1px solid var(--color-gray-light);
}
.process-list-item:last-child { border-bottom: none; }
.pli-num {
  flex-shrink: 0;
  font-family: var(--font-heading);
  font-size: var(--font-size-3xl);
  font-weight: 800;
  color: var(--color-accent);
  width: 48px;
  line-height: 1;
}
.pli-content h3 { font-size: var(--font-size-lg); margin-bottom: var(--space-2); }
.pli-content p { color: var(--color-gray); font-size: var(--font-size-sm); line-height: 1.7; margin: 0; }

/* ── CTA banner / closing ─────────────────────────────────────────────── */
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
.closing-cta {
  background: linear-gradient(135deg, var(--color-primary) 0%, #243d52 100%);
  position: relative; overflow: hidden; padding: var(--space-16) 0;
}
.closing-cta::before {
  content: ''; position: absolute; inset: 0;
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
.last-updated { font-size: var(--font-size-xs); color: var(--color-gray); font-style: italic; margin-top: var(--space-6); }

/* Responsive */
@media (max-width: 1023px) {
  .why-strip { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 767px) {
  .comparison-wrap { grid-template-columns: 1fr; }
  .panel-divider-badge { display: none; }
  .why-strip { grid-template-columns: 1fr; }
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
      <li><span aria-current="page">Move-In / Move-Out Cleaning</span></li>
    </ol>
  </div>
</nav>

<!-- ── PAGE HERO (CTA #1) ────────────────────────────────────────────────── -->
<section class="page-hero-centered"
         style="background-image: url('<?php echo htmlspecialchars($clientImages[7]['url'], ENT_QUOTES, 'UTF-8'); ?>');"
         aria-label="Move-In / Move-Out Cleaning in Hayes, VA">

  <div class="hero-inner">
    <div class="hero-eyebrow-pill">
      <i data-lucide="truck" aria-hidden="true" style="width:13px;height:13px;"></i>
      Move-In / Move-Out · Hayes, VA
    </div>

    <h1>Moving Shouldn't Mean Cleaning on Top of Everything Else</h1>

    <p class="hero-sub">
      Keep N Kleen handles the full property turnover — inside appliances, cabinets,
      baseboards, and every floor surface — so you can focus on the actual move.
    </p>

    <div class="hero-actions">
      <a href="/contact" class="btn btn-accent btn-lg">
        <i data-lucide="calendar" aria-hidden="true" style="width:18px;height:18px;"></i>
        Book Your Move-Out Clean
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
        ['icon' => 'truck',         'text' => 'Move-Out Cleaning Hayes VA'],
        ['icon' => 'key',           'text' => 'End-of-Lease Cleaning'],
        ['icon' => 'home',          'text' => 'Move-In Property Prep'],
        ['icon' => 'shield-check',  'text' => 'Licensed &amp; Insured'],
        ['icon' => 'check-circle-2','text' => 'Deposit Recovery Cleaning'],
        ['icon' => 'star',          'text' => '5.0 Google Rating'],
        ['icon' => 'clock',         'text' => 'Quick Turnaround Available'],
        ['icon' => 'leaf',          'text' => 'Eco-Friendly Options'],
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

<!-- ── EDITORIAL INTRO (constrained column) ──────────────────────────────── -->
<section style="background:var(--color-white);padding:var(--space-12) 0 var(--space-6);">
  <div class="container-narrow" data-animate="fade-up">
    <span class="eyebrow" style="color:var(--color-primary);">The Full Picture</span>
    <h2 style="font-size:clamp(1.8rem,3.5vw,2.5rem);letter-spacing:-0.02em;margin-bottom:var(--space-5);">
      What "Move-Out Clean" Actually Means
    </h2>
    <p style="color:var(--color-gray);line-height:1.75;">
      A move-out clean is not a standard housekeeping visit. Landlords and property managers inspect
      at a detail level — inside the oven, inside refrigerator drawers, tops of cabinets, window tracks,
      and under appliances. A surface wipe-down won't cut it when security deposit money is on the line.
    </p>
    <p style="color:var(--color-gray);line-height:1.75;">
      Keep N Kleen's move-out service covers every zone that shows up on a typical property inspection —
      because we've done enough of these to know exactly where inspectors look. For tenants in Hayes, VA
      and across Virginia, that thoroughness often means the difference between a full deposit return
      and a deduction dispute.
    </p>
    <p class="last-updated">Last Updated: April 2026</p>
  </div>
</section>

<!-- ── COMPARISON PANELS (signature section) ─────────────────────────────── -->
<section style="background:var(--color-white);padding:var(--space-6) 0 var(--space-16);">
  <div class="container">
    <div class="section-header" data-animate="fade-up" style="margin-bottom:var(--space-10);">
      <span class="eyebrow">Service Details</span>
      <h2>Move-Out or Move-In — We Have Both Covered</h2>
    </div>

    <div class="comparison-wrap" data-animate="fade-up">

      <!-- Move-Out Panel -->
      <div class="comparison-panel move-out" style="position:relative;">
        <div class="panel-label">Leaving the Property</div>
        <h3>Move-Out Clean</h3>
        <p>Designed to meet landlord inspection standards. Every area that could trigger a deposit deduction is addressed — leaving no ammunition for deductions.</p>
        <ul class="panel-list" aria-label="Move-out cleaning checklist">
          <?php
          $moveOut = [
              'Oven interior, racks, and drawer',
              'Refrigerator interior and drawers',
              'Microwave inside and out',
              'All cabinet interiors (kitchen & bath)',
              'Bathroom: toilet, tub, shower, tiles',
              'Window sills, tracks, and ledges',
              'Baseboards throughout property',
              'All closet floors and shelving',
              'Hard floor scrubbing — every room',
              'Walls spot-cleaned for marks',
          ];
          foreach ($moveOut as $item):
          ?>
          <li>
            <i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>
            <?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?>
          </li>
          <?php endforeach; ?>
        </ul>

        <!-- Divider badge -->
        <div class="panel-divider-badge" aria-hidden="true">
          <i data-lucide="arrow-right" style="width:18px;height:18px;"></i>
        </div>
      </div>

      <!-- Move-In Panel -->
      <div class="comparison-panel move-in">
        <div class="panel-label">Starting Fresh</div>
        <h3>Move-In Clean</h3>
        <p>Start your time in the space the way you deserve — with a home that was actually cleaned for you, not just left behind by the previous occupant.</p>
        <ul class="panel-list" aria-label="Move-in cleaning checklist">
          <?php
          $moveIn = [
              'All surfaces dusted and wiped down',
              'Kitchen appliances deep-cleaned',
              'Bathrooms fully sanitized',
              'Cabinet interiors cleaned',
              'Floors vacuumed and mopped',
              'Baseboards and trim wiped',
              'Mirrors and glass streak-free',
              'Any new-construction dust removed',
              'HVAC vents and registers dusted',
              'Final room-by-room inspection',
          ];
          foreach ($moveIn as $item):
          ?>
          <li>
            <i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>
            <?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <a href="/contact" class="btn btn-primary" style="margin-top:var(--space-6);">
          Book Move-In Clean
          <i data-lucide="arrow-right" aria-hidden="true" style="width:16px;height:16px;"></i>
        </a>
      </div>

    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-dark);
     clip-path:polygon(0 0,100% 55%,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── WHY CHOOSE US (dark strip) ────────────────────────────────────────── -->
<section style="background:var(--color-dark);padding:var(--space-16) 0;">
  <div class="container">
    <div class="section-header" data-animate="fade-up">
      <span class="eyebrow" style="color:var(--color-accent);">Why Keep N Kleen</span>
      <h2 style="color:white;">Why Hayes Renters & Landlords Choose Us</h2>
    </div>

    <div class="why-strip" data-animate="fade-up">

      <div class="why-strip-item">
        <div class="why-strip-icon">
          <i data-lucide="clipboard-check" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3>Deposit-Standard Cleaning</h3>
        <p>We know what landlords check — and we cover every one of those points in our move-out process.</p>
      </div>

      <div class="why-strip-item">
        <div class="why-strip-icon">
          <i data-lucide="zap" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3>Fast Turnaround Available</h3>
        <p>Moving timelines compress fast. Contact us for current availability — we work to accommodate urgent requests.</p>
      </div>

      <div class="why-strip-item">
        <div class="why-strip-icon">
          <i data-lucide="package-check" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3>We Bring Everything</h3>
        <p>Your crew arrives with all supplies and equipment. You don't need to leave anything behind for us to work.</p>
      </div>

      <div class="why-strip-item">
        <div class="why-strip-icon">
          <i data-lucide="shield-check" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3>Licensed &amp; Insured</h3>
        <p>Every job is covered. Background-checked staff, properly insured — giving landlords and tenants peace of mind.</p>
      </div>

    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-primary);
     clip-path:polygon(0 0,100% 0,100% 100%,0 65%);margin-top:-2px;"></div>

<!-- ── MID-PAGE CTA (CTA #2) ─────────────────────────────────────────────── -->
<div class="cta-banner" role="complementary" aria-label="Book your move clean">
  <div class="container" data-animate="fade-up">
    <span class="mid-cta-eyebrow">Moving Soon?</span>
    <h2 style="color:white;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);">
      Book Early — Move-Out Slots Fill Quickly
    </h2>
    <p style="color:rgba(255,255,255,0.85);max-width:52ch;margin:0 auto var(--space-5);">
      We recommend booking at least 5–7 days ahead of your move-out date. Contact us now to check
      availability and confirm your time slot.
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
      Check Availability
      <i data-lucide="arrow-right" aria-hidden="true" style="width:18px;height:18px;"></i>
    </a>
  </div>
</div>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-light);
     clip-path:polygon(0 0,100% 0,100% 100%,0 70%);margin-top:-2px;"></div>

<!-- ── PROCESS ────────────────────────────────────────────────────────────── -->
<section style="background:var(--color-light);padding:var(--space-16) 0;">
  <div class="container">
    <div class="section-header" data-animate="fade-up">
      <span class="eyebrow">How It Works</span>
      <h2>Your Move-Out Clean, Step by Step</h2>
      <p>From booking to final inspection — four steps to a property that's ready to hand back.</p>
    </div>

    <div class="process-list" data-animate="fade-up">

      <div class="process-list-item">
        <div class="pli-num">01</div>
        <div class="pli-content">
          <h3>Schedule Before Your Move-Out Date</h3>
          <p>Contact us with your property address, approximate square footage, and desired clean date. We confirm availability and reserve your slot — ideally 5–7 days before your handover.</p>
        </div>
      </div>

      <div class="process-list-item">
        <div class="pli-num">02</div>
        <div class="pli-content">
          <h3>Walk-Through & Assessment</h3>
          <p>When the crew arrives, they do a quick walk-through to note areas that need extra attention — pet hair buildup, deep grease, or surfaces that were missed in previous cleans. No surprises for either party.</p>
        </div>
      </div>

      <div class="process-list-item">
        <div class="pli-num">03</div>
        <div class="pli-content">
          <h3>Top-to-Bottom Turnover Clean</h3>
          <p>Working room by room, the crew covers every surface, appliance interior, cabinet, floor, and detail zone on the inspection checklist. Nothing is left for the next team to discover.</p>
        </div>
      </div>

      <div class="process-list-item">
        <div class="pli-num">04</div>
        <div class="pli-content">
          <h3>Final Inspection — Property Ready</h3>
          <p>Before leaving, we walk through every room to confirm the property is in inspection-ready condition. You get a space you're confident handing back — and a landlord who has no reason to deduct.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-white);
     clip-path:polygon(0 35%,100% 0,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── FAQ ────────────────────────────────────────────────────────────────── -->
<section style="background:var(--color-white);padding:var(--space-16) 0;">
  <div class="container">
    <div class="section-header" data-animate="fade-up">
      <span class="eyebrow">Common Questions</span>
      <h2>Move-In / Move-Out Cleaning FAQs</h2>
      <p>What Hayes-area renters and landlords ask before booking a turnover clean.</p>
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
      <a href="/contact" class="btn btn-primary">
        Ask a Question
        <i data-lucide="message-circle" aria-hidden="true" style="width:16px;height:16px;"></i>
      </a>
    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-primary);
     clip-path:polygon(0 60%,100% 0,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── CLOSING CTA (CTA #3) ───────────────────────────────────────────────── -->
<section class="closing-cta" aria-label="Book move-out cleaning">
  <div class="container" data-animate="fade-up">
    <span class="closing-cta-eyebrow">Get Your Deposit Back</span>
    <h2>Don't Leave Money on the Table at Move-Out</h2>
    <p>Keep N Kleen serves Hayes, Gloucester, Yorktown, Newport News, Williamsburg, and communities
       across Virginia. Free estimates — call or fill out our contact form to check availability.</p>

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
        Book My Move-Out Clean
        <i data-lucide="arrow-right" aria-hidden="true" style="width:18px;height:18px;"></i>
      </a>
      <a href="/services" class="btn btn-outline-white btn-lg">
        See All Services
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
