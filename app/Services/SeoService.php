<?php

namespace App\Services;

class SeoService
{
    public static function generateMetaTags($title, $description, $keywords = '', $image = '', $url = '', $type = 'website')
    {
        $siteName = 'Varin SkillUp Academy';
        $defaultImage = asset('assets/images/varin-academy-logo.svg');

        return [
            'title' => $title . ' | ' . $siteName,
            'description' => $description,
            'keywords' => $keywords,
            'image' => $image ?: $defaultImage,
            'url' => $url ?: url()->current(),
            'type' => $type,
            'site_name' => $siteName,
        ];
    }

    public static function generateStructuredData($type, $data)
    {
        $structuredData = [
            '@context' => 'https://schema.org',
            '@type' => $type,
        ];

        switch ($type) {
            case 'Organization':
                $structuredData = array_merge($structuredData, [
                    'name' => 'Varin SkillUp Academy',
                    'url' => url('/'),
                    'logo' => asset('assets/images/varin-academy-logo.svg'),
                    'description' => 'Leading educational and professional training institute in Afghanistan, dedicated to building knowledge, enhancing skills, and shaping brighter futures.',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => '2nd Floor, Aryoob Market, Ahmadshah Baba Mina',
                        'addressLocality' => 'Kabul',
                        'addressCountry' => 'Afghanistan'
                    ],
                    'contactPoint' => [
                        '@type' => 'ContactPoint',
                        'telephone' => '+93-774801209',
                        'contactType' => 'customer service',
                        'email' => 'info@varinacademy.com'
                    ],
                    'sameAs' => [
                        'https://www.facebook.com/varinacademy/',
                        'https://www.linkedin.com/company/varinacademy/'
                    ]
                ]);
                break;

            case 'EducationalOrganization':
                $structuredData = array_merge($structuredData, [
                    'name' => 'Varin SkillUp Academy',
                    'url' => url('/'),
                    'description' => 'Professional training institute offering comprehensive educational programs in languages, IT, professional certifications, and creative design.',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => '2nd Floor, Aryoob Market, Ahmadshah Baba Mina',
                        'addressLocality' => 'Kabul',
                        'addressCountry' => 'Afghanistan'
                    ]
                ]);
                break;

            case 'Article':
                $structuredData = array_merge($structuredData, [
                    'headline' => $data['title'] ?? '',
                    'description' => $data['description'] ?? '',
                    'image' => $data['image'] ?? '',
                    'datePublished' => $data['published_at'] ?? '',
                    'dateModified' => $data['updated_at'] ?? '',
                    'author' => [
                        '@type' => 'Organization',
                        'name' => 'Varin SkillUp Academy'
                    ],
                    'publisher' => [
                        '@type' => 'Organization',
                        'name' => 'Varin SkillUp Academy',
                        'logo' => [
                            '@type' => 'ImageObject',
                            'url' => asset('assets/images/varin-academy-logo.svg')
                        ]
                    ]
                ]);
                break;
        }

        return $structuredData;
    }

    public static function generateBreadcrumbs($items)
    {
        $breadcrumbs = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => []
        ];

        foreach ($items as $index => $item) {
            $breadcrumbs['itemListElement'][] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['name'],
                'item' => $item['url']
            ];
        }

        return $breadcrumbs;
    }
}
