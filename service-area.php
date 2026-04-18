<?php
/**
 * service-area.php — Service Areas
 * Keep N Kleen | Page One Insights
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$pageTitle       = 'Cleaning Services Near Me — Hayes, VA | Keep N Kleen';
$pageDescription = 'Keep N Kleen cleans homes in Hayes, VA & communities across Virginia — Gloucester, Yorktown, Newport News, Williamsburg & Hampton. 55-mile service radius.';
$canonicalUrl    = $canonicalBase . '/service-area';
$ogImage         = $clientImages[5]['url'];
$currentPage     = 'service-area';

// Extended service area communities
$serviceAreaCommunities = [
    [
        'name'    => 'Hayes, VA',
        'desc'    => 'Our home base. We serve every neighborhood in Hayes with full availability for maid services, regular cleaning, move-out cleans, and post-construction cleanup.',
        'primary' => true,
    ],
    [
        'name'    => 'Gloucester, VA',
        'desc'    => 'Residential and commercial cleaning throughout Gloucester County — from Gloucester Courthouse to Achilles and Beaverlett.',
        'primary' => false,
    ],
    [
        'name'    => 'Yorktown, VA',
        'desc'    => 'Serving homeowners and businesses in historic Yorktown and surrounding York County communities near the Colonial Parkway.',
        'primary' => false,
    ],
    [
        'name'    => 'Newport News, VA',
        'desc'    => 'Maid services, move-out cleans, and recurring home cleaning for Newport News residents throughout the city.',
        'primary' => false,
    ],
    [
        'name'    => 'Williamsburg, VA',
        'desc'    => 'Cleaning services for homeowners in Williamsburg, James City County, and surrounding communities in the Greater Williamsburg area.',
        'primary' => false,
    ],
    [
        'name'    => 'Poquoson, VA',
        'desc'    => 'Professional residential and post-construction cleaning for Poquoson homes, including waterfront and newer development properties.',
        'primary' => false,
    ],
    [
        'name'    => 'Hampton, VA',
        'desc'    => 'Home cleaning, maid services, and move-in/move-out cleaning for Hampton homeowners and property managers.',
        'primary' => false,
    ],
    [
        'name'    => 'Mathews, VA',
        'desc'    => 'Serving Mathews County homes and businesses near the Chesapeake Bay — full range of cleaning services available.',
        'primary' => false,
    ],
    [
        'name'    => 'Ware Neck, VA',
        'desc'    => 'Regular and one-time cleaning services for homes and properties in Ware Neck and the greater Gloucester Point area.',
        'primary' => false,
    ],
    [
        'name'    => 'Shacklefords, VA',
        'desc'    => 'Residential cleaning services for homes in Shacklefords and the surrounding King and Queen County area.',
        'primary' => false,
    ],
    [
        'name'    => 'Gloucester Point, VA',
        'desc'    => 'Full cleaning services for Gloucester Point residents — conveniently located near our Hayes home base for quick scheduling.',
        'primary' => false,
    ],
    [
        'name'    => 'North Carolina (Select Areas)',
        'desc'    => 'We extend service into select North Carolina communities within our service radius. Contact us to confirm coverage for your specific location.',
        'primary' => false,
    ],
];

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'           => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',         'item' => $canonicalBase],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Service Area', 'item' => $canonicalBase . '/service-area'],
            ],
        ],
        [
            '@type'       => 'LocalBusiness',
            'name'        => $siteName,
            'url'         => $canonicalBase,
            'areaServed'  => array_map(function ($area) { return ['@type' => 'City', 'name' => $area['name']]; }, $serviceAreaCommunities),
        ],
        [
            '@type'      => 'FAQPage',
            'mainEntity' => [
                [
                    '@type'          => 'Question',
                    'name'           => 'Does Keep N Kleen offer cleaning services near me?',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Keep N Kleen serves Hayes, VA and communities within 55 miles — including Gloucester, Yorktown, Newport News, Williamsburg, Poquoson, Hampton, Mathews, and select North Carolina areas. Contact us to confirm coverage for your specific location.'],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Do you charge extra for locations farther from Hayes?',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Travel fees may apply for locations at the edge of our service area. We\'ll be upfront about any additional costs when providing your estimate — no surprises at booking.'],
                ],
            ],
        ],
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ── Page Hero ────────────────────────────────────────────────────────────── */
.area-hero {
  position: relative;
  min-height: 58vh;
  display: flex; align-items: center; justify-content: center;
  text-align: center;
  overflow: hidden;
  padding-top: 80px;
  background-size: cover;
  background-position: center;
}
.area-hero::before {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(160deg, rgba(26,43,60,0.92) 0%, rgba(6,182,212,0.2) 100%);
  z-index: 1;
}
.area-hero .hero-inner {
  position: relative; z-index: 2;
  max-width: 760px; padding: var(--space-12) var(--space-8);
}
.area-hero h1 {
  color: white;
  font-size: clamp(2rem,4.5vw,3.4rem);
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
.area-hero-sub { color: rgba(255,255,255,0.87); font-size: var(--font-size-lg); line-height: 1.65; margin-bottom: var(--space-8); }
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

/* ── Area grid (signature section) ─────────────────────────────────────── */
.area-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-5);
}
.area-card {
  background: var(--color-white);
  border-radius: var(--radius-lg);
  padding: var(--space-7) var(--space-6);
  box-shadow: var(--shadow-card);
  transition: all var(--transition-base);
  border-top: 3px solid transparent;
  position: relative;
  overflow: hidden;
}
.area-card.primary-area {
  border-top-color: var(--color-accent);
  grid-column: span 1;
  background: linear-gradient(135deg, var(--color-primary) 0%, #243d52 100%);
  color: white;
}
.area-card:not(.primary-area):hover {
  transform: translateY(-3px);
  box-shadow: var(--shadow-lg);
  border-top-color: var(--color-accent);
}
.area-name {
  font-family: var(--font-heading);
  font-size: var(--font-size-lg);
  font-weight: 700;
  margin-bottom: var(--space-3);
  display: flex; align-items: center; gap: var(--space-2);
}
.area-card.primary-area .area-name { color: white; }
.area-badge {
  display: inline-block;
  background: var(--color-accent);
  color: white;
  font-size: var(--font-size-xs);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  padding: 2px 8px;
  border-radius: var(--radius-full);
}
.area-desc { font-size: var(--font-size-sm); line-height: 1.65; }
.area-card.primary-area .area-desc { color: rgba(255,255,255,0.8); }
.area-card:not(.primary-area) .area-desc { color: var(--color-gray); }

/* ── Map placeholder ─────────────────────────────────────────────────────── */
.map-section {
  background: var(--color-light);
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  position: relative;
}
.map-inner {
  height: 320px;
  display: flex; flex-direction: column;
  align-items: center; justify-content: center;
  gap: var(--space-3);
  background: linear-gradient(135deg, var(--color-primary) 0%, #243d52 100%);
  color: white; text-align: center; padding: var(--space-8);
}
.map-inner p { color: rgba(255,255,255,0.75); font-size: var(--font-size-sm); max-width: 45ch; margin: 0; }

/* ── Answer block ─────────────────────────────────────────────────────────── */
.answer-block {
  background: var(--color-light);
  border-radius: var(--radius-lg);
  padding: var(--space-6) var(--space-8);
  border-left: 4px solid var(--color-accent);
  margin-bottom: var(--space-6);
}
.answer-block h2 { font-size: var(--font-size-lg); margin-bottom: var(--space-3); }
.answer-block p { color: var(--color-gray); font-size: var(--font-size-sm); line-height: 1.7; margin: 0; }

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
  .area-grid { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 767px) {
  .area-grid { grid-template-columns: 1fr; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ── BREADCRUMB ────────────────────────────────────────────────────────── -->
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><span class="breadcrumb-sep" aria-hidden="true">›</span></li>
      <li><span aria-current="page">Service Area</span></li>
    </ol>
  </div>
</nav>

<!-- ── PAGE HERO (CTA #1) ────────────────────────────────────────────────── -->
<section class="area-hero"
         style="background-image: url('<?php echo htmlspecialchars($clientImages[5]['url'], ENT_QUOTES, 'UTF-8'); ?>');"
         aria-label="Keep N Kleen service area">

  <div class="hero-inner">
    <div class="hero-eyebrow-pill">
      <i data-lucide="map-pin" aria-hidden="true" style="width:13px;height:13px;"></i>
      Service Area · Hayes, VA &amp; Beyond
    </div>

    <h1>Professional Cleaning Services in Hayes, VA &amp; Surrounding Communities</h1>

    <p class="area-hero-sub">
      Based in Hayes, VA — Keep N Kleen serves homeowners, renters, and businesses
      across Virginia and into North Carolina, within a 55-mile radius.
    </p>

    <div class="hero-actions">
      <a href="/contact" class="btn btn-accent btn-lg">
        <i data-lucide="calendar" aria-hidden="true" style="width:18px;height:18px;"></i>
        Check Availability Near You
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
        ['icon' => 'map-pin',       'text' => 'Hayes, VA — Home Base'],
        ['icon' => 'map-pin',       'text' => 'Gloucester, VA'],
        ['icon' => 'map-pin',       'text' => 'Yorktown, VA'],
        ['icon' => 'map-pin',       'text' => 'Newport News, VA'],
        ['icon' => 'map-pin',       'text' => 'Williamsburg, VA'],
        ['icon' => 'map-pin',       'text' => 'Hampton, VA'],
        ['icon' => 'map-pin',       'text' => 'Poquoson, VA'],
        ['icon' => 'map-pin',       'text' => '55-Mile Service Radius'],
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

<!-- ── ANSWER BLOCKS (AEO) ───────────────────────────────────────────────── -->
<section style="background:var(--color-white);padding:var(--space-12) 0 var(--space-4);">
  <div class="container-narrow" data-animate="fade-up">

    <div class="answer-block">
      <h2>Does Keep N Kleen offer cleaning services near me?</h2>
      <p>Keep N Kleen provides professional cleaning services throughout Hayes, VA and communities across Virginia, including Gloucester, Yorktown, Newport News, Williamsburg, Poquoson, Hampton, Mathews, and select North Carolina locations — all within our 55-mile service radius. Contact us to confirm availability in your specific area.</p>
    </div>

    <div class="answer-block">
      <h2>What cleaning services are available throughout the service area?</h2>
      <p>All of our core services are available across the full service area: maid services, regular home cleaning (weekly, bi-weekly, monthly), move-in/move-out cleaning, and post-construction cleanup. Service frequency and scheduling may vary slightly based on distance from our Hayes, VA base.</p>
    </div>

  </div>
</section>

<!-- ── AREA GRID ─────────────────────────────────────────────────────────── -->
<section style="background:var(--color-white);padding:var(--space-4) 0 var(--space-16);">
  <div class="container">
    <div class="section-header" data-animate="fade-up">
      <span class="eyebrow">Where We Work</span>
      <h2>Communities We Serve</h2>
      <p>From our home base in Hayes to the outer reaches of our service area — here's where you can find Keep N Kleen.</p>
    </div>

    <div class="area-grid" data-animate="fade-up">
      <?php foreach ($serviceAreaCommunities as $community): ?>
      <div class="area-card <?php echo $community['primary'] ? 'primary-area' : ''; ?>">
        <div class="area-name">
          <i data-lucide="map-pin" aria-hidden="true" style="width:16px;height:16px;color:var(--color-accent);flex-shrink:0;"></i>
          <?php echo htmlspecialchars($community['name'], ENT_QUOTES, 'UTF-8'); ?>
          <?php if ($community['primary']): ?>
          <span class="area-badge">Our Home Base</span>
          <?php endif; ?>
        </div>
        <p class="area-desc"><?php echo htmlspecialchars($community['desc'], ENT_QUOTES, 'UTF-8'); ?></p>
        <?php if ($community['primary']): ?>
        <a href="/contact" class="btn btn-accent" style="margin-top:var(--space-5);display:inline-flex;">
          Book in Hayes
          <i data-lucide="arrow-right" aria-hidden="true" style="width:15px;height:15px;"></i>
        </a>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-light);
     clip-path:polygon(0 0,100% 55%,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── MAP + RADIUS INFO ─────────────────────────────────────────────────── -->
<section style="background:var(--color-light);padding:var(--space-16) 0;">
  <div class="container">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:var(--space-10);align-items:center;" data-animate="fade-up">

      <!-- Map placeholder -->
      <div class="map-section">
        <!-- Enable when domain confirmed:
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!..."
          loading="lazy"
          title="Keep N Kleen service area map — Hayes VA and surrounding communities"
          aria-label="Map of Keep N Kleen service area">
        </iframe>
        -->
        <div class="map-inner">
          <i data-lucide="map" style="width:48px;height:48px;color:var(--color-accent);" aria-hidden="true"></i>
          <h3 style="color:white;font-size:var(--font-size-xl);">Service Radius: 55 Miles</h3>
          <p>Centered in Hayes, VA (23072) — covering communities across Virginia's Middle Peninsula, Peninsula, and Hampton Roads regions.</p>
          <a href="/contact" class="btn btn-accent" style="margin-top:var(--space-3);">
            Confirm Your Location
            <i data-lucide="arrow-right" aria-hidden="true" style="width:16px;height:16px;"></i>
          </a>
        </div>
      </div>

      <!-- Local copy -->
      <div>
        <span class="eyebrow" style="color:var(--color-primary);">Local Expertise</span>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.4rem);letter-spacing:-0.02em;margin-bottom:var(--space-5);">
          Virginia Homes Know Virginia Cleaning
        </h2>
        <p style="color:var(--color-gray);line-height:1.75;margin-bottom:var(--space-4);">
          The humidity along the Chesapeake Bay affects how surfaces accumulate grime. The older homes
          in Gloucester County have specific surfaces and materials that need appropriate care. Post-construction
          cleanup from the ongoing development around Williamsburg and Newport News requires a different
          approach than general residential cleaning.
        </p>
        <p style="color:var(--color-gray);line-height:1.75;margin-bottom:var(--space-6);">
          Keep N Kleen is based in Hayes — not a franchise operation with a Virginia phone number.
          We know the region, we serve the region, and the clients we work with are our neighbors.
          That's not a marketing line — it's why our team takes every job seriously.
        </p>
        <a href="/services" class="btn btn-primary">
          View Our Services
          <i data-lucide="arrow-right" aria-hidden="true" style="width:16px;height:16px;"></i>
        </a>
      </div>

    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-primary);
     clip-path:polygon(0 0,100% 65%,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── MID-PAGE CTA (CTA #2) ─────────────────────────────────────────────── -->
<div class="cta-banner" role="complementary" aria-label="Check service availability">
  <div class="container" data-animate="fade-up">
    <span class="mid-cta-eyebrow">Not Sure if We Cover Your Area?</span>
    <h2 style="color:white;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);">
      Contact Us — We'll Confirm Coverage in Minutes
    </h2>
    <p style="color:rgba(255,255,255,0.85);max-width:52ch;margin:0 auto var(--space-5);">
      If you're within 55 miles of Hayes, VA, there's a good chance we can serve you. Reach out and
      we'll confirm coverage and provide a free estimate.
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
      Check My Area &amp; Get an Estimate
      <i data-lucide="arrow-right" aria-hidden="true" style="width:18px;height:18px;"></i>
    </a>
  </div>
</div>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-primary);
     clip-path:polygon(0 60%,100% 0,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── CLOSING CTA (CTA #3) ───────────────────────────────────────────────── -->
<section class="closing-cta" aria-label="Get cleaning services in your area">
  <div class="container" data-animate="fade-up">
    <span class="closing-cta-eyebrow">Serving Your Community</span>
    <h2>Professional Cleaning Services Available Near You</h2>
    <p>From Hayes to Hampton, Gloucester to Williamsburg — Keep N Kleen brings reliable,
       consistent cleaning to your community. Free estimates, no contracts, prompt scheduling.</p>

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
      <a href="/services" class="btn btn-outline-white btn-lg">
        View All Services
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
