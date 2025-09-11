<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route as RouteFacade;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Main sitemap
        $sitemap .= '<sitemap>';
        $sitemap .= '<loc>' . url('/sitemap-pages.xml') . '</loc>';
        $sitemap .= '<lastmod>' . now()->toISOString() . '</lastmod>';
        $sitemap .= '</sitemap>';

        // News sitemap
        $sitemap .= '<sitemap>';
        $sitemap .= '<loc>' . url('/sitemap-news.xml') . '</loc>';
        $sitemap .= '<lastmod>' . now()->toISOString() . '</lastmod>';
        $sitemap .= '</sitemap>';

        $sitemap .= '</sitemapindex>';

        return response($sitemap, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }

    public function pages()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Static pages
        $pages = [
            ['url' => route('home'), 'priority' => '1.0', 'changefreq' => 'daily'],
            ['url' => route('about'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => route('courses'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => route('news.index'), 'priority' => '0.9', 'changefreq' => 'daily'],
            ['url' => route('gallery'), 'priority' => '0.7', 'changefreq' => 'weekly'],
            ['url' => route('contact'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => route('certificate.verify'), 'priority' => '0.6', 'changefreq' => 'monthly'],
            // HTML sitemap
            ['url' => url('/sitemap'), 'priority' => '0.5', 'changefreq' => 'weekly'],
        ];

        if (RouteFacade::has('login')) {
            $pages[] = ['url' => route('login'), 'priority' => '0.3', 'changefreq' => 'yearly'];
        }
        if (RouteFacade::has('register')) {
            $pages[] = ['url' => route('register'), 'priority' => '0.3', 'changefreq' => 'yearly'];
        }

        foreach ($pages as $page) {
            $sitemap .= '<url>';
            $sitemap .= '<loc>' . $page['url'] . '</loc>';
            $sitemap .= '<lastmod>' . now()->toISOString() . '</lastmod>';
            $sitemap .= '<changefreq>' . $page['changefreq'] . '</changefreq>';
            $sitemap .= '<priority>' . $page['priority'] . '</priority>';
            $sitemap .= '</url>';
        }

        $sitemap .= '</urlset>';

        return response($sitemap, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }

    public function news()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">';

        // Get published posts
        $posts = Post::whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->get();

        foreach ($posts as $post) {
            $sitemap .= '<url>';
            $sitemap .= '<loc>' . route('news.show', $post->slug) . '</loc>';
            $sitemap .= '<lastmod>' . $post->updated_at->toISOString() . '</lastmod>';
            $sitemap .= '<changefreq>weekly</changefreq>';
            $sitemap .= '<priority>0.7</priority>';
            $sitemap .= '<news:news>';
            $sitemap .= '<news:publication>';
            $sitemap .= '<news:name>Varin SkillUp Academy</news:name>';
            $sitemap .= '<news:language>en</news:language>';
            $sitemap .= '</news:publication>';
            $sitemap .= '<news:publication_date>' . $post->published_at->toISOString() . '</news:publication_date>';
            $sitemap .= '<news:title>' . htmlspecialchars($post->title) . '</news:title>';
            if ($post->excerpt) {
                $sitemap .= '<news:keywords>' . htmlspecialchars($post->excerpt) . '</news:keywords>';
            }
            $sitemap .= '</news:news>';
            $sitemap .= '</url>';
        }

        $sitemap .= '</urlset>';

        return response($sitemap, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
}
