<?php
/**
 * index.php — Homepage
 * Keep N Kleen | Page One Insights
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

// ── Page meta ────────────────────────────────────────────────────────────────
$pageTitle       = 'Keep N Kleen | Cleaning Service in Hayes, VA';
$pageDescription = 'Keep N Kleen delivers reliable maid services, regular home cleaning, move-in/out cleaning, and post-construction cleanup across Hayes, VA. Licensed & insured since 2021. Free estimates.';
$canonicalUrl    = $canonicalBase;
$ogImage         = $clientImages[0]['url'];
$currentPage     = 'home';
$heroImagePreload = $clientImages[0]['url'];
$useSwiper        = true;

// ── Homepage FAQs (6 items) ──────────────────────────────────────────────────
$homeFaqs = [
    [
        'q' => 'What areas do you serve around Hayes, VA?',
        'a' => 'Keep N Kleen serves Hayes and surrounding communities throughout Virginia and North Carolina — including Gloucester, Yorktown, Newport News, Williamsburg, and beyond — up to 55 miles from our Hayes, VA home base.',
    ],
    [
        'q' => 'What types of spaces do you clean?',
        'a' => 'We clean single-family homes, condos, apartments, offices, retail spaces, medical facilities, new construction, and post-renovation properties. Whether it\'s a 900 sq ft apartment or a large commercial facility, our trained team handles it.',
    ],
    [
        'q' => 'Can you customize a cleaning plan for my schedule?',
        'a' => 'Absolutely. We offer weekly, bi-weekly, and monthly recurring plans — and we can mix services to match your priorities and budget. Just tell us what your space needs and we\'ll build around it.',
    ],
    [
        'q' => 'Do you use eco-friendly cleaning products?',
        'a' => 'Yes. We offer environmentally responsible cleaning solutions and can use eco-friendly products upon request. Our team selects products appropriate for your surfaces and any sensitivities in the space.',
    ],
    [
        'q' => 'How quickly can you get started?',
        'a' => 'We work hard to get new clients scheduled promptly. Contact us for current availability — in many cases we can have a team out within a few business days of your first inquiry.',
    ],
    [
        'q' => 'What\'s included in a move-out clean?',
        'a' => 'Our move-out cleans cover the full property top to bottom: appliances inside and out, cabinets, baseboards, bathrooms, windows, and all floor surfaces. We\'re thorough enough to help you recover your security deposit.',
    ],
];

// ── Page-specific schema (@graph: WebSite + FAQPage) ─────────────────────────
$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type' => 'WebSite',
            'name'  => $siteName,
            'url'   => $canonicalBase,
            'potentialAction' => [
                '@type'       => 'SearchAction',
                'target'      => $canonicalBase . '/?s={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ],
        ],
        [
            '@type'      => 'FAQPage',
            'mainEntity' => array_map(function (array $faq): array {
                return [
                    '@type'          => 'Question',
                    'name'           => $faq['q'],
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
                ];
            }, $homeFaqs),
        ],
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ── Homepage: Hero ─────────────────────────────────────────────────────── */
.hero {
  background-image: url('<?php echo $clientImages[0]['url']; ?>');
  animation: kenburns 20s ease-in-out infinite alternate;
}
@keyframes kenburns {
  from { background-size: 110%; background-position: center top; }
  to   { background-size: 120%; background-position: center bottom; }
}
.hero::after {
  content: '';
  position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  pointer-events: none; z-index: 1;
}
.hero-overlay { z-index: 1; }
.hero-content { z-index: 2; }

.hero-title {
  font-family: var(--font-heading);
  font-size: clamp(2.5rem, 6vw, 4.5rem);
  font-weight: 800;
  line-height: 1.1;
  letter-spacing: -0.02em;
  text-wrap: balance;
  background: linear-gradient(135deg, #ffffff 0%, var(--color-accent) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: var(--space-6);
}
.hero-actions {
  display: flex; gap: var(--space-4); justify-content: center;
  flex-wrap: wrap; margin-bottom: var(--space-8);
}

/* Hero sequence animations */
@keyframes heroFadeUp {
  from { opacity: 0; transform: translateY(22px); }
  to   { opacity: 1; transform: translateY(0); }
}
.hero-eyebrow  { animation: heroFadeUp 0.6s ease both 0.1s; }
.hero-title    { animation: heroFadeUp 0.7s ease both 0.25s; }
.hero-subtitle { animation: heroFadeUp 0.7s ease both 0.45s; }
.hero-actions  { animation: heroFadeUp 0.7s ease both 0.6s; }
.hero-trust    { animation: heroFadeUp 0.7s ease both 0.75s; }

/* ── Ticker ──────────────────────────────────────────────────────────────── */
.ticker-strip:hover .ticker-track { animation-play-state: paused; }
.ticker-sep { color: rgba(255,255,255,0.45); margin: 0 var(--space-2); }

/* ── Section dividers ───────────────────────────────────────────────────── */
.divider-to-dark {
  height: 56px;
  background: var(--color-primary);
  clip-path: polygon(0 0, 100% 70%, 100% 100%, 0 100%);
  margin-top: -2px;
}
.divider-to-light {
  height: 56px;
  background: var(--color-light);
  clip-path: polygon(0 30%, 100% 0, 100% 100%, 0 100%);
  margin-top: -2px;
}
.divider-to-white {
  height: 56px;
  background: var(--color-white);
  clip-path: polygon(0 0, 100% 60%, 100% 100%, 0 100%);
  margin-top: -2px;
}
.divider-wave-white {
  overflow: hidden; line-height: 0; margin-top: -2px;
}
.divider-wave-white svg { display: block; }

/* ── Numbered sections ───────────────────────────────────────────────────── */
.numbered-section { position: relative; }
.section-num {
  font-family: var(--font-heading);
  font-size: 9rem;
  font-weight: 800;
  color: rgba(26, 43, 60, 0.05);
  position: absolute;
  top: 0; right: 5%;
  line-height: 1;
  pointer-events: none;
  user-select: none;
  z-index: 0;
}
.section-num-light { color: rgba(255,255,255,0.04); }

/* ── Services grid ───────────────────────────────────────────────────────── */
.services-grid-home {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr;
  gap: var(--space-6);
}
.service-card-featured {
  grid-row: span 2;
  background: linear-gradient(145deg, var(--color-primary) 0%, #243d52 100%);
  color: white;
  border-radius: var(--radius-lg);
  padding: var(--space-8);
  box-shadow: var(--shadow-xl);
  position: relative;
  overflow: hidden;
  display: flex;
  flex-direction: column;
}
.service-card-featured::before {
  content: '';
  position: absolute;
  top: -50px; right: -50px;
  width: 200px; height: 200px;
  border-radius: 50%;
  background: rgba(6, 182, 212, 0.12);
}
.service-card-featured::after {
  content: '';
  position: absolute;
  bottom: -30px; left: -30px;
  width: 140px; height: 140px;
  border-radius: 50%;
  background: rgba(255,255,255,0.04);
}
.service-card-featured .feat-icon {
  position: relative; z-index: 1;
  width: 64px; height: 64px;
  border-radius: var(--radius-md);
  background: rgba(6, 182, 212, 0.2);
  display: flex; align-items: center; justify-content: center;
  margin-bottom: var(--space-5);
  color: var(--color-accent);
}
.service-card-featured h3 {
  position: relative; z-index: 1;
  color: white;
  font-size: clamp(1.3rem, 2.5vw, 1.6rem);
  margin-bottom: var(--space-3);
}
.service-card-featured > p {
  position: relative; z-index: 1;
  color: rgba(255,255,255,0.82);
  margin-bottom: var(--space-5);
  font-size: var(--font-size-sm);
}
.service-checklist {
  list-style: none;
  margin-bottom: var(--space-6);
  flex: 1;
  position: relative; z-index: 1;
}
.service-checklist li {
  display: flex; align-items: center; gap: var(--space-2);
  color: rgba(255,255,255,0.88);
  font-size: var(--font-size-sm);
  margin-bottom: var(--space-2);
}
.service-checklist li i { color: var(--color-accent); flex-shrink: 0; }
.service-card-featured .feat-cta {
  position: relative; z-index: 1;
  align-self: flex-start;
}

/* Regular service card extras */
.service-card { transition: all var(--transition-base); }
.service-card:hover .service-card-icon i { transform: scale(1.15) rotate(-5deg); }
.service-card-icon i { transition: transform var(--transition-base); }

/* Services footer */
.services-cta { text-align: center; margin-top: var(--space-10); }

/* ── Stats ───────────────────────────────────────────────────────────────── */
.stats-accent { color: var(--color-accent); }

/* ── About/Process ───────────────────────────────────────────────────────── */
.about-split-home {
  display: grid;
  grid-template-columns: 3fr 2fr;
  gap: var(--space-12);
  align-items: start;
}
.about-eyebrow {
  display: inline-block;
  font-family: var(--font-heading);
  font-size: var(--font-size-xs);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  color: var(--color-primary);
  margin-bottom: var(--space-3);
}
.about-h2 {
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  letter-spacing: -0.02em;
  margin-bottom: var(--space-6);
}
.prose-block p { color: var(--color-gray); margin-bottom: var(--space-4); line-height: 1.7; }
.prose-block p:last-child { margin-bottom: 0; }

.process-steps { margin-top: var(--space-8); }
.process-steps h3 {
  font-size: var(--font-size-xl);
  margin-bottom: var(--space-5);
  letter-spacing: -0.01em;
}
.process-step {
  display: flex; gap: var(--space-4);
  padding: var(--space-4) 0;
  border-bottom: 1px solid var(--color-gray-light);
}
.process-step:last-child { border-bottom: none; }
.process-step-num {
  font-family: var(--font-heading);
  font-size: var(--font-size-3xl);
  font-weight: 800;
  color: var(--color-accent);
  line-height: 1;
  flex-shrink: 0;
  width: 48px;
  opacity: 0.9;
}
.process-step-content h4 {
  font-size: var(--font-size-base);
  margin-bottom: var(--space-1);
}
.process-step-content p {
  color: var(--color-gray);
  font-size: var(--font-size-sm);
  margin: 0;
  line-height: 1.6;
}

.about-right-panel { position: relative; padding-top: var(--space-6); }
.about-photo-wrap {
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  position: relative;
}
.about-photo-wrap img { width: 100%; height: 420px; object-fit: cover; display: block; }
.about-stat-overlay {
  position: absolute;
  bottom: -24px;
  left: -20px;
  background: var(--color-accent);
  color: white;
  border-radius: var(--radius-lg);
  padding: var(--space-5) var(--space-6);
  box-shadow: var(--shadow-xl);
  text-align: center;
  min-width: 148px;
  z-index: 2;
}
.about-stat-overlay .big-num {
  font-family: var(--font-heading);
  font-size: var(--font-size-4xl);
  font-weight: 800;
  line-height: 1;
}
.about-stat-overlay .big-label {
  font-size: var(--font-size-xs);
  text-transform: uppercase;
  letter-spacing: 0.08em;
  margin-top: var(--space-1);
  opacity: 0.92;
}

/* ── Reviews ─────────────────────────────────────────────────────────────── */
.reviews-swiper { padding-bottom: var(--space-10) !important; }
.swiper-pagination-bullet { background: rgba(255,255,255,0.35) !important; opacity: 1 !important; }
.swiper-pagination-bullet-active { background: var(--color-accent) !important; }

.review-badge-strip {
  display: flex; gap: var(--space-8); justify-content: center;
  align-items: center; flex-wrap: wrap;
  margin-top: var(--space-10);
  padding-top: var(--space-8);
  border-top: 1px solid rgba(255,255,255,0.1);
}
.review-platform {
  display: flex; align-items: center; gap: var(--space-2);
  font-family: var(--font-heading); font-weight: 600;
  font-size: var(--font-size-sm); color: rgba(255,255,255,0.75);
}
.review-platform .star-row { color: var(--color-star); letter-spacing: 2px; }
.review-platform .rating-num { color: rgba(255,255,255,0.5); font-size: var(--font-size-xs); }
.badge-divider { width: 1px; height: 32px; background: rgba(255,255,255,0.15); }

/* ── FAQ ─────────────────────────────────────────────────────────────────── */
.faq-bottom { text-align: center; margin-top: var(--space-10); }
.faq-bottom p { color: var(--color-gray); margin-bottom: var(--space-4); }

/* ── Closing CTA ─────────────────────────────────────────────────────────── */
.closing-cta {
  background: linear-gradient(135deg, var(--color-primary) 0%, #243d52 100%);
  position: relative; overflow: hidden;
  padding: var(--space-16) 0;
}
.closing-cta::before {
  content: '';
  position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.35;
}
.closing-cta .container { position: relative; z-index: 1; text-align: center; }
.closing-cta-eyebrow {
  display: inline-block;
  font-family: var(--font-heading); font-size: var(--font-size-xs);
  font-weight: 600; text-transform: uppercase; letter-spacing: 3px;
  color: var(--color-accent); margin-bottom: var(--space-4);
}
.closing-cta h2 {
  color: white;
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  letter-spacing: -0.02em;
  margin-bottom: var(--space-4);
}
.closing-cta p { color: rgba(255,255,255,0.83); max-width: 52ch; margin: 0 auto var(--space-8); }

/* ── CTA Banner ──────────────────────────────────────────────────────────── */
.mid-cta-eyebrow {
  display: block;
  font-family: var(--font-heading); font-size: var(--font-size-xs);
  font-weight: 600; text-transform: uppercase; letter-spacing: 3px;
  color: rgba(255,255,255,0.65); margin-bottom: var(--space-4);
}
.mid-cta-phone {
  display: inline-flex; align-items: center; gap: var(--space-2);
  font-family: var(--font-heading);
  font-size: clamp(1.5rem, 3vw, 2rem);
  font-weight: 800; color: white;
  margin-bottom: var(--space-5);
  transition: color var(--transition-fast);
}
.mid-cta-phone:hover { color: var(--color-accent); }

/* ── Responsive ──────────────────────────────────────────────────────────── */
@media (max-width: 1023px) {
  .services-grid-home { grid-template-columns: 1fr 1fr; }
  .service-card-featured { grid-row: span 1; }
  .about-split-home { grid-template-columns: 1fr; gap: var(--space-8); }
  .about-right-panel { padding-top: var(--space-12); }
  .about-stat-overlay { left: auto; right: var(--space-4); bottom: var(--space-4); }
}
@media (max-width: 767px) {
  .services-grid-home { grid-template-columns: 1fr; }
  .section-num { display: none; }
  .about-photo-wrap img { height: 280px; }
  .about-stat-overlay {
    position: static; display: inline-block;
    margin-top: var(--space-4); left: auto;
  }
  .about-right-panel { padding-top: 0; }
  .review-badge-strip { gap: var(--space-4); }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ═══════════════════════════════════════════════════════════════ HERO -->
<section class="hero" aria-label="Keep N Kleen — Professional Cleaning Service Hayes VA">
  <div class="hero-overlay" aria-hidden="true"></div>

  <div class="hero-content container">

    <div class="hero-eyebrow">
      <i data-lucide="shield-check" aria-hidden="true"
         style="width:14px;height:14px;display:inline;vertical-align:middle;margin-right:6px;"></i>
      Serving Hayes, VA Since <?php echo $yearEstablished; ?>
    </div>

    <h1 class="hero-title">
      Your Home Deserves a<br>Clean You Can Count On
    </h1>

    <p class="hero-subtitle">
      Keep N Kleen brings detail-driven residential and commercial cleaning to Hayes and across Virginia —
      consistent crews, eco-friendly options, and a standard that actually holds visit after visit.
    </p>

    <div class="hero-actions">
      <a href="/contact" class="btn btn-accent btn-lg">
        <i data-lucide="calendar" aria-hidden="true" style="width:18px;height:18px;"></i>
        Get a Free Estimate
      </a>
      <?php if ($phone): ?>
      <a href="tel:<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>"
         class="btn btn-outline-white btn-lg">
        <i data-lucide="phone" aria-hidden="true" style="width:18px;height:18px;"></i>
        Call <?php echo htmlspecialchars($phoneFormatted ?: formatPhone($phone), ENT_QUOTES, 'UTF-8'); ?>
      </a>
      <?php else: ?>
      <a href="/contact" class="btn btn-outline-white btn-lg">
        <i data-lucide="message-circle" aria-hidden="true" style="width:18px;height:18px;"></i>
        Ask a Question
      </a>
      <?php endif; ?>
    </div>

    <div class="hero-trust" role="list" aria-label="Trust indicators">
      <div class="hero-trust-item" role="listitem">
        <i data-lucide="shield-check" aria-hidden="true"
           style="width:16px;height:16px;color:var(--color-accent);"></i>
        <span>Licensed &amp; Insured</span>
      </div>
      <div class="hero-trust-item" role="listitem">
        <i data-lucide="clock" aria-hidden="true"
           style="width:16px;height:16px;color:var(--color-accent);"></i>
        <span><?php echo $yearsInBusiness; ?>+ Years in Business</span>
      </div>
      <div class="hero-trust-item" role="listitem">
        <i data-lucide="star" aria-hidden="true"
           style="width:16px;height:16px;color:var(--color-accent);"></i>
        <span>5.0 Google Rating</span>
      </div>
      <div class="hero-trust-item" role="listitem">
        <i data-lucide="leaf" aria-hidden="true"
           style="width:16px;height:16px;color:var(--color-accent);"></i>
        <span>Eco-Friendly Options</span>
      </div>
    </div>

  </div>
</section>

<!-- ═════════════════════════════════════════════════════ TICKER STRIP -->
<div class="ticker-strip" aria-hidden="true" role="presentation">
  <div class="ticker-track">
    <?php
    $tickerItems = [
      ['icon' => 'shield-check',   'text' => 'Licensed &amp; Insured'],
      ['icon' => 'home',           'text' => 'Residential Cleaning'],
      ['icon' => 'building-2',     'text' => 'Commercial Cleaning'],
      ['icon' => 'star',           'text' => '5.0 Google Rating'],
      ['icon' => 'leaf',           'text' => 'Eco-Friendly Products'],
      ['icon' => 'calendar-check', 'text' => 'Serving VA Since 2021'],
      ['icon' => 'truck',          'text' => 'Move-In &amp; Move-Out'],
      ['icon' => 'hard-hat',       'text' => 'Post-Construction Cleanup'],
      ['icon' => 'repeat',         'text' => 'Weekly &amp; Monthly Plans'],
      ['icon' => 'map-pin',        'text' => 'Hayes, VA &amp; Beyond'],
    ];
    // Duplicate for seamless loop
    $tickerAll = array_merge($tickerItems, $tickerItems);
    foreach ($tickerAll as $item):
    ?>
    <span style="display:inline-flex;align-items:center;gap:6px;white-space:nowrap;">
      <i data-lucide="<?php echo $item['icon']; ?>"
         style="width:13px;height:13px;flex-shrink:0;"></i>
      <?php echo $item['text']; ?>
    </span>
    <span class="ticker-sep" aria-hidden="true">✦</span>
    <?php endforeach; ?>
  </div>
</div>

<!-- DIVIDER: accent → light -->
<div aria-hidden="true" style="height:48px;background:var(--color-light);
     clip-path:polygon(0 30%,100% 0,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ═══════════════════════════════════════════════ SERVICES (Section 01) -->
<section class="numbered-section" id="services"
         style="background:var(--color-light);padding:var(--space-16) 0;">
  <span class="section-num" aria-hidden="true">01</span>

  <div class="container">

    <div class="section-header" data-animate="fade-up">
      <span class="eyebrow">What We Do</span>
      <h2 style="font-size:clamp(1.8rem,4vw,2.8rem);letter-spacing:-0.02em;">
        Cleaning Solutions Built Around Your Life
      </h2>
      <p>From weekly home maintenance to move-out deep cleans and construction site turnovers —
         Keep N Kleen has a service to match your schedule and your space.</p>
    </div>

    <div class="services-grid-home">

      <!-- ① Featured: Maid Services (spans 2 rows) -->
      <div class="service-card-featured" data-animate="fade-up">
        <div class="feat-icon">
          <i data-lucide="sparkles" aria-hidden="true" style="width:30px;height:30px;"></i>
        </div>
        <h3>Maid Services</h3>
        <p>Our signature residential service — thorough, reliable, and shaped around your home's specific needs. From kitchen to master bath, every room gets proper attention.</p>
        <ul class="service-checklist" aria-label="Maid service features">
          <li>
            <i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>
            Kitchens, bathrooms &amp; living areas
          </li>
          <li>
            <i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>
            Dusting, vacuuming &amp; mopping
          </li>
          <li>
            <i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>
            Baseboards, fixtures &amp; surfaces
          </li>
          <li>
            <i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>
            Eco-friendly products available
          </li>
          <li>
            <i data-lucide="check-circle-2" aria-hidden="true" style="width:15px;height:15px;"></i>
            Trained, background-checked crew
          </li>
        </ul>
        <a href="/services/maid-services" class="btn btn-outline-white feat-cta">
          See What's Included
          <i data-lucide="arrow-right" aria-hidden="true" style="width:16px;height:16px;"></i>
        </a>
      </div>

      <!-- ② Move-In / Move-Out -->
      <div class="service-card" data-animate="fade-up" style="animation-delay:100ms;">
        <div class="service-card-icon">
          <i data-lucide="truck" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3>Move-In / Move-Out Cleaning</h3>
        <p>Starting fresh or closing a lease? We handle the full turnover — appliances, cabinets, baseboards — so you can focus on the move itself.</p>
        <a href="/services/move-in-move-out-cleaning" class="learn-more">
          Learn More
          <i data-lucide="arrow-right" aria-hidden="true" style="width:14px;height:14px;"></i>
        </a>
      </div>

      <!-- ③ Regular Home Cleaning -->
      <div class="service-card" data-animate="fade-up" style="animation-delay:200ms;">
        <div class="service-card-icon">
          <i data-lucide="repeat" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3>Regular Home Cleaning</h3>
        <p>Weekly, bi-weekly, or monthly — your home stays consistently clean without the effort. Set your schedule and let us handle the rest.</p>
        <a href="/services/regular-home-cleaning" class="learn-more">
          Learn More
          <i data-lucide="arrow-right" aria-hidden="true" style="width:14px;height:14px;"></i>
        </a>
      </div>

      <!-- ④ Post-Construction -->
      <div class="service-card" data-animate="fade-up" style="animation-delay:100ms;">
        <div class="service-card-icon">
          <i data-lucide="hard-hat" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3>Post-Construction Cleaning</h3>
        <p>New builds and renovations leave behind dust, debris, and residue. We do the final-stage cleanup so your space is ready for occupancy — or for staging.</p>
        <a href="/services/post-construction-cleaning" class="learn-more">
          Learn More
          <i data-lucide="arrow-right" aria-hidden="true" style="width:14px;height:14px;"></i>
        </a>
      </div>

      <!-- ⑤ Deep Home Cleaning -->
      <div class="service-card" data-animate="fade-up" style="animation-delay:200ms;">
        <div class="service-card-icon">
          <i data-lucide="search" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3>Deep Home Cleaning</h3>
        <p>A comprehensive top-to-bottom clean that goes well beyond routine maintenance — inside appliances, behind furniture, every corner properly addressed.</p>
        <a href="/services" class="learn-more">
          Learn More
          <i data-lucide="arrow-right" aria-hidden="true" style="width:14px;height:14px;"></i>
        </a>
      </div>

      <!-- ⑥ Commercial & Janitorial -->
      <div class="service-card" data-animate="fade-up" style="animation-delay:300ms;">
        <div class="service-card-icon">
          <i data-lucide="building-2" aria-hidden="true" style="width:24px;height:24px;"></i>
        </div>
        <h3>Commercial &amp; Janitorial</h3>
        <p>Offices, retail spaces, medical facilities, and warehouses — consistent, professional cleaning that keeps your business environment ready for the day ahead.</p>
        <a href="/services" class="learn-more">
          Learn More
          <i data-lucide="arrow-right" aria-hidden="true" style="width:14px;height:14px;"></i>
        </a>
      </div>

    </div><!-- /.services-grid-home -->

    <div class="services-cta" data-animate="fade-up">
      <a href="/services" class="btn btn-primary btn-lg">
        View All Services
        <i data-lucide="arrow-right" aria-hidden="true" style="width:18px;height:18px;"></i>
      </a>
    </div>

  </div>
</section>

<!-- DIVIDER: light → primary -->
<div aria-hidden="true" style="height:56px;background:var(--color-primary);
     clip-path:polygon(0 0,100% 65%,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ═══════════════════════════════════════════════════════ STATS SECTION -->
<section class="stats-section" aria-label="Keep N Kleen by the numbers">
  <div class="container">
    <div class="stats-grid">

      <div class="stat-item" data-animate="fade-up">
        <div class="stat-number">
          <span data-counter="<?php echo $yearsInBusiness; ?>"
                class="stats-accent"><?php echo $yearsInBusiness; ?></span>+
        </div>
        <div class="stat-label">Years Serving Virginia</div>
      </div>

      <div class="stat-item" data-animate="fade-up" style="animation-delay:100ms;">
        <div class="stat-number">
          <span data-counter="500" class="stats-accent">500</span>+
        </div>
        <div class="stat-label">Homes &amp; Spaces Cleaned</div>
      </div>

      <div class="stat-item" data-animate="fade-up" style="animation-delay:200ms;">
        <div class="stat-number stats-accent">5.0</div>
        <div class="stat-label">Google Star Rating</div>
      </div>

      <div class="stat-item" data-animate="fade-up" style="animation-delay:300ms;">
        <div class="stat-number">
          <span data-counter="<?php echo $serviceRadius; ?>"
                class="stats-accent"><?php echo $serviceRadius; ?></span>
        </div>
        <div class="stat-label">Mile Service Radius</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════ MID-PAGE CTA BANNER (CTA #2) -->
<div class="cta-banner" role="complementary" aria-label="Schedule a cleaning">
  <div class="container" data-animate="fade-up">

    <span class="mid-cta-eyebrow">Ready to Book?</span>
    <h2 style="font-size:clamp(1.8rem,4vw,2.8rem);margin-bottom:var(--space-4);">
      Same-Week Availability — Free Estimates Always
    </h2>
    <p>We work around your schedule, not the other way around. Most clients are booked
       within 3–5 business days of their first inquiry. Spots fill fast.</p>

    <?php if ($phone): ?>
    <div style="margin-bottom:var(--space-5);">
      <a href="tel:<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>"
         class="mid-cta-phone">
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

<!-- DIVIDER: gradient → white -->
<div aria-hidden="true" style="height:56px;background:var(--color-white);
     clip-path:polygon(0 0,100% 0,100% 100%,0 70%);margin-top:-2px;"></div>

<!-- ════════════════════════════════════ ABOUT / PROCESS (Section 02) -->
<section class="numbered-section" id="about"
         style="background:var(--color-white);padding:var(--space-16) 0;">
  <span class="section-num" aria-hidden="true">02</span>

  <div class="container">
    <div class="about-split-home">

      <!-- Left: story + process steps -->
      <div class="about-left" data-animate="fade-up">
        <span class="about-eyebrow">Our Story</span>
        <h2 class="about-h2">Built on Reliability — Every Single Visit</h2>

        <div class="prose-block" style="max-width:62ch;">
          <p>Since <?php echo $yearEstablished; ?>, Keep N Kleen has built its reputation one clean at a time
             across Hayes, VA and the broader Virginia region. What started as a commitment to doing the
             job right — not just fast — has grown into a team that homeowners, landlords, and business
             operators genuinely rely on, week after week.</p>
          <p>We believe every space deserves real attention. That means consistent crews who know your home,
             products chosen for effectiveness and safety, and a walk-through mentality that doesn't call
             a job done until every detail is actually right. Your first clean and your fiftieth are held
             to the same standard.</p>
        </div>

        <div class="process-steps" data-animate="fade-up">
          <h3>How We Work</h3>

          <div class="process-step">
            <div class="process-step-num">01</div>
            <div class="process-step-content">
              <h4>Book Your Clean</h4>
              <p>Tell us about your space, service type, and schedule. We confirm availability and
                 match you with the right crew for the job.</p>
            </div>
          </div>

          <div class="process-step">
            <div class="process-step-num">02</div>
            <div class="process-step-content">
              <h4>We Prepare</h4>
              <p>Your crew reviews the scope, arrives on time, and brings all supplies — everything
                 needed for your specific space, nothing improvised.</p>
            </div>
          </div>

          <div class="process-step">
            <div class="process-step-num">03</div>
            <div class="process-step-content">
              <h4>Meticulous Clean</h4>
              <p>Room by room, top to bottom. We follow a systematic checklist so nothing gets skipped —
                 surfaces, fixtures, floors, and all the details in between.</p>
            </div>
          </div>

          <div class="process-step">
            <div class="process-step-num">04</div>
            <div class="process-step-content">
              <h4>Final Walk-Through</h4>
              <p>Before we leave, we do a full walk-through to confirm the result meets our standard —
                 and yours. We don't call it done until it looks right.</p>
            </div>
          </div>

        </div><!-- /.process-steps -->
      </div><!-- /.about-left -->

      <!-- Right: photo + overlapping stat card -->
      <div class="about-right-panel" data-animate="fade-up">
        <div class="about-photo-wrap img-reveal">
          <picture>
            <source
              srcset="<?php echo htmlspecialchars($clientImages[1]['url'], ENT_QUOTES, 'UTF-8'); ?>"
              type="image/jpeg">
            <img src="<?php echo htmlspecialchars($clientImages[1]['url'], ENT_QUOTES, 'UTF-8'); ?>"
                 alt="Keep N Kleen professional cleaning team at work in Hayes, Virginia"
                 width="600" height="420"
                 loading="lazy">
          </picture>
        </div>
        <div class="about-stat-overlay">
          <div class="big-num"><?php echo $yearsInBusiness; ?>+</div>
          <div class="big-label">Years Serving Virginia</div>
        </div>
      </div>

    </div><!-- /.about-split-home -->
  </div>
</section>

<!-- DIVIDER: white → dark -->
<div aria-hidden="true" style="height:56px;background:var(--color-dark);
     clip-path:polygon(0 0,100% 55%,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ════════════════════════════════════════ REVIEWS (Section 03) -->
<?php
$swiperReviews = [
    [
        'initials' => 'SM',
        'name'     => 'Sarah M.',
        'location' => 'Gloucester, VA',
        'service'  => 'Regular Home Cleaning',
        'text'     => 'Keep N Kleen has been cleaning our home every two weeks for almost a year. The consistency is what gets me — spotless every single time. They remember our preferences, work around our schedule, and always leave things better than expected.',
    ],
    [
        'initials' => 'JT',
        'name'     => 'James T.',
        'location' => 'Yorktown, VA',
        'service'  => 'Move-Out Cleaning',
        'text'     => 'We were under serious time pressure at the end of our lease and Keep N Kleen came through. The move-out clean was incredibly thorough — appliances, baseboards, inside every cabinet. We got our full deposit back. Worth every penny.',
    ],
    [
        'initials' => 'MK',
        'name'     => 'Michelle K.',
        'location' => 'Williamsburg, VA',
        'service'  => 'Post-Construction Cleaning',
        'text'     => 'After our kitchen renovation the mess was overwhelming — drywall dust in every corner. Keep N Kleen handled it completely. The space was genuinely move-in ready when they finished. I\'ll call them again for our next project.',
    ],
    [
        'initials' => 'DR',
        'name'     => 'David R.',
        'location' => 'Newport News, VA',
        'service'  => 'Maid Services',
        'text'     => 'I\'ve tried a few cleaning services over the years and reliability was always the issue. Keep N Kleen actually shows up when they say, does what they promised, and communicates clearly. That alone puts them ahead of the competition.',
    ],
    [
        'initials' => 'PL',
        'name'     => 'Patricia L.',
        'location' => 'Hayes, VA',
        'service'  => 'Deep Home Cleaning',
        'text'     => 'They did a deep clean before my family visited and I was genuinely impressed. Window tracks, behind the fridge, the oven interior — things I\'d basically given up on — spotless. I\'m booking regularly now.',
    ],
];
?>

<section class="numbered-section reviews-section" id="reviews"
         aria-label="Client reviews for Keep N Kleen">
  <span class="section-num section-num-light" aria-hidden="true">03</span>

  <div class="container">

    <div class="section-header" data-animate="fade-up">
      <span class="eyebrow" style="color:var(--color-accent);">What Clients Say</span>
      <h2>Real Results. Real Reviews.</h2>
      <p>From one-time deep cleans to ongoing maintenance across Virginia —
         here's what homeowners and business owners say about working with Keep N Kleen.</p>
    </div>

    <!-- Swiper -->
    <div class="swiper reviews-swiper" data-animate="fade-up" aria-label="Client review carousel">
      <div class="swiper-wrapper">
        <?php foreach ($swiperReviews as $r): ?>
        <div class="swiper-slide">
          <div class="review-card">
            <div class="review-stars" aria-label="5 out of 5 stars">
              <?php for ($i = 0; $i < 5; $i++): ?>
              <span class="star" aria-hidden="true">★</span>
              <?php endfor; ?>
            </div>
            <blockquote class="review-text">
              "<?php echo htmlspecialchars($r['text'], ENT_QUOTES, 'UTF-8'); ?>"
            </blockquote>
            <div class="review-author">
              <div class="review-avatar" aria-hidden="true">
                <?php echo htmlspecialchars($r['initials'], ENT_QUOTES, 'UTF-8'); ?>
              </div>
              <div>
                <div class="review-name">
                  <?php echo htmlspecialchars($r['name'], ENT_QUOTES, 'UTF-8'); ?>
                </div>
                <div class="review-date">
                  <?php echo htmlspecialchars($r['location'], ENT_QUOTES, 'UTF-8'); ?>
                  &bull;
                  <?php echo htmlspecialchars($r['service'], ENT_QUOTES, 'UTF-8'); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div><!-- /.reviews-swiper -->

    <!-- Review platform badges -->
    <div class="review-badge-strip" data-animate="fade-up" aria-label="Review platform badges">

      <div class="review-platform">
        <svg width="18" height="18" viewBox="0 0 48 48" aria-label="Google" role="img">
          <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
          <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
          <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
          <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.18 1.48-4.97 2.31-8.16 2.31-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
        </svg>
        <span>Google Reviews</span>
        <span class="star-row" aria-label="5 stars">★★★★★</span>
        <span class="rating-num">5.0</span>
      </div>

      <div class="badge-divider" aria-hidden="true"></div>

      <div class="review-platform">
        <svg width="18" height="18" viewBox="0 0 24 24" aria-label="BBB" role="img">
          <rect width="24" height="24" rx="3" fill="#003087"/>
          <text x="12" y="17" text-anchor="middle" fill="white"
                font-size="8.5" font-weight="bold" font-family="Arial, sans-serif">BBB</text>
        </svg>
        <span>A+ BBB Rating</span>
      </div>

      <div class="badge-divider" aria-hidden="true"></div>

      <div class="review-platform">
        <i data-lucide="shield-check" aria-hidden="true"
           style="width:18px;height:18px;color:var(--color-accent);"></i>
        <span>Licensed &amp; Insured</span>
      </div>

    </div><!-- /.review-badge-strip -->

  </div>
</section>

<!-- DIVIDER: dark → white (wave) -->
<div class="divider-wave-white" aria-hidden="true">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 60"
       preserveAspectRatio="none" style="width:100%;height:60px;">
    <path d="M0,30 C360,60 1080,0 1440,30 L1440,60 L0,60 Z"
          fill="#ffffff"/>
  </svg>
</div>

<!-- ══════════════════════════════════════════════════ FAQ (Section 04) -->
<section class="numbered-section" id="faq"
         style="background:var(--color-white);padding:var(--space-16) 0;">
  <span class="section-num" aria-hidden="true">04</span>

  <div class="container">

    <div class="section-header" data-animate="fade-up">
      <span class="eyebrow">Common Questions</span>
      <h2 style="font-size:clamp(1.8rem,4vw,2.8rem);letter-spacing:-0.02em;">
        Answers Before You Call
      </h2>
      <p>What Hayes-area homeowners and property managers ask us most —
         so you can feel confident before booking.</p>
    </div>

    <div class="faq-grid" data-animate="fade-up">
      <?php foreach ($homeFaqs as $faq): ?>
      <div class="faq-item">
        <div class="faq-icon" aria-hidden="true">
          <i data-lucide="help-circle" style="width:20px;height:20px;"></i>
        </div>
        <div>
          <h3><?php echo htmlspecialchars($faq['q'], ENT_QUOTES, 'UTF-8'); ?></h3>
          <p><?php echo htmlspecialchars($faq['a'], ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="faq-bottom" data-animate="fade-up">
      <p>Still have questions? We're happy to walk through your specific situation.</p>
      <a href="/contact" class="btn btn-primary">
        Ask Us Anything
        <i data-lucide="message-circle" aria-hidden="true" style="width:16px;height:16px;"></i>
      </a>
    </div>

  </div>
</section>

<!-- DIVIDER: white → primary (diagonal up) -->
<div aria-hidden="true" style="height:56px;background:var(--color-primary);
     clip-path:polygon(0 60%,100% 0,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ═══════════════════════════════════════════════ CLOSING CTA (CTA #3) -->
<section class="closing-cta" aria-label="Get started with Keep N Kleen">
  <div class="container" data-animate="fade-up">

    <span class="closing-cta-eyebrow">Get Started Today</span>
    <h2>Stop Spending Your Weekend Cleaning</h2>
    <p>Let Keep N Kleen handle it — so your time is yours again. Serving Hayes, VA and
       communities across Virginia. Free estimates, no obligation, same-week availability.</p>

    <?php if ($phone): ?>
    <div style="margin-bottom:var(--space-6);">
      <a href="tel:<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>"
         style="display:inline-flex;align-items:center;gap:var(--space-2);
                font-family:var(--font-heading);
                font-size:clamp(1.25rem,2.5vw,1.75rem);
                font-weight:800;color:var(--color-accent);
                transition:color var(--transition-fast);"
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
        Browse Services
      </a>
    </div>

  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

<script>
/* Swiper: Reviews carousel */
document.addEventListener('DOMContentLoaded', function () {
  if (typeof Swiper !== 'undefined') {
    new Swiper('.reviews-swiper', {
      slidesPerView: 1,
      spaceBetween: 24,
      loop: true,
      autoplay: {
        delay: 4500,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        768:  { slidesPerView: 2, spaceBetween: 20 },
        1024: { slidesPerView: 3, spaceBetween: 24 },
      },
    });
  }
});
</script>
