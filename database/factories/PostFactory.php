<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(6, true);
        $bodyParagraphs = $this->faker->paragraphs(mt_rand(5, 10));
        $body = implode("\n\n", $bodyParagraphs);

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

        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . $this->faker->unique()->numberBetween(1000, 999999),
            'excerpt' => $this->faker->optional()->text(160),
            'body' => $body,
            'image_path' => $this->faker->optional(0.7)->randomElement($sampleImages),
            'published_at' => $this->faker->optional(0.8)->dateTimeBetween('-60 days', 'now'),
        ];
    }
}
