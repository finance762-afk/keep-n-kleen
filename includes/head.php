<?php
/**
 * head.php — Global <head> component
 * Keep N Kleen | Page One Insights
 *
 * Expects the calling page to set before including:
 *   $pageTitle         (string)  — overrides default title
 *   $pageDescription   (string)  — overrides default description
 *   $canonicalUrl      (string)  — full canonical URL for this page
 *   $ogImage           (string)  — OG image URL
 *   $schemaMarkup      (string)  — additional page-specific JSON-LD (raw JSON string)
 *   $currentPage       (string)  — page slug for active state + GSC conditional
 *   $heroImagePreload  (string)  — absolute URL of hero image to preload
 *   $useSwiper         (bool)    — whether to load Swiper CSS
 */

// Auto-load config and functions if not yet included
if (!isset($siteName)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
}
if (!function_exists('isActivePage')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
}

// ── Resolved values ──────────────────────────────────────────────────────────
$_cur  = isset($currentPage) ? $currentPage : '';
$_title = isset($pageTitle) && $pageTitle
    ? $pageTitle
    : $siteName . ' | Cleaning Service in ' . $address['city'] . ', ' . $address['state'];

$_desc = isset($pageDescription) && $pageDescription
    ? $pageDescription
    : 'Professional cleaning services in Hayes, VA — maid services, regular home cleaning, move-in/out & post-construction cleanup. Licensed & insured since 2021. Free estimates.';

$_canonical = isset($canonicalUrl) && $canonicalUrl ? $canonicalUrl : $canonicalBase;
$_ogImage   = isset($ogImage)      && $ogImage      ? $ogImage      : $logoUrl;
$_keywords  = implode(', ', $secondaryKeywords);

// ── LocalBusiness JSON-LD ────────────────────────────────────────────────────
$_lbSchema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'LocalBusiness',
    'name'        => $siteName,
    'url'         => $canonicalBase,
    'telephone'   => $phone,
    'email'       => $email,
    'description' => $description,
    'image'       => $logoUrl,
    'logo'        => [
        '@type' => 'ImageObject',
        'url'   => $logoUrl,
    ],
    'address' => [
        '@type'           => 'PostalAddress',
        'streetAddress'   => $address['street'],
        'addressLocality' => $address['city'],
        'addressRegion'   => $address['state'],
        'postalCode'      => $address['zip'],
        'addressCountry'  => 'US',
    ],
    'geo' => [
        '@type'     => 'GeoCoordinates',
        'latitude'  => 37.2776,
        'longitude' => -76.5099,
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
    'areaServed' => [
        '@type' => 'State',
        'name'  => 'Virginia',
    ],
    'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name'  => 'Cleaning Services',
        'itemListElement' => array_map(function (array $svc): array {
            return [
                '@type'       => 'Offer',
                'itemOffered' => [
                    '@type'       => 'Service',
                    'name'        => $svc['name'],
                    'description' => $svc['description'],
                ],
            ];
        }, $services),
    ],
    'aggregateRating' => [
        '@type'       => 'AggregateRating',
        'ratingValue' => '5.0',
        'reviewCount' => '24',
        'bestRating'  => '5',
        'worstRating' => '1',
    ],
    'foundingYear' => (string) $yearEstablished,
    'sameAs' => array_values(array_filter([
        $socialLinks['facebook'],
        $socialLinks['instagram'],
        $socialLinks['google'],
    ])),
];
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Primary SEO -->
<title><?php echo htmlspecialchars($_title, ENT_QUOTES, 'UTF-8'); ?></title>
<meta name="description" content="<?php echo htmlspecialchars($_desc, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="keywords" content="<?php echo htmlspecialchars($_keywords, ENT_QUOTES, 'UTF-8'); ?>">
<link rel="canonical" href="<?php echo htmlspecialchars($_canonical, ENT_QUOTES, 'UTF-8'); ?>">

<!-- Open Graph -->
<meta property="og:type"        content="website">
<meta property="og:title"       content="<?php echo htmlspecialchars($_title, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($_desc, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:url"         content="<?php echo htmlspecialchars($_canonical, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:image"       content="<?php echo htmlspecialchars($_ogImage, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:site_name"   content="<?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:locale"      content="en_US">

<!-- Twitter Card -->
<meta name="twitter:card"        content="summary_large_image">
<meta name="twitter:title"       content="<?php echo htmlspecialchars($_title, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($_desc, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="twitter:image"       content="<?php echo htmlspecialchars($_ogImage, ENT_QUOTES, 'UTF-8'); ?>">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Open+Sans:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">

<?php if (!empty($useSwiper)): ?>
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<?php endif; ?>

<!-- Styles -->
<link rel="stylesheet" href="/assets/css/framework.css">

<!-- Favicon -->
<link rel="icon" href="/assets/images/favicon.svg" type="image/svg+xml">
<link rel="icon" href="/assets/images/favicon.png" type="image/png" sizes="32x32">

<?php if (!empty($heroImagePreload)): ?>
<!-- Hero image preload -->
<link rel="preload" as="image" href="<?php echo htmlspecialchars($heroImagePreload, ENT_QUOTES, 'UTF-8'); ?>">
<?php endif; ?>

<?php if ($_cur === 'home'): ?>
<!-- Google Search Console Verification -->
<!-- <meta name="google-site-verification" content="REPLACE_WITH_GSC_CODE"> -->
<?php endif; ?>

<!-- Google Analytics 4 — replace ID when provided -->
<!--
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo htmlspecialchars($googleAnalyticsId, ENT_QUOTES, 'UTF-8'); ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?php echo htmlspecialchars($googleAnalyticsId, ENT_QUOTES, 'UTF-8'); ?>');
</script>
-->

<!-- Schema: LocalBusiness (every page) -->
<script type="application/ld+json">
<?php echo json_encode($_lbSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>

<?php if (!empty($schemaMarkup)): ?>
<!-- Schema: Page-specific -->
<script type="application/ld+json">
<?php echo $schemaMarkup; ?>
</script>
<?php endif; ?>

<!-- Component utility styles -->
<style>
  /* Mobile-only nav items: hidden on desktop */
  .nav-mobile-only { display: none !important; }

  /* Nav active state */
  .nav-links a.nav-active,
  .nav-links a[aria-current="page"] {
    color: var(--color-accent) !important;
  }

  /* Dropdown chevron */
  .nav-dropdown > a::after {
    content: '';
    display: inline-block;
    width: 6px; height: 6px;
    border-right: 1.5px solid currentColor;
    border-bottom: 1.5px solid currentColor;
    transform: rotate(45deg);
    margin-left: 6px;
    vertical-align: middle;
    position: relative;
    top: -1px;
    transition: transform var(--transition-fast);
  }
  .nav-dropdown:hover > a::after { transform: rotate(-135deg); }

  /* Mobile nav expanded dropdown */
  .nav-dropdown-menu.mobile-open {
    position: static !important;
    opacity: 1 !important;
    visibility: visible !important;
    transform: none !important;
    box-shadow: none !important;
    background: rgba(255,255,255,0.07) !important;
    border-radius: var(--radius-md) !important;
    padding: var(--space-2) 0 !important;
    margin-top: var(--space-2) !important;
  }
  .nav-dropdown-menu.mobile-open a {
    color: rgba(255,255,255,0.85) !important;
    font-size: var(--font-size-base) !important;
    padding: var(--space-2) var(--space-6) !important;
  }

  /* Footer entity block */
  .footer-entity {
    border-top: 1px solid rgba(255,255,255,0.08);
    margin-top: var(--space-8);
    padding-top: var(--space-6);
  }
  .footer-entity p {
    font-size: var(--font-size-xs);
    color: rgba(255,255,255,0.45);
    line-height: 1.7;
    max-width: 860px;
    margin: var(--space-2) 0 0;
  }
  .footer-entity h5 {
    font-size: var(--font-size-xs);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: rgba(255,255,255,0.3);
    margin-bottom: var(--space-1);
  }

  /* Footer logo text */
  .footer-logo-mark {
    color: var(--color-accent);
    font-family: var(--font-heading);
    font-weight: 800;
  }
  .footer-logo-name {
    font-family: var(--font-heading);
    font-weight: 700;
    font-size: var(--font-size-xl);
    color: var(--color-white);
    line-height: 1.1;
    display: block;
    margin-bottom: var(--space-1);
  }
  .footer-tagline {
    font-size: var(--font-size-xs);
    color: var(--color-accent);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    display: block;
    margin-bottom: var(--space-4);
  }
  .footer-desc {
    font-size: var(--font-size-sm);
    color: rgba(255,255,255,0.6);
    line-height: 1.7;
    margin-bottom: var(--space-4);
  }

  /* Nav logo text */
  .logo-mark {
    color: var(--color-accent);
    font-family: var(--font-heading);
    font-weight: 800;
  }
  .logo-name {
    font-family: var(--font-heading);
    font-weight: 700;
    color: var(--color-white);
    font-size: var(--font-size-lg);
    letter-spacing: -0.01em;
  }
  .logo-tagline {
    display: block;
    font-size: 0.6rem;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    color: rgba(255,255,255,0.55);
    line-height: 1;
    margin-top: 2px;
  }
  .site-logo {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    text-decoration: none;
  }
  .site-logo img {
    height: 40px;
    width: auto;
    border-radius: var(--radius-sm);
  }

  /* Mobile CTA bar flex layout */
  .mobile-cta-bar {
    display: none;
    gap: var(--space-2);
  }
  .mobile-cta-bar .btn { flex: 1; }

  /* Focus-visible outlines */
  *:focus-visible {
    outline: 2px solid var(--color-accent);
    outline-offset: 2px;
  }

  /* Prefers-reduced-motion */
  @media (prefers-reduced-motion: reduce) {
    *, *::before, *::after {
      animation-duration: 0.01ms !important;
      animation-iteration-count: 1 !important;
      transition-duration: 0.01ms !important;
      scroll-behavior: auto !important;
    }
  }

  @media (max-width: 768px) {
    .nav-mobile-only { display: block !important; }
    .nav-mobile-only.flex { display: flex !important; }
    .mobile-cta-bar { display: flex; }
    .nav-dropdown > a::after { display: none; }
  }
</style>

</head>
<body>
