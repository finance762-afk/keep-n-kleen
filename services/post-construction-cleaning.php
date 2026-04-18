<?php
/**
 * services/post-construction-cleaning.php — Post-Construction Cleaning
 * Keep N Kleen | Page One Insights
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$pageTitle       = 'Post-Construction Cleaning Hayes, VA | Keep N Kleen';
$pageDescription = 'Post-construction cleaning in Hayes, VA. Keep N Kleen removes drywall dust, debris & construction residue from new builds and renovations. Free estimates.';
$canonicalUrl    = $canonicalBase . '/services/post-construction-cleaning';
$ogImage         = $clientImages[8]['url'];
$currentPage     = 'post-construction-cleaning';
$heroImagePreload = $clientImages[8]['url'];

$pageFaqs = [
    [
        'q' => 'How soon after construction is complete can you clean?',
        'a' => 'We can typically schedule within 2–5 business days of construction completion. For new builds in Hayes and across Virginia, we coordinate directly with contractors or homeowners to confirm the site is fully handed off before our crew arrives. Contact us as soon as your timeline is known.',
    ],
    [
        'q' => 'What types of construction projects do you clean after?',
        'a' => 'We handle post-construction cleaning for new home builds, kitchen and bathroom renovations, room additions, basement finishes, commercial tenant buildouts, and office renovations. The scope adjusts to the size and type of project — from a single-room remodel to a full new construction.',
    ],
    [
        'q' => 'Does post-construction cleaning include window cleaning?',
        'a' => 'Yes. Construction leaves a film, paint mist, and residue on window glass that standard cleaning won\'t cut. Our post-construction process includes window interior cleaning to remove construction deposits and leave glass clear. Exterior window cleaning can be added if needed.',
    ],
    [
        'q' => 'Is there a difference between Phase 1 and Phase 2 construction cleaning?',
        'a' => 'Phase 1 (rough clean) happens mid-construction — removing bulk debris, dust, and materials after major work but before finishing. Phase 2 (final clean) happens after all trades are done — the detailed clean that prepares the space for occupancy or staging. We handle both phases.',
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
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Post-Construction Cleaning', 'item' => $canonicalBase . '/services/post-construction-cleaning'],
            ],
        ],
        [
            '@type'       => 'Service',
            'name'        => 'Post-Construction Cleaning',
            'description' => 'Specialized post-construction cleaning in Hayes, VA for new builds and renovations. Removes drywall dust, debris, adhesive residue, and construction materials — preparing your space for occupancy.',
            'serviceType' => 'Post-Construction Cleaning',
            'url'         => $canonicalBase . '/services/post-construction-cleaning',
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
            'name'  => 'Our Post-Construction Cleaning Process',
            'step'  => [
                ['@type' => 'HowToStep', 'position' => 1, 'name' => 'Site Assessment', 'text' => 'Before cleaning begins, we assess the site — project scope, surface types, debris volume, and any areas requiring special handling.'],
                ['@type' => 'HowToStep', 'position' => 2, 'name' => 'Bulk Debris Removal', 'text' => 'All bulk construction waste, packaging, and debris is cleared from every area. This sets the stage for the detailed clean.'],
                ['@type' => 'HowToStep', 'position' => 3, 'name' => 'Surface & Detail Clean', 'text' => 'Drywall dust, adhesive residue, paint overspray, grout haze, and construction film are removed from all surfaces, fixtures, windows, and floors.'],
                ['@type' => 'HowToStep', 'position' => 4, 'name' => 'Final Inspection', 'text' => 'We walk the space systematically to verify every zone is clean and the property is ready for occupancy, staging, or client walkthrough.'],
            ],
        ],
        generateFAQSchema($pageFaqs),
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ── Page Hero (dark, industrial) ────────────────────────────────────────── */
.page-hero-dark {
  position: relative;
  min-height: 65vh;
  display: flex; align-items: center; justify-content: center;
  text-align: center;
  overflow: hidden;
  padding-top: 80px;
  background-size: cover;
  background-position: center;
}
.page-hero-dark::before {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(180deg, rgba(15,30,45,0.92) 0%, rgba(26,43,60,0.88) 100%);
  z-index: 1;
}
.page-hero-dark::after {
  content: '';
  position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.06'/%3E%3C/svg%3E");
  z-index: 2;
  pointer-events: none;
}
.page-hero-dark .hero-inner {
  position: relative; z-index: 3;
  max-width: 820px; padding: var(--space-12) var(--space-8);
}
.page-hero-dark h1 {
  color: var(--color-white);
  font-size: clamp(2rem, 4.5vw, 3.6rem);
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
.hero-sub { color: rgba(255,255,255,0.87); font-size: var(--font-size-lg); line-height: 1.65; margin-bottom: var(--space-8); }
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

/* ── What We Handle grid ─────────────────────────────────────────────────── */
.debris-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-4);
}
.debris-item {
  background: var(--color-white);
  border-radius: var(--radius-lg);
  padding: var(--space-5) var(--space-6);
  box-shadow: var(--shadow-card);
  display: flex; align-items: center; gap: var(--space-3);
  transition: box-shadow var(--transition-base);
  border-left: 3px solid var(--color-accent);
}
.debris-item:hover { box-shadow: var(--shadow-lg); }
.debris-icon {
  flex-shrink: 0; width: 40px; height: 40px;
  border-radius: var(--radius-md);
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  display: flex; align-items: center; justify-content: center;
  color: var(--color-accent);
}
.debris-item span { font-size: var(--font-size-sm); font-weight: 600; color: var(--color-dark); }

/* ── Signature: Full-bleed photo background with overlay stats ────────────── */
.site-stats-section {
  position: relative;
  padding: var(--space-16) 0;
  overflow: hidden;
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
}
.site-stats-section::before {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(135deg, rgba(26,43,60,0.9) 0%, rgba(6,182,212,0.2) 100%);
}
.site-stats-section .container { position: relative; z-index: 1; }
.stats-overlay-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-6);
}
.stat-overlay-card {
  background: rgba(255,255,255,0.08);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255,255,255,0.15);
  border-radius: var(--radius-lg);
  padding: var(--space-8);
  text-align: center;
}
.stat-overlay-card .big { font-family: var(--font-heading); font-size: var(--font-size-5xl); font-weight: 800; color: var(--color-accent); line-height: 1; }
.stat-overlay-card .lbl { color: rgba(255,255,255,0.78); font-size: var(--font-size-sm); text-transform: uppercase; letter-spacing: 1px; margin-top: var(--space-2); }

/* ── Why choose ────────────────────────────────────────────────────────── */
.why-cards {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--space-6);
}
.why-card-v2 {
  background: var(--color-white);
  border-radius: var(--radius-lg);
  padding: var(--space-8);
  box-shadow: var(--shadow-card);
  transition: box-shadow var(--transition-base);
  display: flex; gap: var(--space-5);
}
.why-card-v2:hover { box-shadow: var(--shadow-lg); }
.why-icon-v2 {
  flex-shrink: 0; width: 52px; height: 52px;
  border-radius: var(--radius-md);
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  display: flex; align-items: center; justify-content: center;
  color: var(--color-accent);
}
.why-card-v2 h3 { font-size: var(--font-size-base); margin-bottom: var(--space-2); }
.why-card-v2 p { color: var(--color-gray); font-size: var(--font-size-sm); margin: 0; line-height: 1.6; }

/* ── Process ──────────────────────────────────────────────────────────── */
.phase-steps {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-6);
}
.phase-step {
  position: relative;
  background: var(--color-white);
  border-radius: var(--radius-lg);
  padding: var(--space-8) var(--space-6);
  box-shadow: var(--shadow-card);
  text-align: center;
  overflow: hidden;
}
.phase-step::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, var(--color-primary), var(--color-accent));
}
.phase-num {
  font-family: var(--font-heading);
  font-size: var(--font-size-3xl);
  font-weight: 800;
  color: rgba(26,43,60,0.08);
  line-height: 1;
  position: absolute;
  top: var(--space-3);
  right: var(--space-4);
}
.phase-icon {
  width: 52px; height: 52px;
  border-radius: var(--radius-full);
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-4);
  color: var(--color-accent);
}
.phase-step h3 { font-size: var(--font-size-base); margin-bottom: var(--space-3); }
.phase-step p { font-size: var(--font-size-sm); color: var(--color-gray); margin: 0; line-height: 1.6; }

/* ── CTA / Closing ────────────────────────────────────────────────────── */
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
.closing-cta {
  background: linear-gradient(135deg, var(--color-primary) 0%, #243d52 100%);
  position: relative; overflow: hidden; padding: var(--space-16) 0;
}
.closing-cta::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E'); opacity: 0.35;
}
.closing-cta .container { position: relative; z-index: 1; text-align: center; }
.closing-cta h2 { color: white; font-size: clamp(1.8rem,4vw,2.8rem); letter-spacing: -0.02em; margin-bottom: var(--space-4); }
.closing-cta p { color: rgba(255,255,255,0.83); max-width: 52ch; margin: 0 auto var(--space-8); }
.closing-cta-eyebrow {
  display: inline-block; font-family: var(--font-heading); font-size: var(--font-size-xs);
  font-weight: 600; text-transform: uppercase; letter-spacing: 3px;
  color: var(--color-accent); margin-bottom: var(--space-4);
}
.last-updated { font-size: var(--font-size-xs); color: var(--color-gray); font-style: italic; margin-top: var(--space-6); }

/* Responsive */
@media (max-width: 1023px) {
  .debris-grid { grid-template-columns: repeat(2,1fr); }
  .stats-overlay-grid { grid-template-columns: 1fr 1fr; }
  .phase-steps { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 767px) {
  .debris-grid { grid-template-columns: 1fr; }
  .stats-overlay-grid { grid-template-columns: 1fr; }
  .why-cards { grid-template-columns: 1fr; }
  .phase-steps { grid-template-columns: 1fr; }
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
      <li><span aria-current="page">Post-Construction Cleaning</span></li>
    </ol>
  </div>
</nav>

<!-- ── PAGE HERO (CTA #1) ────────────────────────────────────────────────── -->
<section class="page-hero-dark"
         style="background-image: url('<?php echo htmlspecialchars($clientImages[8]['url'], ENT_QUOTES, 'UTF-8'); ?>');"
         aria-label="Post-Construction Cleaning in Hayes, VA">

  <div class="hero-inner">
    <div class="hero-eyebrow-pill">
      <i data-lucide="hard-hat" aria-hidden="true" style="width:13px;height:13px;"></i>
      Post-Construction Cleaning · Hayes, VA
    </div>

    <h1>Construction's Done.<br>Now Make It Livable.</h1>

    <p class="hero-sub">
      Drywall dust, debris, adhesive residue, and construction film don't clean themselves.
      Keep N Kleen handles the full final-stage cleanup — so your new space is actually ready, not just finished.
    </p>

    <div class="hero-actions">
      <a href="/contact" class="btn btn-accent btn-lg">
        <i data-lucide="calendar" aria-hidden="true" style="width:18px;height:18px;"></i>
        Request a Post-Build Estimate
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
        ['icon' => 'hard-hat',     'text' => 'Post-Construction Cleaning Hayes VA'],
        ['icon' => 'wind',         'text' => 'Drywall Dust Removal'],
        ['icon' => 'trash-2',      'text' => 'Construction Debris Removal'],
        ['icon' => 'shield-check', 'text' => 'Licensed &amp; Insured'],
        ['icon' => 'home',         'text' => 'New Build Final Clean'],
        ['icon' => 'wrench',       'text' => 'Renovation Cleanup'],
        ['icon' => 'star',         'text' => '5.0 Google Rating'],
        ['icon' => 'zap',          'text' => 'Fast Turnaround Available'],
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

<!-- ── WHAT WE HANDLE ─────────────────────────────────────────────────────── -->
<section style="background:var(--color-light);padding:var(--space-16) 0;">
  <div class="container">
    <div class="section-header" data-animate="fade-up">
      <span class="eyebrow">What We Remove</span>
      <h2>Everything a Build Leaves Behind</h2>
      <p>Post-construction mess is a category of its own. Our crews are trained specifically for it — not just adapted from residential cleaning.</p>
    </div>

    <div class="debris-grid" data-animate="fade-up">
      <?php
      $debrisItems = [
          ['icon' => 'wind',          'label' => 'Drywall Dust'],
          ['icon' => 'trash-2',       'label' => 'Construction Debris'],
          ['icon' => 'droplets',      'label' => 'Adhesive &amp; Caulk Residue'],
          ['icon' => 'paintbrush-2',  'label' => 'Paint Overspray &amp; Drips'],
          ['icon' => 'grid-3x3',      'label' => 'Grout Haze &amp; Tile Dust'],
          ['icon' => 'package-open',  'label' => 'Packaging &amp; Wrapping Materials'],
          ['icon' => 'eye',           'label' => 'Window Film &amp; Glass Residue'],
          ['icon' => 'layers',        'label' => 'Sticker &amp; Label Adhesive'],
          ['icon' => 'arrow-down-to-line', 'label' => 'Saw &amp; Sanding Dust'],
          ['icon' => 'zap',           'label' => 'Electrical Knockout Debris'],
          ['icon' => 'wrench',        'label' => 'Metal Shavings &amp; Fasteners'],
          ['icon' => 'spray-can',     'label' => 'Overspray on Fixtures'],
      ];
      foreach ($debrisItems as $d):
      ?>
      <div class="debris-item">
        <div class="debris-icon">
          <i data-lucide="<?php echo $d['icon']; ?>" aria-hidden="true" style="width:18px;height:18px;"></i>
        </div>
        <span><?php echo $d['label']; ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ── SIGNATURE: FULL-BLEED PHOTO WITH STAT OVERLAYS ────────────────────── -->
<section class="site-stats-section"
         style="background-image: url('<?php echo htmlspecialchars($clientImages[3]['url'], ENT_QUOTES, 'UTF-8'); ?>');"
         aria-label="Post-construction cleaning results">
  <div class="container">

    <div style="text-align:center;margin-bottom:var(--space-10);" data-animate="fade-up">
      <span class="eyebrow" style="color:var(--color-accent);">By the Numbers</span>
      <h2 style="color:white;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);">
        Results You Can Walk Into
      </h2>
      <p style="color:rgba(255,255,255,0.8);max-width:52ch;margin:0 auto;">
        Post-construction cleaning is a different discipline. We bring the right equipment,
        the right products, and the right experience to make your completed space actually livable.
      </p>
    </div>

    <div class="stats-overlay-grid" data-animate="fade-up">

      <div class="stat-overlay-card">
        <div class="big">5+</div>
        <div class="lbl">Years Serving VA Builds</div>
      </div>

      <div class="stat-overlay-card">
        <div class="big">100+</div>
        <div class="lbl">Post-Build Cleanups Completed</div>
      </div>

      <div class="stat-overlay-card">
        <div class="big">2–5</div>
        <div class="lbl">Day Scheduling Turnaround</div>
      </div>

    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-white);
     clip-path:polygon(0 0,100% 60%,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── WHY CHOOSE ─────────────────────────────────────────────────────────── -->
<section style="background:var(--color-white);padding:var(--space-16) 0;">
  <div class="container">

    <div style="max-width:680px;margin:0 auto var(--space-12);" data-animate="fade-up">
      <span class="eyebrow" style="color:var(--color-primary);">Why Keep N Kleen</span>
      <h2 style="font-size:clamp(1.8rem,3.5vw,2.5rem);letter-spacing:-0.02em;margin-bottom:var(--space-5);">
        Post-Construction Cleaning Requires Specialists
      </h2>
      <p style="color:var(--color-gray);line-height:1.75;">
        Construction dust migrates everywhere. It settles inside HVAC vents, behind outlets, along every baseboard,
        and on surfaces that look clean from across the room. Standard residential cleaning products
        and techniques aren't built for this — and neither are general cleaning crews.
      </p>
      <p style="color:var(--color-gray);line-height:1.75;">
        Keep N Kleen's post-construction process uses commercial-grade equipment and tested protocols
        for the specific challenges of new builds and renovations in Hayes, VA and across Virginia.
        We've cleaned after kitchen gut-outs in Gloucester, bathroom additions near Yorktown, and
        full new builds throughout the region — and the approach is the same: systematic, thorough,
        and verified before we leave.
      </p>
      <p class="last-updated">Last Updated: April 2026</p>
    </div>

    <div class="why-cards" data-animate="fade-up">

      <div class="why-card-v2 card">
        <div class="why-icon-v2">
          <i data-lucide="settings" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <div>
          <h3>Commercial-Grade Equipment</h3>
          <p>We use HEPA vacuums, microfiber systems, and commercial cleaning products designed for construction dust and residue — not household substitutes.</p>
        </div>
      </div>

      <div class="why-card-v2 card">
        <div class="why-icon-v2">
          <i data-lucide="map" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <div>
          <h3>Systematic Zone-by-Zone Process</h3>
          <p>We work through the property zone by zone, floor by floor, so nothing is missed and cross-contamination — tracking dust from dirty areas into clean ones — doesn't happen.</p>
        </div>
      </div>

      <div class="why-card-v2 card">
        <div class="why-icon-v2">
          <i data-lucide="shield-check" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <div>
          <h3>Contractor-Coordination Friendly</h3>
          <p>We work with general contractors and homeowners to schedule around handoff timelines. Need us in after final inspection? We coordinate to get you on the calendar.</p>
        </div>
      </div>

      <div class="why-card-v2 card">
        <div class="why-icon-v2">
          <i data-lucide="eye" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <div>
          <h3>Final Walk-Through Guarantee</h3>
          <p>Before we close out any post-construction job, we walk every room and every surface. If something isn't right, we address it before the client walkthrough — not after.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-primary);
     clip-path:polygon(0 0,100% 65%,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── MID-PAGE CTA (CTA #2) ─────────────────────────────────────────────── -->
<div class="cta-banner" role="complementary" aria-label="Book post-construction cleaning">
  <div class="container" data-animate="fade-up">
    <span class="mid-cta-eyebrow">Project Wrapping Up?</span>
    <h2 style="color:white;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);">
      Book the Final Clean Before Walkthrough Day
    </h2>
    <p style="color:rgba(255,255,255,0.85);max-width:52ch;margin:0 auto var(--space-5);">
      We schedule within 2–5 business days in most cases. Contact us as soon as your construction
      timeline is confirmed — we'll coordinate with your contractor if needed.
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
      Request a Post-Build Quote
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
      <span class="eyebrow">Our Process</span>
      <h2>How a Post-Construction Clean Works</h2>
      <p>Four phases from site assessment to move-in ready.</p>
    </div>

    <div class="phase-steps" data-animate="fade-up">

      <div class="phase-step">
        <div class="phase-num" aria-hidden="true">01</div>
        <div class="phase-icon">
          <i data-lucide="search" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3>Site Assessment</h3>
        <p>We walk the site on arrival to evaluate project scope, identify surface types requiring special products, and flag any areas with unusually heavy buildup before cleaning begins.</p>
      </div>

      <div class="phase-step">
        <div class="phase-num" aria-hidden="true">02</div>
        <div class="phase-icon">
          <i data-lucide="trash-2" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3>Bulk Debris Removal</h3>
        <p>All bulk construction waste, leftover materials, packaging, and debris is cleared from every room. This step sets up the surface-level clean that follows and prevents re-contamination.</p>
      </div>

      <div class="phase-step">
        <div class="phase-num" aria-hidden="true">03</div>
        <div class="phase-icon">
          <i data-lucide="sparkles" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3>Detail Surface Clean</h3>
        <p>Drywall dust, adhesive residue, paint overspray, grout haze, and construction film removed from every surface — walls, fixtures, windows, floors, cabinets, and trim. Nothing residue-coated gets signed off.</p>
      </div>

      <div class="phase-step">
        <div class="phase-num" aria-hidden="true">04</div>
        <div class="phase-icon">
          <i data-lucide="check-square" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3>Final Inspection</h3>
        <p>Room by room, we verify every zone meets our standard before signing off. You get a space that's clean enough to move into, stage for sale, or present to clients.</p>
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
      <h2>Post-Construction Cleaning FAQs</h2>
      <p>What contractors and homeowners in Hayes, VA ask before booking final-stage cleanup.</p>
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
<section class="closing-cta" aria-label="Book post-construction cleaning">
  <div class="container" data-animate="fade-up">
    <span class="closing-cta-eyebrow">Project Complete?</span>
    <h2>Your Build Deserves a Final Clean That Matches the Work</h2>
    <p>Keep N Kleen serves Hayes, Gloucester, Yorktown, Williamsburg, Newport News, and communities
       across Virginia. Free estimates for post-construction cleanups of all sizes.</p>

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
        Get My Post-Build Estimate
        <i data-lucide="arrow-right" aria-hidden="true" style="width:18px;height:18px;"></i>
      </a>
      <a href="/services" class="btn btn-outline-white btn-lg">
        All Services
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
