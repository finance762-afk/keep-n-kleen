<?php
// ============================================================
// Keep N Kleen — Thank You / Form Confirmation
// noindex — confirmation page only, no SEO value
// ============================================================
$pageTitle       = "Request Received | Keep N Kleen";
$pageDescription = "Your cleaning estimate request has been received. Keep N Kleen will be in touch within one business day.";
$canonicalUrl    = "https://keep-n-kleen.com/thank-you";
$ogImage         = "https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/photos/1776458151029-1817c0-o__2_.jpg";
$currentPage     = "";
$schemaMarkup    = "";
$noindex         = true;   // Picked up by head.php to output noindex meta tag
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ── Thank You Page Styles ─────────────────────────────────── */
.ty-hero {
    min-height: 55vh;
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: relative;
    overflow: hidden;
    padding: var(--section-pad);
}
.ty-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
    opacity: 0.04;
}
.ty-hero-inner {
    position: relative;
    z-index: 1;
}
.ty-check-wrap {
    width: 88px;
    height: 88px;
    background: rgba(6, 182, 212, 0.15);
    border: 2px solid var(--color-accent);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto var(--space-xl);
    animation: ty-pulse 2s ease-in-out infinite;
}
@keyframes ty-pulse {
    0%, 100% { box-shadow: 0 0 0 0 rgba(6,182,212,0.35); }
    50%       { box-shadow: 0 0 0 16px rgba(6,182,212,0); }
}
.ty-check-wrap i { width: 40px; height: 40px; color: var(--color-accent); }
.ty-hero h1 {
    font-family: var(--font-heading);
    font-size: clamp(2rem, 5vw, 3.2rem);
    font-weight: 800;
    letter-spacing: -0.02em;
    color: #fff;
    margin-bottom: var(--space-md);
    line-height: 1.15;
}
.ty-hero h1 span {
    background: linear-gradient(90deg, #fff 0%, var(--color-accent) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.ty-hero p {
    color: rgba(255,255,255,0.8);
    font-size: 1.1rem;
    max-width: 52ch;
    margin-inline: auto;
    line-height: 1.65;
}

/* ── What Happens Next ─────────────────────────────────────── */
.ty-next-section {
    padding: var(--section-pad);
    background: var(--color-bg-alt);
}
.ty-steps {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-xl);
    margin-top: var(--space-2xl);
    counter-reset: ty-step;
}
@media (max-width: 1023px) { .ty-steps { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 767px)  { .ty-steps { grid-template-columns: 1fr; } }

.ty-step {
    background: #fff;
    border-radius: var(--radius-lg);
    padding: var(--space-xl);
    box-shadow: var(--shadow-md);
    border: 1px solid var(--color-border);
    position: relative;
    counter-increment: ty-step;
}
.ty-step::before {
    content: counter(ty-step, decimal-leading-zero);
    position: absolute;
    top: var(--space-md);
    right: var(--space-md);
    font-family: var(--font-heading);
    font-size: 3.5rem;
    font-weight: 900;
    color: var(--color-primary);
    opacity: 0.06;
    line-height: 1;
}
.ty-step-icon {
    width: 52px;
    height: 52px;
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-accent) 100%);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    margin-bottom: var(--space-md);
}
.ty-step-icon i { width: 22px; height: 22px; }
.ty-step h3 {
    font-family: var(--font-heading);
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--color-primary);
    margin-bottom: var(--space-sm);
}
.ty-step p {
    font-size: 0.92rem;
    color: var(--color-text-light);
    line-height: 1.6;
    margin: 0;
}
.ty-step .step-timing {
    display: inline-flex;
    align-items: center;
    gap: var(--space-xs);
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--color-accent);
    margin-top: var(--space-sm);
}
.ty-step .step-timing i { width: 12px; height: 12px; }

/* ── Services Jump Section ─────────────────────────────────── */
.ty-services-section {
    padding: var(--section-pad);
    background: var(--color-bg);
}
.ty-services-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-lg);
    margin-top: var(--space-2xl);
}
@media (max-width: 767px) { .ty-services-grid { grid-template-columns: 1fr; } }

.ty-service-link {
    display: flex;
    align-items: center;
    gap: var(--space-lg);
    padding: var(--space-xl);
    background: #fff;
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border);
    box-shadow: var(--shadow-sm);
    text-decoration: none;
    color: var(--color-text);
    transition: all var(--transition);
}
.ty-service-link:hover {
    border-color: var(--color-accent);
    box-shadow: var(--shadow-md);
    transform: translateX(4px);
}
.ty-service-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-accent) 100%);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    flex-shrink: 0;
    transition: transform var(--transition);
}
.ty-service-link:hover .ty-service-icon { transform: rotate(-5deg) scale(1.1); }
.ty-service-icon i { width: 20px; height: 20px; }
.ty-service-text h4 {
    font-family: var(--font-heading);
    font-weight: 700;
    font-size: 1rem;
    color: var(--color-primary);
    margin-bottom: var(--space-xs);
}
.ty-service-text p {
    font-size: 0.85rem;
    color: var(--color-text-light);
    margin: 0;
    line-height: 1.5;
}
.ty-service-arrow {
    margin-left: auto;
    color: var(--color-accent);
    flex-shrink: 0;
    opacity: 0;
    transform: translateX(-4px);
    transition: all var(--transition);
}
.ty-service-link:hover .ty-service-arrow {
    opacity: 1;
    transform: translateX(0);
}

/* ── Closing CTA ──────────────────────────────────────────── */
.ty-cta-section {
    padding: var(--section-pad);
    background: var(--color-primary-dark);
    text-align: center;
    position: relative;
    overflow: hidden;
}
.ty-cta-section::after {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.05'/%3E%3C/svg%3E");
    opacity: 0.05;
}
.ty-cta-inner {
    position: relative;
    z-index: 1;
}
.ty-cta-section .eyebrow { color: var(--color-accent); }
.ty-cta-section h2 {
    font-family: var(--font-heading);
    font-size: clamp(1.6rem, 3.5vw, 2.4rem);
    color: #fff;
    margin-bottom: var(--space-md);
}
.ty-cta-section p {
    color: rgba(255,255,255,0.75);
    max-width: 48ch;
    margin-inline: auto;
    margin-bottom: var(--space-xl);
    line-height: 1.65;
}
.ty-cta-phone {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-sm);
    color: #fff;
    font-family: var(--font-heading);
    font-size: clamp(1.3rem, 2.8vw, 1.8rem);
    font-weight: 800;
    text-decoration: none;
    margin-bottom: var(--space-xl);
    transition: color var(--transition);
}
.ty-cta-phone:hover { color: var(--color-accent); }
.ty-cta-phone i { width: 24px; height: 24px; color: var(--color-accent); }
.ty-cta-btns {
    display: flex;
    gap: var(--space-md);
    justify-content: center;
    flex-wrap: wrap;
}
</style>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ── Thank You Hero ────────────────────────────────────────── -->
<section class="ty-hero" aria-label="Request confirmed">
    <div class="container ty-hero-inner">
        <div class="ty-check-wrap" aria-hidden="true">
            <i data-lucide="check"></i>
        </div>
        <h1>Your Request Is <span>Confirmed</span></h1>
        <p>Thank you for reaching out to Keep N Kleen. We've received your cleaning estimate request and will be in touch shortly to confirm details and schedule your service.</p>
    </div>
</section>

<!-- ── What Happens Next ──────────────────────────────────────── -->
<section class="ty-next-section" aria-label="What happens next">
    <div class="container">
        <div class="section-header" style="text-align:center;" data-animate="fade-up">
            <span class="eyebrow">What to Expect</span>
            <h2>Here's What Happens Next</h2>
            <p class="section-subtext prose-centered">We keep things simple and transparent. Here's exactly what you can expect after submitting your request.</p>
        </div>

        <div class="ty-steps">

            <div class="ty-step" data-animate="fade-up">
                <div class="ty-step-icon"><i data-lucide="mail-check"></i></div>
                <h3>We Review Your Request</h3>
                <p>Our team reads every submission carefully to understand your space, your schedule, and what you need. No auto-replies or form templates — a real person reviews it.</p>
                <span class="step-timing"><i data-lucide="clock"></i> Within a few hours</span>
            </div>

            <div class="ty-step" data-animate="fade-up" style="animation-delay:0.1s">
                <div class="ty-step-icon"><i data-lucide="phone-outgoing"></i></div>
                <h3>We Reach Out to Confirm</h3>
                <p>We'll contact you by phone or email — whichever you prefer — to confirm the details, answer any questions, and provide your estimate. No high-pressure sales calls.</p>
                <span class="step-timing"><i data-lucide="clock"></i> Within 1 business day</span>
            </div>

            <div class="ty-step" data-animate="fade-up" style="animation-delay:0.2s">
                <div class="ty-step-icon"><i data-lucide="calendar-check"></i></div>
                <h3>We Schedule Your Cleaning</h3>
                <p>Once you approve the estimate, we lock in a date and time that works with your schedule. We typically have availability within the same week for most services.</p>
                <span class="step-timing"><i data-lucide="clock"></i> Typically within the week</span>
            </div>

        </div><!-- /.ty-steps -->
    </div><!-- /.container -->
</section>

<!-- Section Divider -->
<div aria-hidden="true">
    <svg viewBox="0 0 1440 40" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="display:block;width:100%;height:40px;margin-top:-1px;">
        <path d="M0,0 L0,20 Q360,40 720,20 Q1080,0 1440,20 L1440,0 Z" fill="var(--color-bg-alt)"/>
        <path d="M0,0 L0,20 Q360,40 720,20 Q1080,0 1440,20 L1440,0 Z" fill="var(--color-bg)"/>
    </svg>
</div>

<!-- ── Browse Our Services ─────────────────────────────────── -->
<section class="ty-services-section" aria-label="Browse our services">
    <div class="container">
        <div class="section-header" style="text-align:center;" data-animate="fade-up">
            <span class="eyebrow">While You Wait</span>
            <h2>Explore Our Services</h2>
            <p class="section-subtext prose-centered">Learn more about what's included in each service — or share a page with someone who might need a reliable cleaner in Hayes, VA.</p>
        </div>

        <div class="ty-services-grid" data-animate="fade-up">

            <a href="/services/maid-services" class="ty-service-link">
                <div class="ty-service-icon"><i data-lucide="star"></i></div>
                <div class="ty-service-text">
                    <h4>Maid Services</h4>
                    <p>Full-home maid service with detailed room-by-room cleaning tailored to your home.</p>
                </div>
                <div class="ty-service-arrow"><i data-lucide="arrow-right" style="width:18px;height:18px;"></i></div>
            </a>

            <a href="/services/regular-home-cleaning" class="ty-service-link">
                <div class="ty-service-icon"><i data-lucide="calendar-check"></i></div>
                <div class="ty-service-text">
                    <h4>Regular Home Cleaning</h4>
                    <p>Weekly, bi-weekly, or monthly plans that keep your home spotless on your schedule.</p>
                </div>
                <div class="ty-service-arrow"><i data-lucide="arrow-right" style="width:18px;height:18px;"></i></div>
            </a>

            <a href="/services/move-in-move-out-cleaning" class="ty-service-link">
                <div class="ty-service-icon"><i data-lucide="truck"></i></div>
                <div class="ty-service-text">
                    <h4>Move-In / Move-Out Cleaning</h4>
                    <p>Deep cleaning for property transitions — deposit protection and fresh-start cleans.</p>
                </div>
                <div class="ty-service-arrow"><i data-lucide="arrow-right" style="width:18px;height:18px;"></i></div>
            </a>

            <a href="/services/post-construction-cleaning" class="ty-service-link">
                <div class="ty-service-icon"><i data-lucide="hard-hat"></i></div>
                <div class="ty-service-text">
                    <h4>Post-Construction Cleaning</h4>
                    <p>Specialized cleanup after new builds and renovations — dust, debris, and residue removal.</p>
                </div>
                <div class="ty-service-arrow"><i data-lucide="arrow-right" style="width:18px;height:18px;"></i></div>
            </a>

        </div><!-- /.ty-services-grid -->

        <div style="text-align:center; margin-top:var(--space-2xl);" data-animate="fade-up">
            <a href="/services" class="btn btn-primary btn-lg">View All Services</a>
        </div>
    </div><!-- /.container -->
</section>

<!-- Section Divider -->
<div aria-hidden="true">
    <svg viewBox="0 0 1440 50" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="display:block;width:100%;height:50px;">
        <path d="M0,0 L0,30 L1440,50 L1440,0 Z" fill="var(--color-primary-dark)"/>
    </svg>
</div>

<!-- ── Closing CTA ────────────────────────────────────────────── -->
<section class="ty-cta-section" aria-label="Contact Keep N Kleen">
    <div class="container ty-cta-inner" data-animate="fade-up">
        <span class="eyebrow">Have Questions?</span>
        <h2>We're Easy to Reach</h2>
        <p>If you need to adjust the details of your request, ask a question, or schedule sooner — just give us a call. We're responsive and local.</p>

        <?php if (!empty($phone)): ?>
        <a href="tel:<?php echo $phone; ?>" class="ty-cta-phone">
            <i data-lucide="phone"></i>
            <?php echo $phoneFormatted; ?>
        </a>
        <?php endif; ?>

        <div class="ty-cta-btns">
            <a href="/" class="btn btn-accent btn-lg">Back to Homepage</a>
            <a href="/service-area" class="btn btn-outline-white btn-lg">Our Service Area</a>
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
