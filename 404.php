<?php
// ============================================================
// Keep N Kleen — 404 Not Found
// ============================================================
$pageTitle       = "Page Not Found | Keep N Kleen";
$pageDescription = "The page you're looking for doesn't exist. Find our cleaning services, service area information, or contact Keep N Kleen for a free estimate.";
$canonicalUrl    = "https://keep-n-kleen.com/404";
$ogImage         = "https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/photos/1776458151029-1817c0-o__2_.jpg";
$currentPage     = "";
$schemaMarkup    = "";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ── 404 Page Styles ──────────────────────────────────────── */
.error-hero {
    min-height: 52vh;
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: relative;
    overflow: hidden;
    padding: var(--section-pad);
}
.error-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
    opacity: 0.04;
}
.error-code {
    font-family: var(--font-heading);
    font-size: clamp(6rem, 18vw, 14rem);
    font-weight: 900;
    line-height: 1;
    letter-spacing: -0.04em;
    background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, var(--color-accent) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: var(--space-md);
}
.error-headline {
    font-family: var(--font-heading);
    font-size: clamp(1.4rem, 3vw, 2rem);
    color: #fff;
    margin-bottom: var(--space-md);
    font-weight: 700;
}
.error-subtext {
    color: rgba(255,255,255,0.75);
    font-size: 1.1rem;
    max-width: 48ch;
    margin-inline: auto;
    line-height: 1.6;
}

/* ── Search Suggestion ────────────────────────────────────── */
.error-search-wrap {
    padding: var(--section-pad);
    background: var(--color-bg-alt);
}
.error-search-inner {
    max-width: 600px;
    margin-inline: auto;
    text-align: center;
}
.error-search-inner .section-header {
    margin-bottom: var(--space-xl);
}
.search-hint {
    color: var(--color-text-light);
    font-size: 0.95rem;
    margin-top: var(--space-sm);
}

/* ── Popular Links ────────────────────────────────────────── */
.popular-pages-section {
    padding: var(--section-pad);
    background: var(--color-bg);
}
.popular-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-xl);
    margin-top: var(--space-2xl);
}
@media (max-width: 1023px) { .popular-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 767px)  { .popular-grid { grid-template-columns: 1fr; } }

.popular-card {
    background: #fff;
    border-radius: var(--radius-lg);
    padding: var(--space-xl);
    box-shadow: var(--shadow-md);
    border: 1px solid var(--color-border);
    display: flex;
    flex-direction: column;
    gap: var(--space-md);
    transition: transform var(--transition), box-shadow var(--transition);
    text-decoration: none;
    color: var(--color-text);
}
.popular-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
    text-decoration: none;
}
.popular-card-icon {
    width: 52px;
    height: 52px;
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-accent) 100%);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    flex-shrink: 0;
    transition: transform var(--transition);
}
.popular-card:hover .popular-card-icon { transform: scale(1.1) rotate(-5deg); }
.popular-card-icon i { width: 22px; height: 22px; }
.popular-card-title {
    font-family: var(--font-heading);
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--color-primary);
    margin: 0;
}
.popular-card-desc {
    font-size: 0.92rem;
    color: var(--color-text-light);
    line-height: 1.55;
    margin: 0;
    flex: 1;
}
.popular-card-link {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--color-accent);
    display: flex;
    align-items: center;
    gap: var(--space-xs);
}
.popular-card-link i { width: 14px; height: 14px; transition: transform var(--transition); }
.popular-card:hover .popular-card-link i { transform: translateX(4px); }

/* ── Contact CTA ──────────────────────────────────────────── */
.error-cta-section {
    padding: var(--section-pad);
    background: var(--color-primary);
    position: relative;
    overflow: hidden;
    text-align: center;
}
.error-cta-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
}
.error-cta-section::after {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.06'/%3E%3C/svg%3E");
    opacity: 0.06;
}
.error-cta-inner {
    position: relative;
    z-index: 1;
}
.error-cta-section .eyebrow { color: var(--color-accent); }
.error-cta-section h2 {
    font-family: var(--font-heading);
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    color: #fff;
    margin-bottom: var(--space-md);
}
.error-cta-section p {
    color: rgba(255,255,255,0.8);
    max-width: 52ch;
    margin-inline: auto;
    margin-bottom: var(--space-xl);
    line-height: 1.65;
}
.error-cta-phone {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-sm);
    color: #fff;
    font-family: var(--font-heading);
    font-size: clamp(1.4rem, 3vw, 2rem);
    font-weight: 800;
    text-decoration: none;
    margin-bottom: var(--space-xl);
    transition: color var(--transition);
}
.error-cta-phone:hover { color: var(--color-accent); }
.error-cta-phone i { width: 26px; height: 26px; color: var(--color-accent); }
.error-cta-btns {
    display: flex;
    gap: var(--space-md);
    justify-content: center;
    flex-wrap: wrap;
}
</style>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ── Error Hero ───────────────────────────────────────────── -->
<section class="error-hero" aria-label="Page not found">
    <div class="container">
        <div class="error-code" aria-hidden="true">404</div>
        <h1 class="error-headline">This Page Has Been Swept Away</h1>
        <p class="error-subtext">The page you're looking for may have moved, been removed, or never existed. Let's get you back to a clean slate.</p>
    </div>
</section>

<!-- ── Search Suggestion ────────────────────────────────────── -->
<section class="error-search-wrap" aria-label="Navigate to popular pages">
    <div class="error-search-inner">
        <div class="section-header" data-animate="fade-up">
            <span class="eyebrow">Find What You Need</span>
            <h2>Looking for something specific?</h2>
        </div>
        <p class="search-hint" data-animate="fade-up">Browse our most visited pages below, or reach out and we'll point you in the right direction.</p>
    </div>
</section>

<!-- Section Divider -->
<div style="height:0;overflow:hidden;line-height:0;">
    <svg viewBox="0 0 1440 40" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="display:block;width:100%;height:40px;margin-top:-1px;" aria-hidden="true">
        <path d="M0,40 L0,10 Q360,40 720,10 Q1080,-20 1440,10 L1440,40 Z" fill="#ffffff"/>
    </svg>
</div>

<!-- ── Popular Pages ─────────────────────────────────────────── -->
<section class="popular-pages-section" aria-label="Popular pages">
    <div class="container">
        <div class="section-header" style="text-align:center;" data-animate="fade-up">
            <span class="eyebrow">Quick Links</span>
            <h2>Popular Pages</h2>
        </div>

        <div class="popular-grid">

            <a href="/" class="popular-card card" data-animate="fade-up" data-tilt>
                <div class="popular-card-icon">
                    <i data-lucide="home"></i>
                </div>
                <h3 class="popular-card-title">Homepage</h3>
                <p class="popular-card-desc">Learn about Keep N Kleen, our services, and why Hayes, VA residents trust us with their homes.</p>
                <span class="popular-card-link">Visit Homepage <i data-lucide="arrow-right"></i></span>
            </a>

            <a href="/services" class="popular-card card" data-animate="fade-up" data-tilt style="animation-delay:0.1s">
                <div class="popular-card-icon">
                    <i data-lucide="sparkles"></i>
                </div>
                <h3 class="popular-card-title">All Services</h3>
                <p class="popular-card-desc">Explore our full range of residential cleaning services — maid service, move-out, recurring, and post-construction.</p>
                <span class="popular-card-link">View Services <i data-lucide="arrow-right"></i></span>
            </a>

            <a href="/services/maid-services" class="popular-card card" data-animate="fade-up" data-tilt style="animation-delay:0.2s">
                <div class="popular-card-icon">
                    <i data-lucide="star"></i>
                </div>
                <h3 class="popular-card-title">Maid Services</h3>
                <p class="popular-card-desc">Professional maid services in Hayes, VA. Thorough, reliable, and customized to your home's needs.</p>
                <span class="popular-card-link">Learn More <i data-lucide="arrow-right"></i></span>
            </a>

            <a href="/services/regular-home-cleaning" class="popular-card card" data-animate="fade-up" data-tilt style="animation-delay:0.1s">
                <div class="popular-card-icon">
                    <i data-lucide="calendar-check"></i>
                </div>
                <h3 class="popular-card-title">Regular Home Cleaning</h3>
                <p class="popular-card-desc">Weekly, bi-weekly, or monthly cleaning plans that keep your home consistently spotless without the hassle.</p>
                <span class="popular-card-link">View Plans <i data-lucide="arrow-right"></i></span>
            </a>

            <a href="/services/move-in-move-out-cleaning" class="popular-card card" data-animate="fade-up" data-tilt style="animation-delay:0.2s">
                <div class="popular-card-icon">
                    <i data-lucide="truck"></i>
                </div>
                <h3 class="popular-card-title">Move-In / Move-Out Cleaning</h3>
                <p class="popular-card-desc">Deep cleaning for transitions — get your deposit back or walk into a spotless new home on day one.</p>
                <span class="popular-card-link">Learn More <i data-lucide="arrow-right"></i></span>
            </a>

            <a href="/contact" class="popular-card card" data-animate="fade-up" data-tilt style="animation-delay:0.3s">
                <div class="popular-card-icon">
                    <i data-lucide="message-square"></i>
                </div>
                <h3 class="popular-card-title">Get a Free Estimate</h3>
                <p class="popular-card-desc">Ready to book or have questions? We respond fast and can often schedule within days of your request.</p>
                <span class="popular-card-link">Contact Us <i data-lucide="arrow-right"></i></span>
            </a>

        </div><!-- /.popular-grid -->
    </div><!-- /.container -->
</section>

<!-- Section Divider -->
<div style="height:0;overflow:hidden;line-height:0;" aria-hidden="true">
    <svg viewBox="0 0 1440 50" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="display:block;width:100%;height:50px;" aria-hidden="true">
        <path d="M0,0 L0,30 L1440,50 L1440,0 Z" fill="var(--color-primary)"/>
    </svg>
</div>

<!-- ── Contact CTA ───────────────────────────────────────────── -->
<section class="error-cta-section" aria-label="Contact Keep N Kleen">
    <div class="container error-cta-inner">
        <div data-animate="fade-up">
            <span class="eyebrow">Still Need Help?</span>
            <h2>We'll Get You Sorted Out</h2>
            <p>Our team is easy to reach and happy to answer questions, schedule a cleaning, or help you find exactly what you're looking for.</p>
        </div>

        <?php if (!empty($phone)): ?>
        <a href="tel:<?php echo $phone; ?>" class="error-cta-phone" data-animate="fade-up">
            <i data-lucide="phone"></i>
            <?php echo $phoneFormatted; ?>
        </a>
        <?php endif; ?>

        <div class="error-cta-btns" data-animate="fade-up">
            <a href="/contact" class="btn btn-accent btn-lg">Get a Free Estimate</a>
            <a href="/" class="btn btn-outline-white btn-lg">Back to Homepage</a>
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
