<?php
/**
 * functions.php — Shared helper functions
 * Keep N Kleen | Page One Insights
 */

/**
 * Returns true if $page matches the globally set $currentPage.
 */
function isActivePage(string $page): bool {
    global $currentPage;
    return isset($currentPage) && $currentPage === $page;
}

/**
 * Formats a raw phone number string to "(NXX) NXX-XXXX".
 */
function formatPhone(string $raw): string {
    $digits = preg_replace('/\D/', '', $raw);
    if (strlen($digits) === 10) {
        return '(' . substr($digits, 0, 3) . ') ' . substr($digits, 3, 3) . '-' . substr($digits, 6, 4);
    }
    if (strlen($digits) === 11 && $digits[0] === '1') {
        return '+1 (' . substr($digits, 1, 3) . ') ' . substr($digits, 4, 3) . '-' . substr($digits, 7, 4);
    }
    return $raw;
}

/**
 * Converts a service name to a URL slug.
 * "Move-In / Move-Out Cleaning" → "move-in-move-out-cleaning"
 */
function getServiceSlug(string $name): string {
    return preg_replace(
        '/[\s-]+/', '-',
        trim(preg_replace('/[^a-z0-9\s-]/', '', strtolower($name)))
    );
}

/**
 * Converts a city name to a URL slug.
 * "Virginia Beach" → "virginia-beach"
 */
function getAreaSlug(string $city): string {
    return preg_replace(
        '/[\s-]+/', '-',
        trim(preg_replace('/[^a-z0-9\s-]/', '', strtolower($city)))
    );
}

/**
 * Returns a schema.org Service JSON-LD array for the given service.
 *
 * @param array{name: string, slug: string, description: string} $service
 */
function generateServiceSchema(array $service): array {
    global $siteName, $address, $canonicalBase;
    return [
        '@context'    => 'https://schema.org',
        '@type'       => 'Service',
        'name'        => $service['name'],
        'description' => $service['description'],
        'serviceType' => $service['name'],
        'url'         => $canonicalBase . '/services/' . $service['slug'],
        'provider'    => [
            '@type'   => 'LocalBusiness',
            'name'    => $siteName,
            'url'     => $canonicalBase,
            'address' => [
                '@type'           => 'PostalAddress',
                'addressLocality' => $address['city'],
                'addressRegion'   => $address['state'],
                'addressCountry'  => 'US',
            ],
        ],
        'areaServed' => [
            '@type' => 'State',
            'name'  => 'Virginia',
        ],
    ];
}

/**
 * Returns a schema.org FAQPage JSON-LD array from Q&A pairs.
 *
 * @param array<array{q: string, a: string}> $faqs
 */
function generateFAQSchema(array $faqs): array {
    return [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => array_map(function (array $faq): array {
            return [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => $faq['a'],
                ],
            ];
        }, $faqs),
    ];
}

/**
 * Returns an HTML string with <title>, <meta description>, and <link canonical>.
 */
function generateMetaTags(string $title, string $description, string $canonical): string {
    $t = htmlspecialchars($title,       ENT_QUOTES, 'UTF-8');
    $d = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
    $c = htmlspecialchars($canonical,   ENT_QUOTES, 'UTF-8');

    return "<title>{$t}</title>\n"
         . "<meta name=\"description\" content=\"{$d}\">\n"
         . "<link rel=\"canonical\" href=\"{$c}\">";
}
