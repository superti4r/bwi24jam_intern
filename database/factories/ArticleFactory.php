<?php

namespace Database\Factories;

use App\Enum\Status;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => fake()->unique()->sentence(4),
            'slug' => Str::lower(Str::random(12)),
            'content' => fake()->paragraphs(3, true),
            'thumbnail' => 'thumbnails/' . Str::random(12) . '.jpg',
            'status' => Status::DRAFT->value,
        ];
    }
}
