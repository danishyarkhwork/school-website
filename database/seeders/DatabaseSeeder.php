<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User']
        );

        // Seed dummy posts
        Post::factory()->count(18)->create();

        // Backfill images for posts without image_path
        $sampleImages = [
            'assets/images/1.jpg',
            'assets/images/3.jpg',
            'assets/images/4.jpg',
            'assets/images/5.jpg',
            'assets/images/banners/banner-1.jpeg',
            'assets/images/banners/banner-2.jpeg',
            'assets/images/banners/banner-3.jpeg',
            'assets/images/banners/banner-4.jpeg',
            'assets/images/banners/banner-5.jpeg',
            'assets/images/banners/banner-6.jpeg',
        ];
        Post::whereNull('image_path')->orWhere('image_path', '=', '')->get()->each(function ($post) use ($sampleImages) {
            $post->update(['image_path' => $sampleImages[array_rand($sampleImages)]]);
        });
    }
}
