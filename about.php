<?php
/**
 * about.php — About Keep N Kleen
 * Keep N Kleen | Page One Insights
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$pageTitle       = 'About Keep N Kleen | Cleaning Company Hayes, VA';
$pageDescription = 'Keep N Kleen has served Hayes, VA since 2021. Learn about our story, values, and commitment to reliable residential & commercial cleaning across Virginia.';
$canonicalUrl    = $canonicalBase . '/about';
$ogImage         = $clientImages[13]['url'];
$currentPage     = 'about';

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'           => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $canonicalBase],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'About', 'item' => $canonicalBase . '/about'],
            ],
        ],
        [
            '@type'       => 'Organization',
            'name'        => $siteName,
            'url'         => $canonicalBase,
            'foundingDate'=> (string)$yearEstablished,
            'description' => $description,
            'logo'        => ['@type' => 'ImageObject', 'url' => $logoUrl],
            'address'     => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => $address['street'],
                'addressLocality' => $address['city'],
                'addressRegion'   => $address['state'],
                'postalCode'      => $address['zip'],
                'addressCountry'  => 'US',
            ],
        ],
        [
            '@type'       => 'AggregateRating',
            'itemReviewed'=> ['@type' => 'LocalBusiness', 'name' => $siteName],
            'ratingValue' => '5.0',
            'reviewCount' => '24',
            'bestRating'  => '5',
        ],
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ── About Hero ──────────────────────────────────────────────────────────── */
.about-hero {
  position: relative;
  min-height: 58vh;
  display: flex; align-items: center;
  overflow: hidden;
  padding-top: 80px;
  background: var(--color-primary);
}
.about-hero::before {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(90deg, rgba(26,43,60,1) 50%, rgba(26,43,60,0.3) 100%);
  z-index: 1;
}
.about-hero-photo {
  position: absolute; right: 0; top: 0; bottom: 0;
  width: 55%;
  background-size: cover;
  background-position: center;
}
.about-hero .hero-inner {
  position: relative; z-index: 2;
  padding: var(--space-16) 5%;
  max-width: 600px;
}
.about-hero h1 {
  color: var(--color-white);
  font-size: clamp(2rem, 4.5vw, 3.4rem);
  letter-spacing: -0.02em; line-height: 1.12;
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
.about-hero-sub { color: rgba(255,255,255,0.86); font-size: var(--font-size-base); line-height: 1.65; margin-bottom: var(--space-8); max-width: 50ch; }
.about-hero-trust { display: flex; gap: var(--space-6); flex-wrap: wrap; }
.about-trust-item {
  display: flex; align-items: center; gap: var(--space-2);
  color: rgba(255,255,255,0.78); font-size: var(--font-size-sm);
}

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

/* ── Story split ─────────────────────────────────────────────────────────── */
.story-split {
  display: grid;
  grid-template-columns: 3fr 2fr;
  gap: var(--space-12);
  align-items: start;
}
.story-content h2 {
  font-size: clamp(1.8rem, 3.5vw, 2.5rem);
  letter-spacing: -0.02em;
  margin-bottom: var(--space-6);
}
.story-content p { color: var(--color-gray); line-height: 1.75; margin-bottom: var(--space-4); max-width: 62ch; }

/* Overlapping photo + accent block (signature) */
.story-photo-stack {
  position: relative;
  padding-top: var(--space-8);
}
.story-photo-main {
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
}
.story-photo-main img { width: 100%; height: 400px; object-fit: cover; }
.story-accent-block {
  position: absolute;
  top: 0; right: -12px;
  background: var(--color-accent);
  color: white;
  border-radius: var(--radius-lg);
  padding: var(--space-5) var(--space-6);
  box-shadow: var(--shadow-xl);
  text-align: center;
  min-width: 130px;
  z-index: 2;
}
.story-accent-block .big { font-family: var(--font-heading); font-size: var(--font-size-4xl); font-weight: 800; line-height: 1; }
.story-accent-block .lbl { font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 0.08em; margin-top: var(--space-1); opacity: 0.92; }

/* ── Timeline / milestones ───────────────────────────────────────────────── */
.timeline {
  position: relative;
  padding-left: var(--space-10);
}
.timeline::before {
  content: '';
  position: absolute;
  left: 20px; top: 0; bottom: 0;
  width: 2px;
  background: linear-gradient(180deg, var(--color-accent), var(--color-primary));
}
.timeline-item {
  position: relative;
  padding: 0 0 var(--space-10) var(--space-6);
}
.timeline-item:last-child { padding-bottom: 0; }
.timeline-dot {
  position: absolute;
  left: -34px; top: 4px;
  width: 16px; height: 16px;
  border-radius: var(--radius-full);
  background: var(--color-accent);
  border: 3px solid var(--color-white);
  box-shadow: 0 0 0 2px var(--color-accent);
}
.timeline-year {
  font-family: var(--font-heading);
  font-size: var(--font-size-xs);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 2px;
  color: var(--color-accent);
  margin-bottom: var(--space-2);
}
.timeline-item h3 { font-size: var(--font-size-lg); margin-bottom: var(--space-2); }
.timeline-item p { color: var(--color-gray); font-size: var(--font-size-sm); line-height: 1.7; margin: 0; max-width: 55ch; }

/* ── Values grid ─────────────────────────────────────────────────────────── */
.values-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-6);
}
.value-card {
  background: var(--color-white);
  border-radius: var(--radius-lg);
  padding: var(--space-8);
  box-shadow: var(--shadow-card);
  text-align: center;
  transition: box-shadow var(--transition-base);
}
.value-card:hover { box-shadow: var(--shadow-lg); }
.value-icon {
  width: 64px; height: 64px;
  border-radius: var(--radius-full);
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-5);
  color: var(--color-accent);
}
.value-card h3 { font-size: var(--font-size-lg); margin-bottom: var(--space-3); }
.value-card p { font-size: var(--font-size-sm); color: var(--color-gray); margin: 0; line-height: 1.65; }

/* ── Differentiators ─────────────────────────────────────────────────────── */
.diff-list { list-style: none; display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); }
.diff-item {
  display: flex; align-items: flex-start; gap: var(--space-3);
  padding: var(--space-4);
  background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: var(--radius-lg);
}
.diff-item i { color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }
.diff-item span { color: rgba(255,255,255,0.84); font-size: var(--font-size-sm); line-height: 1.6; }

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
  .about-hero { display: flex; }
  .about-hero-photo { display: none; }
  .about-hero .hero-inner { max-width: 100%; }
  .story-split { grid-template-columns: 1fr; }
  .story-photo-stack { padding-top: 0; margin-top: var(--space-8); }
  .story-accent-block { right: var(--space-4); top: var(--space-4); }
  .values-grid { grid-template-columns: 1fr 1fr; }
  .diff-list { grid-template-columns: 1fr; }
}
@media (max-width: 767px) {
  .values-grid { grid-template-columns: 1fr; }
  .story-accent-block { position: static; display: inline-block; margin-top: var(--space-4); }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ── BREADCRUMB ────────────────────────────────────────────────────────── -->
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><span class="breadcrumb-sep" aria-hidden="true">›</span></li>
      <li><span aria-current="page">About Us</span></li>
    </ol>
  </div>
</nav>

<!-- ── HERO (CTA #1) ─────────────────────────────────────────────────────── -->
<section class="about-hero" aria-label="About Keep N Kleen">
  <div class="about-hero-photo"
       style="background-image: url('<?php echo htmlspecialchars($clientImages[13]['url'], ENT_QUOTES, 'UTF-8'); ?>');"
       aria-hidden="true"></div>

  <div class="hero-inner">
    <div class="hero-eyebrow-pill">
      <i data-lucide="users" aria-hidden="true" style="width:13px;height:13px;"></i>
      About Us · Hayes, VA
    </div>

    <h1>Built on Reliability — One Clean at a Time</h1>

    <p class="about-hero-sub">
      Keep N Kleen has served homes and businesses across Virginia since <?php echo $yearEstablished; ?>.
      What started as a commitment to doing the job right has grown into a team that clients genuinely rely on.
    </p>

    <div class="about-hero-trust">
      <div class="about-trust-item">
        <i data-lucide="shield-check" aria-hidden="true" style="width:16px;height:16px;color:var(--color-accent);"></i>
        <span>Licensed &amp; Insured</span>
      </div>
      <div class="about-trust-item">
        <i data-lucide="calendar-check" aria-hidden="true" style="width:16px;height:16px;color:var(--color-accent);"></i>
        <span><?php echo $yearsInBusiness; ?>+ Years Serving VA</span>
      </div>
      <div class="about-trust-item">
        <i data-lucide="star" aria-hidden="true" style="width:16px;height:16px;color:var(--color-accent);"></i>
        <span>5.0 Google Rating</span>
      </div>
    </div>
  </div>
</section>

<!-- ── TICKER ────────────────────────────────────────────────────────────── -->
<div class="ticker-strip" aria-hidden="true" role="presentation">
  <div class="ticker-track">
    <?php
    $items = [
        ['icon' => 'users',         'text' => 'Family-Operated Business'],
        ['icon' => 'map-pin',       'text' => 'Based in Hayes, Virginia'],
        ['icon' => 'shield-check',  'text' => 'Licensed &amp; Insured'],
        ['icon' => 'star',          'text' => '5.0 Google Rating'],
        ['icon' => 'leaf',          'text' => 'Eco-Friendly Practices'],
        ['icon' => 'calendar-check','text' => 'Serving VA Since 2021'],
        ['icon' => 'clock',         'text' => 'Reliable Scheduling'],
        ['icon' => 'heart',         'text' => 'Community-Focused'],
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

<!-- ── OUR STORY ─────────────────────────────────────────────────────────── -->
<section style="background:var(--color-white);padding:var(--space-16) 0;">
  <div class="container">
    <div class="story-split">

      <!-- Left: story copy -->
      <div class="story-content" data-animate="fade-up">
        <span class="eyebrow" style="color:var(--color-primary);">Our Story</span>
        <h2>From a Simple Standard to a Business That Holds It</h2>

        <p>Keep N Kleen was founded in <?php echo $yearEstablished; ?> with a straightforward premise: cleaning services
           in Virginia weren't meeting the bar that homeowners and business owners actually needed.
           Crews would show up inconsistently, rush through rooms, and leave clients wondering whether
           it was worth calling back. We built Keep N Kleen to solve that — not with marketing promises,
           but with a system that actually produces consistent results.</p>

        <p>Operating out of Hayes, VA and serving communities across Virginia and into North Carolina,
           we've grown entirely through referrals and repeat clients. The homeowner who books a move-out
           clean tells her neighbor. The property manager who trusts us with a turnover recommends us
           to a colleague. That kind of growth only happens when the work is actually good — and holding
           that standard visit after visit is what we care about most.</p>

        <p>Our team is trained on a structured process, not improvisation. Every crew follows the same
           checklist. Every visit is held to the same standard. We're licensed and fully insured, and we
           treat access to your home or business with the seriousness that deserves. The Virginia communities
           we serve — Gloucester, Yorktown, Newport News, Williamsburg, and beyond — have trusted us to
           show up and do the job right. We don't take that lightly.</p>

        <p>After <?php echo $yearsInBusiness; ?> years, the goal is unchanged: every client leaves a visit feeling
           like they got exactly what they were promised — and called back because they did.</p>
      </div>

      <!-- Right: photo with overlapping accent (signature element) -->
      <div class="story-photo-stack" data-animate="fade-up">
        <div class="story-accent-block">
          <div class="big"><?php echo $yearsInBusiness; ?>+</div>
          <div class="lbl">Years Serving Virginia</div>
        </div>
        <div class="story-photo-main img-reveal">
          <picture>
            <source srcset="<?php echo htmlspecialchars($clientImages[14]['url'], ENT_QUOTES, 'UTF-8'); ?>" type="image/png">
            <img src="<?php echo htmlspecialchars($clientImages[14]['url'], ENT_QUOTES, 'UTF-8'); ?>"
                 alt="Keep N Kleen cleaning team Hayes Virginia — professional residential cleaning"
                 width="540" height="400"
                 loading="lazy">
          </picture>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-light);
     clip-path:polygon(0 0,100% 60%,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── VALUES ────────────────────────────────────────────────────────────── -->
<section style="background:var(--color-light);padding:var(--space-16) 0;">
  <div class="container">
    <div class="section-header" data-animate="fade-up">
      <span class="eyebrow">What We Stand For</span>
      <h2>Three Things We Never Compromise</h2>
    </div>

    <div class="values-grid" data-animate="fade-up">

      <div class="value-card card">
        <div class="value-icon">
          <i data-lucide="repeat" aria-hidden="true" style="width:28px;height:28px;"></i>
        </div>
        <h3>Consistency</h3>
        <p>Your first clean and your twentieth are held to the same standard. We don't start strong and fade. Consistency isn't a nice-to-have — it's the product.</p>
      </div>

      <div class="value-card card">
        <div class="value-icon">
          <i data-lucide="shield-check" aria-hidden="true" style="width:28px;height:28px;"></i>
        </div>
        <h3>Accountability</h3>
        <p>When something isn't right, we address it — not on your next visit, right then. Being accountable to our clients is what makes referrals possible. We earn that trust visit by visit.</p>
      </div>

      <div class="value-card card">
        <div class="value-icon">
          <i data-lucide="heart" aria-hidden="true" style="width:28px;height:28px;"></i>
        </div>
        <h3>Respect</h3>
        <p>We're entering your space. That means treating your home with care, your belongings with attention, and your time with respect. We show up when we say, stay as long as the job takes, and leave it better than we found it.</p>
      </div>

    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-white);
     clip-path:polygon(0 0,100% 45%,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── MILESTONES TIMELINE ─────────────────────────────────────────────────── -->
<section style="background:var(--color-white);padding:var(--space-16) 0;">
  <div class="container">
    <div style="max-width:800px;margin:0 auto;">

      <div style="margin-bottom:var(--space-10);" data-animate="fade-up">
        <span class="eyebrow" style="color:var(--color-primary);">Our Journey</span>
        <h2 style="font-size:clamp(1.8rem,3.5vw,2.5rem);letter-spacing:-0.02em;">
          How We Got Here
        </h2>
      </div>

      <div class="timeline" data-animate="fade-up">

        <div class="timeline-item">
          <div class="timeline-dot" aria-hidden="true"></div>
          <div class="timeline-year">2021</div>
          <h3>Founded in Hayes, VA</h3>
          <p>Keep N Kleen launches with a clear focus: provide residential cleaning in Virginia that people can actually rely on. The first clients came through local referrals, and early reviews established a 5-star standard we've maintained since.</p>
        </div>

        <div class="timeline-item">
          <div class="timeline-dot" aria-hidden="true"></div>
          <div class="timeline-year">2022</div>
          <h3>Expanding Services & Crew</h3>
          <p>Growing demand led to team expansion and the formal addition of move-in/move-out cleaning and post-construction services. With multiple crew members operating under the same standards, consistent quality across every job became the priority.</p>
        </div>

        <div class="timeline-item">
          <div class="timeline-dot" aria-hidden="true"></div>
          <div class="timeline-year">2023</div>
          <h3>Serving Virginia & North Carolina</h3>
          <p>The service area expanded beyond the immediate Hayes region to include communities across Virginia and into North Carolina. Commercial and janitorial clients joined alongside the growing residential base.</p>
        </div>

        <div class="timeline-item">
          <div class="timeline-dot" aria-hidden="true"></div>
          <div class="timeline-year">2024–2026</div>
          <h3>500+ Homes & Businesses Cleaned</h3>
          <p>With over 500 completed cleanings and a 5.0 Google rating, Keep N Kleen continues to grow through referrals. The original standard — show up, do it right, and mean it — remains the foundation of every service we offer.</p>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-dark);
     clip-path:polygon(0 0,100% 55%,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── WHAT MAKES US DIFFERENT (dark) ─────────────────────────────────────── -->
<section style="background:var(--color-dark);padding:var(--space-16) 0;">
  <div class="container">
    <div class="section-header" data-animate="fade-up" style="margin-bottom:var(--space-10);">
      <span class="eyebrow" style="color:var(--color-accent);">Our Differentiators</span>
      <h2 style="color:white;">What Clients Tell Us Sets Us Apart</h2>
    </div>

    <ul class="diff-list" data-animate="fade-up">
      <?php foreach ($differentiators as $diff): ?>
      <li class="diff-item">
        <i data-lucide="check-circle-2" aria-hidden="true" style="width:18px;height:18px;"></i>
        <span><?php echo htmlspecialchars($diff, ENT_QUOTES, 'UTF-8'); ?></span>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-primary);
     clip-path:polygon(0 0,100% 0,100% 100%,0 65%);margin-top:-2px;"></div>

<!-- ── MID-PAGE CTA (CTA #2) ─────────────────────────────────────────────── -->
<div class="cta-banner" role="complementary" aria-label="Get started with Keep N Kleen">
  <div class="container" data-animate="fade-up">
    <span class="mid-cta-eyebrow">Work With Us</span>
    <h2 style="color:white;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);">
      Ready to See What Consistent Cleaning Actually Looks Like?
    </h2>
    <p style="color:rgba(255,255,255,0.85);max-width:52ch;margin:0 auto var(--space-5);">
      Free estimate, no obligation. We'll match the right service to your home or business and
      get you scheduled quickly.
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
<div aria-hidden="true" style="height:48px;background:var(--color-primary);
     clip-path:polygon(0 60%,100% 0,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── CLOSING CTA (CTA #3) ───────────────────────────────────────────────── -->
<section class="closing-cta" aria-label="Contact Keep N Kleen">
  <div class="container" data-animate="fade-up">
    <span class="closing-cta-eyebrow">Let's Get Started</span>
    <h2>A Cleaning Company That Shows Up and Does the Work</h2>
    <p>Serving Hayes, Gloucester, Yorktown, Newport News, Williamsburg, and communities across Virginia.
       Free estimates, no contracts required — just reliable cleaning you can count on.</p>

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
        View Services
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
