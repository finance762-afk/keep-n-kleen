<?php
/**
 * contact.php — Contact Keep N Kleen
 * Keep N Kleen | Page One Insights
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$pageTitle       = 'Contact Keep N Kleen | Free Cleaning Estimate Hayes, VA';
$pageDescription = 'Contact Keep N Kleen for a free estimate in Hayes, VA. Phone, email, or online form — we respond within one business day. Schedule within 3–5 days.';
$canonicalUrl    = $canonicalBase . '/contact';
$ogImage         = $clientImages[4]['url'];
$currentPage     = 'contact';

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'           => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',    'item' => $canonicalBase],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Contact', 'item' => $canonicalBase . '/contact'],
            ],
        ],
        [
            '@type'          => 'ContactPage',
            'name'           => 'Contact ' . $siteName,
            'url'            => $canonicalBase . '/contact',
            'description'    => 'Contact Keep N Kleen for a free cleaning estimate. Serving Hayes, VA and communities across Virginia.',
            'mainEntity'     => [
                '@type'     => 'LocalBusiness',
                'name'      => $siteName,
                'url'       => $canonicalBase,
                'telephone' => $phone,
                'email'     => $email,
                'address'   => [
                    '@type'           => 'PostalAddress',
                    'streetAddress'   => $address['street'],
                    'addressLocality' => $address['city'],
                    'addressRegion'   => $address['state'],
                    'postalCode'      => $address['zip'],
                    'addressCountry'  => 'US',
                ],
                'openingHoursSpecification' => [
                    [
                        '@type'     => 'OpeningHoursSpecification',
                        'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                        'opens'     => '08:00',
                        'closes'    => '18:00',
                    ],
                    [
                        '@type'     => 'OpeningHoursSpecification',
                        'dayOfWeek' => ['Saturday'],
                        'opens'     => '09:00',
                        'closes'    => '16:00',
                    ],
                ],
            ],
        ],
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ── Contact hero ─────────────────────────────────────────────────────────── */
.contact-hero {
  position: relative;
  padding: calc(80px + var(--space-16)) 0 var(--space-16);
  background: var(--color-primary);
  text-align: center;
  overflow: hidden;
}
.contact-hero::before {
  content: '';
  position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.4;
}
.contact-hero .container { position: relative; z-index: 1; }
.hero-eyebrow-pill {
  display: inline-flex; align-items: center; gap: var(--space-2);
  font-family: var(--font-heading); font-size: var(--font-size-xs);
  font-weight: 600; text-transform: uppercase; letter-spacing: 3px;
  color: var(--color-accent); margin-bottom: var(--space-5);
  padding: var(--space-1) var(--space-4);
  border: 1px solid rgba(255,255,255,0.2);
  border-radius: var(--radius-full);
}
.contact-hero h1 {
  color: white;
  font-size: clamp(2rem,4.5vw,3.4rem);
  letter-spacing: -0.02em;
  margin-bottom: var(--space-4);
}
.contact-hero-sub {
  color: rgba(255,255,255,0.85);
  font-size: var(--font-size-lg);
  max-width: 56ch; margin: 0 auto;
}

/* Breadcrumb */
.breadcrumb {
  background: rgba(0,0,0,0.2); padding: var(--space-3) 0;
}
.breadcrumb ol { display: flex; align-items: center; gap: var(--space-2); list-style: none; }
.breadcrumb a { color: rgba(255,255,255,0.7); font-size: var(--font-size-sm); }
.breadcrumb a:hover { color: var(--color-accent); }
.breadcrumb li:last-child span { color: rgba(255,255,255,0.9); font-size: var(--font-size-sm); font-weight: 600; }
.breadcrumb-sep { color: rgba(255,255,255,0.3); font-size: var(--font-size-xs); }

/* ── Contact layout ──────────────────────────────────────────────────────── */
.contact-layout {
  display: grid;
  grid-template-columns: 3fr 2fr;
  gap: var(--space-10);
  align-items: start;
}

/* ── Form card ───────────────────────────────────────────────────────────── */
.form-card {
  background: var(--color-white);
  border-radius: var(--radius-xl);
  padding: var(--space-10);
  box-shadow: var(--shadow-xl);
}
.form-card h2 { font-size: clamp(1.4rem,2.5vw,1.9rem); letter-spacing: -0.02em; margin-bottom: var(--space-2); }
.form-card > p { color: var(--color-gray); font-size: var(--font-size-sm); margin-bottom: var(--space-8); }

.form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-4);
}
.field-group {
  position: relative;
  margin-bottom: var(--space-5);
}
.field-group label {
  position: absolute;
  top: 14px; left: 14px;
  font-size: var(--font-size-sm);
  color: var(--color-gray);
  transition: all 0.2s ease;
  pointer-events: none;
  background: var(--color-white);
  padding: 0 4px;
}
.field-group input,
.field-group select,
.field-group textarea {
  width: 100%;
  padding: 14px;
  border: 2px solid var(--color-gray-light);
  border-radius: var(--radius-md);
  font-family: var(--font-body);
  font-size: var(--font-size-sm);
  color: var(--color-dark);
  background: var(--color-white);
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
  appearance: none;
}
.field-group input:focus,
.field-group select:focus,
.field-group textarea:focus {
  outline: none;
  border-color: var(--color-accent);
  box-shadow: 0 0 0 3px rgba(6,182,212,0.12);
}
.field-group input:focus + label,
.field-group input:not(:placeholder-shown) + label,
.field-group select:focus + label,
.field-group select:not([value=""]) + label,
.field-group textarea:focus + label,
.field-group textarea:not(:placeholder-shown) + label {
  top: -8px;
  font-size: var(--font-size-xs);
  color: var(--color-accent);
  font-weight: 600;
}
.field-group textarea { resize: vertical; min-height: 130px; }
.field-group select {
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 12px center;
  background-size: 18px;
  padding-right: 40px;
}
.form-submit {
  width: 100%;
  justify-content: center;
  margin-top: var(--space-4);
  font-size: var(--font-size-base);
  padding: var(--space-4) var(--space-8);
}
.form-privacy {
  text-align: center;
  font-size: var(--font-size-xs);
  color: var(--color-gray);
  margin-top: var(--space-3);
}
.form-privacy i { display: inline; vertical-align: middle; }

/* ── Contact info sidebar ────────────────────────────────────────────────── */
.contact-sidebar { position: sticky; top: 100px; }
.contact-info-card {
  background: var(--color-white);
  border-radius: var(--radius-xl);
  padding: var(--space-8);
  box-shadow: var(--shadow-xl);
  margin-bottom: var(--space-6);
}
.contact-info-card h3 { font-size: var(--font-size-xl); margin-bottom: var(--space-6); }
.contact-detail {
  display: flex; align-items: flex-start; gap: var(--space-3);
  margin-bottom: var(--space-5);
}
.contact-detail:last-child { margin-bottom: 0; }
.contact-detail-icon {
  flex-shrink: 0; width: 40px; height: 40px;
  border-radius: var(--radius-md);
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  display: flex; align-items: center; justify-content: center;
  color: var(--color-accent);
}
.contact-detail-text .label { font-size: var(--font-size-xs); text-transform: uppercase; letter-spacing: 1px; color: var(--color-gray); margin-bottom: 2px; }
.contact-detail-text .value { font-size: var(--font-size-sm); color: var(--color-dark); font-weight: 600; }
.contact-detail-text a { color: var(--color-primary); font-weight: 600; }
.contact-detail-text a:hover { color: var(--color-accent); }

.hours-card {
  background: var(--color-primary);
  border-radius: var(--radius-xl);
  padding: var(--space-8);
  color: white;
}
.hours-card h3 { color: white; font-size: var(--font-size-xl); margin-bottom: var(--space-6); }
.hours-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--space-3); font-size: var(--font-size-sm); }
.hours-row:last-child { margin-bottom: 0; }
.hours-row .days { color: rgba(255,255,255,0.75); }
.hours-row .time { color: var(--color-accent); font-weight: 600; }

/* Map placeholder */
.map-placeholder {
  background: var(--color-light);
  border-radius: var(--radius-xl);
  overflow: hidden;
  margin-top: var(--space-6);
  box-shadow: var(--shadow-card);
}
.map-placeholder iframe {
  width: 100%; height: 220px;
  display: block; border: none;
}
.map-placeholder-inner {
  height: 220px;
  display: flex; flex-direction: column;
  align-items: center; justify-content: center;
  color: var(--color-gray);
  gap: var(--space-3);
}
.map-placeholder-inner i { color: var(--color-accent); }
.map-placeholder-inner p { font-size: var(--font-size-sm); margin: 0; }

/* ── Closing CTA ─────────────────────────────────────────────────────────── */
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

/* Responsive */
@media (max-width: 1023px) {
  .contact-layout { grid-template-columns: 1fr; }
  .contact-sidebar { position: static; }
}
@media (max-width: 767px) {
  .form-row { grid-template-columns: 1fr; }
  .form-card { padding: var(--space-6); }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ── HERO ──────────────────────────────────────────────────────────────── -->
<section class="contact-hero" aria-label="Contact Keep N Kleen">
  <nav class="breadcrumb" aria-label="Breadcrumb" style="margin-bottom:var(--space-8);">
    <div class="container">
      <ol>
        <li><a href="/">Home</a></li>
        <li><span class="breadcrumb-sep" aria-hidden="true">›</span></li>
        <li><span aria-current="page">Contact</span></li>
      </ol>
    </div>
  </nav>

  <div class="container">
    <div class="hero-eyebrow-pill">
      <i data-lucide="message-circle" aria-hidden="true" style="width:13px;height:13px;"></i>
      Get in Touch
    </div>
    <h1>Get Your Free Cleaning Estimate</h1>
    <p class="contact-hero-sub">
      Tell us about your space and what you need. We respond quickly and most new clients
      are scheduled within 3–5 business days.
    </p>
  </div>
</section>

<!-- ── TICKER ────────────────────────────────────────────────────────────── -->
<div class="ticker-strip" aria-hidden="true" role="presentation">
  <div class="ticker-track">
    <?php
    $items = [
        ['icon' => 'shield-check',  'text' => 'Free Estimates'],
        ['icon' => 'clock',         'text' => 'Quick Response Time'],
        ['icon' => 'calendar-check','text' => 'Same-Week Scheduling Available'],
        ['icon' => 'star',          'text' => '5.0 Google Rating'],
        ['icon' => 'leaf',          'text' => 'Eco-Friendly Options'],
        ['icon' => 'map-pin',       'text' => 'Hayes, VA &amp; Surrounding Areas'],
        ['icon' => 'users',         'text' => 'No Contracts Required'],
        ['icon' => 'check-circle-2','text' => 'Licensed &amp; Insured'],
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

<!-- ── MAIN CONTACT SECTION ───────────────────────────────────────────────── -->
<section style="background:var(--color-light);padding:var(--space-16) 0;">
  <div class="container">
    <div class="contact-layout">

      <!-- ─── CONTACT FORM ─────────────────────────────────────────── -->
      <div class="form-card" data-animate="fade-up">
        <h2>Request a Free Estimate</h2>
        <p>Fill out the form and we'll get back to you as soon as possible — typically within one business day.</p>

        <form action="<?php echo htmlspecialchars($formAction, ENT_QUOTES, 'UTF-8'); ?>"
              method="POST"
              novalidate
              aria-label="Contact form">

          <!-- Formsubmit.co hidden fields -->
          <input type="hidden" name="_next"     value="<?php echo htmlspecialchars($canonicalBase . '/thank-you', ENT_QUOTES, 'UTF-8'); ?>">
          <input type="hidden" name="_captcha"  value="false">
          <input type="hidden" name="_template" value="table">
          <input type="hidden" name="_subject"  value="<?php echo htmlspecialchars($formSubject, ENT_QUOTES, 'UTF-8'); ?>">

          <!-- Honeypot spam trap -->
          <div style="display:none;" aria-hidden="true">
            <input type="text" name="_honey" tabindex="-1" autocomplete="off" value="">
          </div>

          <div class="form-row">
            <!-- Name -->
            <div class="field-group">
              <input type="text" id="name" name="name"
                     placeholder=" "
                     required
                     autocomplete="name"
                     aria-required="true">
              <label for="name">Full Name *</label>
            </div>

            <!-- Phone -->
            <div class="field-group">
              <input type="tel" id="phone" name="phone"
                     placeholder=" "
                     required
                     autocomplete="tel"
                     aria-required="true">
              <label for="phone">Phone Number *</label>
            </div>
          </div>

          <!-- Email -->
          <div class="field-group">
            <input type="email" id="email" name="email"
                   placeholder=" "
                   required
                   autocomplete="email"
                   aria-required="true">
            <label for="email">Email Address *</label>
          </div>

          <!-- Service dropdown -->
          <div class="field-group">
            <select id="service" name="service_requested" required aria-required="true">
              <option value="" disabled selected></option>
              <?php foreach ($services as $svc): ?>
              <option value="<?php echo htmlspecialchars($svc['name'], ENT_QUOTES, 'UTF-8'); ?>">
                <?php echo htmlspecialchars($svc['name'], ENT_QUOTES, 'UTF-8'); ?>
              </option>
              <?php endforeach; ?>
              <option value="Deep Home Cleaning">Deep Home Cleaning</option>
              <option value="Commercial / Janitorial">Commercial / Janitorial</option>
              <option value="Not Sure — Need Recommendation">Not Sure — Need Recommendation</option>
            </select>
            <label for="service">Service Requested *</label>
          </div>

          <!-- Message -->
          <div class="field-group">
            <textarea id="message" name="message"
                      placeholder=" "
                      aria-label="Your message"
                      rows="5"></textarea>
            <label for="message">Tell Us About Your Space</label>
          </div>

          <button type="submit" class="btn btn-accent form-submit">
            <i data-lucide="send" aria-hidden="true" style="width:18px;height:18px;"></i>
            Send My Request — It's Free
          </button>

          <p class="form-privacy">
            <i data-lucide="lock" style="width:11px;height:11px;"></i>
            We never share your information. No spam, no pressure.
          </p>

        </form>
      </div>

      <!-- ─── SIDEBAR ────────────────────────────────────────────── -->
      <div class="contact-sidebar" data-animate="fade-up">

        <div class="contact-info-card">
          <h3>Contact Information</h3>

          <?php if ($phone): ?>
          <div class="contact-detail">
            <div class="contact-detail-icon">
              <i data-lucide="phone" aria-hidden="true" style="width:18px;height:18px;"></i>
            </div>
            <div class="contact-detail-text">
              <div class="label">Phone</div>
              <div class="value">
                <a href="tel:<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>">
                  <?php echo htmlspecialchars($phoneFormatted ?: formatPhone($phone), ENT_QUOTES, 'UTF-8'); ?>
                </a>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <?php if ($email): ?>
          <div class="contact-detail">
            <div class="contact-detail-icon">
              <i data-lucide="mail" aria-hidden="true" style="width:18px;height:18px;"></i>
            </div>
            <div class="contact-detail-text">
              <div class="label">Email</div>
              <div class="value">
                <a href="mailto:<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">
                  <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>
                </a>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <div class="contact-detail">
            <div class="contact-detail-icon">
              <i data-lucide="map-pin" aria-hidden="true" style="width:18px;height:18px;"></i>
            </div>
            <div class="contact-detail-text">
              <div class="label">Location</div>
              <div class="value"><?php echo htmlspecialchars($address['city'] . ', ' . $address['state'] . ' ' . $address['zip'], ENT_QUOTES, 'UTF-8'); ?></div>
            </div>
          </div>

          <div class="contact-detail">
            <div class="contact-detail-icon">
              <i data-lucide="globe" aria-hidden="true" style="width:18px;height:18px;"></i>
            </div>
            <div class="contact-detail-text">
              <div class="label">Service Area</div>
              <div class="value">Hayes, VA &amp; Virginia Communities</div>
            </div>
          </div>
        </div>

        <div class="hours-card">
          <h3>Business Hours</h3>
          <div class="hours-row">
            <span class="days">Monday – Friday</span>
            <span class="time">8:00 AM – 6:00 PM</span>
          </div>
          <div class="hours-row">
            <span class="days">Saturday</span>
            <span class="time">9:00 AM – 4:00 PM</span>
          </div>
          <div class="hours-row">
            <span class="days">Sunday</span>
            <span class="time" style="color:rgba(255,255,255,0.5);">Closed</span>
          </div>
          <div style="margin-top:var(--space-6);padding-top:var(--space-5);border-top:1px solid rgba(255,255,255,0.1);">
            <p style="font-size:var(--font-size-xs);color:rgba(255,255,255,0.6);margin:0;line-height:1.6;">
              Free estimates provided by phone or form. Most new clients are scheduled
              within 3–5 business days of first contact.
            </p>
          </div>
        </div>

        <!-- Map placeholder -->
        <div class="map-placeholder">
          <!-- Replace with real embed when domain confirmed -->
          <!--
          <iframe
            src="https://www.google.com/maps/embed?pb=..."
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="Keep N Kleen location in Hayes, VA"
            aria-label="Map showing Keep N Kleen location in Hayes, Virginia">
          </iframe>
          -->
          <div class="map-placeholder-inner">
            <i data-lucide="map-pin" style="width:32px;height:32px;"></i>
            <p>Hayes, VA 23072</p>
            <p style="color:var(--color-gray-light);font-size:var(--font-size-xs);">Serving communities across Virginia</p>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-white);
     clip-path:polygon(0 0,100% 60%,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── WHAT HAPPENS NEXT ──────────────────────────────────────────────────── -->
<section style="background:var(--color-white);padding:var(--space-16) 0;">
  <div class="container">
    <div class="section-header" data-animate="fade-up">
      <span class="eyebrow">After You Submit</span>
      <h2>What Happens When You Reach Out</h2>
      <p>We keep it simple and fast. No automated runaround — just a real conversation about your space.</p>
    </div>

    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:var(--space-6);" data-animate="fade-up">

      <div style="text-align:center;padding:var(--space-8);background:var(--color-light);border-radius:var(--radius-lg);">
        <div style="width:56px;height:56px;border-radius:50%;background:var(--color-primary);display:flex;align-items:center;justify-content:center;margin:0 auto var(--space-4);font-family:var(--font-heading);font-weight:800;font-size:var(--font-size-xl);color:var(--color-accent);">1</div>
        <h3 style="font-size:var(--font-size-base);margin-bottom:var(--space-2);">We Review Your Request</h3>
        <p style="font-size:var(--font-size-sm);color:var(--color-gray);margin:0;">Within one business day we'll look at what you've shared and prepare a response tailored to your situation.</p>
      </div>

      <div style="text-align:center;padding:var(--space-8);background:var(--color-light);border-radius:var(--radius-lg);">
        <div style="width:56px;height:56px;border-radius:50%;background:var(--color-primary);display:flex;align-items:center;justify-content:center;margin:0 auto var(--space-4);font-family:var(--font-heading);font-weight:800;font-size:var(--font-size-xl);color:var(--color-accent);">2</div>
        <h3 style="font-size:var(--font-size-base);margin-bottom:var(--space-2);">We Follow Up Directly</h3>
        <p style="font-size:var(--font-size-sm);color:var(--color-gray);margin:0;">We'll reach out by phone or email — whichever you prefer — to discuss your needs, answer questions, and provide an estimate.</p>
      </div>

      <div style="text-align:center;padding:var(--space-8);background:var(--color-light);border-radius:var(--radius-lg);">
        <div style="width:56px;height:56px;border-radius:50%;background:var(--color-primary);display:flex;align-items:center;justify-content:center;margin:0 auto var(--space-4);font-family:var(--font-heading);font-weight:800;font-size:var(--font-size-xl);color:var(--color-accent);">3</div>
        <h3 style="font-size:var(--font-size-base);margin-bottom:var(--space-2);">You Get on the Schedule</h3>
        <p style="font-size:var(--font-size-sm);color:var(--color-gray);margin:0;">Once you're ready, we confirm your date and crew. Most new clients are booked within 3–5 business days of first contact.</p>
      </div>

    </div>
  </div>
</section>

<!-- DIVIDER -->
<div aria-hidden="true" style="height:48px;background:var(--color-primary);
     clip-path:polygon(0 60%,100% 0,100% 100%,0 100%);margin-top:-2px;"></div>

<!-- ── CLOSING CTA (CTA #3) ───────────────────────────────────────────────── -->
<section class="closing-cta" aria-label="Other ways to connect">
  <div class="container" data-animate="fade-up">
    <span class="closing-cta-eyebrow">Prefer to Call?</span>
    <h2>We're Reachable the Way You Prefer</h2>
    <p>Whether it's a quick phone call to check availability or a detailed message about your project,
       we'll get back to you promptly and personally.</p>

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
      <a href="/services" class="btn btn-accent btn-lg">
        Browse Our Services
        <i data-lucide="arrow-right" aria-hidden="true" style="width:18px;height:18px;"></i>
      </a>
      <a href="/service-area" class="btn btn-outline-white btn-lg">
        View Service Areas
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
