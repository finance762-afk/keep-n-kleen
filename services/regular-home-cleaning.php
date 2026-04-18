<?php
/**
 * services/regular-home-cleaning.php — Regular Home Cleaning
 * Keep N Kleen | Page One Insights
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$pageTitle       = 'Regular Home Cleaning Hayes, VA | Keep N Kleen';
$pageDescription = 'Weekly, bi-weekly & monthly home cleaning in Hayes, VA from Keep N Kleen. Same crew, same checklist — consistent results every visit. Free estimates.';
$canonicalUrl    = $canonicalBase . '/services/regular-home-cleaning';
$ogImage         = $clientImages[6]['url'];
$currentPage     = 'regular-home-cleaning';
$heroImagePreload = $clientImages[6]['url'];

$pageFaqs = [
    [
        'q' => 'What frequency of home cleaning is right for me?',
        'a' => 'Weekly cleaning is ideal for busy households, families with children or pets, or anyone who wants a consistently maintained home. Bi-weekly suits most single-family homes and is our most popular plan. Monthly is a good fit for smaller households that maintain their space well between visits but want a thorough clean on a reliable schedule.',
    ],
    [
        'q' => 'What\'s included in a regular cleaning visit?',
        'a' => 'Every regular visit covers kitchens (countertops, sink, stovetop exterior, appliance exteriors), all bathrooms (toilet, tub/shower, vanity, mirrors), bedroom surfaces and dusting, vacuuming all carpets and rugs, mopping hard floors, wiping baseboards, and trash removal. We follow the same checklist each visit so standards stay consistent.',
    ],
    [
        'q' => 'Can I skip a visit or adjust my schedule?',
        'a' => 'Yes — life changes and we understand that. We ask for reasonable advance notice for skips or reschedules. If you need to increase or decrease frequency seasonally, just contact us and we\'ll adjust your plan accordingly.',
    ],
    [
        'q' => 'Do you bring your own supplies and equipment?',
        'a' => 'Yes. Our crew arrives with all cleaning supplies, products, and equipment. If you have preferred products you\'d like us to use — particularly for surfaces that require specific care — just let us know ahead of your first visit.',
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
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Regular Home Cleaning', 'item' => $canonicalBase . '/services/regular-home-cleaning'],
            ],
        ],
        [
            '@type'       => 'Service',
            'name'        => 'Regular Home Cleaning',
            'description' => 'Weekly, bi-weekly, and monthly recurring home cleaning in Hayes, VA. Consistent crews, customized checklists, and reliable scheduling for homes across Virginia.',
            'serviceType' => 'Regular Home Cleaning',
            'url'         => $canonicalBase . '/services/regular-home-cleaning',
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
            'name'  => 'Getting Started with Regular Home Cleaning',
            'step'  => [
                ['@type' => 'HowToStep', 'position' => 1, 'name' => 'Choose Your Frequency', 'text' => 'Tell us how often you need service — weekly, bi-weekly, or monthly. We\'ll recommend the right plan for your home\'s size and lifestyle.'],
                ['@type' => 'HowToStep', 'position' => 2, 'name' => 'First-Visit Walkthrough', 'text' => 'Your initial clean includes a walkthrough to document your priorities, preferences, and any areas requiring special attention.'],
                ['@type' => 'HowToStep', 'position' => 3, 'name' => 'Recurring Schedule Locked', 'text' => 'We assign your crew and lock in your recurring schedule. Same crew, same day, same standard — every visit.'],
                ['@type' => 'HowToStep', 'position' => 4, 'name' => 'Ongoing & Adjustable', 'text' => 'Skip a visit, adjust frequency, or add services any time. Your plan adapts to your life, not the other way around.'],
            ],
        ],
        generateFAQSchema($pageFaqs),
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ── Page Hero ────────────────────────────────────────────────────────────── */
.page-hero-diagonal {
  position: relative;
  min-height: 62vh;
  display: flex; align-items: center;
  overflow: hidden;
  padding-top: 80px;
  background-size: cover;
  background-position: center;
}
.page-hero-diagonal::before {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(105deg, rgba(26,43,60,0.96) 45%, rgba(26,43,60,0.45) 100%);
  z-index: 1;
}
.page-hero-diagonal .hero-inner {
  position: relative; z-index: 2;
  padding: var(--space-12) 5%;
  max-width: 640px;
}
.page-hero-diagonal h1 {
  color: var(--color-white);
  font-size: clamp(2rem, 4.5vw, 3.5rem);
  letter-spacing: -0.02em;
  line-height: 1.12;
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
.hero-sub-left { color: rgba(255,255,255,0.87); font-size: var(--font-size-base); line-height: 1.65; margin-bottom: var(--space-8); max-width: 50ch; }
.hero-actions-left { display: flex; gap: var(--space-3); flex-wrap: wrap; }

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

/* ── Plan Cards (signature section) ─────────────────────────────────────── */
.plans-grid {
  display: grid;
  grid-template-columns: 1fr 1.1fr 1fr;
  gap: var(--space-6);
  align-items: start;
}
.plan-card {
  background: var(--color-white);
  border-radius: var(--radius-xl);
  padding: var(--space-8);
  box-shadow: var(--shadow-card);
  border-top: 4px solid var(--color-gray-light);
  transition: all var(--transition-base);
  position: relative;
  overflow: hidden;
}
.plan-card:hover { box-shadow: var(--shadow-xl); transform: translateY(-4px); }
.plan-card.featured {
  border-top-color: var(--color-accent);
  box-shadow: var(--shadow-xl);
  transform: scale(1.04);
  background: var(--color-primary);
  color: white;
}
.plan-card.featured:hover { transform: scale(1.04) translateY(-4px); }
.plan-badge {
  display: inline-block;
  background: var(--color-accent);
  color: white;
  font-family: var(--font-heading);
  font-size: var(--font-size-xs);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  padding: var(--space-1) var(--space-3);
  border-radius: var(--radius-full);
  margin-bottom: var(--space-4);
}
.plan-freq {
  font-family: var(--font-heading);
  font-size: clamp(1.5rem, 2.5vw, 2rem);
  font-weight: 800;
  letter-spacing: -0.02em;
  margin-bottom: var(--space-2);
}
.plan-card.featured .plan-freq { color: white; }
.plan-desc {
  font-size: var(--font-size-sm);
  line-height: 1.65;
  margin-bottom: var(--space-6);
}
.plan-card.featured .plan-desc { color: rgba(255,255,255,0.78); }
.plan-list { list-style: none; margin-bottom: var(--space-8); }
.plan-list li {
  display: flex; align-items: flex-start; gap: var(--space-2);
  font-size: var(--font-size-sm); line-height: 1.5;
  margin-bottom: var(--space-2);
}
.plan-card.featured .plan-list li { color: rgba(255,255,255,0.88); }
.plan-list li i { color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }
.plan-card .plan-cta { width: 100%; justify-content: center; }

/* ── About split ───────────────────────────────────────────────────────── */
.detail-split {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-12);
  align-items: center;
}
.detail-photo-wrap {
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
}
.detail-photo-wrap img { width: 100%; height: 450px; object-fit: cover; }

/* ── Why choose ───────────────────────────────────────────────────────── */
.why-row {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-6);
}
.why-item {
  text-align: center;
  padding: var(--space-6);
  background: var(--color-white);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-card);
  transition: box-shadow var(--transition-base);
}
.why-item:hover { box-shadow: var(--shadow-lg); }
.why-item-icon {
  width: 56px; height: 56px;
  border-radius: var(--radius-full);
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-4);
  color: var(--color-accent);
}
.why-item h3 { font-size: var(--font-size-base); margin-bottom: var(--space-2); }
.why-item p { font-size: var(--font-size-sm); color: var(--color-gray); margin: 0; line-height: 1.6; }

/* ── CTA / Closing ────────────────────────────────────────────────────── */
.mid-cta-phone {
  display: inline-flex; align-items: center; gap: var(--space-2);
  font-family: var(--font-heading); font-size: clamp(1.4rem,2.8vw,1.9rem);
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
.last-updated { font-size: var(--font-size-xs); color: var(--color-gray); font-style: italic; margin-top: var(--space-6); }

/* Responsive */
@media (max-width: 1023px) {
  .plans-grid { grid-template-columns: 1fr; }
  .plan-card.featured { transform: none; }
  .detail-split { grid-template-columns: 1fr; }
  .why-row { grid-template-columns: repeat(2,1fr); }
}
@media (max-width: 767px) {
  .why-row { grid-template-columns: 1fr; }
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
      <li><span aria-current="page">Regular Home Cleaning</span></li>
    </ol>
  </div>
</nav>

<!-- ── PAGE HERO (CTA #1) ────────────────────────────────────────────────── -->
<section class="page-hero-diagonal"
         style="background-image: url('<?php echo htmlspecialchars($clientImages[6]['url'], ENT_QUOTES, 'UTF-8'); ?>');"
         aria-label="Regular Home Cleaning in Hayes, VA">

  <div class="hero-inner">
    <div class="hero-eyebrow-pill">
      <i data-lucide="repeat" aria-hidden="true" style="width:13px;height:13px;"></i>
      Regular Home Cleaning · Hayes, VA
    </div>

    <h1>A Clean Home Every Week Without Lifting a Finger</h1>

    <p class="hero-sub-left">
      Choose your frequency. We handle the rest — consistent crew, consistent checklist,
      consistent results. Weekly, bi-weekly, or monthly.
    </p>

    <div class="hero-actions-left">
      <a href="/contact" class="btn btn-accent btn-lg">
        <i data-lucide="calendar" aria-hidden="true" style="width:18px;height:18px;"></i>
        Get Your Plan &amp; Estimate
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
        ['icon' => 'repeat',        'text' => 'Weekly Home Cleaning Hayes VA'],
        ['icon' => 'calendar-check','text' => 'Bi-Weekly Cleaning Plans'],
        ['icon' => 'home',          'text' => 'Monthly Recurring Service'],
        ['icon' => 'shield-check',  'text' => 'Licensed &amp; Insured'],
        ['icon' => 'star',          'text' => '5.0 Google Rating'],
        ['icon' => 'leaf',          'text' => 'Eco-Friendly Options'],
        ['icon' => 'users',         'text' => 'Consistent Crew Each Visit'],
        ['icon' => 'clock',         'text' => 'Reliable Scheduling'],
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

<!-- ── PLAN CARDS (signature section) ────────────────────────────────────── -->
<section style="background:var(--color-light);padding:var(--space-16) 0;">
  <div class="container">
    <div class="section-header" data-animate="fade-up">
      <span class="eyebrow">Recurring Cleaning Plans</span>
      <h2>Pick the Frequency That Fits Your Life</h2>
      <p>Every plan uses the same checklist and the same crew. The only difference is how often we show up.</p>
    </div>

    <div class="plans-grid" data-animate="fade-up">

      <!-- Weekly -->
      <div class="plan-card card">
        <div class="plan-freq">Weekly</div>
        <p class="plan-desc">The best fit for busy households, families with kids or pets, or anyone who wants their home consistently maintained without the effort.</p>
        <ul class="plan-list">
          <li><i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>Most consistent maintenance</li>
          <li><i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>Ideal for 3+ bedrooms</li>
          <li><i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>Great for pet households</li>
          <li><i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>Shorter sessions per visit</li>
        </ul>
        <a href="/contact" class="btn btn-primary plan-cta">Get Weekly Estimate</a>
      </div>

      <!-- Bi-Weekly (featured) -->
      <div class="plan-card featured card">
        <span class="plan-badge">Most Popular</span>
        <div class="plan-freq">Bi-Weekly</div>
        <p class="plan-desc">Our most requested plan — every two weeks hits the sweet spot between maintaining standards and keeping service manageable for most homes.</p>
        <ul class="plan-list">
          <li><i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>Perfect for most homes</li>
          <li><i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>Same crew each visit</li>
          <li><i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>Full checklist every time</li>
          <li><i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>Easily adjustable</li>
        </ul>
        <a href="/contact" class="btn btn-accent plan-cta">Get Bi-Weekly Estimate</a>
      </div>

      <!-- Monthly -->
      <div class="plan-card card">
        <div class="plan-freq">Monthly</div>
        <p class="plan-desc">A thorough monthly clean for smaller households that maintain their space well between visits but want a reliable, professional-grade clean on schedule.</p>
        <ul class="plan-list">
          <li><i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>Deep attention each visit</li>
          <li><i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>Great for 1–2 bedrooms</li>
          <li><i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>Low-maintenance households</li>
          <li><i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>Combines with deep cleans</li>
        </ul>
        <a href="/contact" class="btn btn-primary plan-cta">Get Monthly Estimate</a>
      </div>

    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-white);
     clip-path:polygon(0 0,100% 60%,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── DETAIL SECTION ─────────────────────────────────────────────────────── -->
<section style="background:var(--color-white);padding:var(--space-16) 0;">
  <div class="container">
    <div class="detail-split">

      <!-- Left: photo -->
      <div data-animate="fade-up">
        <div class="detail-photo-wrap img-reveal">
          <picture>
            <source srcset="<?php echo htmlspecialchars($clientImages[11]['url'], ENT_QUOTES, 'UTF-8'); ?>" type="image/jpeg">
            <img src="<?php echo htmlspecialchars($clientImages[11]['url'], ENT_QUOTES, 'UTF-8'); ?>"
                 alt="Regular home cleaning in Hayes VA — Keep N Kleen team at work"
                 width="600" height="450"
                 loading="lazy">
          </picture>
        </div>
      </div>

      <!-- Right: copy -->
      <div data-animate="fade-up">
        <span class="eyebrow" style="color:var(--color-primary);">The Detail</span>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.5rem);letter-spacing:-0.02em;margin-bottom:var(--space-5);">
          What Every Regular Visit Covers
        </h2>

        <p style="color:var(--color-gray);line-height:1.75;">
          A recurring clean isn't a lighter version of our service — it's the same thorough checklist
          run on a predictable schedule. That means every visit your kitchen gets properly wiped,
          every bathroom is sanitized, floors are vacuumed and mopped, and surfaces throughout the
          house are dusted and spot-cleaned.
        </p>

        <p style="color:var(--color-gray);line-height:1.75;">
          For homeowners in Hayes and the surrounding Virginia communities — Gloucester, Shacklefords,
          Ware Neck — the real benefit is the accumulated effect. A home that's properly cleaned every
          two weeks doesn't build up the kind of grime that turns into a project. Your space stays
          genuinely maintained, not just periodically rescued.
        </p>

        <p style="color:var(--color-gray);line-height:1.75;">
          We document your preferences after the first visit — what needs extra attention, which rooms
          are priorities, any products to avoid. From visit two onward, your crew follows that profile.
          You don't have to re-explain anything.
        </p>

        <p class="last-updated">Last Updated: April 2026</p>
      </div>

    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-light);
     clip-path:polygon(0 0,100% 45%,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── WHY CHOOSE US ──────────────────────────────────────────────────────── -->
<section style="background:var(--color-light);padding:var(--space-16) 0;">
  <div class="container">
    <div class="section-header" data-animate="fade-up">
      <span class="eyebrow">What Sets Us Apart</span>
      <h2>Four Reasons Clients Stay With Us</h2>
    </div>

    <div class="why-row" data-animate="fade-up">

      <div class="why-item card">
        <div class="why-item-icon">
          <i data-lucide="users" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3>Same Crew Every Time</h3>
        <p>We assign your crew and keep them consistent. Familiarity with your home means faster, better results — every visit.</p>
      </div>

      <div class="why-item card">
        <div class="why-item-icon">
          <i data-lucide="shield-check" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3>Background-Checked Staff</h3>
        <p>Every crew member is vetted. You're inviting us into your home — we take that seriously, and we act like it.</p>
      </div>

      <div class="why-item card">
        <div class="why-item-icon">
          <i data-lucide="leaf" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3>Eco Options Available</h3>
        <p>If you have product sensitivities, pets, or young children, we have effective eco-friendly alternatives ready to use.</p>
      </div>

      <div class="why-item card">
        <div class="why-item-icon">
          <i data-lucide="calendar-check" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3>Flexible Scheduling</h3>
        <p>Life changes — we adjust. Skip visits, modify frequency, or pause service with reasonable notice, no penalty.</p>
      </div>

    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-primary);
     clip-path:polygon(0 0,100% 65%,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── MID-PAGE CTA (CTA #2) ─────────────────────────────────────────────── -->
<div class="cta-banner" role="complementary" aria-label="Start your recurring cleaning plan">
  <div class="container" data-animate="fade-up">
    <span class="mid-cta-eyebrow">Choose Your Plan</span>
    <h2 style="color:white;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);">
      Lock In Your Schedule — Free Estimate, No Obligation
    </h2>
    <p style="color:rgba(255,255,255,0.85);max-width:52ch;margin:0 auto var(--space-5);">
      Tell us how often you need service, your home's size, and any priorities. We'll confirm
      a schedule that works around your week.
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
<div aria-hidden="true" style="height:48px;background:var(--color-white);
     clip-path:polygon(0 0,100% 0,100% 100%,0 70%);margin-top:-2px;"></div>

<!-- ── FAQ ────────────────────────────────────────────────────────────────── -->
<section style="background:var(--color-white);padding:var(--space-16) 0;">
  <div class="container">
    <div class="section-header" data-animate="fade-up">
      <span class="eyebrow">Common Questions</span>
      <h2>Regular Cleaning FAQs</h2>
      <p>What Hayes homeowners ask before starting their recurring plan.</p>
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
<section class="closing-cta" aria-label="Start your regular cleaning plan">
  <div class="container" data-animate="fade-up">
    <span class="closing-cta-eyebrow">Get Started Today</span>
    <h2>Give Your Weekends Back to Yourself</h2>
    <p>Keep N Kleen serves Hayes and communities across Virginia. Weekly, bi-weekly, or monthly —
       pick your plan and we handle the rest. Free estimates, no commitment.</p>

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
        Start My Cleaning Plan
        <i data-lucide="arrow-right" aria-hidden="true" style="width:18px;height:18px;"></i>
      </a>
      <a href="/services" class="btn btn-outline-white btn-lg">
        View All Services
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
