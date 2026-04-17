<?php
// ============================================================
// Keep N Kleen — Site Configuration
// Auto-generated from build-plan.json  |  Phase 1 Scaffold
// ============================================================

// ─── Identity ────────────────────────────────────────────────
$siteName        = 'Keep N Kleen';
$companyName     = 'Keep N Kleen';
$tagline         = 'Keep It Spotless, Keep It Kleen!';
$phone           = '';                // TODO: Add client phone number
$phoneFormatted  = '';                // TODO: e.g. "(757) 555-0100"
$phoneSecondary  = '';                // TODO: Add secondary phone if applicable
$email           = '';                // TODO: Add client email address
$ownerName       = '';                // TODO: Add owner / contact name

// ─── Address ─────────────────────────────────────────────────
$address = [
    'street' => '2964 Apache',
    'city'   => 'Hayes',
    'state'  => 'VA',
    'zip'    => '23072',
];

// Convenience: full one-line address
$addressFull = $address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip'];

// ─── Digital Presence ─────────────────────────────────────────
$domain        = 'keep-n-kleen.com';          // TODO: Confirm final domain with client
$canonicalBase = 'https://keep-n-kleen.com';   // TODO: Update when domain confirmed
$industry      = 'janitorial';

// ─── SEO Keywords ────────────────────────────────────────────
$primaryKeyword    = 'cleaning service hayes va';
$secondaryKeywords = [
    'maid service hayes va',
    'house cleaning hayes virginia',
    'residential cleaning services hayes',
    'move out cleaning hayes va',
    'move in cleaning hayes virginia',
    'post construction cleaning hayes',
    'cleaning services near me',
    'maid services near me',
    'home cleaning services hayes',
    'regular house cleaning hayes va',
    'cleaning company hayes virginia',
    'professional cleaning services hayes',
];

// ─── Services ─────────────────────────────────────────────────
$services = [
    [
        'name'        => 'Maid Services',
        'slug'        => 'maid-services',
        'description' => 'Professional maid services in Hayes, VA providing thorough home cleaning solutions. Our experienced team delivers reliable and affordable cleaning services to keep your home spotless.',
        'keywords'    => [
            'maid services Hayes VA',
            'house cleaning Hayes Virginia',
            'professional cleaning services Hayes',
            'residential maid service Hayes',
            'home cleaning Hayes VA',
        ],
    ],
    [
        'name'        => 'Move-In / Move-Out Cleaning',
        'slug'        => 'move-in-move-out-cleaning',
        'description' => 'Comprehensive move-in and move-out cleaning services in Hayes, VA to ensure your property is spotless for new occupants. We handle deep cleaning tasks to make your transition smooth and stress-free.',
        'keywords'    => [
            'move out cleaning Hayes VA',
            'move in cleaning Hayes Virginia',
            'relocation cleaning Hayes',
            'end of lease cleaning Hayes VA',
            'moving cleaning services Hayes',
        ],
    ],
    [
        'name'        => 'Regular Home Cleaning',
        'slug'        => 'regular-home-cleaning',
        'description' => 'Consistent weekly, bi-weekly, or monthly home cleaning services in Hayes, VA tailored to your schedule. Maintain a pristine living environment with our reliable regular cleaning programs.',
        'keywords'    => [
            'regular cleaning Hayes VA',
            'weekly cleaning Hayes Virginia',
            'monthly house cleaning Hayes',
            'recurring cleaning services Hayes',
            'home maintenance cleaning Hayes VA',
        ],
    ],
    [
        'name'        => 'Post-Construction Cleaning',
        'slug'        => 'post-construction-cleaning',
        'description' => 'Specialized post-construction cleaning services in Hayes, VA to remove debris, dust, and construction residue. Our thorough cleanup prepares your newly built or renovated space for occupancy.',
        'keywords'    => [
            'post construction cleaning Hayes VA',
            'construction cleanup Hayes Virginia',
            'renovation cleaning Hayes',
            'builder cleaning services Hayes',
            'construction debris removal Hayes VA',
        ],
    ],
];

// ─── Service Areas ────────────────────────────────────────────
$serviceAreas = [
    [
        'city'    => 'Hayes',
        'state'   => 'VA',
        'zip'     => '23072',
        'slug'    => 'hayes-va',
        'primary' => true,
    ],
];

// Primary service area convenience vars
$serviceCity  = 'Hayes';
$serviceState = 'VA';

// ─── Social Links ─────────────────────────────────────────────
$socialLinks = [
    'facebook'  => '',   // TODO: Add Facebook page URL
    'instagram' => '',   // TODO: Add Instagram profile URL
    'google'    => '',   // TODO: Add Google Business Profile URL
];

// ─── Design Tokens ────────────────────────────────────────────
$colors = [
    'primary'     => '#1a2b3c',
    'primaryDark' => '#0f1e2d',
    'primaryRgb'  => '26, 43, 60',
    'secondary'   => '#4d5e6f',
    'accent'      => '#06b6d4',
    'bgDark'      => '#0f1e2d',
];

// ─── Business Details ─────────────────────────────────────────
$yearEstablished = 2021;
$yearsInBusiness = 5;   // Calculated: 2026 - 2021
$licenseInfo     = 'Licensed & Insured';
$serviceRadius   = 55;  // miles

$description = "Since 2021, Keep N Kleen has been the premier choice for pristine spaces, serving communities across Virginia and North Carolina. Founded with a passion for excellence, the company has built its reputation on reliability, attention to detail, and genuine care for clients' homes and businesses. Keep N Kleen believes everyone deserves to come home to a clean, comfortable space, and this philosophy drives their commitment to transforming environments into spotless sanctuaries.";

$differentiators = [
    'Local Virginia-based janitorial expertise with understanding of regional business needs',
    'Customizable cleaning solutions for various facility types and sizes',
    'Environmentally responsible cleaning practices and eco-friendly product options',
    'Reliable, consistent scheduling and professionally trained staff',
    'Quick response times and flexible service adjustments for growing businesses',
];

// ─── FAQs ─────────────────────────────────────────────────────
$faqs = [
    [
        'q' => 'What types of facilities do you service?',
        'a' => 'Keep N Kleen provides cleaning services for homes, offices, retail spaces, medical facilities, educational institutions, warehouses, and other commercial properties throughout Virginia.',
    ],
    [
        'q' => 'Can you customize a cleaning plan for my home or business?',
        'a' => 'Absolutely. We understand that every space has unique needs. We offer customizable cleaning schedules and service packages tailored to your specific requirements, budget, and facility size.',
    ],
    [
        'q' => 'Do you use eco-friendly cleaning products?',
        'a' => 'We offer environmentally responsible cleaning solutions and can work with eco-friendly products upon request. Our team uses safe, effective products appropriate for your space type.',
    ],
    [
        'q' => 'How quickly can you start service?',
        'a' => 'We pride ourselves on quick turnaround times. Contact us for availability — we work to accommodate urgent cleaning needs and schedule new clients promptly.',
    ],
    [
        'q' => 'What if I need to adjust my cleaning schedule?',
        'a' => 'We provide flexible service adjustments to match your changing needs. Whether you need increased frequency during peak seasons or temporary changes, our team works with you to adapt our services.',
    ],
];

// ─── Forms ────────────────────────────────────────────────────
$formAction = 'https://design.pageone.cloud/api/leads/keep-n-kleen';
$formSubject = 'Keep N Kleen — New Website Inquiry';

// ─── Analytics ────────────────────────────────────────────────
$googleAnalyticsId = 'G-XXXXXXXXXX';   // TODO: Replace with actual GA4 Measurement ID

// ─── Client Assets ────────────────────────────────────────────
$logoUrl = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/logo/1776457961137-kuduf3-unnamed.jpg';

$clientImages = [
    [
        'url'     => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/photos/1776458151029-1817c0-o__2_.jpg',
        'context' => 'cleaning',
        'alt'     => 'Keep N Kleen professional home cleaning service Hayes VA',
    ],
    [
        'url'     => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/photos/1776458152242-af9z6l-o__1_.jpg',
        'context' => 'cleaning',
        'alt'     => 'Residential cleaning services Hayes Virginia',
    ],
    [
        'url'     => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/photos/1776458153035-b7uxch-o.jpg',
        'context' => 'cleaning',
        'alt'     => 'Maid services Hayes VA spotless home cleaning',
    ],
    [
        'url'     => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/photos/1776458153912-n4581n-348s__3_.jpg',
        'context' => 'cleaning',
        'alt'     => 'Professional cleaning team Hayes Virginia',
    ],
    [
        'url'     => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/photos/1776458154653-t4jdrx-348s__2_.jpg',
        'context' => 'cleaning',
        'alt'     => 'House cleaning services Hayes VA Keep N Kleen',
    ],
    [
        'url'     => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/photos/1776458155422-wodnh4-348s__1_.jpg',
        'context' => 'cleaning',
        'alt'     => 'Deep cleaning services Hayes Virginia',
    ],
    [
        'url'     => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/photos/1776458156181-ifnkl5-o__9_.jpg',
        'context' => 'cleaning',
        'alt'     => 'Regular home cleaning Hayes VA maintenance',
    ],
    [
        'url'     => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/photos/1776458157023-0f5ra0-o__8_.jpg',
        'context' => 'cleaning',
        'alt'     => 'Move-out cleaning services Hayes Virginia',
    ],
    [
        'url'     => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/photos/1776458157843-76lanl-o__7_.jpg',
        'context' => 'cleaning',
        'alt'     => 'Post construction cleaning Hayes VA debris removal',
    ],
    [
        'url'     => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/photos/1776458158722-x0jplb-o__6_.jpg',
        'context' => 'cleaning',
        'alt'     => 'Professional maid service Hayes Virginia spotless results',
    ],
    [
        'url'     => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/photos/1776458159509-b6jbb6-o__5_.jpg',
        'context' => 'cleaning',
        'alt'     => 'Residential cleaning company Hayes VA',
    ],
    [
        'url'     => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/photos/1776458160265-mhpgf1-o__4_.jpg',
        'context' => 'cleaning',
        'alt'     => 'Home cleaning service Hayes Virginia Keep N Kleen',
    ],
    [
        'url'     => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/photos/1776458161122-vy72kb-o__3_.jpg',
        'context' => 'cleaning',
        'alt'     => 'Keep N Kleen team cleaning residential home Hayes VA',
    ],
    [
        'url'     => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/photos/1776458260274-sqmqg0-NAVS9nD.png',
        'context' => 'cleaning',
        'alt'     => 'Professional cleaning services Hayes Virginia',
    ],
    [
        'url'     => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/keep-n-kleen/photos/1776458261392-o3ed90-yG8l1Js.png',
        'context' => 'cleaning',
        'alt'     => 'Keep N Kleen cleaning professionals Hayes VA',
    ],
];

// Hero image (best available client photo for full-bleed hero)
$heroImageUrl = $clientImages[0]['url'];
